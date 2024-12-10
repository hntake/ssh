<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Mail\TestMail;      //Mailableクラス
use App\Mail\TestMail2;      //Mailableクラス
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;
use App\Models\Ship;
use App\Models\Order;
use App\Models\OrderForm;
use App\Models\Product;
use App\Models\Stock;
use Illuminate\Support\Facades\DB; // DB ファサードを use する






class MailController extends Controller
{
    //複数もしくは単数を選択してメール送信する場合
    public function send(Request $request,$form_id)
    {
        $rules = [
            'due_date' => 'required|date',
            'staff' => 'required|',
        ];

        $validator = Validator::make($request->all(), $rules);

        if($validator->fails()) {
            return redirect('/form')
            ->withErrors($validator)
            ->withInput();
        }

        $data = $validator->validate();

        $orderForm=OrderForm::where('id','=',$form_id)->first();
        $ships=Ship::where('form_id','=',$form_id)->get();
        $product=Product::where('supplier_name','=',$orderForm->supplier_name)->first();
        $stock=Stock::where('id','=',$orderForm->name_id)->first();
        if ($request->has('send')) {
            $orderForm
            ->update([
                'status'=>1
            ]);
            Mail::to($product->email)->send(new TestMail($data,$ships,$stock));
            session()->flash('success', '送信しました！');
            $orders = Order::orderBy('created_at', 'asc')->get();
            foreach($orders as $order){
                $order->update([
                    'status' => 2
                ]);
            }
            foreach($ships as $ship){
            // Shipモデルを更新
            $ship->update([
                'status' => 1
            ]);
            }
            return view('stock/mail_box', [
                'orderForms' => $orderForm,
                'stock' => $stock,
            ]);   
            }
        else{
            session()->flash('success', '保存しました！');
            $orders = Order::orderBy('created_at', 'asc')->get();
            return view('stock/mail_box', [
                'orderForms' => $orderForm,
                'stock' => $stock,
            ]);  
        }
    }
    public function store(Request $request,$id)
    {
        session()->flash('success', '保存しました！');
        //OrderFormのstatusを保存に変更＆納期を保存
        $orderForm=OrderForm::where('id','=',$form_id)->first();
        $orderForm->update([
            'status' => 2,
            'due_date'=>$request->due_date,
            'staff'=>$request->staff,
        ]);
        $stock=Stock::where('id','=',$orderForm->name_id)->first();
        $orders = Order::where('name_id','=',$orderForm->name_id)->orderBy('created_at', 'asc')->get();
        $orderForms=OrderForm::where('name_id','=',$orderForm->name_id)->orderBy('created_at', 'desc')->get();
        return view('stock/mail_box', [
            'orderForms' => $orderForms,
            'stock' => $stock,
        ]);  
    }
    //注文番号からメール作成してからのメール送信
    public function send2(Request $request,$id)
    {
        $rules = [
            'due_date' => 'required|date',
            'staff' => 'required|',
        ];

        $validator = Validator::make($request->all(), $rules);

        if($validator->fails()) {
            return redirect('/form')
            ->withErrors($validator)
            ->withInput();
        }

        $data = $validator->validate();
        $orderForm=OrderForm::where('id','=',$id)->first();

        $product=Product::where('supplier_name','=',$orderForm->supplier_name)->first();
        $stock=Stock::where('id','=',$orderForm->name_id)->first();
        $ship=Ship::where('form_id','=',$id)->first();
            $ship
            ->update([
                'order_id'=>1
            ]);
        if ($request->input('send')) {
                $orderForm
            ->update([
                'status'=>1
            ]);
            Mail::to($product->email)->send(new TestMail2($data,$ship,$stock));
            session()->flash('success', '送信しました！');
            $orderForms = OrderForm::where('name_id','=',$orderForm->name_id)->orderBy('created_at', 'desc')->get();
            return view('stock/mail_box', [
                'orderForms' => $orderForms,
                'stock' => $stock,
            ]);         
        } elseif ($request->input('store')) {
        // データベースに保存する処理を追加
            $orderForm->update([
                'due_date' => $data['due_date'],
                'staff' => $data['staff'],
                'status' => 2, // 送信ではなく保存状態を示す
            ]);
        
            session()->flash('success', '保存しました！');
            $orderForms = OrderForm::where('name_id','=',$orderForm->name_id)->orderBy('created_at', 'desc')->get();
            return view('stock/mail_box', [
                'orderForms' => $orderForms,
                'stock' => $stock,
            ]);         
        }
    }
}
