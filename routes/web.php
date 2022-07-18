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

Route::get('/', function () {
    return view('welcome');
});
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

//入力ページ
Route::get('/admin_form', [App\Http\Controllers\ContactController::class,'admin_form'])->name('admin_form');
//確認ページ
Route::post('/admin_confirm', [App\Http\Controllers\ContactController::class,'admin_confirm'])->name('admin_confirm');

//送信完了ページ
Route::post('/admin_thanks', [App\Http\Controllers\ContactController::class,'admin_send'])->name('admin_send');

/*選択したテストを表示*/
Route::get('/test/{id}', [App\Http\Controllers\TestController::class, 'test'])->name('test');
/*全テスト画面へ*/
Route::get('all_list',[App\Http\Controllers\TestController::class,'list'])->name('list');
 /*テスト検索する*/
Route::get('search_result',[App\Http\Controllers\TestController::class,'search_result'])->name('search_result');
/*ユーザー検索する*/
Route::get('search_user',[App\Http\Controllers\HomeController::class,'search_user'])->name('search_user');
/*並び替えする*/
Route::get('sort',[App\Http\Controllers\TestController::class,'sort'])->name('sort');
Route::get('select_twoweeks{id}',[App\Http\Controllers\TestController::class,'select_twoweeks'])->name('select_twoweeks');
Route::get('select_today{id}',[App\Http\Controllers\TestController::class,'select_today'])->name('select_today');
Route::get('select_week{id}',[App\Http\Controllers\TestController::class,'select_week'])->name('select_week');
Route::get('select_month{id}',[App\Http\Controllers\TestController::class,'select_month'])->name('select_month');

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
/*選択したテストを削除する*/
Route::get('/list/{id}', [App\Http\Controllers\TestController::class,'delete_list'])->name('delete_list');
/*選択したユーザーを削除する*/
Route::get('/delete_user/{id}', [App\Http\Controllers\HomeController::class,'delete_user'])->name('delete_user');
/*正答画面へ*/
Route::get('/answer/{id}', [App\Http\Controllers\TestController::class,'answer'])->name('answer');
/*テスト作成画面へ*/
Route::get('/create', [App\Http\Controllers\TestController::class,'create_index'])->name('create');
/*全履歴画面へ*/
Route::get('/history', [App\Http\Controllers\TestController::class,'history'])->name('history');
/*テスト作成*/
Route::post('/create', [App\Http\Controllers\TestController::class,'create'])->name('create');
/*自分のプロフィール画面へ*/
Route::get('profile',[App\Http\Controllers\HomeController::class,'profile'])->name('profile');

/*フォロー登録*/
Route::get('/reply/nice/{id}',[App\Http\Controllers\HomeController::class,'nice'])->name('nice');
Route::get('/reply/unnice/{id}',[App\Http\Controllers\HomeController::class, 'unnice'])->name('unnice');

});
/*ポイントランキング表へ*/
Route::get('point',[App\Http\Controllers\RankController::class,'point'])->name('point');



Route::get('/auth/verifyemail/{token}', [App\Http\Controllers\Auth\RegisterController::class,'verify']);
/* Auth::routes();*/
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
Route::get('/individual/{id}',[App\Http\Controllers\TestController::class,'individual'])->name('individual');

/*個別履歴表示*/
Route::get('/id_view/{id}', [App\Http\Controllers\HomeController::class, 'id_view'])->name('id_view')->middleware('auth:admin');

Route::post('/admin/login', [\App\Http\Controllers\LoginController::class, 'adminLogin'])->name('admin.login');

Route::get('/admin/logout', [\App\Http\Controllers\LoginController::class, 'adminLogout'])->name('admin.logout');

Route::get('/admin/register', [\App\Http\Controllers\RegisterController::class, 'adminRegisterForm'])->middleware('auth:admin');

Route::post('/admin/register', [\App\Http\Controllers\RegisterController::class, 'adminRegister'])->middleware('auth:admin')->name('admin.register');
/* Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
 */
/* Route::prefix('user')->middleware(['auth'])->group(function() {
 */
    // 課金
   /*  Route::get('subscription', [App\Http\Controllers\StripeController::class,'index']);
    Route::get('ajax/subscription/status',  [App\Http\Controllers\Ajax\StripeController::class,'status']);
    Route::post('ajax/subscription/subscribe', [App\Http\Controllers\Ajax\StripeController::class,'subscribe']);
    Route::post('ajax/subscription/cancel', [App\Http\Controllers\Ajax\StripeController::class,'cancel']);
    Route::post('ajax/subscription/resume', [App\Http\Controllers\Ajax\StripeController::class,'resume']);
    Route::post('ajax/subscription/change_plan', [App\Http\Controllers\Ajax\StripeController::class,'change_plan']);
    Route::post('ajax/subscription/update_card', [App\Http\Controllers\Ajax\StripeController::class,'update_card']); */

/* }); */

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});
