<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Store;
use App\Models\invoice;
use App\Models\Category;
use App\Models\Stock;
use App\Models\Product;
use App\Models\Supplier;



class LoginController extends Controller
{
                /**
     * 管理者アプリログイン表示
     *
    * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function showAdminLogin(Request $request)
    {
        return view('adminLogin');
    }
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
         * 請求書アプリログイン表示
         *
        * @param  \Illuminate\Http\Request  $request
        * @return \Illuminate\Http\Response
        */
        public function showInvoiceLogin(Request $request)
        {
            return view('invoice.login');
        }
    /**
     * 請求者会員ログイン用
     *
    * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function invoiceLogin(Request $request)
    {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        if (Auth::guard('invoice')->attempt($credentials)) {
            $request->session()->regenerate();

            $invoice = Invoice::where('email', Auth::guard('invoice')->user()->email)->first();

            if ($invoice->company_name == null) {
                return redirect()->route('invoice.company', ['invoice' => $invoice]);
            } else {
                return redirect()->route('invoice_user', [
                    'id' => $invoice->id,
                    'invoice' => $invoice,
                ]);
            }
        } else {
            return back()->withErrors(['login_error' => 'ログインに失敗しました']);
        }
    }

        public function invoice_logout(Request $request)
        {
            Auth::logout(); // ログアウト処理
            $request->session()->invalidate(); // セッションを無効化
            $request->session()->regenerateToken(); // セッションのトークンを再生成
    
            return redirect('invoice/login'); // カスタムリダイレクト先
        }
                /**
     * 在庫アプリログイン表示
     *
    * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function showStockLogin(Request $request)
    {
        return view('stock.login');
    }
            /**
     * 在庫アプリログイン用
     *
    * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function stockLogin(Request $request)
    {
        $credentials = $request->validate([ // 入力内容のチェック
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        if (Auth::guard('stock')->attempt($credentials)) { // ログイン試行
            $request->session()->regenerate(); // セッション更新
        
            $stock = Stock::where('email', $request->user('stock')?->email)->first();
        
            // ログイン条件をチェック
            $createdAt = $stock->created_at;
            $daysSinceCreated = now()->diffInDays($createdAt);
        
            if ($daysSinceCreated > 30 && $stock->paid != 1) {
                // 条件に合わない場合はログアウトしてエラーメッセージを返す
                Auth::guard('stock')->logout();
                return redirect()->route('stock.login')->withErrors(['error' => 'アカウントの有効期限が切れています。']);
            }
        
            $products = Product::where('name_id', '=', $stock->id)->orderBy('created_at', 'asc')->get();
            $suppliers=Supplier::where('stock_id','=',$stock->id)->get();
            
            if ($stock->name == null) {
                // 会社情報入力
                return redirect()->route('register_stock_create', ['id' => $stock->id]);
            // } elseif ($suppliers->isEmpty()) {
            //     // 取引業者情報入力
            //     return redirect()->route('supplier', ['id' => $stock->id]);
            } elseif ($products->isEmpty()) {
                // 備品情報入力
                session(['suppliers' => $suppliers]);
                return redirect()->route('create_product', ['id' => $stock->id]);
            } else {
                // products/{id} にリダイレクト
                return redirect()->route('products', ['id' => $stock->id]);
            }
        } else {
            // ログイン失敗時のデバッグ
            \Log::error('Login attempt failed', [
                'email' => $request->input('email'),
                'timestamp' => now(),
            ]);
            return redirect()->route('stock.login')->withErrors(['error' => 'ログインに失敗しました。']);
        }
    }

    public function stock_logout(Request $request)
    {
        Auth::logout(); // ログアウト処理
        $request->session()->invalidate(); // セッションを無効化
        $request->session()->regenerateToken(); // セッションのトークンを再生成

        return redirect('stock/login'); // カスタムリダイレクト先
    }
}