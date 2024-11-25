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
use App\Models\Stock; // 
use App\Models\Product; // 
use Illuminate\Support\Facades\Mail;
use App\Mail\StockVerifyEmail;
use App\Mail\StockRegister;
use Illuminate\Support\Str;
class StockRegisterController extends Controller
{
    public function stockRegisterForm(Request $request)
    {
        return view('stock/register');
    }

    protected function stockValidator(array $data)
    {
        return Validator::make($data, [
            'email' => ['required', 'string', 'email', 'max:255', 'unique:App\Models\Stock'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
    }

    protected function stockRegisterDatabase(array $data)
    {
        $email_verify_token =Str::random(40);
        $user = Stock::create([
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            'email_verify_token' => $email_verify_token, // 40文字のランダムな文字列を生成
            'reminder_email_date' => now()->addDays(23),
        ]);
        \Log::info("Generated token: {$email_verify_token}");

        return $user;
    }

    public function pre_check(Request $request)
    {
        // バリデーションを実行
        $validator = $this->stockValidator($request->all());
        $validator->validate();
    
            $request->flashOnly( 'email');
            $bridge_request = $request->all();
            $bridge_request['password_mask'] = '******';

            return view('stock.confirm')->with($bridge_request);
    }

      //仮登録完了画面表示
    public function register(Request $request)
    {
        // event(new Registered($user = $this->create( $request->all() )));
        $user = $this->stockRegisterDatabase($request->all());

        //認証メールを送信
        $this->sendVerificationEmail($user);

        return view('stock.registered');
    }
    
    private function sendVerificationEmail($user)
    {
        $email_verify_token=$user->email_verify_token;
        $id=$user->id;

        // メールを送信
        Mail::to($user->email)->send(new StockVerifyEmail($user,$email_verify_token,$id));
    }
    //メール認証
    public function verify($email_verify_token)
    {
    // 指定されたトークンに対応するユーザーを取得
    $user = Stock::where('email_verify_token', $email_verify_token)->first();

    // ユーザーが存在するかどうかを確認し、メールアドレスを検証
    if ($user) {
        // メールアドレスを検証済みに更新するなどの処理を行う
        $user->email_verified_at = now();
        $user->save();

        // 検証が成功した場合のリダイレクト先などを返す
        return redirect('stock/login');
    } else {
        // ユーザーが存在しない場合はエラーメッセージを表示するなどの処理を行う
        return redirect('/invalid-token')->with('error', '無効なトークンです');
    }
}
    //会社情報登録画面
    public function create(Request $request,$id){
        $stock=Stock::find($id);

        return view('stock/create',[
            'id'=> $id,
        ]);

    }
  //会社情報登録ポスト
    public function company(Request $request,$id){

            // バリデーションルールを定義
        $rules = [
        'company_name' => 'required',
        ];

        // バリデーションを実行
        $validator = Validator::make($request->all(), $rules);

        return view('stock/company_confirm', [
            'data' => $request->all(),
            'id'=>$id,
        ]);     
    }
    //会社情報登録
    public function company_post(Request $request,$id){
        //stocksテーブルへの受け渡し
        $stock=Stock::find($id);
        $company_name = $request->company_name;
        $stock->name=$company_name;
        $stock->tel=$request->phone_number;
        $stock->postal=$request->postal;
        $stock->address=$request->address;
        $stock->save();
        $products=Product::where('name_id','=',$stock->id)->get();
          //投稿されたらメール送信
        $data = ['新規登録会社ID' => $stock->id];
        \Mail::to('info@itcha50.com')->send(new StockRegister($data));
        
        return view('products', [
            'id' => $id,
            'stock' => $stock,
            'products' => $products ?: collect(), // null の場合は空のコレクション
        ]);
    }
}