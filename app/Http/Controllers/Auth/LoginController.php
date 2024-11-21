<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected function redirectTo($request)
    {
        if (! $request->expectsJson()) {
            if ($request->is('stock') || $request->is('stock/*')) {
                return route('stock.login'); // 必ず stock ログイン用のルート名に変更
            } elseif ($request->is('admin') || $request->is('admin/*')) {
                return route('admin.login'); // 必ず admin ログイン用のルート名に変更
            }elseif ($request->is('invoice') || $request->is('invoice/*')) {
                return route('invoice.login'); // 必ず admin ログイン用のルート名に変更
            }
            return route('login'); // 通常ログイン
        }

        return null; // JSONリクエストの場合はnullを返す
    }
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }
}
