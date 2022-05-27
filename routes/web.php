<?php

use Illuminate\Support\Facades\Route;

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

Auth::routes();

/*ホーム画面*/
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
/*選択したテストを表示*/
Route::get('/test/{id}', [App\Http\Controllers\TestController::class, 'test'])->name('test');
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
/*テスト採点*/
Route::post('/result/{id}', [App\Http\Controllers\TestController::class,'result'])->name('result');
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
/*他人のプロフィール画面へ*/
Route::get('/mypicture/{id}',[App\Http\Controllers\HomeController::class,'mypicture'])->name('mypicture');
/*全テスト画面へ*/
Route::get('all_list',[App\Http\Controllers\HomeController::class,'list'])->name('list');
/*ポイントランキング表へ*/
Route::get('point',[App\Http\Controllers\RankController::class,'point'])->name('point');
/*学校別ポイントランキング*/
Route::get('point/{id}',[App\Http\Controllers\RankController::class,'point_school'])->name('point/{id}');
/*検索画面へ*/
Route::get('search',[App\Http\Controllers\TestController::class,'search'])->name('search');
/*検索する*/
Route::get('search_result',[App\Http\Controllers\TestController::class,'search_result'])->name('search_result');
/*並び替えする*/
Route::get('sort',[App\Http\Controllers\TestController::class,'sort'])->name('sort');


Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

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
