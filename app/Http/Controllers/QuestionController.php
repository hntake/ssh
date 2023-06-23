<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Question;
use App\Models\Store;


class QuestionController extends Controller
{
     /**全リスト */
     public function list()
     {

         $questions = Question::where('store', '=', Auth::user()->email)->orderBy('created_at', 'desc')->paginate(10);

         return view('customer/list', [
             'questions' => $questions,
         ]);
     }
     /*選択したテスト表示*/
     public function each(Request $request, $id)
     {
         $question = Question::where('id', $request->id)->first();
         return view('test', [
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
        $questions = Question::where('id', $request->id)->get();
        return view('create', [
            'questions' => $questions,
        ]);
    }
    /**
     * アンケート送信
     *
     * @param  Request  $request
     * @return Response
     */
    public function create(Request $request)
    {

        $validate = $request->validate([
            'q1' => 'required',
            'q2' => 'required',
            'q3' => 'required',
            'q4' => 'required',
            'q5' => 'required',
            'q6' => 'required',


        ]);

        //テーブルへの受け渡し
        $question = new Question;
        $question->q1 = $request->q1;
        $question->q2 = $request->q2;
        $question->q3 = $request->tq3;
        $question->q4 = $request->tq4;
        $question->q5 = $request->q5;
        $question->q6 = $request->q6;
        $question->category = $request->category;
        $question->store = User::where('id', '=', Auth::id())
            ->value('email');
        $question->save();

        $questions = Question::where('store', '=', Auth::user()->email)->orderBy('created_at', 'desc')->paginate(15);
        return view('customer/list', [
            'questions' => $questions,
        ]);

    }
     /**
     * 選択したリストを編集
     *
     * @param Request $request
     * @return Response
     */
    public function edit(Request $request, $id)
    {
        $question = Question::where('id', $request->id)->first();
        return view('edit', [
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
    public function delete_list(Request $request)
    {
        $question = Question::where('id', $request->id)->delete();
        return redirect('profile');
    }
}
