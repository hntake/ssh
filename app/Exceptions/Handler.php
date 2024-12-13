<?php

namespace App\Exceptions;

use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Illuminate\Session\TokenMismatchException;
use Illuminate\Auth\AuthenticationException;
use Throwable;

class Handler extends ExceptionHandler
{
    /**
     * Register the exception handling callbacks for the application.
     *
     * @return void
     */
    public function register()
    {
        $this->reportable(function (Throwable $e) {
            //
        });
    }

    /**
     * Handle unauthenticated users.
     */
    protected function unauthenticated($request, AuthenticationException $exception)
    {
        if ($request->expectsJson()) {
            return response()->json(['message' => $exception->getMessage()], 401);
        }

        // 現在使用中のガードに応じたリダイレクト先を設定
        $guard = $exception->guards()[0] ?? null;

        if ($guard === 'stock') {
            return redirect()->guest(route('stock.login'));
        }

        if ($guard === 'admin') {
            return redirect()->guest(route('admin.login'));
        }

        if ($guard === 'invoice') {
            return redirect()->guest(route('invoice.login'));
        }

        return redirect()->guest(route('login'));
    }

    /**
     * Handle TokenMismatchException.
     */
    public function render($request, Throwable $exception)
    {
        if ($exception instanceof TokenMismatchException) {
            // ガードを取得
            $guard = null;
            if ($request->route() && $request->route()->middleware()) {
                $middleware = $request->route()->middleware();
                if (in_array('auth:stock', $middleware)) {
                    $guard = 'stock';
                } elseif (in_array('auth:admin', $middleware)) {
                    $guard = 'admin';
                } elseif (in_array('auth:invoice', $middleware)) {
                    $guard = 'invoice';
                }
            }
    
            // ガードに応じたリダイレクト
            if ($guard === 'stock') {
                return redirect()->guest(route('stock.login'))->with('error', 'セッションが切れました。もう一度ログインしてください。');
            }
    
            if ($guard === 'admin') {
                return redirect()->guest(route('admin.login'))->with('error', 'セッションが切れました。もう一度ログインしてください。');
            }
    
            if ($guard === 'invoice') {
                return redirect()->guest(route('invoice.login'))->with('error', 'セッションが切れました。もう一度ログインしてください。');
            }
    
            // デフォルトのリダイレクト
            return redirect()->guest(route('login'))->with('error', 'セッションが切れました。もう一度ログインしてください。');
        }
    
        return parent::render($request, $exception);
    }
}