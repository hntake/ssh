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
            return redirect()->guest(route('login'))->with('error', 'セッションが切れました。もう一度ログインしてください。');
        }

        return parent::render($request, $exception);
    }
}