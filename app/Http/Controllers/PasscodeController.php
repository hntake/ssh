<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Stock;


class PasscodeController extends Controller
{
    // パスコード入力フォームを表示
    public function showPasscodeForm($id)
    {
        return view('passcode.form',[
            'id'=> $id,
        ]);
    
    }

    // パスコードの検証
    public function verifyPasscode(Request $request,$id)
    {
        $request->validate([
            'passcode' => 'required|digits:4',
        ]);

        $stock = Stock::findOrFail($id); // 存在しないIDは404エラーを返す
        // ここでパスコードを確認 (例: 1234)
        if ($request->passcode == $stock->passcode) {
            $request->session()->put('passcode_verified', true);
            return redirect()->route('staff', ['id' => $id]);
        }

        return back()->withErrors(['passcode' => 'パスコードが正しくありません。']);
    }
}
