<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Question;
use App\Models\AdminUser;
use App\Models\Store;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;




class QuestionController extends Controller
{
     /**全リスト */
     public function list($store)
     {
        $questions = Question::where('store',$store)->orderBy('created_at', 'desc')->paginate(10);

         return view('customer/list', [
             'questions' => $questions,
             'store'=>$store,
         ]);
     }
     /*選択したアンケート表示*/
     public function each(Request $request, $id)
     {
         $question = Question::where('id', $request->id)->first();
         return view('customer/each', [
             'id' => $id,
             'question' => $question,
         ]);
     }
 /**
     * 新規作成画面へ遷移
     *
     * @param Request $request
     * @return Response
     */
    public function create_index(Request $request)
    {

        $store=Store::where('email',Auth::user()->email)->value('name');
        return view('/customer/create', [
            'store' => $store,
        ]);
    }

    /**
     * アンケート送信
     *
     * @param  Request  $request
     * @return Response
     */
    public function question(Request $request)
    {
        $validate = $request->validate([
            'q1' => 'required',
            'q2' => 'required',
            'q3' => 'required',
            'q4' => 'required',
            'q5' => 'required',
            'q6' => 'required',
        ]);
        $store=Store::where('email',Auth::user()->email)->value('name');
        //テーブルへの受け渡し
        $question = new Question;
        $question->name = $request->name;
        $question->q1 = $request->q1;
        $question->q2 = $request->q2;
        $question->q3 = $request->q3;
        $question->q4 = $request->q4;
        $question->q5 = $request->q5;
        $question->q6 = $request->q6;
        $question->category = $request->category;
        $question->store =$store;
        $question->area =$request->area;
        $question->save();
        $admin= Auth::user();
        $questions = Question::orderBy('created_at', 'desc')->paginate(15);
        return view('customer/list', [
            'questions' => $questions,
            'admin'=>$admin,
            'store'=>$store,
        ]);
    }

     /**
     * 写真アップロード画面へ
     *
     * @param Request $request
     * @return Response
     */
    public function picture(Request $request, $id)
    {
        $question = Question::where('id', $request->id)->first();
        return view('customer/edit_picture', [
            'id' => $id,
            'question' => $question,
        ]);
    }
     /**
     * 写真アップロード
     *
     * @param Request $request
     * @return Response
     */
    public function upload(Request $request,$id)
    {
         // 画像ファイルインスタンス取得
        // 現在の画像へのパスをセット
        $uploadImg = $request->image;
        $filePath = $uploadImg->store('public');
        $data['image'] = str_replace('public/', '', $filePath);

        // 現在の画像ファイルの削除
        $user = Question::where('id', $id)->pluck('image');

        Storage::disk('public')->delete($user[0]);
        // 選択された画像ファイルを保存してパスをセット

        // データベースを更新
        $question = Question::find($id);
        // if (array_key_exists('image', $user)) {

        $question->update([
            'image' => $data['image']
        ]);

        return view('customer/each', [
            'id' => $id,
            'question' => $question,
        ])->with('status','画像を変更しました！');
    }
     /**
     * 編集画面へ
     *
     * @param Request $request
     * @return Response
     */
    public function edit(Request $request, $store)
    {
        $questions = Question::where('store',$store)->orderBy('created_at', 'desc')->paginate(10);

        return view('customer/edit', [
            'questions' => $questions,
            'store'=>$store,

        ]);
    }
     /**
     * 選択したリストを編集画面へ
     *
     * @param Request $request
     * @return Response
     */
    public function edit_each(Request $request, $id)
    {
        $question = Question::where('id', $request->id)->first();
        return view('customer/edit_each', [
            'id' => $id,
            'question' => $question,
        ]);
    }
     /**
     * 選択したリストを編集する
     *
     * @param Request $request
     * @return Response
     */
    public function update_each(Request $request, $id)
    {
        $question = Question::find($id);
        $question->name = $request->input('name');
        $question->category = $request->input('category');
        $question->area = $request->input('area');
        $question->save();

        return view('customer/each', [
            'id' => $id,
            'question' => $question,
        ]);
    }
    /**
     * 選択したリストを削除
     *
     * @param Request $request
     * @return Response
     */
    public function delete(Request $request,$id)
    {
        $store=Question::where('id',$id)->value('store');
        $questions = Question::where('store',$store)->orderBy('created_at', 'desc')->paginate(10);
        Question::where('id', $request->id)->delete();
        return view('customer/list', [
            'id' => $id,
            'questions' => $questions,
            'store' => $store,
        ]);
    }
    /**
     * 選択した写真を削除
     *
     * @param Request $request
     * @return Response
     */
    public function delete_pic($id)
    {
        $path =Question::where('id', $id)->pluck('image');
        if (isset($path)) {
            $question = Question::find($id);
            $question->update([
                'image' => ''
            ]);
            }
            return view('customer/each', [
                'id' => $id,
                'question' => $question,
            ]);
        }
     }
