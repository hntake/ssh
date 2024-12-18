<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use App\Models\Stock; // Stockモデルを使用
use App\Models\PasscodeReset; // トークン用モデル（後述）
use Illuminate\Support\Facades\Mail;

class PasscodeResetController extends Controller
{
// 忘れた場合のフォームを表示
public function showForgotForm()
{
    return view('passcode.forgot');
}

// リセットリンクを送信
public function sendResetLink(Request $request)
{
    $request->validate([
        'email' => 'required|email|exists:stocks,email',
    ]);

    $user = Stock::where('email', $request->email)->first();

    // リセットトークンを作成
    $token = Str::random(64);
    PasscodeReset::create([
        'email' => $user->email,
        'token' => $token,
    ]);

    // メール送信
    Mail::send('emails.passcode_reset', ['token' => $token], function ($message) use ($user) {
        $message->to($user->email);
        $message->subject('パスコードリセット');
    });

    return back()->with('message', 'リセットリンクを送信しました。');
}

// パスコードリセットフォームを表示
public function showResetForm($token)
{
    return view('passcode.reset', ['token' => $token]);
}

// パスコードをリセット
public function resetPasscode(Request $request)
{
    $request->validate([
        'token' => 'required',
        'passcode' => 'required|digits:4',
    ]);

    $resetRequest = PasscodeReset::where('token', $request->token)->first();

    if (!$resetRequest) {
        return back()->withErrors(['token' => '無効なトークンです。']);
    }

    $user = Stock::where('email', $resetRequest->email)->first();
    $user->passcode = $request->passcode;
    $user->save();
    $id = $user->id;
    $resetRequest->delete(); // トークンを削除

    return redirect()->route('passcode.form', ['id' => $id])->with('message', 'パスコードがリセットされました。');
}}
