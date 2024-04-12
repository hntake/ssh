<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Auth\Events\Registered;
use App\Jobs\SendVerification;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Password;
use App\Models\Invoice; // Invoiceモデルを追加
use Illuminate\Support\Facades\Mail;
use App\Mail\VerifyEmail;
use Illuminate\Support\Str;


class InvoiceRegisterController extends Controller
{
    public function invoiceRegisterForm(Request $request)
    {
        return view('invoice/register');
    }

    protected function invoiceValidator(array $data)
    {
        return Validator::make($data, [
            'email' => ['required', 'string', 'email', 'max:255', 'unique:App\Models\Invoice'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
    }

    protected function invoiceRegisterDatabase(array $data)
    {
        $email_verify_token =Str::random(40);
        $user = Invoice::create([
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            'email_verify_token' => $email_verify_token, // 40文字のランダムな文字列を生成
        ]);
        return $user;
    }

    public function pre_check(Request $request)
    {
        // バリデーションを実行
        $validator = $this->invoiceValidator($request->all());
        $validator->validate();
    
            $request->flashOnly( 'email');
            $bridge_request = $request->all();
            $bridge_request['password_mask'] = '******';

            return view('invoice.confirm')->with($bridge_request);
    }

      //仮登録完了画面表示
    public function register(Request $request)
    {
        // event(new Registered($user = $this->create( $request->all() )));
        $user = $this->invoiceRegisterDatabase($request->all());

        //認証メールを送信
        $this->sendVerificationEmail($user);

        return view('invoice.registered');
    }
    
    private function sendVerificationEmail($user)
    {
        $email_verify_token=$user->email_verify_token;
        $id=$user->id;

        // メールを送信
        Mail::to($user->email)->send(new VerifyEmail($user,$email_verify_token,$id));
    }
    //メール認証
    public function verify($email_verify_token)
    {
    // 指定されたトークンに対応するユーザーを取得
    $user = Invoice::where('email_verify_token', $email_verify_token)->first();

    // ユーザーが存在するかどうかを確認し、メールアドレスを検証
    if ($user) {
        // メールアドレスを検証済みに更新するなどの処理を行う
        $user->email_verified_at = now();
        $user->save();

        // 検証が成功した場合のリダイレクト先などを返す
        return redirect('invoice/login');
    } else {
        // ユーザーが存在しない場合はエラーメッセージを表示するなどの処理を行う
        return redirect('/invalid-token')->with('error', '無効なトークンです');
    }
    }
    //会社情報登録ポスト
    public function company(Request $request,$id){

         // バリデーションルールを定義
    $rules = [
        'company_name' => 'required',
        'tax1' => 'required_if:type1', 
        'tax2' => 'required_if:type2', 
        'tax3' => 'required_if:type3', 
        'tax4' => 'required_if:type4', 
        'tax5' => 'required_if:type5', 
        'tax6' => 'required_if:type6', 
        'tax7' => 'required_if:type7', 
        'tax8' => 'required_if:type8', 
        'tax9' => 'required_if:type9', 
        'tax10' => 'required_if:type10', 
    ];

        // バリデーションを実行
        $validator = Validator::make($request->all(), $rules);

        $company_name=$request->company_name;
        if(isset($request->postal_number)){
            $postal_number = $request->postal_number;
        }
        if(isset($request->address)){
        $address = $request->address ;
        }
        if(isset($request->phone_number)){
        $phone_number = $request->phone_number;
        }
        if(isset($request->company_number)){
        $company_number = $request->company_number;
        }
        if(isset($request->type1)){
        $type1 = $request->type1;
        }
        if(isset($request->type2)){
        $type2 = $request->type2;
        }
        if(isset($request->type3)){
        $type3 = $request->type3;
        }
        if(isset($request->type4)){
        $type4 = $request->type4;
        }
        if(isset($request->type5)){
        $type5 = $request->type5;
        }
        if(isset($request->type6)){
        $type6 = $request->type6;
        }
        if(isset($request->type7)){
        $type7 = $request->type7;
        }
        if(isset($request->type8)){
        $type8 = $request->type8;
        }
        if(isset($request->type9)){
        $type9 = $request->type9;
        }
        if(isset($request->type10)){
        $type10 = $request->type10;
        }
        if(isset($request->tax1)){
        $tax1 = $request->tax1;
        }
        if(isset($request->tax2)){
        $tax2 = $request->tax2;
        }
        if(isset($request->tax3)){
        $tax3 = $request->tax3;
        }
        if(isset($request->tax4)){
        $tax4 = $request->tax4;
        }
        if(isset($request->tax5)){
        $tax5 = $request->tax5;
        }
        if(isset($request->tax6)){
        $tax6 = $request->tax6;
        }
        if(isset($request->tax7)){
        $tax7 = $request->tax7;
        }
        if(isset($request->tax8)){
        $tax8 = $request->tax8;
        }
        if(isset($request->tax9)){
        $tax9 = $request->tax9;
        }
        if(isset($request->tax10)){
        $tax10 = $request->tax10;
        }
        return view('invoice/company_confirm', [
            'data' => $request->all(),
            'id'=>$id,
        ]);     
    }

    //会社情報登録登録
    public function company_post(Request $request,$id){

    
    //invoicesテーブルへの受け渡し
    $invoice=Invoice::find($id);
    $company_name = $request->company_name;
    $invoice->company_name=$company_name;
    if(isset($request->postal_number)){
        $invoice->postal_number = $request->postal_number;
    }
    if(isset($request->address)){
    $invoice->address = $request->address ;
    }
    if(isset($request->phone_number)){
    $invoice->phone_number = $request->phone_number;
    }
    if(isset($request->company_number)){
    $invoice->company_number = $request->company_number;
    }
    if(isset($request->type1)){
    $invoice->type1 = $request->type1;
    }
    if(isset($request->type2)){
    $invoice->type2 = $request->type2;
    }
    if(isset($request->type3)){
    $invoice->type3 = $request->type3;
    }
    if(isset($request->type4)){
    $invoice->type4 = $request->type4;
    }
    if(isset($request->type5)){
    $invoice->type5 = $request->type5;
    }
    if(isset($request->type6)){
    $invoice->type6 = $request->type6;
    }
    if(isset($request->type7)){
    $invoice->type7 = $request->type7;
    }
    if(isset($request->type8)){
    $invoice->type8 = $request->type8;
    }
    if(isset($request->type9)){
    $invoice->type9 = $request->type9;
    }
    if(isset($request->type10)){
    $invoice->type10 = $request->type10;
    }
    if(isset($request->tax1)){
    $invoice->tax1 = $request->tax1;
    }
    if(isset($request->tax2)){
    $invoice->tax2 = $request->tax2;
    }
    if(isset($request->tax3)){
    $invoice->tax3 = $request->tax3;
    }
    if(isset($request->tax4)){
    $invoice->tax4 = $request->tax4;
    }
    if(isset($request->tax5)){
    $invoice->tax5 = $request->tax5;
    }
    if(isset($request->tax6)){
    $invoice->tax6 = $request->tax6;
    }
    if(isset($request->tax7)){
    $invoice->tax7 = $request->tax7;
    }
    if(isset($request->tax8)){
    $invoice->tax8 = $request->tax8;
    }
    if(isset($request->tax9)){
    $invoice->tax9 = $request->tax9;
    }
    if(isset($request->tax10)){
    $invoice->tax10 = $request->tax10;
    }
    $invoice->save();
    
    return view('invoice/user', [
        'id' => $id,
        'invoice' => $invoice,
    ]);
    }
    //登録ユーザーPDF作成ページ表示
    public function create($id){
    $invoice = Invoice::find($id);
    return view('invoice/user', [
        'id' => $id,
        'invoice' => $invoice,
    ]);
    }
    //PDF出力
    public function user_pdf($email_verify_token){


    
}

}
