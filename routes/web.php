<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

//welcomeページ
Route::get('/',[App\Http\Controllers\TestController::class,'welcome'])->name('welcome');

Route::get('/monitor', function () {
    return view('monitor');
});
Route::get('/policy',function(){
    return view('policy');
});
Route::get('/rule',function(){
    return view('rule');
});
Route::get('/aboutus',function(){
    return view('aboutus');
});
Route::get('/faq',function(){
    return view('faq');
});
Route::get('/consumer',function(){
    return view('consumer');
});
Route::get('/alert',function(){
    return view('alert');
});
Route::get('/feature',function(){
    return view('feature');
});
Route::get('/use',function(){
    return view('use');
});
Route::get('/plan',function(){
    return view('plan');
});
Route::get('/case',function(){
    return view('case');
});
Route::get('/commerce',function(){
    return view('commerce');
});
Route::get('/parent',function(){
    return view('parent');
});


Route::get('/partner',function(){
    return view('partner');
});
Route::get('/coupon/not')->name('coupon.not');
Route::get('/coupon/overdue')->name('coupon.overdue');


//モニタリング申込者入力ページ
Route::get('/admin_form', [App\Http\Controllers\ContactController::class,'admin_form'])->name('admin_form');
//確認ページ
Route::post('/admin_confirm', [App\Http\Controllers\ContactController::class,'admin_confirm'])->name('admin_confirm');

//送信完了ページ
Route::post('/admin_thanks', [App\Http\Controllers\ContactController::class,'admin_send'])->name('admin_send');

/*選択したテストを表示*/
Route::get('/test/{id}', [App\Http\Controllers\TestController::class, 'test'])->name('test');
/*選択したリッスンを表示*/
Route::get('/listen/{id}', [App\Http\Controllers\TestController::class, 'listen'])->name('listen');

/*全テスト画面へ*/
Route::get('all_list',[App\Http\Controllers\TestController::class,'list'])->name('list');
 /*テスト検索する*/
Route::get('search_result',[App\Http\Controllers\TestController::class,'search_result'])->name('search_result');
/*ユーザー検索する*/
Route::get('search_user',[App\Http\Controllers\TestController::class,'search_user'])->name('search_user');
/*並び替えする*/
Route::get('sort',[App\Http\Controllers\TestController::class,'sort'])->name('sort');
Route::get('search_id',[App\Http\Controllers\TestController::class,'search_id'])->name('search_id');


//入力ページ
Route::get('/contact', [App\Http\Controllers\ContactController::class,'contact'])->name('contact.index');

//確認ページ
Route::post('/contact/confirm', [App\Http\Controllers\ContactController::class,'confirm'])->name('contact.confirm');

//送信完了ページ
Route::post('/contact/thanks', [App\Http\Controllers\ContactController::class,'send'])->name('contact.send');
/*他人のプロフィール画面へ*/
Route::get('/mypicture/{id}',[App\Http\Controllers\RankController::class,'mypicture'])->name('mypicture');
/*テスト採点*/
Route::post('/result/{id}', [App\Http\Controllers\TestController::class,'result'])->name('result');


//メール確認済みのユーザーのみ
Route::middleware(['verified'])->group(function(){
/*ホーム画面*/
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
/*選択したテストを編集する画面へ*/
Route::get('/edit/{id}', [App\Http\Controllers\TestController::class, 'edit'])->name('edit');
/*選択したユーザーの編集画面へ*/
Route::get('/edit_user/{id}', [App\Http\Controllers\HomeController::class, 'edit_user'])->name('edit_user');
/*選択したユーザーの写真編集画面へ*/
Route::get('/edit_picture/{id}', [App\Http\Controllers\HomeController::class, 'edit_picture'])->name('edit_picture');
/*選択したユーザーの写真変更*/
Route::patch('/uploadpic', [App\Http\Controllers\HomeController::class, 'uploadpic'])->name('uploadpic');
/*選択したユーザーの写真削除*/
Route::get('/deletepic/{id}', [App\Http\Controllers\HomeController::class, 'deletepic'])->name('deletepic');
/*選択したユーザーを編集する*/
Route::patch('/update/{id}', [App\Http\Controllers\HomeController::class, 'update'])->name('update_user');
/*選択したtestを編集する*/
Route::patch('edit/{id}',[App\Http\Controllers\HomeController::class,'update_test'])->name('update_test');
/*選択したテストを削除する*/
Route::get('/list/{id}', [App\Http\Controllers\TestController::class,'delete_list'])->name('delete_list');
/*選択したユーザーを削除する*/
Route::get('/delete_user/{id}', [App\Http\Controllers\HomeController::class,'delete_user'])->name('delete_user');
/*正答画面へ*/
Route::get('/answer/{id}', [App\Http\Controllers\TestController::class,'answer'])->name('answer');
Route::post('/answer/{id}', [App\Http\Controllers\TestController::class,'alert'])->name('alert');
/*テスト作成画面へ*/
Route::get('/create', [App\Http\Controllers\TestController::class,'create_index'])->name('create');
/*全履歴画面へ*/
Route::get('/history', [App\Http\Controllers\TestController::class,'history'])->name('history');
/*テスト作成*/
Route::post('/create', [App\Http\Controllers\TestController::class,'create'])->name('create');
/*自分のプロフィール画面へ*/
Route::get('profile',[App\Http\Controllers\HomeController::class,'profile'])->name('profile');
/*学習ページへ*/
Route::get('/livewire/{id}',[App\Http\Controllers\StudyController::class,'index_livewire'])->name('livewire');

/*今日のテストを表示*/
Route::get('/today', [App\Http\Controllers\TestController::class, 'today'])->name('today');
/*今日のテスト採点*/
Route::post('/today/{id}/test_id/{test_id}', [App\Http\Controllers\TestController::class,'result_today'])->name('result_today');
/*今日のリッスンを表示*/
Route::get('/today_listen', [App\Http\Controllers\TestController::class, 'today_listen'])->name('today_listen');
/*今日のリッスン採点*/
Route::post('/today_listen/{id}/test_id/{test_id}', [App\Http\Controllers\TestController::class,'listen_result_today'])->name('listen_result_today');
/*今日のテストリテスト表示*/
Route::get('/today_retest/{id}/test_id/{test_id}', [\App\Http\Controllers\TestController::class, 'today_retest'])->name('today_retest');

/*合格確認へ*/
Route::post('/confirm/{id}/test_id/{test_id}', [App\Http\Controllers\ParentController::class,'confirm'])->name('confirm');
/**目標設定ページへ */
Route::get('/goal', [App\Http\Controllers\ParentController::class,'goal'])->name('goal');
Route::post('/goal/{id}', [App\Http\Controllers\ParentController::class,'goal_post'])->name('goal_post');

/*フォロー登録*/
Route::get('/reply/nice/{id}',[App\Http\Controllers\HomeController::class,'nice'])->name('nice');
Route::get('/reply/unnice/{id}',[App\Http\Controllers\HomeController::class, 'unnice'])->name('unnice');
/*あとで登録*/
Route::patch('/search_result/{id}',[App\Http\Controllers\StudyController::class,'later'])->name('later');
/*あとで削除*/
Route::get('/home/{id}', [App\Http\Controllers\StudyController::class, 'delete_later'])->name('delete_later');
Route::get('/reply/nomore/{id}',[App\Http\Controllers\HomeController::class, 'nomore'])->name('nomore');

});
/*ポイントランキング表へ*/
/* Route::get('point',[App\Http\Controllers\RankController::class,'point'])->name('point'); */



/* Route::get('/auth/verifyemail/{token}', [App\Http\Controllers\Auth\RegisterController::class,'verify']);
 *//* Auth::routes();*/
//登録後メール
Auth::routes(['verify' => true]);

// ここから追加(管理者機能)
Route::get('/admin/login', function () {
    return view('adminLogin');
})->middleware('guest:admin'); // ここ
/*管理者ダッシュボード*/
Route::get('/admin',[App\Http\Controllers\TestController::class,'by_school'])->name('admin-home')
->middleware('auth:admin');
/*個別データ検索*/
Route::get('/individual/{id}',[App\Http\Controllers\TestController::class,'individual'])->name('individual')->middleware('auth:admin');
Route::get('select_twoweeks{id}',[App\Http\Controllers\TestController::class,'select_twoweeks'])->name('select_twoweeks')->middleware('auth:admin');
Route::get('select_today{id}',[App\Http\Controllers\TestController::class,'select_today'])->name('select_today')->middleware('auth:admin');
Route::get('select_week{id}',[App\Http\Controllers\TestController::class,'select_week'])->name('select_week')->middleware('auth:admin');
Route::get('select_month{id}',[App\Http\Controllers\TestController::class,'select_month'])->name('select_month')->middleware('auth:admin');

/*個別履歴表示*/
Route::get('/id_view/{id}', [App\Http\Controllers\AdminController::class, 'id_view'])->name('id_view')->middleware('auth:admin');
/*生徒へコメント*/
Route::post('/comment/{id}', [App\Http\Controllers\AdminController::class, 'comment'])->name('comment')->middleware('auth:admin');
/*コメント一覧*/
Route::get('/comment', [App\Http\Controllers\TestController::class, 'comment_index'])->name('comment_index')->middleware('auth:admin');

Route::post('/admin/login', [\App\Http\Controllers\LoginController::class, 'adminLogin'])->name('admin.login');

Route::get('/admin/logout', [\App\Http\Controllers\LoginController::class, 'adminLogout'])->name('admin.logout');
/*モニタリング登録作業*/
Route::get('/admin/register', [\App\Http\Controllers\RegisterController::class, 'adminRegisterForm'])->middleware('auth:admin');
Route::post('/admin/register', [\App\Http\Controllers\RegisterController::class, 'adminRegister'])->middleware('auth:admin')->name('admin.register');
/*親子機能登録作業*/
Route::get('/game/register', [\App\Http\Controllers\RegisterController::class, 'gameRegisterForm'])->middleware('auth:admin');
Route::post('/game/register', [\App\Http\Controllers\RegisterController::class, 'gameRegister'])->middleware('auth:admin')->name('game.register');
/*ブログ書き込み権限*/
Route::get('/blog2', [\App\Http\Controllers\FormController::class, 'wys'])->middleware('auth:admin');
Route::post('/newpostsend', [\App\Http\Controllers\FormController::class, 'savenew'])->middleware('auth:admin');
/*NEws書き込み権限*/
Route::get('/news', [\App\Http\Controllers\FormController::class, 'news'])->middleware('auth:admin')->name('news.form');
Route::post('/news_post', [\App\Http\Controllers\FormController::class, 'save_news'])->middleware('auth:admin');
/*Case書き込み権限*/
Route::get('/cases', [\App\Http\Controllers\FormController::class, 'case'])->middleware('auth:admin')->name('case.form');
Route::post('/case_post', [\App\Http\Controllers\FormController::class, 'savecase'])->middleware('auth:admin');
/**news表示 */
Route::get('/news/index', [\App\Http\Controllers\FormController::class, 'news_index'])->name('news.index');
Route::get('/news/page{id}', [\App\Http\Controllers\FormController::class, 'news_page'])->name('news.page');
/*ブログ表示*/
Route::get('/blog/index', [\App\Http\Controllers\FormController::class, 'index'])->name('blog.index');
Route::get('/blog/page{id}', [\App\Http\Controllers\FormController::class, 'page'])->name('blog.page');
/*事象表示*/
Route::get('/case/index', [\App\Http\Controllers\FormController::class, 'caseindex'])->name('case.index');
Route::get('/case/page{id}', [\App\Http\Controllers\FormController::class, 'case_page'])->name('case.page');

/*お店ページ*/
Route::get('/guest/index/{id}', [\App\Http\Controllers\GuestController::class, 'index'])->name('guest.index');
/*お客様テスト結果*/
Route::post('/guest/test/{id}/test_id/{test_id}', [\App\Http\Controllers\GuestController::class, 'test'])->name('guest.test');

/**お客様リテスト */
Route::get('/guest/retest/{id}/test_id/{test_id}',
[\App\Http\Controllers\GuestController::class, 'retest'])->name('guest.retest');
Route::post('/guest/retest/{id}/test_id/{test_id}', [\App\Http\Controllers\GuestController::class, 'retest_result'])->name('guest.retest_result');
/*クーポン申込メール*/
Route::post('/guest/coupon/{id}', [\App\Http\Controllers\GuestController::class, 'confirm'])->name('coupon.confirm');


/* Route::get('/guest/mail/{id}', [\App\Http\Controllers\GuestController::class, 'mail_index'])->name('guest.mail');
 *///確認ページ
Route::post('/guest/mail/{id}', [\App\Http\Controllers\GuestController::class, 'confirm'])->name('mail.confirm');
//送信完了ページ
Route::post('/guest/confirm/{coupon_id}', [\App\Http\Controllers\GuestController::class, 'send'])->name('mail.send');


/*NEW*/
/*お店ページ(コード入力)*/
Route::get('/coupon/code/{id}', [\App\Http\Controllers\CouponController::class, 'code_form'])->name('coupon.code_form');
Route::post('/coupon/code/{id}', [\App\Http\Controllers\CouponController::class, 'code'])->name('coupon.code');
/*店舗テストへ移動*/
Route::get('/coupon/test/{coupon_id}', [\App\Http\Controllers\CouponController::class, 'test'])->name('coupon.test');
/*お客様テスト結果*/
Route::post('/coupon/test/{coupon_id}/test_id/{test_id}', [\App\Http\Controllers\CouponController::class, 'result'])->name('coupon.result');

/**お客様リテスト */
Route::get('/coupon/retest/{coupon_id}/test_id/{test_id}',
[\App\Http\Controllers\CouponController::class, 'retest'])->name('coupon.retest');
Route::post('/coupon/retest/{coupon_id}/test_id/{test_id}', [\App\Http\Controllers\CouponController::class, 'retest_result'])->name('coupon.retest_result');
/*クーポン申込メール*/
Route::post('/coupon/coupon/{coupon_id}', [\App\Http\Controllers\CouponController::class, 'confirm'])->name('coupon.confirm');
/*クーポン掲示ページ*/
Route::get('/coupon/index/{id}/coupon/{coupon_id}', [\App\Http\Controllers\CouponController::class, 'about'])->name('coupon.about');
/*クーポン利用ポスト*/
Route::get('/coupon/use/{id}/coupon/{coupon_id}', [\App\Http\Controllers\CouponController::class, 'use'])->name('coupon.use');
Route::post('/coupon/use/{id}/coupon/{coupon_id}', [\App\Http\Controllers\CouponController::class, 'used'])->name('coupon.used');
/*クーポン表示ページ*/
Route::get('/coupon/done/{id}', [\App\Http\Controllers\CouponController::class, 'coupon.done'])->name('coupon.done');

/* Route::get('/coupon/mail/{id}', [\App\Http\Controllers\CouponController::class, 'mail_index'])->name('coupon.mail');
 *///確認ページ
Route::post('/coupon/mail/{coupon_id}', [\App\Http\Controllers\CouponController::class, 'confirm'])->name('coupon.confirm');
//送信完了ページ
Route::post('/coupon/confirm/{coupon_id}', [\App\Http\Controllers\CouponController::class, 'send'])->name('coupon.send');
//データ消去ページ
Route::get('/coupon/thanks/{coupon_id}', [\App\Http\Controllers\CouponController::class, 'thanks'])->name('coupon.done');
Route::post('/coupon/thanks/{coupon_id}', [\App\Http\Controllers\CouponController::class, 'done'])->name('coupon.clear');

/**お店登録 */
Route::get('/guest/create', [\App\Http\Controllers\GuestController::class, 'create_index'])->middleware('auth:admin')->name('guest.create');
Route::post('/guest/create', [\App\Http\Controllers\GuestController::class, 'uuid'])->middleware('auth:admin')->name('guest.uuid');
/**登録店舗リスト */
Route::get('/guest/list', [\App\Http\Controllers\GuestController::class, 'list'])->middleware('auth:admin')->name('guest.list');
/**クーポン利用記録 */
Route::get('/guest/used_coupon/{id}', [\App\Http\Controllers\GuestController::class, 'used_coupon'])->name('guest.used_coupon');
/*選択したstoreの写真編集画面へ*/
Route::get('/edit_store_picture/{id}', [App\Http\Controllers\GuestController::class, 'edit_picture'])->name('edit_store_picture');
/*選択したstoreの写真変更*/
Route::patch('/uploadpic_store/{id}', [App\Http\Controllers\GuestController::class, 'uploadpic'])->name('uploadpic_store');
/*選択したユーザーの写真削除*/
Route::get('/deletepic_store/{id}', [App\Http\Controllers\GuestController::class, 'deletepic_store'])->name('deletepic_store');



Route::middleware([

    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});
