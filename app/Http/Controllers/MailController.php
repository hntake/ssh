<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Mail\TestMail;      //Mailableクラス
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;
use App\Models\Ship;
use App\Models\Order;
use App\Models\OrderForm;





class MailController extends Controller
{
   /*  public function form(Request $request,$id)

    {
        $ships=Ship::where('id','=',$id)->get();
    return view('form', [
        'ships'=>$ships,
    ]);
} */
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

        $ships=Ship::where('form_id','=',$form_id)->where('order_id','=',1)->get();
        foreach($ships as $ship){
            $ship
            ->update([
                'order_id'=>2
            ]);
        }
        $ship=Ship::where('form_id','=',$form_id)->first();
        if ($request->has('send')) {
            $order_form=OrderForm::where('id','=',$form_id)->first();
            $order_form->status = 1;
            $order_form->staff = $request->atend;
            $order_form->save();
            Mail::to('hntake@me.com')->send(new TestMail($data,$ship));
            session()->flash('success', '送信しました！');
            return back();
        }
        else{
            session()->flash('success', '保存しました！');
            $orders = Order::orderBy('created_at', 'asc')->get();
            return view('order_table', [
                'orders' => $orders,
            ]);
        }
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

        $ships=Ship::where('form_id','=',$form_id)->where('order_id','=',1)->get();
        foreach($ships as $ship){
            $ship
            ->update([
                'order_id'=>0
            ]);
        }
        $ship=Ship::where('form_id','=',$form_id)->first();
        if ($request->has('send')) {
            $order_form=OrderForm::where('id','=',$form_id)->first();
            $order_form->status = 1;
            $order_form->save();
            Mail::to('hntake@me.com')->send(new TestMail($data,$ship));
            session()->flash('success', '送信しました！');
            return back();
        }
        else{
            session()->flash('success', '保存しました！');
            return back();
        }
    }
}
