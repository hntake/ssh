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
Route::get('/', [App\Http\Controllers\TestController::class, 'welcome'])->name('welcome');

Route::get('/monitor', function () {
    return view('monitor');
});
Route::get('/policy', function () {
    return view('policy');
});
Route::get('/rule', function () {
    return view('rule');
});
Route::get('/aboutus', function () {
    return view('aboutus');
});
Route::get('/faq', function () {
    return view('faq');
});
Route::get('/consumer', function () {
    return view('consumer');
});
Route::get('/alert', function () {
    return view('alert');
});
Route::get('/feature', function () {
    return view('feature');
});
Route::get('/use', function () {
    return view('use');
});
Route::get('/plan', function () {
    return view('plan');
});
Route::get('/case', function () {
    return view('case');
});
Route::get('/commerce', function () {
    return view('commerce');
});
Route::get('/parent', function () {
    return view('parent');
});


Route::get('/partner', function () {
    return view('partner');
});
Route::get('/diet/vote', function () {
    return view('diet/vote');
});
Route::get('/diet/elect', function () {
    return view('diet/elect');
});
Route::get('/coupon/not')->name('coupon.not');
Route::get('/coupon/overdue')->name('coupon.overdue');



//モニタリング申込者入力ページ
Route::get('/admin_form', [App\Http\Controllers\ContactController::class, 'admin_form'])->name('admin_form');
//確認ページ
Route::post('/admin_confirm', [App\Http\Controllers\ContactController::class, 'admin_confirm'])->name('admin_confirm');

//送信完了ページ
Route::post('/admin_thanks', [App\Http\Controllers\ContactController::class, 'admin_send'])->name('admin_send');

/*選択したテストを表示*/
Route::get('/test/{id}', [App\Http\Controllers\TestController::class, 'test'])->name('test');
/*選択したリッスンを表示*/
Route::get('/listen/{id}', [App\Http\Controllers\TestController::class, 'listen'])->name('listen');
/*選択したリッスンを表示*/
Route::post('/listen/{id}', [App\Http\Controllers\TestController::class, 'listen_result'])->name('listen_result');

/*全テスト画面へ*/
Route::get('all_list', [App\Http\Controllers\TestController::class, 'list'])->name('list');
/*テスト検索する*/
Route::get('search_result', [App\Http\Controllers\TestController::class, 'search_result'])->name('search_result');
/*ユーザー検索する*/
Route::get('search_user', [App\Http\Controllers\TestController::class, 'search_user'])->name('search_user');
/*並び替えする*/
Route::get('sort', [App\Http\Controllers\TestController::class, 'sort'])->name('sort');
Route::get('search_id', [App\Http\Controllers\TestController::class, 'search_id'])->name('search_id');


//入力ページ
Route::get('/contact', [App\Http\Controllers\ContactController::class, 'contact'])->name('contact.index');

//確認ページ
Route::post('/contact/confirm', [App\Http\Controllers\ContactController::class, 'confirm'])->name('contact.confirm');

//送信完了ページ
Route::post('/contact/thanks', [App\Http\Controllers\ContactController::class, 'send'])->name('contact.send');
/*他人のプロフィール画面へ*/
Route::get('/mypicture/{id}', [App\Http\Controllers\RankController::class, 'mypicture'])->name('mypicture');
/*テスト採点*/
Route::post('/result/{id}', [App\Http\Controllers\TestController::class, 'result'])->name('result');


//メール確認済みのユーザーのみ
Route::middleware(['verified'])->group(function () {
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
    Route::patch('edit/{id}', [App\Http\Controllers\HomeController::class, 'update_test'])->name('update_test');
    /*選択したテストを削除する*/
    Route::get('/list/{id}', [App\Http\Controllers\TestController::class, 'delete_list'])->name('delete_list');
    /*選択したユーザーを削除する*/
    Route::get('/delete_user/{id}', [App\Http\Controllers\HomeController::class, 'delete_user'])->name('delete_user');
    /*正答画面へ*/
    Route::get('/answer/{id}', [App\Http\Controllers\TestController::class, 'answer'])->name('answer');
    Route::post('/answer/{id}', [App\Http\Controllers\TestController::class, 'alert'])->name('alert');
    /*テスト作成画面へ*/
    Route::get('/create', [App\Http\Controllers\TestController::class, 'create_index'])->name('create_index');
    /*全履歴画面へ*/
    Route::get('/history', [App\Http\Controllers\TestController::class, 'history'])->name('history');
    /*テスト作成*/
    Route::post('/create', [App\Http\Controllers\TestController::class, 'create'])->name('create');
    /*自分のプロフィール画面へ*/
    Route::get('profile', [App\Http\Controllers\HomeController::class, 'profile'])->name('profile');
    /*学習ページへ*/
    Route::get('/livewire/{id}', [App\Http\Controllers\StudyController::class, 'index_livewire'])->name('livewire');

    /*今日のテストを表示*/
    Route::get('/today', [App\Http\Controllers\TestController::class, 'today'])->name('today');
    /*今日のテスト採点*/
    Route::post('/today/{id}/test_id/{test_id}', [App\Http\Controllers\TestController::class, 'result_today'])->name('result_today');
    /*今日のリッスンを表示*/
    Route::get('/today_listen', [App\Http\Controllers\TestController::class, 'today_listen'])->name('today_listen');
    /*今日のリッスン採点*/
    Route::post('/today_listen/{id}/test_id/{test_id}', [App\Http\Controllers\TestController::class, 'listen_result_today'])->name('listen_result_today');
    /*今日のテストリテスト表示*/
    Route::get('/today_retest/{id}/test_id/{test_id}', [\App\Http\Controllers\TestController::class, 'today_retest'])->name('today_retest');

    /*合格確認へ*/
    Route::post('/confirm/{id}/test_id/{test_id}', [App\Http\Controllers\ParentController::class, 'confirm'])->name('confirm');
    /**目標設定ページへ */
    Route::get('/goal', [App\Http\Controllers\ParentController::class, 'goal'])->name('goal');
    Route::post('/goal/{id}', [App\Http\Controllers\ParentController::class, 'goal_post'])->name('goal_post');

    /*フォロー登録*/
    Route::get('/reply/nice/{id}', [App\Http\Controllers\HomeController::class, 'nice'])->name('nice');
    Route::get('/reply/unnice/{id}', [App\Http\Controllers\HomeController::class, 'unnice'])->name('unnice');
    /*あとで登録*/
    Route::patch('/search_result/{id}', [App\Http\Controllers\StudyController::class, 'later'])->name('later');
    /*あとで削除*/
    Route::get('/home/{id}', [App\Http\Controllers\StudyController::class, 'delete_later'])->name('delete_later');
    Route::get('/reply/nomore/{id}', [App\Http\Controllers\HomeController::class, 'nomore'])->name('nomore');
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
Route::get('/admin', [App\Http\Controllers\TestController::class, 'by_school'])->name('admin-home')
    ->middleware('auth:admin');
/*個別データ検索*/
Route::get('/individual/{id}', [App\Http\Controllers\TestController::class, 'individual'])->name('individual')->middleware('auth:admin');
Route::get('select_twoweeks{id}', [App\Http\Controllers\TestController::class, 'select_twoweeks'])->name('select_twoweeks')->middleware('auth:admin');
Route::get('select_today{id}', [App\Http\Controllers\TestController::class, 'select_today'])->name('select_today')->middleware('auth:admin');
Route::get('select_week{id}', [App\Http\Controllers\TestController::class, 'select_week'])->name('select_week')->middleware('auth:admin');
Route::get('select_month{id}', [App\Http\Controllers\TestController::class, 'select_month'])->name('select_month')->middleware('auth:admin');

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
Route::get(
    '/guest/retest/{id}/test_id/{test_id}',
    [\App\Http\Controllers\GuestController::class, 'retest']
)->name('guest.retest');
Route::post('/guest/retest/{id}/test_id/{test_id}', [\App\Http\Controllers\GuestController::class, 'retest_result'])->name('guest.retest_result');
/*クーポン申込メール*/
Route::post('/guest/coupon/{id}', [\App\Http\Controllers\GuestController::class, 'confirm'])->name('coupon.confirm');


/* Route::get('/guest/mail/{id}', [\App\Http\Controllers\GuestController::class, 'mail_index'])->name('guest.mail');
 */ //確認ページ
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
Route::get(
    '/coupon/retest/{coupon_id}/test_id/{test_id}',
    [\App\Http\Controllers\CouponController::class, 'retest']
)->name('coupon.retest');
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
 */ //確認ページ
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



/* Route::middleware([

    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
}); */

//在庫一覧画面の表示
Route::get('/products', [App\Http\Controllers\ProductController::class, 'index'])->name('products');
/* Route::post('/products_process', 'UsersController@home')->name('products_process'); // 在庫一覧画面の処理 */

//新規備品登録画面へ遷移
Route::get('/create_product',  [App\Http\Controllers\ProductController::class, 'create'])->name('create_products');

//注文申請画面へ遷移
Route::get('/order/{id}',  [App\Http\Controllers\ProductController::class, 'order'])->name('order');


//持ち出し申請submit
Route::post('/update',  [App\Http\Controllers\ProductController::class, 'update'])->name('products');

//持ち出し申請画面へ遷移
Route::get('/store',  [App\Http\Controllers\ProductController::class, 'store'])->name('store');

//QR持ち出し申請submit
Route::post('/qr/{id}',  [App\Http\Controllers\ProductController::class, 'qr'])->name('qr');

//QR持ち出し申請画面へ遷移
Route::get('/qr/{id}',  [App\Http\Controllers\ProductController::class, 'qr_index'])->name('qr_index');

//備品登録submit
Route::post('/subtract',  [App\Http\Controllers\ProductController::class, 'subtract'])->name('products');

//orderテーブルへのデータ受け渡し
Route::post('/insert',  [App\Http\Controllers\ProductController::class, 'insert'])->name('order_table');

//注文一覧表示
Route::get('/order_table',  [App\Http\Controllers\ProductController::class, 'order_table'])->name('order_table');
//注文表一覧表示
Route::get('/ship_table',  [App\Http\Controllers\ProductController::class, 'ship_table'])->name('ship_table');

//注文番号確認画面へ遷移
Route::get('/ship',  [App\Http\Controllers\ProductController::class, 'ship'])->name('ship');
//注文メール送信画面へ遷移
Route::get('/form/{id}',  [App\Http\Controllers\ProductController::class, 'form'])->name('form');
//選択したメール画面へ遷移
Route::get('/form_id/{id}',  [App\Http\Controllers\ProductController::class, 'form_id'])->name('form_id');

//Mailableを使った
/* Route::get('/form', [App\Http\Controllers\MailController::class,'form']); */
Route::post('/form/{form_id}', [App\Http\Controllers\MailController::class, 'send'])->name('send');
Route::post('/form_id/{form_id}', [App\Http\Controllers\MailController::class, 'send2'])->name('send2');

//アンケート機能
//作成画面
Route::get('/customer/create', [App\Http\Controllers\QuestionController::class, 'create_index'])->middleware('auth:admin');
/*リスト画面へ*/
Route::get('/customer/list/{store}', [App\Http\Controllers\QuestionController::class, 'list'])->name('list_q');
/*選択したアンケートを表示*/
Route::get('/customer/each/{id}', [App\Http\Controllers\QuestionController::class, 'each'])->name('each_q');
/*編集*/
Route::get('/customer/edit/{store}', [App\Http\Controllers\QuestionController::class, 'edit'])->name('edit_q')->middleware('auth:admin');
Route::get('/customer/edit_each/{id}', [App\Http\Controllers\QuestionController::class, 'edit_each'])->name('edit_eq')->middleware('auth:admin');
Route::match(['patch', 'post'], '/customer/edit_each/{id}', [App\Http\Controllers\QuestionController::class, 'update_each'])->name('update_eq')->middleware('auth:admin');
/*削除*/
Route::get('/customer/delete_list/{id}', [App\Http\Controllers\QuestionController::class, 'delete'])->name('delete_q');
/*アンケート送信*/
Route::post('/customer/create', [App\Http\Controllers\QuestionController::class, 'question'])->name('question.create')->middleware('auth:admin');
//お客様写真
Route::get('/customer/edit_picture/{id}', [App\Http\Controllers\QuestionController::class, 'picture'])->name('q_edit_picture')->middleware('auth:admin');
/*お客様写真変更*/
Route::patch('/customer/edit_picture/{id}', [App\Http\Controllers\QuestionController::class, 'upload'])->name('q_upload_pic');
/*お客様写真削除*/
Route::get('/customer/delete_picture/{id}', [App\Http\Controllers\QuestionController::class, 'delete_pic'])->name('delete_pic');

//PDFファイル
Route::get('pdf', [App\Http\Controllers\PDFController::class, 'pdf'])->name('pdf');
//PDFファイル
Route::get('receipt', [App\Http\Controllers\PDFController::class, 'receipt'])->name('receipt');
//請求書アクア
Route::get('invoice/aqua', function () {
    return view('invoice/aqua');
});
//領収書アクア
Route::get('invoice/aqua_r', function () {
    return view('invoice/aqua_r');
});
//オープン請求書作成ページ
Route::get('invoice/open', function () {
    return view('invoice/open');
});
//オープン請求書作成ページ
Route::get('invoice/open_r', function () {
    return view('invoice/open_r');
});
//オープンPDFファイル作成
Route::get('pdf', [App\Http\Controllers\PDFController::class, 'pdf_open'])->name('pdf_open');
//オープンPDFファイル領収書作成
Route::get('pdf_r', [App\Http\Controllers\PDFController::class, 'pdf_r'])->name('pdf_r');
//請求書会員登録
Route::get('/invoice/register', [\App\Http\Controllers\InvoiceRegisterController::class, 'invoiceRegisterForm'])->name('register_index');
Route::post('/invoice/register', [\App\Http\Controllers\InvoiceRegisterController::class, 'pre_check'])->name('register_invoice');
Route::post('/invoice/confirm', [\App\Http\Controllers\InvoiceRegisterController::class, 'register'])->name('register_invoice_confirm');
Route::get('invoice/email/verify/{email_verify_token}',  [\App\Http\Controllers\InvoiceRegisterController::class, 'verify'])->name('invoice.email.verify');
//請求書会員ログイン
Route::get('/invoice/login', function () {
    return view('invoice/login');
});
Route::post('/invoice/login', [\App\Http\Controllers\LoginController::class, 'invoiceLogin'])->name('login_invoice');
//請求書会員情報入力ページへ
Route::get('/invoice/create/{id}', function () {
    return view('invoice/create') ->middleware('auth:invoice');
});
//請求書会員情報入力する
Route::post('/invoice/create/{id}', [\App\Http\Controllers\InvoiceRegisterController::class, 'company'])->name('invoice_company_post');
//請求書会員情報入力する
Route::post('/invoice/company_confirm/{id}', [\App\Http\Controllers\InvoiceRegisterController::class, 'company_post'])->name('invoice_company_create');//請求書会員情報入力する
//請求者会員請求書を作成ページへ
Route::get('/invoice/user/{id}', [\App\Http\Controllers\InvoiceRegisterController::class, 'create'])->name('invoice_user');
//請求者会員請求書を作成する
Route::get('/invoice/pdf}', [\App\Http\Controllers\InvoiceRegisterController::class, 'post'])->name('user_pdf');

//国会議員監視サイトトップページ
Route::get('/diet/index', [\App\Http\Controllers\DietController::class, 'index'])->name('diet_index');
//国会議員一覧
Route::get('/diet/all', [\App\Http\Controllers\DietController::class, 'all'])->name('diet_all');
//党ごと一覧
Route::get('/diet/party/{id}', [\App\Http\Controllers\DietController::class, 'party'])->name('diet_party');
//ビンゴ一覧
Route::get('/diet/bingo', [\App\Http\Controllers\DietController::class, 'bingo'])->name('diet_bingo');
//裏金議員
Route::get('/diet/bribe', [\App\Http\Controllers\DietController::class, 'bribe'])->name('diet_bribe');
//統一教会
Route::get('/diet/cult', [\App\Http\Controllers\DietController::class, 'cult'])->name('diet_cult');
//議員毎ページ表示
Route::get('/diet/each/{id}', [\App\Http\Controllers\DietController::class, 'each'])->name('diet_each') ;
//議員毎ページ表示
Route::get('/diet/each_done/{id}', [\App\Http\Controllers\DietController::class, 'each_done'])->name('diet_each_done') ;
//情報提供
Route::post('/diet/each/{id}', [\App\Http\Controllers\DietController::class, 'post'])->name('diet_post');

//並び替え
Route::get('/diet/sort}', [\App\Http\Controllers\DietController::class, 'sort'])->name('diet_sort');
//並び替え
Route::get('/diet/party_sort/{id}/average/{average}', [\App\Http\Controllers\DietController::class, 'party_sort'])->name('diet_party_sort');
//検索
Route::get('/diet/search}', [\App\Http\Controllers\DietController::class, 'search'])->name('diet_search');
//党内検索
Route::get('/diet/search/{id}}', [\App\Http\Controllers\DietController::class, 'search_party'])->name('diet_search_party');
/*選択したユーザーを編集する*/
Route::patch('/diet/update/{id}', [App\Http\Controllers\DietController::class, 'update'])->name('update_diet');

Route::get('/diet/approve', [\App\Http\Controllers\DietController::class, 'approve']);

//管理者が投稿を承認する
Route::post('/diet/approve/{id}', [\App\Http\Controllers\DietController::class, 'approvePost'])->name('diet_approve')->middleware('auth:admin');
/*選択したテストを削除する*/
Route::get('/diet/approve/{id}', [App\Http\Controllers\DietController::class, 'delete_link'])->name('delete_link');
//悪いねボタン
Route::get('/diet/bad/{id}', [App\Http\Controllers\DietController::class, 'bad'])->name('bad');
//比較ページ
Route::get('/diet/compare', [App\Http\Controllers\DietController::class, 'chart'])->name('chart');
//選挙向けページ
Route::get('/diet/next/{id}', [App\Http\Controllers\DietController::class, 'next'])->name('next');
//サイトマップ
Route::get('sitemap.xml', [App\Http\Controllers\SitemapController::class, 'index' ])->name('get.sitemap');

//ギフトカードトップページ
Route::get('/gift/index', [App\Http\Controllers\GiftController::class, 'index'])->name('gift_index');
//ギフトカード購入
Route::post('/gift/index', [App\Http\Controllers\GiftController::class, 'purchase'])->name('gift_purchase');
//ギフトカードメールで送信
Route::post('/gift/mail', [App\Http\Controllers\GiftController::class, 'mail'])->name('gift_mail');
//ギフトカードlineで送信
Route::post('/gift/line', [App\Http\Controllers\GiftController::class, 'line'])->name('gift_line');
//ギフトカード利用ページ表示（客）
Route::get('/gift/used', [App\Http\Controllers\GiftController::class, 'used'])->name('gift_used');
//ギフトカードスキャン画面表示（店）
Route::get('/gift/store', [App\Http\Controllers\GiftController::class, 'store'])->name('gift_store');
Route::post('/gift/store', [App\Http\Controllers\GiftController::class, 'store_used'])->name('gift_store_used');

//法定相続一覧表トップページ
Route::get('inheritance/top', function () {
    return view('inheritance/top');
});
Route::post('inheritance/top', [App\Http\Controllers\PDFController::class, 'select'])->name('inheritance_select');

//法定相続一覧入力ページ
Route::get('inheritance/create', [App\Http\Controllers\PDFController::class, 'input'])->name('inheritance_input');

//法定相続一覧作成
Route::get('pdf_i/{id}', [App\Http\Controllers\PDFController::class, 'pdf_in'])->name('pdf_in');
