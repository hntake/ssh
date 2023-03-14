<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Word;
use App\Models\User;
use App\Models\Nice;
use App\Models\History;
use App\Models\Later;
use App\Models\Comment;
use Illuminate\Support\Facades\Auth;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Storage;
use Carbon\Carbon;



class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }




    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $count = History::where('tested_user',  '=', Auth::user()->user_name)->count();
        /*テスト未利用の場合*/
        if ($count === 0) {

            $user = Auth::user();
            $comment = $user->comment;
            $words = Word::orderBy('created_at', 'desc')->paginate(10);
            return view('all_list', [
                'words' => $words,
                'user' =>$user,
                'comment'=>$comment,
            ]);
        }
        /*MyHome*/ else {
            $date = Carbon::today()->subDay(7);

            $user = Auth::user();
            /**ポイント数からレベルを判定 */
            $point = $user->point;
            $level = $user->level;
            $user->level=intdiv($point, 100);
            /**My履歴 */
            $test_ids = History::where('tested_user', '=', Auth::user()->user_name)->get()->pluck('test_id')->toArray();
            $words = Word::whereIn('id', $test_ids)->OrderBy('id', 'desc')->paginate(10);
            /**あとで */
            $later= Later::where('created_user','=', Auth::user()->id)->get()->pluck('later_test')->toArray();
            $later_tests=Word::whereIn('id', $later)->orderBy('created_at', 'desc')->paginate(10);
            /**MyScore */
            $user_name =Auth::user()->user_name;
            $histories = History::where('tested_user', '=',$user_name)->whereIn('test_id', $test_ids)->OrderBy('created_at', 'desc')->paginate(10);
            /*MYフォロー*/
            $follows = Nice::where('user_id','=', Auth::user()->id)->get()->pluck('created_user')->toArray();/*自分がフォローしているユーザー名を取得*/
            $ftests = Word::whereIn('user_name', $follows)->orderBy('created_at', 'desc')->paginate(10);/*取得したユーザー名が一致するテストを取得する
            /**おススメ */
            if($user->year  == "中1"){
                $counts= Word::where('type','=','2')->orderBy('count', 'desc')->paginate(10);
            }
            elseif($user->year  == "中2"){
                $counts= Word::where('type','=','3')->orderBy('count', 'desc')->paginate(10);
            }
            elseif($user->year  ==  "中3"){
                $counts= Word::where('type','=','4')->orderBy('count', 'desc')->paginate(10);
            }
            elseif($user->year  ==  "高1"){
                $counts= Word::where('type','=','5')->orderBy('count', 'desc')->paginate(10);
            }
            elseif($user->year  ==  "高2"){
                $counts= Word::where('type','=','6')->orderBy('count', 'desc')->paginate(10);
            }
            elseif($user->year  ==  "高3"){
                $counts= Word::where('type','=','7')->orderBy('count', 'desc')->paginate(10);
            }
            elseif($user->year  ==  "未選択"){
                $counts= Word::where('type','=','8')->orderBy('count', 'desc')->paginate(10);
            }
            else{
                $counts= Word::where('type','=','1')->orderBy('count', 'desc')->paginate(10);
            }
            return view('home', [
                'user'=>$user,
                'words' => $words,
                'follows' => $follows,
                'ftests' => $ftests,
                'counts' => $counts,
                'date' => $date,
                'histories'=>$histories,
                'later_tests'=>$later_tests,

            ]);
        }
    }

    /*プロフィールページ*/
    public function profile(Request $request)
    {
        $user = Auth::user();


        /**ポイント数からレベルを判定 */
        $point = $user->point;
        $level = $user->level;
        $user->level=intdiv($point, 100);

        /**wordテーブルのuser_nameとログインしているuser_nameが一致している */
        $words = Word::where('user_name', '=', Auth::user()->user_name)->orderBy('created_at', 'desc')->get();
        /*フォロワー数表示*/
        $count = Nice::where('created_id',  '=', Auth::user()->id)->count();
        /*フォロー一覧表示*/
        $followers = Nice::where('user_id', '=', Auth::user()->id)->get()->pluck('created_user')->toArray();

        $niceids=User:: whereIn('user_name', $followers)->get()->pluck('id')->toArray();
        $images=User:: whereIn('user_name', $followers)->get()->pluck('image')->toArray();
        return view('profile', [
            'user' => $user,
            'words' => $words,
            'count' =>$count,
            'followers' =>$followers,
            'niceids'=>$niceids,
            'images'=>$images,
        ]);
    }

    /**
     * 選択したユーザーの編集画面へ
     *
     * @param Request $request
     * @return Response
     */
    public function edit_user(Request $request, $id)
    {
        $user = User::where('id', $request->id)->first();
        return view('edit_user', [
            'id' => $id,
            'user' => $user,
        ]);
    }
    /**
     * 選択したユーザーを編集する
     *
     * @param Request $request
     * @return Response
     */
    public function update(Request $request, $id)
    {
        $users = User::find($id);
        $users->user_name = $request->input('user_name');
        $users->place = $request->input('place');
        $users->year = $request->input('year');
        $users->school1 = $request->input('school1');
        $users->school2 = $request->input('school2');
        $users->email = $request->input('email');
        $users->game_id = $request->input('game_id');
        $users->save();

        return redirect('profile');
    }
    /**
     * 選択したtestを編集する
     *
     * @param Request $request
     * @return Response
     */
    public function update_test(Request $request, $id)
    {
        $word = Word::find($id);
        $word->test_name = $request->input('test_name');
        $word->ja1 = $request->input('ja1');
        $word->en1 = $request->input('en1');
        $word->ja2 = $request->input('ja2');
        $word->en2 = $request->input('en2');
        $word->ja3 = $request->input('ja3');
        $word->en3 = $request->input('en3');
        $word->ja4 = $request->input('ja4');
        $word->en4 = $request->input('en4');
        $word->ja5 = $request->input('ja5');
        $word->en5 = $request->input('en5');
        $word->ja6 = $request->input('ja6');
        $word->en6 = $request->input('en6');
        $word->ja7 = $request->input('ja7');
        $word->en7 = $request->input('en7');
        $word->ja8 = $request->input('ja8');
        $word->en8 = $request->input('en8');
        $word->ja9 = $request->input('ja9');
        $word->en9 = $request->input('en9');
        $word->ja10 = $request->input('ja10');
        $word->en10 = $request->input('en10');

        $word->save();

        return redirect('profile');
    }
    /**
     * 選択したユーザーの写真編集画面へ
     *
     * @param Request $request
     * @return Response
     */
    public function edit_picture(Request $request, $id)
    {
        $user = User::where('id', $request->id)->first();
        return view('edit_picture', [
            'id' => $id,
            'user' => $user,
        ]);
    }
    /**
     * 選択したユーザーの写真追加変更
     *
     * @param Request $request
     * @return Response
     */
    public function uploadpic(Request $request)
    {
        // 画像ファイルインスタンス取得
        // 現在の画像へのパスをセット
        $uploadImg = $request->image;
        $filePath = $uploadImg->store('public');
        $data['image'] = str_replace('public/', '', $filePath);

        // 現在の画像ファイルの削除
        $user = User::where('id', Auth::id())->pluck('image');

        Storage::disk('public')->delete($user[0]);
        // 選択された画像ファイルを保存してパスをセット

        // データベースを更新
        $user = User::find(Auth::id());
        // if (array_key_exists('image', $user)) {

        $user->update([
            'image' => $data['image']
        ]);

        return redirect()->route('profile')->with('status','画像を変更しました！');
    }


    /**
     * 選択したユーザーの写真を削除
     *
     * @param Request $request
     * @return Response
     */
    public function deletepic($id)
    {
        $path = User::where('id', Auth::id())->pluck('image');
        if (isset($path)) {
            $user = User::find(Auth::id());
            $user->update([
                'image' => ''
            ]);
            }

            /* $user =User::where('id', $request->id)->value('image'); */

            return redirect('profile');
    }

    /**
     * 選択したユーザーを削除
     *
     * @param Request $request
     * @return Response
     */
    public function delete_user(Request $request)
    {
        $user = User::where('id', $request->id)->delete();
        return redirect('home')->with('success', '登録を削除しました');
    }

    /*フォロー登録*/
    public function nice(Request $request,$id){
        $user = User::find($id);
        $nice=New Nice();
        $nice->created_id=$user->id;
        $nice->created_user=$user->user_name;
        $nice->user_id=Auth::user()->id;
        $nice->save();
        return back();
    }
    public function unnice(Word $word, Request $request){
        $user=Auth::user()->id;
        $nice=Nice::where('created_id', $request->id)->where('user_id', $user)->first();
        $nice->delete();
        return back();
    }


}
