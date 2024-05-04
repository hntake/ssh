<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Diet;
use App\Models\Link;
use App\Models\Genre;
use Carbon\Carbon;


class DietController extends Controller
{
    //トップページ表示
    public function index(){

        $diets = Diet::orderBy('scandal', 'desc')->paginate(50);

         // 順位を計算
        $rank = 0;
        $previousValues = null;
        $currentRank = 1;
        foreach ($diets as $diet) {
            if ($diet->scandal !== $previousValues) {
                $previousValues = $diet->scandal;
                $rank += $currentRank;
                $currentRank = 1;
            }
            $diet->rank = $rank;

              // 同順の次の順位を計算
            $nextValues = $diets->where('rank', '>', $rank)->first();
            if ($nextValues) {
                $nextRank = $nextValues->rank;
            } else {
                $nextRank = $rank + 1;
            }

            if ($diet->birthDay !== 0) {
                $birthday=$diet->birthDay;
                $diet->age = Carbon::parse($birthday)->age;
            } else {
                 // データがnullの場合、年齢をnullとするか、他の値に設定する
                $diet->age = null;
            }
    }

        $select='scandal';
        return view('diet/index', [
            'diets' => $diets,
            'select'=>$select,
        ]);
    }

    //党ごとのページ表示
    public function party($id){
        if($id=='jimin'){
            $diets = Diet::where('party','=', '自民')->orderBy('scandal', 'desc')->paginate(50);
        }elseif($id=='koumei'){
            $diets = Diet::where('party','=', '公明')->orderBy('scandal', 'desc')->paginate(50);
        }elseif($id=='rikken'){
            $diets = Diet::where('party','=', '立憲')->orderBy('scandal', 'desc')->paginate(50);
        }elseif($id=='ishin'){
            $diets = Diet::where('party','=', '維教')->orderBy('scandal', 'desc')->paginate(50);
        }elseif($id=='kyousan'){ 
            $diets = Diet::where('party','=', '共産')->orderBy('scandal', 'desc')->paginate(50);
        }elseif($id=='kokumin'){ 
            $diets = Diet::where('party','=', '民主')->orderBy('scandal', 'desc')->paginate(50);
        }elseif($id=='reiwakoumei'){
            $diets = Diet::where('party','=', 'れ新')->orderBy('scandal', 'desc')->paginate(50);
        }elseif($id=='nhk'){
            $diets = Diet::where('party','=', 'N党')->orderBy('scandal', 'desc')->paginate(50);
        }else{
            $diets = Diet::where('party','=', '無所属')->orderBy('scandal', 'desc')->paginate(50);
    }

    foreach ($diets as $diet) {
        if ($diet->birthDay !== 0) {
            $birthday=$diet->birthDay;
            $diet->age = Carbon::parse($birthday)->age;
        }else{
             // データがnullの場合、年齢をnullとするか、何か他の値に設定する
            $diet->age = null;
        }
}
        return view('diet/party', [
            'diets' => $diets,
            'id'=>$id,
        ]);
    }

    //個別ページ表示
    public function each($id){

        $diet = Diet::where('id',  $id)->first();

        $birthday=$diet->birthDay;
        $diet->age = Carbon::parse($birthday)->age;

        $genres = Genre::all()->pluck('genre', 'id');
        $now = new Carbon('now');

        $links = Link::where('diet_id','=', $id)->get();
        return view('diet/each', [
                    'diet' => $diet,
                    'genres' => $genres,
                    'id'=>$id,
                    'links'=>$links,
                    'now'=>$now,

                ]);

    }
    public function update(Request $request, $id)
    {
        $diet = Diet::find($id);
        $diet->birthDay = $request->input('birthDay');
        $diet->save();

        return redirect()->route('diet_each', ['id' => $id]);
    }
    //情報ポスト
    public function post(Request $request,$id){

        $link = new Link;
        $link->title =$request->title;
        $link->address= $request->address;
        $link->genre = $request->genre;
        $link->diet_id = $id;
        // 承認待ち状態を設定
        $link->approved = false; // 承認待ち状態を表す
        $link->save();

    // 承認フロー後のリダイレクト先を設定
    return redirect()->route('diet_each', ['id' => $id])->with('success', '投稿が承認待ち状態に送信されました');
}
    //管理者が投稿を承認ページ
    public function approve()
{
    $links=Link::where('approved','=','0')->get();

    return view('diet/approve',['links' => $links]);
}
    //管理者が投稿を承認するための機能
    public function approvePost($postId)
{
    $link = Link::findOrFail($postId);
    $link->approved = true; // 承認されたことを示す
    $link->save();

    $diet = Diet::where('id','=',$link->diet_id)->first();
    //不祥事加算
    if($link->genre==1){
        $newpoint = $diet->scandal + 5; //脱税
    }elseif($link->genre==2){
        $newpoint = $diet->scandal + 4; 
    }elseif($link->genre==3){
        $newpoint = $diet->scandal + 5; //有罪
    }elseif($link->genre==4){
        $newpoint = $diet->scandal + 2; //軽犯罪
    }elseif($link->genre==5){
        $newpoint = $diet->scandal + 4; //収賄
    }elseif($link->genre==6){
        $newpoint = $diet->scandal + 3; 
    }elseif($link->genre==7){
        $newpoint = $diet->scandal + 3; //不正受給
    }elseif($link->genre==8){
        $newpoint = $diet->scandal + 5; //公職選挙法違反
    }elseif($link->genre==9){
        $newpoint = $diet->scandal + 4; 
    }elseif($link->genre==10){
        $newpoint = $diet->scandal + 5; //反社
    }elseif($link->genre==11){
        $newpoint = $diet->scandal + 4; //不記載
    }elseif($link->genre==12){
        $newpoint = $diet->scandal + 4; //違反
    }elseif($link->genre==13){
        $newpoint = $diet->scandal + 4;//スキャンダル
    }else{
        $newpoint = $diet->scandal + 1; 
    }
    $diet->update([
        'scandal' => $newpoint,
        'link' => intval($diet->link) + 1 // link カラムを1つ増やす
    ]);

    return redirect('diet/approve')->with('success', '投稿が承認されました');
}


    //検索
    public function search(Request $request)
    {
        $keyword = $request->input('search');

        $query = Diet::query();

        if (!empty($keyword)) {
            $query->where('name', 'LIKE', "%{$keyword}%");
        }


        //$queryをtype_idの昇順に並び替えて$productsに代入
        $diets = $query->orderBy('id', 'asc')->paginate(15);

        foreach ($diets as $diet) {
            if ($diet->birthDay !== 0) {
                $birthday=$diet->birthDay;
                $diet->age = Carbon::parse($birthday)->age;
            }else{
                 // データがnullの場合、年齢をnullとするか、何か他の値に設定する
                $diet->age = null;
            }
        }
        return view('diet/search', [
            'diets' => $diets,
        ]);
    }
    //並び替え
   public function sort(Request $request)
{
    $select = $request->diet_narabi;

    // 並び替えロジック
    $dietsQuery = Diet::query(); // クエリビルダを生成

    // デフォルトの並び替え基準（スコアのみ）
    $orderByColumns = ['scandal' => 'desc'];

    // 並び替えの基準に応じて、並び替え基準を設定
    if ($select == 'asc') {
        $orderByColumns = ['name_pronunciation' => 'asc', 'scandal' => 'asc'];
    } elseif ($select == 'desc') {
        $orderByColumns = ['name_pronunciation' => 'desc', 'scandal' => 'desc'];
    } elseif ($select == 'old') {
        $orderByColumns = ['birthDay' => 'asc', 'scandal' => 'desc'];
    } elseif ($select == 'young') {
        $orderByColumns = ['birthDay' => 'desc', 'scandal' => 'desc'];
    } elseif ($select == 'scandal') {
        $orderByColumns = ['scandal' => 'desc', 'scandal' => 'desc'];
    } elseif ($select == 'noScandal') {
        $orderByColumns = ['scandal' => 'asc', 'scandal' => 'asc'];
    }
    // 並び替えを適用
    foreach ($orderByColumns as $column => $direction) {
        $dietsQuery->orderBy($column, $direction);
    }

    // ページネーションを適用
    $diets = $dietsQuery->paginate(50);

    // 同順の項目に同じ順位を割り当てる
    $rank = 0;
    $previousValues = null;
    $currentRank = 1;
    foreach ($diets as $diet) {
        $currentValues = $diet->only(array_keys($orderByColumns));
        if ($currentValues !== $previousValues) {
            $previousValues = $currentValues;
            $rank += $currentRank;
            $currentRank = 1;
        }

        $diet->rank = $rank;

        // 同順の次の順位を計算
        $nextValues = $diets->where('rank', '>', $rank)->first();
        if ($nextValues) {
            $nextRank = $nextValues->rank;
        } else {
            $nextRank = $rank + 1;
        }

        if ($nextRank == $rank) {
            $currentRank++;
        } else {
            $currentRank = 1;
        }

        // 年齢の計算
        if ($diet->birthDay !== 0) {
            $birthday = $diet->birthDay;
            $diet->age = Carbon::parse($birthday)->age;
        } else {
            // データがnullの場合、年齢をnullとするか、他の値に設定する
            $diet->age = null;
        }
    }

    return view('diet/index', compact('diets', 'select'));
}

}
