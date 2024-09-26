<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Store;
use App\Models\invoice;
use App\Models\Category;



class LoginController extends Controller
{
    /**
     * 管理者ログイン用
     *
    * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function adminLogin(Request $request)
    {
        $credentials = $request->validate([ // 入力内容のチェック
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        if (Auth::guard('admin')->attempt($credentials)) { // ログイン試行
            if ($request->user('admin')?->admin_level ==10) { // 私だけ触れる
                $request->session()->regenerate(); // セッション更新

                return redirect()->intended('admin'); // ダッシュボードへ
            }
            elseif ($request->user('admin')?->admin_level == 20) { // ブログ利用オーナー
                $request->session()->regenerate(); // セッション更新
                
                $id=Category::where('email',$request->user('admin')?->email)->value('id');
                return view ('/blog/blog',[
                    'id'=>$id,
                ]);  
            }
            elseif ($request->user('admin')?->admin_level == 5) { // アンケート利用オーナー
                $request->session()->regenerate(); // セッション更新
                
                $store=Store::where('email',$request->user('admin')?->email)->value('name');
                return view('/customer/create', [
                    'store' => $store,
                    ]);
            }
             elseif ($request->user('admin')?->admin_level== 2) { // 塾オーナー
                $request->session()->regenerate(); // セッション更新

                return redirect()->intended('admin'); // ダッシュボードへ
             }elseif ($request->user('admin')?->admin_level== 1) { // 講師
                $request->session()->regenerate(); // セッション更新

                return redirect()->intended('admin'); // ダッシュボードへ
            } else {
                Auth::guard('admin')->logout(); // if文でログインしてしまっているので、ログアウトさせる

                $request->session()->regenerate(); // セッション更新

                return back()->withErrors([ // 権限レベルが0の場合
                    'error' => 'You do not have permission to log in.',
                ]);
            }
        }

        return back()->withErrors([ // ログインに失敗した場合
            'error' => 'The provided credentials do not match our records.',
        ]);
    }
    public function __construct()
    {
        $this->middleware('guest:admin')->except('adminLogout');
    }
/*ログアウト処理*/
    public function adminLogout(Request $request)
    {
        Auth::guard('admin')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/admin/login');
    }

    /**
     * 請求者会員ログイン用
     *
    * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function invoiceLogin(Request $request)
    {
        $credentials = $request->validate([ // 入力内容のチェック
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        if (Auth::guard('invoice')->attempt($credentials)) { // ログイン試行
                $request->session()->regenerate(); // セッション更新


                $invoice=Invoice::where('email',$request->user('invoice')?->email)->first();
                if($invoice->company_name == null){
                    return view('invoice/create', [
                        'invoice' => $invoice,
                        ]);
                }else{
                    $id=$invoice->id;
                    return view('invoice/user', [
                        'id' => $id,
                        'invoice' => $invoice,

                        ]);}
                }
            }
        }