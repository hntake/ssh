<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB; // DB ファサードを use する
use Illuminate\Support\Facades\Auth; //ログインステイタスをもらうため
use App\Models\Product;
use App\Models\Order;
use App\Models\Out;
use App\Models\Ship;
use App\Models\Staff;
use App\Models\OrderForm;
use App\Models\Stock;
use App\Models\Supplier;
use App\Models\In;
use Illuminate\Support\Facades\Validator;
use App\Rules\AllDistinct;
use Barryvdh\DomPDF\Facade\Pdf; // dompdfのファサード
use SimpleSoftwareIO\QrCode\Facades\QrCode;
use Dompdf\Options;
use TCPDF;
use Stripe\SetupIntent;
use Stripe\PaymentIntent;
use Laravel\Cashier\Cashier;
use Stripe\Customer;
use Stripe\PaymentMethod;
use Stripe\StripeClient;


use Psy\Command\WhereamiCommand;

class ProductController extends Controller
{
    /**
     * 在庫一覧表示 $idは会社id
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request,$id)
    {
        $stock=Stock::where('id','=',$id)->first();
        $products = Product::where('name_id','=',$id)->orderBy('created_at', 'asc')->paginate(50);
        return view('products', [
            'products' => $products,
            'stock'=>$stock,
        ]);
    }
    /**
     * 注文申請への遷移と注文データの受け渡し
     *
     * @param Request $request
     * @return Response
     */
    //idを指定する
    public function order(Request $request, $product_id)
    {
        //注文数を計算
        $left = Product::where('id', $product_id)
            ->value('stock');
        $order_line = Product::where('id', $product_id)
            ->value('order');
        $order_number = $order_line - $left;

        $product = Product::where('id', $request->id)->first();
        $stock=Stock::where('id','=',$product->name_id)->first();

        //compact関数で複数の変数を渡す
        return view('order', compact('product', 'order_number','stock'));
    }
    /**
     * 備品登録画面へ遷移
     *
     * @param Request $request
     * @return Response
     */
    public function create(Request $request,$id)
    {
        $stock=Stock::find($id);
        $suppliers=Supplier::where('stock_id','=',$stock->id)->get();

        return view('create_products',[
            'stock'=>$stock,
            'suppliers'=>$suppliers,
        ]);
    }

    /**
     * 備品登録
     *
     * @param Request $request
     * @return Response
     */
    public function update(Request $request,$id)
    {
        $stock=Stock::where('id','=',$id)->first();

        $this->validate($request, [
            'product_name' => 'required',
            'stock' => 'required|max:25',
            'order' => 'required|max:25',
        ]);
        $email = Supplier::where('name', $request->supplier_name)->value('email'); 

        $product = new Product;
        $product->product_name = $request->product_name;
        $product->stock = $request->stock;
        $product->order = $request->order;
        $product->name_id = $stock->id;
        $product->supplier_name= $request->supplier_name;
        $product->email = $email;
        $product->save();

            // Productモデルに保存する前にQRコードを生成
        $qrCodeData = url('/qr/' . $product->id); // 商品ページへのURLをQRコードに        
        $qrCodeData = mb_convert_encoding($qrCodeData, 'UTF-8', 'auto'); // 自動でUTF-8に変換
        $qrCodeData = trim($qrCodeData); // 不要な空白を取り除く
        $qrCodeData = preg_replace('/[\x00-\x1F\x7F-\x9F]/', '', $qrCodeData); // 制御文字を削除
        $qrCodePath = 'qrcodes/' . uniqid() . '.png'; // ファイル名を生成
        // qrcodesディレクトリが存在しない場合、作成する
        $qrCodeDir = public_path('qrcodes');
        if (!is_dir($qrCodeDir)) {
            mkdir($qrCodeDir, 0777, true); // ディレクトリを作成
        }

        // QRコードを生成して保存
        QrCode::format('png')->size(400)->encoding('UTF-8')->generate($qrCodeData, public_path($qrCodePath));
        
        $product->qr_code_path = $qrCodePath; // 生成したQRコードのパスを保存
        $product->save();

        $products = Product::where('name_id','=',$id)->orderBy('created_at', 'asc')->paginate(50);

        return view('products', [
            'products' => $products,
            'stock'=>$stock,
        ]);
    }
    /**
     * 注文発生、ordersテーブルへのデータ受け渡し、在庫数に反映
     *
     * @param Request $request
     * @return Response
     */
    public function insert(Request $request)
    {
        $this->validate($request, [
            'new_order' => 'required|max:25',
            'staff' => 'required|max:25',
        ]);
        $product=Product::where('product_name','=',$request->product_name)->first();
        $stock=Stock::where('id','=',$product->name_id)->first();
        //ordersテーブルへのデータ受け渡し
        $order = new Order;
        $order->product_id = $request->product_id;
        $order->product_name = $request->product_name;
        $order->new_order = $request->new_order;
        $order->staff = $request->staff;
        $order->supplier_name = $product->supplier_name;
        $order->name_id = $stock->id;
        $order->save();

        // CSRFトークンを再生成して、二重送信対策
        $request->session()->regenerateToken(); // <- この一行を追加

        //在庫数に反映->入庫されるまで反映させない為無しとする
        // $data = Product::where('id', $request->product_id)
        //     ->value('stock');


        // $renew = $data + $request->new_order;

        // DB::table('products')
        //     ->where('id', $request->product_id)
        //     ->update([
        //         'stock' => $renew
        //     ]);
        DB::table('products')
            ->where('id', $request->product_id)
            ->update([
                'status' => 1
            ]);

        $orders = Order::where('name_id',$product->name_id)->orderBy('created_at', 'desc')->paginate(50);
        return view('order_table', [
            'orders' => $orders,
            'stock' => $stock,
        ]);
    }
    /**
     * 注文一覧表示
     *
     * @param Request $request
     * @return Response
     */
    public function order_table(Request $request,$id)
    {
        $orders = Order::where('name_id',$id)->orderBy('created_at', 'desc')->paginate(50);
        $stock=Stock::where('id','=',$id)->first();

        return view('order_table', [
            'orders' => $orders,
            'stock' => $stock,
        ]);
    }
    /**
     * 注文表覧表示
     *
     * @param Request $request
     * @return Response
     */
    public function ship_table($id)
    {
        $ships = Ship::where('name_id',$id)->orderBy('created_at', 'desc')->paginate(50);
        $stock=Stock::where('id','=',$id)->first();
        
        return view('ship_table', [
            'ships' => $ships,
            'stock' => $stock,
        ]);
    }
        /**
     * メールボックス表示
     *
     * @param Request $request
     * @return Response
     */
    public function mail_box($id)
    {
        $orderForms = OrderForm::where('name_id',$id)->orderBy('created_at', 'desc')->paginate(50);
        $stock=Stock::where('id','=',$id)->first();
        
        return view('stock/mail_box', [
            'orderForms' => $orderForms,
            'stock' => $stock,
        ]);
    }
    /**
     *
     *選択した注文（複数）をメール作成フォームに遷移$id=store->id

     * @param Request $request
     * @return Response
     * */
    public function form(Request $request,$id)
    {

        // リクエストで送信されたチェックされた注文IDを取得
        $selected_orders = $request->input('selected_orders');
        // $selected_ordersが空でないか確認
        if (empty($selected_orders) || count($selected_orders) < 1) {
            return response()->json(['error' => '注文IDが選択されていません'], 400);
        }
        // 選択された注文IDに基づいてShipデータを一括取得
        $ships = Ship::whereIn('id', $selected_orders)->get()->keyBy('id'); 
        // 最初の注文データを使用してOrderFormを作成
        $first_ship = $ships->get($selected_orders[0]); 
        //一つ目の注文のスタッフ名を採択
        $staff=$first_ship->staff; 
        $supplier_name=$first_ship->supplier_name; 
        // OrderFormモデルに今回の注文メール作成を記録
        $orderForm = new OrderForm();
        // 各フィールドに値をセット
        $orderForm->name_id = $id;
        $orderForm->staff = $staff;
        $orderForm->supplier_name = $supplier_name;
        $orderForm->due_date = $request->due_date;
        // ループでitemフィールドとnew_orderフィールドをセット
        foreach ($selected_orders as $index => $order_id) {
            if ($index >= 10) break; // 最大10件まで

            $ship = $ships->get($order_id);
            if (!$ship) continue; // 該当データがない場合スキップ

            $itemField = "item" . ($index + 1); // item1, item2, ...
            $new_orderField = "new_order" . ($index + 1); 

            $orderForm->$itemField = $ship->product_name;
            $orderForm->$new_orderField = $ship->new_order;
        }
        // データベースに保存
        $orderForm->save();
          // 各データをループで処理
        foreach ($selected_orders as $order_id) {
            // 注文IDに対応するShipモデルを取得
            $ship = Ship::where('id', $order_id)->first();
            // Shipモデルを更新
            $ship->update([
                'form_id' => $orderForm->id,
                'status' => 1,//メール作成済みとする
            ]);
        }
            $ships = Ship::whereIn('id', $selected_orders)->get();
            $form_id=$orderForm->id;
            $company=Stock::where('id',$orderForm->name_id)->first();

                return view('form', [
                    'ships'=>$ships,
                    'orderForm'=>$orderForm,
                    'form_id'=>$form_id,
                    'company'=>$company,

        ]);
}
    /**
     *
     *選択した送信メール画面を表示

     * @param Request $request
     * @return Response
     * */
    public function form_id(Request $request,$id)

    {
        //伝票番号が一致するものを取得
        $orderForm=OrderForm::where('id','=',$id)->first();
    
        $company=Stock::where('id',$orderForm->name_id)->first();
            return view('form_id', [
                'company'=>$company,
                'orderForm'=>$orderForm,
    ]);
}
    /**
     *
     *送信済みを選んだものをshipsテーブルに入力し、注文表からは削除。注文番号確認画面へ遷移

     * @param Request $request
     * @return Response
     * */
    public function ship(Request $request,$id)

    {
        $stock=Stock::where('id','=',$id)->first();

            // 選択された注文のIDだけを抽出
            $selectedOrders = $request->input('selected_orders', []); // チェックされたIDを取得
        
            foreach ($selectedOrders as $orderId) {
                // チェックされた注文を処理
                $order = Order::find($orderId);
                if ($order) {
                    $order->status = 1; // 状態を更新
                    $order->save();
                }
            }
            // shipsテーブルへ送る注文を指定
            $datas = Order::whereIn('id', $selectedOrders)
            ->where('status', 1)
            ->get();

            //shipsテーブルへのデータ受け渡し
            foreach($datas as $data){
                $order = Order::where('id','=',$data->id)->first();

                $ship = new Ship;
                $ship->product_name = $data->product_name;
                $ship->new_order = $data->new_order;
                $ship->supplier_name = $data->supplier_name;
                $ship->staff = $data->staff;
                $ship->name_id = $data->name_id;
                //新オーダー表
                $ship->order_id = $order->id;
                $ship->save();
                
            }
          // ships テーブルに挿入後、選択された注文のステータスを 2 に変更
            Order::whereIn('id', $selectedOrders)
            ->update(['status' => 2]);

            $stock=Stock::where('id',$id)->first();
            // $datasからidの配列を取得
            $orderIds = $datas->pluck('id')->toArray();

            // shipsテーブルからorder_idが一致し、statusが0のものを取得
            $ships = Ship::whereIn('order_id', $orderIds)
                        ->where('status', '0')
                        ->orderBy('created_at', 'desc')->paginate(50);            
            return view('ship_table', [
                'ships' => $ships,
                'stock' => $stock,
            ]);
        }
/**
     * 出庫・入庫申請画面へ遷移
     *
     * @param Request $request
     * @return Response
     */
    public function store(Request $request,$id)
    {
        $stock=Stock::where('id','=',$id)->first();
        $products=Product::where('name_id','=',$stock->id)->get();

        $action = $request->query('action', 'stock_out'); // デフォルト値を 'stock_out' に設定

        return view('out', [
            'stock' => $stock,
            'products' => $products,
            'action' => $action,
        ]);
    }
    //出庫・入庫申請→out・inテーブルへの登録
    public function subtract(Request $request, $id)
    {

        // アプリ会社のidから情報取得
        $stock = Stock::where('id', '=', $id)->first();
    
        // チェックボックスで選択された商品IDの配列を取得
        $productIds = $request->input('product_ids', []);
        
        // 各商品ごとの数量を取得
        $quantities = $request->input('quantities', []);
    
        // 在庫が不足している商品がないか確認するフラグ
        $hasError = false;
    
        $action = $request->input('action');        
        foreach ($productIds as $productId) {
            $product_record = Product::where('id', '=', $productId)->first();

            if($action==='stock_out'){
            
                // 在庫が足りるか確認
                if ($product_record->stock >= $quantities[$productId]) {

                    // 出庫登録する
                    $out = new Out;
                    $out->product_id = $productId;
                    $out->out_amount = $quantities[$productId];
                    $out->staff = $request->staff;
                    $out->name_id = $stock->id;
                    $out->save();
        
                    // 在庫表への反映
                    $subtract = $product_record->stock - $quantities[$productId];
        
                } else {
                    // 在庫が不足している場合はエラーフラグを立てる
                    $hasError = true;
                    break; // ループを抜けてエラーメッセージを処理する
                }
            }else{
                     // 入庫登録する
                    $in = new In;
                    $in->product_id = $productId;
                    $in->in_amount = $quantities[$productId];
                    $in->staff = $request->staff;
                    $in->voucher = $request->voucher;
                    $in->name_id = $stock->id;
                    $in->save();
        
                    // 在庫表への反映
                    $subtract = $product_record->stock + $quantities[$productId];

            }
            DB::table('products')
            ->where('id', $productId)
            ->update([
                'stock' => $subtract,
                'status' => 0 // statusを0に設定
            ]);
        }
    
        // エラーメッセージの処理
        if ($hasError) {
            return redirect()->back()->withErrors(['message' => '在庫が不足しています。']);
        }
    
        // 会社の全在庫を取得する
        $products = Product::where('name_id', '=', $id)->paginate(50);
    
        return view('products', [
            'products' => $products,
            'stock' => $stock,
        ]);
    }
    /**
     * QRコードによる入庫出庫画面へ遷移
     *
     * @param Request $request
     * @return Response
     */
    public function qr_index(Request $request,$id)
    {
        $product=Product::where('id','=',$id)->first();
        $stock=Stock::where('id','=',$product->name_id)->first();
        return view('qr', [
            'product' => $product,
            'stock'=>$stock,
        ]);
    }
    //QRによる持ち出し申請（従業員IDだけ入力する）→outテーブルへの登録
    public function qr(Request $request,$id)
    {
        $action = $request->input('action'); // 'stock_out' or 'stock_in' を取得

        //productsテーブルに型番があるか確認
        $product_record = Product::where('id', '=', $id)->first();

            $staff=$request->staff;
            $stock=Product::where('id', '=', $id)->value('stock');

            if($stock>$request->out_amount){
                //staffのIDで名前を入力できるようにする
                $staff_name=Staff::where('id','=',$staff)->value('name');
                // スタッフが存在しない場合のエラーメッセージ
                if (is_null($staff_name)) {
                    return back()->withErrors(['staff' => '正しい従業員IDを入力してください']);
                }

                if ($action === 'stock_out') {
                //新しい持ち出しを登録
                $out = new Out;
                $out->product_id = $id;
                $out->out_amount =$request->out_amount;//QR持出は一箱とする
                $out->staff = $staff_name;
                $out->name_id = $product_record->name_id;
                $out->save();

                 //在庫表への反映→在庫表へ遷移
                $data = Product::where('id', $id)
                    ->value('stock');

                $subtract = $data - $out->out_amount;

                DB::table('products')
                    ->where('id', $id)
                    ->update([
                        'stock' => $subtract
                    ]);
                }elseif ($action === 'stock_in') {
                //新しい入庫を登録
                $in = new In;
                $in->product_id = $id;
                $in->in_amount =$request->in_amount;//QR持出は一箱とする
                $in->staff = $staff_name;
                $in->voucher =$request->voucher;
                $in->name_id = $product_record->name_id;
                $in->save();

                 //在庫表への反映→在庫表へ遷移
                $data = Product::where('id', $id)
                    ->value('stock');

                $subtract = $data + $in->in_amount;

                DB::table('products')
                    ->where('id', $id)
                    ->update([
                        'stock' => $subtract,
                        'status' => 0 // statusを0に設定                    
                    ]);
                }

                $products = Product::where('name_id','=',$product_record->name_id)->orderBy('created_at', 'asc')->paginate(50);
                $stock=Stock::where('id','=',$product_record->name_id)->first();

                return view('products', [
                    'products' => $products,
                    'stock'=>$stock,
                ]);            
            }
            else {
                return trans('validation.numeric');

        }
    }

     //登録画面表示(会社IDと商品IDを渡す)
    public function staff(Request $request,$id)
    {
        $stock = Stock::where('id', '=', $id)->first();

        return view('staff',[
            'id'=>$id,
            'stock'=>$stock,
            ]
    );

    }

       //従業員登録（管理者専用）
    public function staff_register(Request $request,$id)
    {
            $staff = new Staff;
            $staff->name = $request->name;
            $staff->name_id = $id;
            $staff->save();

            $stock = Stock::where('id', '=', $id)->first();
            $staffs = Staff::where('name_id', '=', $id)->orderBy('created_at', 'asc')->get();

            return redirect()->route('staff_list', ['id' => $id])
            ->with('success', '従業員が登録されました');
    }

    // 一覧を表示するメソッド
    public function staff_list($id)
    {
        $stock = Stock::where('id', '=', $id)->first();
        $staffs = Staff::where('name_id', '=', $id)->orderBy('created_at', 'asc')->get();

        return view('staff_list', [
            'staffs' => $staffs,
            'stock' => $stock,
        ]);
    }

    //取引先登録画面
    public function supplier(Request $request,$id)
    {
        $stock=Stock::where('id','=',$id)->first();

        return view('stock/supplier_register', [
            'id'=>$id,
            'stock'=>$stock,
        ]);
    }

    //取引先登録
    public function supplier_post(Request $request,$id)
    {
        $supplier = new Supplier;
        $supplier->name=$request->name;
        $supplier->stock_id=$id;
        $supplier->email=$request->email;
        $supplier->save();

        $products=Product::where('name_id','=',$id)->paginate(50);
        $stock=Stock::where('id','=',$id)->first();
        return view('products', [
            'products' => $products,
            'stock'=>$stock,
        ]);
    }
    //在庫数を更新
    public function updateProduct(Request $request, $id)
    {
        $product = Product::find($id);
        if (!$product) {
            return response()->json(['error' => 'Product not found'], 404);
        }
    
        $column = array_keys($request->all())[0];
        if ($column && in_array($column, ['id', 'product_name', 'supplier_name', 'stock', 'order'])) {
            $product->$column = $request->$column;
            $product->save();
            return response()->json([$column => $product->$column]);
        } else {
            return response()->json(['error' => 'Invalid column'], 400);
        }
    }

        //注文票からの削除
        public function delete(Request $request, $id)
        {
            $name_id=Ship::where('id','=',$id)->value('name_id');
            $stock=Stock::where('id','=',$name_id)->first();
            $order_id=Ship::where('id','=',$id)->value('order_id');
            $ship = Ship::where('id', $id)->delete();
            DB::table('orders')
            ->where('id', $order_id)
            ->delete();
            $ships = Ship::where('name_id',$name_id)->orderBy('created_at', 'desc')->paginate(50);

            return view('ship_table', [
                'ships' => $ships,
                'stock' => $stock,
            ]);        
        }

        //メールボックスからの削除
        public function delete_orderForm(Request $request, $id)
        {
            // 削除対象のOrderFormデータからname_idを取得
            $orderForm = OrderForm::find($id);
            if (!$orderForm) {
                return redirect()->back()->with('error', 'データが見つかりませんでした。');
            }
            $name_id = $orderForm->name_id;
        
            // 対応するStockを取得
            $stock = Stock::where('id', '=', $name_id)->first();
        
            // データ削除
            $orderForm->delete();
        
            // name_idに関連するOrderFormデータを取得
            $orderForms = OrderForm::where('name_id', $name_id)
                ->orderBy('created_at', 'desc')
                ->paginate(50);
        
            // ビューにデータを渡して表示
            return view('stock/mail_box', [
                'orderForms' => $orderForms,
                'stock' => $stock,
            ]);
        }
        public function generateQrCodePdf($id)
        {
            // `name_id`に紐づくすべての`Product`データを取得
            $products = Product::where('name_id', '=', $id)->take(12)->get(); // 最大12個取得
        
            // TCPDFのインスタンスを作成
            $pdf = new TCPDF();
            $pdf->SetPrintHeader(false);
            $pdf->SetPrintFooter(false);
            $pdf->SetAutoPageBreak(true, 10);
            $pdf->AddPage('P', 'A4'); // A4サイズで縦方向（Portrait）

             // 日本語フォントの設定
            $pdf->SetFont('kozminproregular', '', 12);  // 日本語フォントを指定
        
            // PDF用のHTMLを生成
            // A4サイズに合わせてスタイルとレイアウトを設定
            $html = '<h1>QRコード一覧</h1><table style="width:100%;"><tr>';
                
            $columnCount = 3; // 横に3列
            $count = 0;        

            foreach ($products as $product) {
                if ($count > 0 && $count % $columnCount === 0) {
                    $html .= '</tr><tr>'; // 3つごとに新しい行を開始
                }
                $path = public_path($product->qr_code_path);

                 // パスがファイルであるか確認
                if (!is_file($path)) {
                    // ファイルが存在しない場合の処理（ログ出力など）
                    \Log::error("QRコード画像のパスが無効です: " . $path);
                    continue; // 次の製品へ
                }

                $base64Image = 'data:image/png;base64,' . base64_encode(file_get_contents($path));
        
                  // 商品名とQRコード画像を含むHTMLを生成
                $html .= '<td style="width: 33%; text-align: center; padding: 10px; border: 1px solid #ccc;">';
                $html .= '<p>' . htmlspecialchars($product->product_name) . '</p>';
                $html .= '<img src="' . $base64Image . '" style="width: 100px; height: 100px;" alt="QR Code">';                
                $html .= '</td>';

                $count++;
            }
        
            // 未終了の`tr`タグを閉じる
            $html .= '</tr></table>';        
            // HTMLをPDFに書き込む
            $pdf->writeHTML($html, true, false, true, false, '');
        
            // PDFを出力
            $pdf->Output('qr_codes.pdf', 'I'); // 画面に表示
        }

        //入庫表
        public function in(Request $request, $id){

            $ins=In::where('name_id','=',$id)->orderBy('created_at', 'desc')->paginate(50);
            $stock=Stock::where('id','=',$id)->first();

            return view('stock/in_table',[
                'ins' => $ins,
                'stock' => $stock,
            ]);
        }
        //出庫表
        public function out(Request $request, $id){

            $outs=Out::where('name_id','=',$id)->orderBy('created_at', 'desc')->paginate(50);
            $stock=Stock::where('id','=',$id)->first();

            return view('stock/out_table',[
                'outs' => $outs,
                'stock' => $stock,
            ]);
        }
        //アカウントページ表示
        public function show($id)
        {
            $stock=Stock::where('id','=',$id)->first();
            $subscription_status = $stock->paid; // 申込状況を取得するプロパティ（例）
    
            return view('stock/account', compact('stock', 'subscription_status'));
        }

        public function edit($id)
        {
            $stock=Stock::where('id','=',$id)->first();

            return view('stock/my_update', compact('stock'));
        }

        public function account_update(Request $request,$id)
        {
            // バリデーションルール
            $validated = $request->validate([
                'email' => 'required|email|max:255',
                'name' => 'nullable|string|max:255',
                'postal' => 'nullable|string|max:255',
                'address' => 'nullable|string|max:255',
                'tel' => 'nullable|string|max:15',
            ]);

            // ユーザー情報を更新
            $stock=Stock::where('id','=',$id)->first();
            $stock->update($validated);

            // 成功時のリダイレクト
            return redirect()->route('account', ['id' => $stock->id])->with('success', 'アカウント情報が更新されました。');        
        }

        public function apply($id)
        {
            // サブスクリプションページ表示
            $stock = Stock::findOrFail($id);

            return view('stock.apply', compact('stock'));
        }

        public function subscribe(Request $request, $id)
        {
            \Stripe\Stripe::setApiKey(config('services.stripe.secret'));  // APIキーを設定

            $stock = Stock::findOrFail($id);

            // Stripeトークンを受け取り、PaymentMethodを作成
            $paymentMethod = $request->payment_method;
            // 支払い方法を保存し、サブスクリプションを作成
            $stock->createOrGetStripeCustomer();
            $stock->updateDefaultPaymentMethod($paymentMethod);  // payment_method IDを指定
            // 支払い方法の情報を保存
            $stripePaymentMethod = \Stripe\PaymentMethod::retrieve($paymentMethod);

            $stock->pm_type = $stripePaymentMethod->card->brand;  // カードの種類（例：visa, mastercard）
            $stock->pm_last_four = $stripePaymentMethod->card->last4;  // カード番号の末尾4桁

            $stock->save();  // 更新を保存
            
            try {
                $subscription = \Stripe\Subscription::create([
                    'customer' => $stock->stripe_id,
                    'items' => [['price' => 'price_1QPzkJBPIZtafrxmwhVbTr1b']],
                ]);
        

            $stock->update([
                'paid' => 1
            ]);

            return redirect()->route('account', ['id' => $stock->id])->with('success', 'サブスクリプションが開始されました。');
            } catch (\Stripe\Exception\ApiErrorException $e) {
                return back()->withErrors(['error' => 'サブスクリプションの作成に失敗しました: ' . $e->getMessage()]);
            }
        }
          // 停止確認画面
        public function confirm_cancel($id)
        {
            $stock = Stock::findOrFail($id);
        
            // paid が 1 でなければエラーを返す
            if ($stock->paid !== 1) {
                return redirect()->route('account', ['id' => $stock->id])->with('error', 'アクティブなサブスクリプションが見つかりません。');
            }
        
            return view('stock.confirm_cancel', compact('stock'));
        }

        public function cancel($id)
        {
            // 指定された顧客を取得
            $stock = Stock::findOrFail($id);
    
            // Stripe API を初期化
            $stripe = new StripeClient(env('STRIPE_SECRET'));


            // 顧客IDを取得 (Stockテーブルに保存されていると仮定)
            $customerId = $stock->stripe_id;

            if (!$customerId) {
                return redirect()->route('account', ['id' => $stock->id])->with('error', 'Stripeの顧客IDが見つかりませんでした。');
            }
        
            try {
                // 顧客のサブスクリプション一覧を取得
                $subscriptions = $stripe->subscriptions->all([
                    'customer' => $customerId,
                    'status' => 'active',
                ]);
        
                // サブスクリプションが見つからない場合
                if (empty($subscriptions->data)) {
                    return redirect()->route('account', ['id' => $stock->id])->with('error', 'アクティブなサブスクリプションが見つかりませんでした。');
                }
        
                // 最初のサブスクリプションをキャンセル (複数の場合は要調整)
                $subscriptionId = $subscriptions->data[0]->id;
                $stripe->subscriptions->cancel($subscriptionId);
        
                // データベースの更新
                $stock->update(['paid' => 0]);
        
                return redirect()->route('account', ['id' => $stock->id])->with('success', 'サブスクリプションを停止しました。');
            } catch (\Exception $e) {
                return redirect()->route('account', ['id' => $stock->id])->with('error', 'サブスクリプションのキャンセルに失敗しました: ' . $e->getMessage());
            }
        }

                public function staff_edit($id)
        {
            $staff = Staff::findOrFail($id);
            return view('staff_edit', ['staff' => $staff]);
        }

        public function staff_update(Request $request, $id)
        {
            $staff = Staff::findOrFail($id);
            $staff->name = $request->input('name');
            $staff->save();

            return redirect()->route('staff_list', ['id' => $staff->name_id])
                            ->with('success', '従業員情報を更新しました');
        }

        public function destroy($id)
        {
            $staff = Staff::findOrFail($id);
            $nameId = $staff->name_id; // リダイレクト用
            $staff->delete();

            return redirect()->route('staff_list', ['id' => $nameId])
                            ->with('success', '従業員を削除しました');
        }
    }
