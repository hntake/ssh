<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Word;
use App\Models\User;
use App\Models\Nice;
use App\Models\History;
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
        /*テスト未利用の場合*/
        if (Auth::user()->point === 0) {

            $words = Word::orderBy('created_at', 'desc')->paginate(10);
            return view('all_list', [
                'words' => $words,
            ]);
        }
        /*自分の利用履歴*/ else {
            /**My履歴 */
            $user = Auth::user();
            $test_ids = History::where('tested_user', '=', Auth::user()->user_name)->get()->pluck('test_id')->toArray();

            $words = Word::whereIn('id', $test_ids)->paginate(15);
            /*MYフォロー*/
            $follows = Nice::where('user_id','=',$user->id)->get()->pluck('created_id')->toArray();
            $fids = User::where('id','=',$follows)->get()->pluck('user_name')->toArray();
            $ftests = Word::where('user_name','=', $fids)->orderBy('created_at', 'desc')->paginate(10);
            /**おススメ */
            if($user->year  == "中１"){
                $counts= Word::where('type','=','2')->orderBy('count', 'desc')->paginate(10);
            }
            elseif($user->year  == "中２"){
                $counts= Word::where('type','=','3')->orderBy('count', 'desc')->paginate(10);
            }
            elseif($user->year  ==  "中３"){
                $counts= Word::where('type','=','4')->orderBy('count', 'desc')->paginate(10);
            }
            elseif($user->year  ==  "高１"){
                $counts= Word::where('type','=','5')->orderBy('count', 'desc')->paginate(10);
            }
            elseif($user->year  ==  "高２"){
                $counts= Word::where('type','=','6')->orderBy('count', 'desc')->paginate(10);
            }
            elseif($user->year  ==  "高３"){
                $counts= Word::where('type','=','7')->orderBy('count', 'desc')->paginate(10);
            }
            elseif($user->year  ==  "未選択"){
                $counts= Word::where('type','=','8')->orderBy('count', 'desc')->paginate(10);
            }
            else{
                $counts= Word::where('type','=','1')->orderBy('count', 'desc')->paginate(10);
            }

            return view('home', [
                'words' => $words,
                'ftests' => $ftests,
                'counts' => $counts,
            ]);
        }
    }
    public function id_view( Request $request, $id)
    {
            $user = User::where('id', '=',$id)->pluck('user_name');
            $test_ids = History::where('tested_user', '=',$user)->get()->pluck('test_id')->toArray();
            $histories = History::where('school', '=', Auth::user()->school)->where('tested_user', '=',$user)->whereIn('test_id', $test_ids)->OrderBy('created_at', 'desc')->paginate(15);
            return view('id_view', [
                'histories' => $histories,
            ]);
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
        $follower = Nice::where('user_id', '=', Auth::user()->id)->pluck('created_id')->toArray();
        $nices =User:: where('id', '=',$follower)->pluck('user_name')->toArray();
        $niceids=User:: where('id', '=',$follower)->pluck('id')->toArray();
        $images=User:: where('id', '=',$follower)->pluck('image')->toArray();
        return view('profile', [
            'user' => $user,
            'words' => $words,
            'count' =>$count,
            'nices' =>$nices,
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
        $users->save();

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
    /*==================================
   ユーザー検索メソッド(searchproduct)
    ==================================*/
    public function search_user(Request $request)
    {
            $keyword = $request->input('keyword');

            $query = User::query();

            if(!empty($keyword)) {
                $query->where('user_name', 'LIKE', "%{$keyword}%");
            }


        //$queryをtype_idの昇順に並び替えて$productsに代入
        $users = $query->orderBy('id', 'asc')->paginate(15);


        return view('search_user', [
            'users' => $users,
        ]);
    }
    /*フォロー登録*/
    public function nice(Request $request,$id){
        $nice=New Nice();
        $nice->created_id=$request->id;
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
