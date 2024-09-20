<?php

namespace App\Http\Controllers;

use App\Models\Gift;
use App\Models\Store;
use App\Mail\GiftMail;
use App\Models\Purchase;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;
use SimpleSoftwareIO\QrCode\Facades\QrCode;
use Barryvdh\DomPDF\Facade\Pdf;



class GiftCardController extends Controller
{

    public function index($uuid)
    {
        $store=Store::where('uuid','=',$uuid)->first();  // 店舗情報取得
        return view('gift.index',[
            'store'=>$store,
        ]);
    }
//ギフトカード購入店側の対応($uuid=お店のuuid)
    public function purchase(Request $request,$uuid)
    {
        // バリデーション
        $validatedData = $request->validate([
            'price' => 'required|integer|min:1',
        ]);
       // UUIDの生成
        $card_uuid = Str::uuid();
        // データの処理（例：メール送信やデータベース保存）
        $gift = new Gift;
        $gift->price =$request->price;
        $gift->uuid =$card_uuid;
        $gift->store_uuid =$uuid;
        $gift->balance =$request->price;
        $gift->save();
        return view('gift/complete',[
            'gift'=>$gift,
        ]);
    }

//ギフトカード購入後客に渡す($uuid=お店のuuid)
public function share($uuid)
{
    // ギフトカードの情報を取得
    $gift = Gift::where('uuid', $uuid)->firstOrFail();
        
    return view('gift.share', compact('gift'));
}
    public function mail(Request $request,$id)
    {
        // バリデーション
        $request->validate([
            'email' => 'required|email',
        ]);

        // メール送信処理（例: QRコードを含めたギフトカードのメール）
        $email = $request->input('email');
        $gift = Gift::findOrFail($id); // ギフトカードの情報を取得
        
        Mail::to($email)->send(new GiftMail($gift)); 


        return view('gift/thanks',[
            'gift'=>$gift,
        ]);
    }
    // PDF領収書生成処理
    public function downloadReceipt($id)
    {
        $gift = Gift::findOrFail($id); // ギフトカード情報を取得

        // PDFを生成
        $pdf = Pdf::loadView('gift.receipt', compact('gift'));

        // PDFをダウンロードさせる
        return $pdf->download('receipt.pdf');
    }


    // ギフトカードを表示する($uuid=カードのuuid)
    public function show($uuid)
    {
        // ギフトカードの情報を取得
        $gift = Gift::where('uuid', $uuid)->firstOrFail();
        
        return view('gift.use', compact('gift'));
    }

    // ギフトカードの残高から支払う処理
    public function pay(Request $request, $uuid)
    {
        // 入力された金額のバリデーション
        $request->validate([
            'amount' => 'required|numeric|min:1',
        ]);

        // ギフトカードを取得
        $gift = Gift::where('uuid', $uuid)->firstOrFail();

        // 使用する金額
        $amount = $request->input('amount');

        // 残高チェック
        if ($gift->balance < $amount) {
            return back()->withErrors(['amount' => '残高が不足しています。']);
        }

        // 残高を減らす
        $gift->balance -= $amount;
        $gift->save();

        $purchase = new Purchase;
        $purchase->amount = $amount;
        $purchase->store = $gift->store_uuid;
        $purchase->uuid = $gift->uuid;
        $purchase->save();

        return redirect()->back()->with('success', '支払いが成功しました。残高: ¥' . number_format($gift->balance));
    }

     // 店舗コード入力フォームを表示(店側対応1)
    public function showStoreForm($uuid)
    {
        // 顧客のギフトカードの情報を取得
        $gift = Gift::where('uuid', $uuid)->firstOrFail();
        
        return view('gift.verify', compact('gift'));
    }

    // 店舗コードの確認処理
    public function verifyStoreCode(Request $request, $uuid)
    {
        // バリデーション: 店舗コードが必須
        $request->validate([
            'store_code' => 'required|string',
        ]);
        // ギフトカードを取得
        $gift = Gift::where('uuid', $uuid)->firstOrFail();
        // 店舗コードのチェック（例としてハードコーディングしていますが、データベースで管理するのが理想）
        $validStoreCode = Store::where('uuid','=',$gift->store_uuid)->value('code');  // 店舗コード取得
        $storeCode = $request->input('store_code');

        if ($storeCode !== $validStoreCode) {
            return back()->withErrors(['store_code' => '店舗コードとギフトカードがマッチしません。']);
        }

        // 店舗コードが正しい場合、ギフトカードを使用した処理などを行う（必要に応じてロジック追加）
        return redirect()->route('store_success', ['uuid' => $gift->uuid])->with('success', '店舗コードが確認されました。');
    }

    // 店舗コード確認成功後のページ
    public function success($uuid)
    {
        $gift = Gift::where('uuid', $uuid)->firstOrFail();

        return view('gift.success', compact('gift'));
    }

        public function updateBalance(Request $request, $uuid)
    {

        $purchase=Purchase::where('uuid','=',$uuid)->first();
        // 前のページにリダイレクト
        return redirect()->back()->with('purchase', $purchase);
    }

    //店舗カードリスト
    public function card_list(Request $request, $uuid)
    {
        $gifts=Gift::where('store_uuid','=',$uuid)->orderBy('created_at', 'desc')->paginate(20);
        $store=Store::where('uuid','=',$uuid)->value('name');

        return view('gift/card_list',[
            'gifts'=>$gifts,
            'store'=>$store,
        ]);
    }

    //店舗カード利用履歴
    public function purchase_list(Request $request, $uuid)
    {
        $purchases=Purchase::where('store','=',$uuid)->orderBy('created_at', 'desc')->paginate(20);
        $gifts=Gift::where('store_uuid','=',$uuid)->orderBy('created_at', 'desc')->paginate(20);
        $store=Store::where('uuid','=',$uuid)->value('name');

        return view('gift/purchase_list',[
            'purchases'=>$purchases,
            'store'=>$store,
        ]);
    }
}
