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
use Illuminate\Support\Facades\Validator;
use App\Rules\AllDistinct;




use Psy\Command\WhereamiCommand;

class ProductController extends Controller
{
    /**
     * 在庫一覧表示
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {

        $products = Product::orderBy('created_at', 'asc')->get();
        return view('products', [
            'products' => $products,
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
        $stock = Product::where('id', $product_id)
            ->value('stock');
        $order_line = Product::where('id', $product_id)
            ->value('order');
        $order_number = $order_line - $stock;



        $products = Product::where('id', $request->id)->get();
        //compact関数で複数の変数を渡す
        return view('order', compact('products', 'order_number'));
    }
    /**
     * 備品登録画面へ遷移
     *
     * @param Request $request
     * @return Response
     */
    public function create(Request $request)
    {

        return view('create_products');
    }

    /**
     * 備品登録
     *
     * @param Request $request
     * @return Response
     */
    public function update(Request $request)
    {

        $this->validate($request, [
            'product_name' => 'required|max:25|unique:products',
            'stock' => 'required|max:25',
            'order' => 'required|max:25',
        ]);

        $product = new Product;
        $product->id = 0;
        $product->product_name = $request->product_name;
        $product->stock = $request->stock;
        $product->order = $request->order;
        if($request->supplier_name==1){
            $product->supplier_name= 〇〇本舗;
        }
        else{
            $product->supplier_name= △△工業;
        }
        $product->save();

        return redirect('products');
    }
    /**
     * ordersテーブルへのデータ受け渡し、在庫数に反映
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
        $product=Product::where('product_name','=',$request->product_name)->value('supplier_name');
        //ordersテーブルへのデータ受け渡し
        $order = new Order;
        $order->product_id = $request->product_id;
        $order->product_name = $request->product_name;
        $order->new_order = $request->new_order;
        $order->staff = $request->staff;
        $order->supplier_name = $product;
        $order->save();
        /* dd($order); */

        // CSRFトークンを再生成して、二重送信対策
        $request->session()->regenerateToken(); // <- この一行を追加

        //在庫数に反映
        $data = Product::where('id', $request->product_id)
            ->value('stock');


        $renew = $data + $request->new_order;

        DB::table('products')
            ->where('id', $request->product_id)
            ->update([
                'stock' => $renew
            ]);

        $orders = Order::orderBy('created_at', 'asc')->get();
        return view('order_table', [
            'orders' => $orders,
        ]);
    }
    /**
     * 注文一覧表示
     *
     * @param Request $request
     * @return Response
     */
    public function order_table(Request $request)
    {
        $orders = Order::orderBy('created_at', 'asc')->get();
        return view('order_table', [
            'orders' => $orders,
        ]);
    }
    /**
     * 注文一表覧表示
     *
     * @param Request $request
     * @return Response
     */
    public function ship_table()
    {
        $ships = OrderForm::orderBy('created_at', 'asc')->get();
        return view('ship_table', [
            'ships' => $ships,
        ]);
    }




    /**
     *
     *メール作成フォームに遷移

     * @param Request $request
     * @return Response
     * */
    public function form(Request $request,$id)

    {
        //取引名が一致して、shipテーブルにある（注文する）が未送信のもの
        $ships=Ship::where('supplier_name','=',$id)->where('order_id','=',1)->get();

          //注文表一覧に登録
          $order_form= new OrderForm;
          $order_form->supplier_name=$id;
          $order_form->save();
          foreach($ships as $ship){
              $ship->update([
                  'form_id'=>$order_form->id
              ]);
              Order::where('product_name','=',$ship->product_name)
              ->delete();
          }
        $form_id=$ship->form_id;
            return view('form', [
                'ships'=>$ships,
                'id'=>$id,
                'form_id'=>$form_id,
    ]);
}
    /**
     *
     *選択したメール画面に遷移

     * @param Request $request
     * @return Response
     * */
    public function form_id(Request $request,$id)

    {
        //伝票番号が一致するものを取得
        $ships=Ship::where('form_id','=',$id)->get();
        $ship=Ship::where('form_id','=',$id)->first();
        $form_id=$ship->form_id;
        $supplier_name=OrderForm::where('id','='.$id)->value('supplier_name');
            return view('form_id', [
                'ships'=>$ships,
                'ship'=>$ship,
                'form_id'=>$form_id,
    ]);
}
    /**
     *
     *送信済みを選んだものをshipsテーブルに入力し、注文表からは削除。注文番号確認画面へ遷移

     * @param Request $request
     * @return Response
     * */
    public function ship(Request $request)

    {
        //管理者だったら
       /*  $user = Auth::user();
        if ($user->user_type === 2) { */

            //value1or2をOrderテーブルに入力
            $list = $request->order;

            foreach ($list as $value) {

                DB::table('orders')
                    ->where('product_id', $value['product_id'])
                    ->update([
                        'status' => $value['status']
                    ]);
            }
            // shipsテーブルへ送る注文を指定
            $datas = Order::where('status', '=', '1')
                ->get();
            //shipsテーブルへのデータ受け渡し
            foreach($datas as $data){
                $ship = new Ship;
                $ship->product_name = $data->product_name;
                $ship->new_order = $data->new_order;
                $ship->supplier_name = $data->supplier_name;
                $ship->staff = $data->staff;
                //新オーダー表
                $ship->order_id = 1;
                $ship->save();
            }
            foreach($datas as $data){
            //statusを1->2に変更
            $data->status = 2;
            }
            $ship=Ship::where('order_id','=',1)->first();

            $ships=Ship::where('order_id','=',1)->get();
            return view('ship', [
                'ships' => $ships,
            ]);
     /*    } else {
            return redirect()->route('/');
        } */
    }
   /**
     * 持ち出し申請画面へ遷移
     *
     * @param Request $request
     * @return Response
     */
    public function store(Request $request)
    {

        return view('out');
    }
    //持ち出し申請→outテーブルへの登録
    public function subtract(Request $request)
    {
        //productsテーブルに型番があるか確認
       /*  error_log("subtrac:productid " . $request->product_id . ", now startd."); */
        $product_record = Product::where('id', '=', $request->product_id)->first();

        if ( $product_record ) {
            /* error_log("subtrac:productid " . $request->product_id . " was exist."); */
            $this->validate($request, [
                'product_id' => 'required|max:25',
                'out_amount' => 'required|max:25',
                'staff' => 'required|max:25',
            ]);
           /*  error_log("subtrac:validation is okay."); */

             $stock=Product::where('id', '=', $request->product_id)->value('stock');

             if($stock>$request->out_amount){

                 $out = new Out;
                 $out->product_id = $request->product_id;
                 $out->out_amount = $request->out_amount;
                 $out->staff = $request->staff;
                 $out->save();
                 /* error_log("subtrac:Out table was updated."); */

                 //在庫表への反映→在庫表へ遷移
                 $data = Product::where('id', $request->product_id)
                     ->value('stock');

                 $subtract = $data - $request->out_amount;

                 DB::table('products')
                     ->where('id', $request->product_id)
                     ->update([
                         'stock' => $subtract
                     ]);

                 /* error_log("subtrac:products table was updated."); */

             return redirect('products');
             }
             else {
                 return trans('validation.numeric');

        }
    }
        else {

            return trans('validation.accepted');
        }
    }
       /**
     * QRコードによる持ち出し申請画面へ遷移
     *
     * @param Request $request
     * @return Response
     */
    public function qr_index(Request $request,$id)
    {

        $staff=$request->id;
        return view('qr', [
            'id' => $id,
        ]);
    }
    //QRによる持ち出し申請→outテーブルへの登録
    public function qr(Request $request,$id)
    {
        //productsテーブルに型番があるか確認
       /*  error_log("subtrac:productid " . $request->product_id . ", now startd."); */
        $product_record = Product::where('id', '=', $id)->first();

            $staff=$request->staff;
             $stock=Product::where('id', '=', $id)->value('stock');

             if($stock>$request->out_amount){

                $staff_name=Staff::where('id','=',$staff)->value('name');
                 $out = new Out;
                 $out->product_id = $id;
                 $out->out_amount =1;
                 $out->staff = $staff_name;
                 $out->save();
                 /* error_log("subtrac:Out table was updated."); */

                 //在庫表への反映→在庫表へ遷移
                 $data = Product::where('id', $id)
                     ->value('stock');

                 $subtract = $data - 1;

                 DB::table('products')
                     ->where('id', $id)
                     ->update([
                         'stock' => $subtract
                     ]);

                 /* error_log("subtrac:products table was updated."); */

             return redirect('products');
             }
             else {
                 return trans('validation.numeric');

        }
    }

}
