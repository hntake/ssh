<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Word;
use App\Models\User;
use App\Models\History;
use Illuminate\Support\Facades\Auth;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Storage;



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

            $words = Word::orderBy('created_at')->paginate(10);
            return view('all_list', [
                'words' => $words,
            ]);
        }
        /*自分の利用履歴*/ else {
            $user = Auth::user();
            $test_ids = History::where('tested_user', '=', Auth::user()->user_name)->get()->pluck('test_id')->toArray();

            $words = Word::whereIn('id', $test_ids)->paginate(15);
            return view('home', [
                'words' => $words,
            ]);
        }
    }
    /**全リスト */
    public function list()
    {
        $words = Word::orderBY('created_at')->paginate(10);
        return view('all_list', [
            'words' => $words,
        ]);
    }
    /*プロフィールページ*/
    public function profile(Request $request)
    {
        $user = Auth::user();


        /**ポイント数からレベルを判定 */
        $point = $user->point;
        $level = $user->level;
         if($point>100){
             $user->level=1;
         }
         elseif($point>200){
             $user->level=2;
         }
         elseif($point>300){
             $user->level=3;
         }
         elseif($point>400){
             $user->level=4;
         }
         elseif($point>500){
             $user->level=5;
         }
         elseif($point>600){
             $user->level=6;
         }
         elseif($point>700){
             $user->level=7;
         }
         elseif($point>800){
             $user->level=8;
         }
         elseif($point>900){
             $user->level=9;
         }
         elseif($point>1000){
             $user->level=10;
         }
        /**wordテーブルのuser_nameとログインしているuser_nameが一致している */
        $words = Word::where('user_name', '=', Auth::user()->user_name)->get();
        return view('profile', [
            'user' => $user,
            'words' => $words,
        ]);
    }
    public function mypicture(Request $request, $id)
    {
        $user = User::where('id', $request->id)->first();
        $words = Word::where('user_name', '=', $user->user_name)->get();
        return view('mypicture', [
            'user' => $user,
            'words' => $words,
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
        $users->school = $request->input('school');
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
    検索メソッド(searchproduct)
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
}
