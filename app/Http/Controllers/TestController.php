<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Word;
use App\Models\Type;
use App\Models\User;
use App\Models\Nice;
use App\Models\Textbook;
use App\Models\History;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB; // DB ファサードを use する
use Illuminate\Pagination\Paginator;
use Carbon\Carbon;

class TestController extends Controller
{
    /**全リスト */
    public function list()
    {
        $date = Carbon::now();
        $words = Word::orderBy('created_at', 'desc')->paginate(10);
        return view('all_list', [
            'words' => $words,
            'date' =>$date,
       ]);
    }
    /*選択したテスト表示*/
    public function test(Request $request, $id)
    {
        $word = Word::where('id', $request->id)->first();
        return view('test', [
            'id' => $id,
            'word' => $word,
        ]);
    }
    /*全履歴*/
    public function history(Request $request)
    {
        $histories = History::orderBy('created_at', 'desc')->paginate(15);
        return view('history', [
            'histories' => $histories,

        ]);
    }

    /*学校ごと履歴*/
    public function by_school(Request $request)
    {
        $histories = History::where('school', '=', Auth::user()->school)->orderBy('created_at')->paginate(5);
        $users = User::where('school1', '=', Auth::user()->school)->orWhere('school2', '=', Auth::user()->school)->orderBy('point', 'desc')->paginate(15);
        return view('admin', [
            'histories' => $histories,
            'users' => $users,
        ]);
    }
    /*個別データ検索へ*/
    public function individual(Request $request,$id)
    {
        /*入力ワード受け取り*/
        $searchWord = $request->input('searchWord');
        /*検索対象データ*///クエリ生成
        $query = User::where('school1', '=', $id)->orWhere('school2', '=', $id);
        //名前が入力された場合、ユーザーテーブルから一致する名前を$queryに代入
        if(!empty($searchWord)) {
            $query = User::where('name', 'LIKE', "%{$searchWord}%")->where('school1', '=', $id)->orWhere('school2', '=', $id);
        }
        //$queryをtuser_idの昇順に並び替えて$usersに代入
        $users = $query->orderBy('id', 'desc')->paginate(10);


        return view('individual', [
            'id' => $id,
            'users' => $users,
            'searchWord' => $searchWord,
        ]);
    }

    /*データ抽出*/

    public function select_today(Request $request, $id)
    {
        $date = new Carbon('now');
        $results = History::where('school', '=', $id)->whereDate('created_at', '>=', $date->subDay())->get();
        return view('select_result', [
            'results' => $results,
        ]);
    }
    public function select_week(Request $request, $id)
    {
        $sevendays = Carbon::today()->subDay(7);
        $results = History::where('school', '=', $id)->whereDate('created_at', '>=', $sevendays)->get();
        return view('select_result', [
            'results' => $results,
        ]);
    }
    public function select_twoweeks(Request $request, $id)
    {
        $twoweeks = Carbon::today()->subDay(14);
        $results = History::where('school', '=', $id)->whereDate('created_at', '>=', $twoweeks)->get();
        return view('select_result', [
            'results' => $results,
        ]);
    }
    public function select_month(Request $request, $id)
    {
        $date = new Carbon('now');
        $results = History::where('school', '=', $id)->whereDate('created_at', '>=', $date->subMonth())->get();
        return view('select_result', [
            'results' => $results,
        ]);
    }


    /**
     * 採点ボタン→①履歴作成②テスト採点③ポイント付与
     * @param  Request  $request
     * @return Response
     */
    public function result(Request $request, $id)
    {

        $validate = $request->validate([
            'en1' => 'required|max:25',
            'en2' => 'required|max:25',
            'en3' => 'required|max:25',
            'en4' => 'required|max:25',
            'en5' => 'required|max:25',
            'en6' => 'required|max:25',
            'en7' => 'required|max:25',
            'en8' => 'required|max:25',
            'en9' => 'required|max:25',
            'en10' => 'required|max:25',

        ]);



        /**テスト採点 */
        $words = Word::all();
        foreach ($words as $words) {
            $words = Word::where('id', $id)->first();

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
        $tspoint = Word::find($request->user_name);
        $crpoint = User::where('user_name', '=', $tspoint->user_name)->value('point');
        $crnewpoint = $crpoint + 1;
        $crpoint = User::where('user_name', '=', $tspoint->user_name)
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

        /*ログインしていたら*/
        if (Auth::check()) {
            /**テスト実践によるポイント付与 */
            $point = User::where('id', '=', Auth::id())
                ->value('point');
            if ($score > 8) {
                $newpoint = $point + 3;
            } elseif ($score > 5) {
                $newpoint = $point + 2;
            } else {
                $newpoint = $point + 1;
            }
            $point = User::where('id', '=', Auth::id())
                ->update([
                    'point' => $newpoint
                ]);
            /*履歴作成*/
            $word = Word::find($id);
            $user = Auth::user();
            $history = new History;
            $history->test_id = $word->id;
            $history->type = $word->type;
            $history->textbook = $word->textbook;
            $history->test_name = $word->test_name;
            $history->user_name = $word->user_name;
            $history->tested_user = $user->user_name;
            $history->tested_name = $user->name;
            $history->school = $user->school1;
            $history->score = $score;
            $history->save();
            if (isset($user->school2)) {
                $history = new History;
                $history->test_id = $word->id;
                $history->type = $word->type;
                $history->textbook = $word->textbook;
                $history->test_name = $word->test_name;
                $history->user_name = $word->user_name;
                $history->tested_user = $user->user_name;
                $history->tested_name = $user->name;
                $history->school = $user->school2;
                $history->score = $score;
                $history->save();
            }

            return view('result', [
                'id' => $id,
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

            ]);
        }
        /*非ログインなら*/ else {
            $word = Word::find($id);
            $history = new History;
            $history->test_id = $word->id;
            $history->type = $word->type;
            $history->textbook = $word->textbook;
            $history->test_name = $word->test_name;
            $history->user_name = $word->user_name;
            $history->tested_user = "非ユーザー";
            $history->tested_name = "非ユーザー";
            $history->school = "非ユーザー";
            $history->save();
        }
        return view('result', [
            'id' => $id,
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
        ]);
    }

    public function answer(Request $request, $id)
    {
        $word = Word::where('id', $request->id)->first();
        return view('answer', [
            'id' => $id,
            'word' => $word,
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
        $words = Word::where('id', $request->id)->get();
        $types = Type::all()->pluck('type', 'id');
        $textbooks = Textbook::all()->pluck('textbook', 'id');
        return view('create', [
            'words' => $words,
            'types' => $types,
            'textbooks' => $textbooks,
        ]);
    }
    /**
     * 新しいテストを作成し保存＆ポイント付与
     *
     * @param  Request  $request
     * @return Response
     */
    public function create(Request $request)
    {

        $validate = $request->validate([
            'type' => 'required',
            'textbook' => 'required',
            'test_name' => 'required|max:25',
            'ja1' => 'required|max:25',
            'ja2' => 'required|max:25',
            'ja3' => 'required|max:25',
            'ja4' => 'required|max:25',
            'ja5' => 'required|max:25',
            'ja6' => 'required|max:25',
            'ja7' => 'required|max:25',
            'ja8' => 'required|max:25',
            'ja9' => 'required|max:25',
            'ja10' => 'required|max:25',
            'en1' => 'required|max:25',
            'en2' => 'required|max:25',
            'en3' => 'required|max:25',
            'en4' => 'required|max:25',
            'en5' => 'required|max:25',
            'en6' => 'required|max:25',
            'en7' => 'required|max:25',
            'en8' => 'required|max:25',
            'en9' => 'required|max:25',
            'en10' => 'required|max:25',

        ]);

        //wordsテーブルへの受け渡し
        $word = new Word;
        $word->type = $request->type;
        $word->textbook = $request->textbook;
        $word->test_name = $request->test_type . $request->test_name;
        $word->user_name = User::where('id', '=', Auth::id())
            ->value('user_name');
        $word->ja1 = $request->ja1;
        $word->ja2 = $request->ja2;
        $word->ja3 = $request->ja3;
        $word->ja4 = $request->ja4;
        $word->ja5 = $request->ja5;
        $word->ja6 = $request->ja6;
        $word->ja7 = $request->ja7;
        $word->ja8 = $request->ja8;
        $word->ja9 = $request->ja9;
        $word->ja10 = $request->ja10;
        $word->en1 = $request->en1;
        $word->en2 = $request->en2;
        $word->en3 = $request->en3;
        $word->en4 = $request->en4;
        $word->en5 = $request->en5;
        $word->en6 = $request->en6;
        $word->en7 = $request->en7;
        $word->en8 = $request->en8;
        $word->en9 = $request->en9;
        $word->en10 = $request->en10;
        $word->save();
        /**作成によるポイント付与 */
        $point = User::where('id', '=', Auth::id())
            ->value('point');

        $newpoint = $point + 3;
        $point = User::where('id', '=', Auth::id())
            ->update([
                'point' => $newpoint
            ]);

        $words = Word::orderBy('created_at', 'desc')->paginate(15);
        $user = Auth::user();
        $count = Nice::where('created_id',  '=', Auth::user()->id)->count();
        $follower = Nice::where('user_id', '=', Auth::user()->id)->pluck('created_id')->toArray();
        $nices = User::where('id', '=', $follower)->pluck('user_name')->toArray();
        $point = $newpoint;
        return redirect('all_list');
        /*    return view('profile', [
            'words'=>$words,
            'user'=>$user,
            'count'=>$count,
            'nices'=>$nices,
            'point'=>$point
        ]); */
    }

    /**
     * キーワード受け取り
     *
     * @param Request $request
     * @return Response
     */
    #
    /**検索画面へ */
    public function show(Request $request)
    {
        //フォームを機能させるために各情報を取得し、viewに返す
        $searchWord = $request->input('searchWord');
        $typeId = $request->input('typeId');

        return view('search_result', [
            'searchWord' => $searchWord,
            'typeId' => $typeId
        ]);
    }

    /*==================================
    検索メソッド(searchproduct)
    ==================================*/
    public function search_result(Request $request)
    {
        //入力される値nameの中身を定義する
        $searchWord = $request->input('searchWord'); //商品名の値
        $typeId = $request->input('typeId'); //カテゴリの値
        $textbookId = $request->input('textbookId'); //カテゴリの値

        $query = Word::query();
        /*  $date = Carbon::now();
        $hour =$date->addHour(6);
        $query=$query->where('created_at','<',$hour); */
        //商品名が入力された場合、m_productsテーブルから一致する商品を$queryに代入
        if (isset($searchWord)) {
            $query->where('test_name', 'like', '%' . self::escapeLike($searchWord) . '%');
        }
        //カテゴリが選択された場合、m_categoriesテーブルからtype_idが一致する商品を$queryに代入
        if (isset($typeId)) {
            $query->where('type', $typeId);
        }
        if (isset($textbookId)) {
            $query->where('textbook', $textbookId);
        }

        //$queryをtype_idの昇順に並び替えて$productsに代入
        $words = $query->orderBy('id', 'desc')->paginate(10);

        //m_categoriesテーブルからgetLists();関数でtype_nameとidを取得する
        $types = Type::pluck('type', 'id');
        $textbooks = Textbook::pluck('textbook', 'id');

        return view('search_result', [
            'words' => $words,
            'types' => $types,
            'textbooks' => $textbooks,
            'searchWord' => $searchWord,
            'typeId' => $typeId,
            'textbookId' => $textbookId
        ]);
    }

    //「\\」「%」「_」などの記号を文字としてエスケープさせる
    public static function escapeLike($str)
    {
        return str_replace(['\\', '%', '_'], ['\\\\', '\%', '\_'], $str);
    }

    /*並び替え機能*/
    public function sort(Request $request)
    {
        $select = $request->narabi;
        if ($select == 'asc') {
            $words = Word::orderBy('created_at', 'asc')->paginate(15);
        } elseif ($select == 'desc') {
            $words = Word::orderBy('created_at', 'desc')->paginate(15);
        } else {
            $words = Word::all();
        }
        /*  dd($select); */
        return view('all_list', compact('words'));
    }
    /**
     * 選択したリストを編集
     *
     * @param Request $request
     * @return Response
     */
    public function edit(Request $request, $id)
    {
        $word = Word::where('id', $request->id)->first();
        return view('edit', [
            'id' => $id,
            'word' => $word,
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
        $word = Word::where('id', $request->id)->delete();
        return redirect('profile');
    }
}
