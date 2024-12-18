<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class PasscodeMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
    // セッションに認証状態があるか確認
    if (!$request->session()->has('passcode_verified') || !$request->session()->get('passcode_verified')) {
        return redirect()->route('passcode.form'); // パスコード入力画面へリダイレクト
    }

    return $next($request);
    }
}
