<?php

namespace App\Http\Middleware;

use Illuminate\Auth\Middleware\Authenticate as Middleware;

class Authenticate extends Middleware
{
    /**
     * Get the path the user should be redirected to when they are not authenticated.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return string|null
     */
    protected function redirectTo($request)
    {
        if (! $request->expectsJson()) {
            if ($request->is('stock') || $request->is('stock/*')) {
                return route('stock.login'); // stock のログインページ
            } elseif ($request->is('admin') || $request->is('admin/*')) {
                return route('admin.login'); // admin のログインページ
            }elseif ($request->is('invoice') || $request->is('invoice/*')) {
                return route('invoice.login'); // admin のログインページ
            }

            return route('login'); // デフォルトのログインページ
        }

        return null;
    }

    
}
