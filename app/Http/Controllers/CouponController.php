<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Word;
use App\Models\Store;
use App\Models\User;
use App\Models\Coupon;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use App\Mail\CouponMail;
use Carbon\Carbon;
use PHPUnit\Framework\Constraint\Count;

class CouponController extends Controller
{
      /**コード入力画面（QRコードで入る）
* The attributes that are mass assignable.
*
* @var array
*/
public function code_form(Request $request,$id)
{
    $store = Store::where('uuid','=',$request->id)->first();

        return view('coupon/code',[
            'id'=>$id,
            'store'=>$store
        ]);
    }


      /**コード入力による新クーポン生成
* The attributes that are mass assignable.
*
* @var array
*/
public function code(Request $request,$id)
{
    $store = Store::where('uuid','=',$id)->first();
    $code = $request->code;
    if ($store->code == $code){

        /*クーポンID生成*/
        $store = Store::where('uuid','=',$id)->first();
        $coupon = new Coupon();
        $coupon->store_name = $store->name;
        $coupon->uuid = $id;
        $coupon->save();

        $coupon_id = $coupon->id;
        $sent = Coupon::where('id','=',$coupon_id)->value('sent');
        if($sent==0){
        $word = Word::inRandomOrder()
                    ->limit(1)
                    ->first();
        $test_id = $word->id;

        return view('coupon/test',[
            'id'=>$id,
            'store'=>$store,
            'coupon_id'=>$coupon_id,
            'test_id' =>$test_id,
            'word' =>$word,

        ]);
    }
    /*既に生成済み*/
        else{
            return view('coupon/clear');
        }
    }
    /*コード番号が異なる*/
    else{
        return view('coupon/code',[
            'id'=>$id,
            'store'=>$store,
        ]);
    }

}
      /**
* The attributes that are mass assignable.削除していい？
*
* @var array
*/
public function test(Request $request,$coupon_id)
{
/**メールが登録されてなければ*/
    if($coupon_id->email==null){
        $sent = Coupon::where('id','=',$coupon_id)->value('sent');
        if($sent==0){
        $word = Word::inRandomOrder()
                    ->limit(1)
                    ->first();
        $test_id = $word->id;


        $coupon_uuid= Coupon::where('id','=',$coupon_id)->value('uuid');
        $store = Store::where('uuid','=',$coupon_uuid)->first();
        return view('coupon/test',[
            'word' =>$word,
            'store'=>$store,
            'test_id' =>$test_id,
            'coupon_id'=>$coupon_id,
        ]);
        }
        else{
            return view('coupon/clear');
        }
    }
        else{
            return view('coupon/thanks');
        }
    }

/**再テスト */
    /**
* The attributes that are mass assignable.
*
* @var array
*/
public function retest($coupon_id,$test_id)
{
        $sent = Coupon::where('id','=',$coupon_id)->value('sent');
        if($sent==0){
        $word = Word::where('id', $test_id)->first();
        $test_id = $word->id;
       /*  $store = Coupon::where('uuid','=',$coupon_id)->first(); */
        return view('coupon/retest',[
            'word' =>$word,
            'test_id' =>$test_id,
            'coupon_id'=>$coupon_id,
            /* 'store'=>$store, */

        ]);
            }
            else{
                return view('coupon/clear');
            }

    }


 /**
     * 採点ボタン→①履歴作成②テスト採点③coupon付与
     * @param  Request  $request
     * @return Response
     */
    public function result(Request $request, $coupon_id,$test_id)
    {
       /*  $validate = $request->validate([
            'en1' => 'required|max:50',
            'en2' => 'required|max:50',
            'en3' => 'required|max:50',
            'en4' => 'required|max:50',
            'en5' => 'required|max:50',
            'en6' => 'required|max:50',
            'en7' => 'required|max:50',
            'en8' => 'required|max:50',
            'en9' => 'required|max:50',
            'en10' => 'required|max:50',

        ]); */




        /**テスト採点 */
        $words = Word::all();
        foreach ($words as $words) {
            $words = Word::where('id', '=', $test_id)->first();
            $score = 0;
            if ($request->en1 === $words->en1) {
                $score = $score + 1;
                $result1 = "O";
            } else {
                $result1 = "X";
            }
            if ($request->en2 === $words->en2) {
                $score = $score + 1;
                $result2 = "O";
            } else {
                $result2 = "X";
            }
            if ($request->en3 === $words->en3) {
                $score = $score + 1;
                $result3 = "O";
            } else {
                $result3 = "X";
            }
            if ($request->en4 === $words->en4) {
                $score = $score + 1;
                $result4 = "O";
            } else {
                $result4 = "X";
            }
            if ($request->en5 === $words->en5) {
                $score = $score + 1;
                $result5 = "O";
            } else {
                $result5 = "X";
            }
            if ($request->en6 === $words->en6) {
                $score = $score + 1;
                $result6 = "O";
            } else {
                $result6 = "X";
            }
            if ($request->en7 === $words->en7) {
                $score = $score + 1;
                $result7 = "O";
            } else {
                $result7 = "X";
            }
            if ($request->en8 === $words->en8) {
                $score = $score + 1;
                $result8 = "O";
            } else {
                $result8 = "X";
            }
            if ($request->en9 === $words->en9) {
                $score = $score + 1;
                $result9 = "O";
            } else {
                $result9 = "X";
            }
            if ($request->en10 === $words->en10) {
                $score = $score + 1;
                $result10 = "O";
            } else {
                $result10 = "X";
            }
        }
        /*テスト作成者へのポイント付与*/
        $tspoint = Word::where('id', '=',$test_id)->pluck('user_name');
        $crpoint = User::where('user_name', '=', $tspoint)->value('point');
        $crnewpoint = $crpoint + 1;
        $crpoint = User::where('user_name', '=', $tspoint)
            ->update([
                'point' => $crnewpoint
            ]);
        /*テスト利用回数カウント*/
        $count =Word::where('id','=',$request->id)->value('count');
        $newcount = $count +1;
        $count =Word::where('id','=',$request->id)
            ->update([
                'count' =>$newcount
            ]);

            $word = Word::find($test_id);
        /*店舗での利用履歴*/
        $coupon_uuid= Coupon::where('id','=',$coupon_id)->value('uuid');
        $store_point = Store::where('uuid','=', $coupon_uuid)->value('point');
        $new_point = $store_point + 1;
        $store_point = Store::where('uuid','=',$coupon_uuid)
                ->update([
                    'point' => $new_point
                ]);
         $store= Store::where('uuid','=', $coupon_uuid)->first();

        return view('coupon/result', [
            'test_id' => $test_id,
            'word' => $word,
            'score' => $score,
            'result1' => $result1,
            'result2' => $result2,
            'result3' => $result3,
            'result4' => $result4,
            'result5' => $result5,
            'result6' => $result6,
            'result7' => $result7,
            'result8' => $result8,
            'result9' => $result9,
            'result10' => $result10,
            'coupon_id'=>$coupon_id,
            'store'=>$store,

        ]);

    }
/**リテスト採点結果 */
/**
     * 採点ボタン→①履歴作成②テスト採点③coupon付与
     * @param  Request  $request
     * @return Response
     */
    public function retest_result(Request $request,$coupon_id,$test_id)
    {
        /* $validate = $request->validate([
            'en1' => 'required|max:50',
            'en2' => 'required|max:50',
            'en3' => 'required|max:50',
            'en4' => 'required|max:50',
            'en5' => 'required|max:50',
            'en6' => 'required|max:50',
            'en7' => 'required|max:50',
            'en8' => 'required|max:50',
            'en9' => 'required|max:50',
            'en10' => 'required|max:50',

        ]);
 */



        /**テスト採点 */
        $words = Word::all();
        foreach ($words as $words) {
            $words = Word::where('id', '=', $test_id)->first();
            $score = 0;
            if ($request->en1 === $words->en1) {
                $score = $score + 1;
                $result1 = "O";
            } else {
                $result1 = "X";
            }
            if ($request->en2 === $words->en2) {
                $score = $score + 1;
                $result2 = "O";
            } else {
                $result2 = "X";
            }
            if ($request->en3 === $words->en3) {
                $score = $score + 1;
                $result3 = "O";
            } else {
                $result3 = "X";
            }
            if ($request->en4 === $words->en4) {
                $score = $score + 1;
                $result4 = "O";
            } else {
                $result4 = "X";
            }
            if ($request->en5 === $words->en5) {
                $score = $score + 1;
                $result5 = "O";
            } else {
                $result5 = "X";
            }
            if ($request->en6 === $words->en6) {
                $score = $score + 1;
                $result6 = "O";
            } else {
                $result6 = "X";
            }
            if ($request->en7 === $words->en7) {
                $score = $score + 1;
                $result7 = "O";
            } else {
                $result7 = "X";
            }
            if ($request->en8 === $words->en8) {
                $score = $score + 1;
                $result8 = "O";
            } else {
                $result8 = "X";
            }
            if ($request->en9 === $words->en9) {
                $score = $score + 1;
                $result9 = "O";
            } else {
                $result9 = "X";
            }
            if ($request->en10 === $words->en10) {
                $score = $score + 1;
                $result10 = "O";
            } else {
                $result10 = "X";
            }
        }
        /*テスト作成者へのポイント付与*/
        $tspoint = Word::where('id', '=',$test_id)->pluck('user_name');
        $crpoint = User::where('user_name', '=', $tspoint)->value('point');
        $crnewpoint = $crpoint + 1;
        $crpoint = User::where('user_name', '=', $tspoint)
            ->update([
                'point' => $crnewpoint
            ]);
        /*テスト利用回数カウント*/
        $count =Word::where('id','=',$request->id)->value('count');
        $newcount = $count +1;
        $count =Word::where('id','=',$request->id)
            ->update([
                'count' =>$newcount
            ]);

            $word = Word::find($test_id);
        /*店舗での利用履歴*/
        $coupon_uuid= Coupon::where('id','=',$coupon_id)->value('uuid');
        $store_point = Store::where('uuid','=', $coupon_uuid)->value('point');
        $new_point = $store_point + 1;
        $store_point = Store::where('uuid','=',$coupon_uuid)
                ->update([
                    'point' => $new_point
                ]);


        // 二重送信防止
/*         $request->session()->regenerateToken();
 */

        return view('coupon/coupon', [
            'test_id' => $test_id,
            'word' => $word,
            'score' => $score,
            'result1' => $result1,
            'result2' => $result2,
            'result3' => $result3,
            'result4' => $result4,
            'result5' => $result5,
            'result6' => $result6,
            'result7' => $result7,
            'result8' => $result8,
            'result9' => $result9,
            'result10' => $result10,
            'id'=>$coupon_id,

        ]);

    }
/**クーポン申込メール表示 削除していい？ */
public function mail_index($id)
{

    //フォーム入力画ページのviewを表示
    $store=Store::where('uuid',$id)->first();
    return view('coupon.mail',[
        'id'=>$id,
        'store' =>$store,
    ]);
}

 /**
     * メール申込画面から確認から画面へ
     *
     * @param  Request  $request
     * @return Response
     */
public function confirm(Request $request,$coupon_id)
    {
        $sent = Coupon::where('id','=',$coupon_id)->value('sent');
        if($sent==0){
        //バリデーションを実行（結果に問題があれば処理を中断してエラーを返す）
        $request->validate([
            'email' => 'required|email',
        ]);
        $date = Carbon::now();


            //couponテーブルへの受け渡し
            $coupon = Coupon::where('id',"=",$coupon_id)->whereDate('created_at', '>=',$date->subMinute(10))->orderBy('created_at','desc')->first();
            $coupon->email =$request->email;
            $coupon->save();
          /*   $coupon_id = Coupon::where('email','=',$request->email)->whereDate('created_at', '>=',$date->subMinute(60))->value('id'); */
            if($coupon_id !== null){
                //フォームから受け取ったすべてのinputの値を取得
                $input = $request->all();

               /*  session()->forget('test_id'); */

                // 二重送信対策
        /*         $request->session()->regenerateToken();
         */
                //入力内容確認ページのviewに変数を渡して表示
                return view('coupon.confirm', [
                    'input' => $input,
                    'coupon_id'=>$coupon_id,

                ]);
            }
            else{
                return view('coupon/clear');
            }


    }
    else{
        return view('coupon/clear');
    }
}

/**メール送信 */
public function send(Request $request,$coupon_id)
{
    //バリデーションを実行（結果に問題があれば処理を中断してエラーを返す）
    $request->validate([
        'email' => 'required|email',
    ]);

    $id=Coupon::where('id','=',$coupon_id)->value('uuid');


    //フォームから受け取ったactionの値を取得
    $action = $request->input('action');

    //フォームから受け取ったactionを除いたinputの値を取得
    $input = $request->except('action');
    //actionの値で分岐
    if($action !== 'submit'){
        return redirect()
            ->route('coupon.confirm', ['id' =>$id])
            ->withInput($input);

    } else {
        $sent = Coupon::where('id','=',$coupon_id)->value('sent');
        if($sent==0){

        //入力されたメールアドレスにメールを送信
        \Mail::to($input['email'])->send(new CouponMail($input,$coupon_id));
        \Mail::to(config('mail.username'))->send(new CouponMail($input,$coupon_id));
        //再送信を防ぐためにトークンを再発行
/*         $request->session()->regenerateToken();
 */        //sent0->1に変更
        $newsent= 1;
        $sent=Coupon::where('id','=',$coupon_id)
        ->update([
            'sent' => $newsent
        ]);


        $request->session()->invalidate();

        $store_name = Coupon::where('id', '=', $coupon_id)->value('store_name');
        //送信完了ページのviewを表示
        return view('coupon.thanks',[
            'coupon_id'=>$coupon_id,
            'store_name'=>$store_name,
        ]);
    }
    else{
         //送信完了ページのviewを表示
         return view('coupon.thanks');
    }
}
}

 /**
     * 送信完了からのメールアドレス利用確認完了 削除していい？
     *
     * @param  Request  $request
     * @return Response
     */
    public function done(Request $request,$coupon_id)

    {
        $accepted = $request->input('accepted');
        $store = Coupon::where('id', '=',$coupon_id)->value('policy');
        $newstore = 1;
        $store = Coupon::where('id', '=',$coupon_id)
            ->update([
                'policy' => $newstore
            ]);

        return view('coupon.clear');
    }
/*クーポン表示ページへ
    /**
* The attributes that are mass assignable.
*
* @var array
*/
public function about(Request $request,$id,$coupon_id)
{
    $store = Store::where('uuid','=',$id)->first();
    $coupon=Coupon::where('id','=',$coupon_id)->where('uuid','=',$id)->first();
        if($coupon!==null){
            /*クーポン未使用なら*/
            if($coupon->used ==0){
                $date = $coupon->created_at;
                $now = new Carbon('now');
                $tomorrow= $date->addDay()->format('Y-m-d');
                if($store->due ==1){
                    $due = $date->addDays(30);
                }
                elseif($store->due ==2){
                    $due = $date->addDays(60);
                }
                else{
                    $due = $date->addDays(180);
                }
                $request->session()->regenerateToken();
                /*期限以内なら*/
                if($due > $now){
                $due= $due->format('Y-m-d');
                    return view('coupon/index',[
                        'id'=>$id,
                        'store'=>$store,
                        'coupon_id'=>$coupon_id,
                        'due'=>$due,
                        'tomorrow'=>$tomorrow
                    ]);
                }
                else{
                    return view('coupon.overdue');
                }
            }
            else{
                return view('coupon.not');
            }
        }
        else{
            return view('coupon.clear');
        }
    }
/*クーポン利用しますよ
    /**
* The attributes that are mass assignable.
*
* @var array
*/
public function use(Request $request,$id,$coupon_id)
{
    $store = Store::where('uuid','=',$id)->first();
    $coupon=Coupon::where('id','=',$coupon_id)->first();
    /*クーポン未使用なら*/
    if($coupon->used ==0){
    $date = $coupon->created_at;
    $now = new Carbon('now');
    $tomorrow= $date->addDay()->format('Y-m-d');
    if($store->due ==1){
    $due = $date->addDay(30)->format('Y-m-d');
    }
    elseif($store->due ==2){
    $due = $date->addDay(60)->format('Y-m-d');
    }
    else{
    $due = $date->addDay(180)->format('Y-m-d');
    }
    /*期限以内なら*/
    if($due > $now){
        $request->session()->regenerateToken();
        return view('coupon/use',[
            'id'=>$id,
            'store'=>$store,
            'coupon_id'=>$coupon_id,
            'due'=>$due,
            'tomorrow'=>$tomorrow,
        ]);
    }
    /*期限切れなら*/
    else{
        return view('coupon.overdue');
    }
    }
    /*利用済みなら*/
    else{
        return view('coupon.not');
    }
    }
/*クーポン利用しました
    /**
* The attributes that are mass assignable.
*
* @var array
*/
public function used(Request $request,$id,$coupon_id)
{
    $use = Coupon::where('id','=',$coupon_id)->first();
    $store = Store::where('uuid','=',$id)->first();
    $coupon=Coupon::where('id','=',$coupon_id)->first();
/*クーポン未使用なら*/
    if($use->used ==0){
        $date = $coupon->created_at;
        $now = new Carbon('now');
        $tomorrow= $date->addDay()->format('Y-m-d');
        if($store->due ==1){
        $due = $date->addDay(30)->format('Y-m-d');
        }
        elseif($store->due ==2){
        $due = $date->addDay(60)->format('Y-m-d');
        }
        else{
        $due = $date->addDay(180)->format('Y-m-d');
        }
        /*期限以内なら*/
        if($due > $now){
        $used =1;
        $use = Coupon::where('id','=',$coupon_id)
            ->update([
                'used'=>$used
            ]);

        return view('coupon/done',[
            'store'=>$store,
            'tomorrow'=>$tomorrow,
            'due'=>$due,

        ]);
    }
        /*期限切れなら*/
        else{
            return view('coupon.overdue');
        }
    }
    else{
        return view('coupon.bad');
    }

}
}
