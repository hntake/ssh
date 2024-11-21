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





class MailController extends Controller
{
    public function send(Request $request,$form_id)
    {
        $rules = [
            'due_date' => 'required|date',
            'attend' => 'required|',
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
            return view('order_table', [
                'orders' => $orders,
                'stock' => $stock,
            ]);  
            }
        else{
            session()->flash('success', '保存しました！');
            $orders = Order::orderBy('created_at', 'asc')->get();
            return view('order_table', [
                'orders' => $orders,
            ]);
        }
    }
    public function store(Request $request,$form_id)
    {
        session()->flash('success', '保存しました！');
        $orderForm=OrderForm::where('id','=',$form_id)->first();
        $stock=Stock::where('id','=',$orderForm->name_id)->first();
        $orders = Order::where('name_id','=',$orderForm->name_id)->orderBy('created_at', 'asc')->get();
        return view('order_table', [
            'orders' => $orders,
            'stock' => $stock,
        ]);
    }
    public function send2(Request $request,$form_id)
    {
        $rules = [
            'due_date' => 'required|date',
            'attend' => 'required|',
        ];




        $validator = Validator::make($request->all(), $rules);

        if($validator->fails()) {
            return redirect('/form')
            ->withErrors($validator)
            ->withInput();
        }

        $data = $validator->validate();
        $orderForm=OrderForm::where('id','=',$form_id)->first();

        $product=Product::where('supplier_name','=',$orderForm->supplier_name)->first();
        $stock=Stock::where('id','=',$orderForm->name_id)->first();
        $ship=Ship::where('form_id','=',$form_id)->first();
            $ship
            ->update([
                'order_id'=>1
            ]);
        if ($request->has('send')) {
            $orderForm
            ->update([
                'status'=>1
            ]);
            Mail::to($product->email)->send(new TestMail2($data,$ship,$stock));
            session()->flash('success', '送信しました！');
            return back();
        }
        else{
            session()->flash('success', '保存しました！');
            return back();
        }
    }
}
