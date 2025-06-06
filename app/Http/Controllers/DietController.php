<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Diet;
use App\Models\Link;
use App\Models\Genre;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB; // DB ファサードを use する
use App\Helpers\TwitterHelper;
use Illuminate\Support\Facades\Session;
use App\Mail\Report;


class DietController extends Controller
{
    //トップページ表示
    public function index(){
        // 上位100位までのデータを取得
        $diets = Diet::whereIn('type', ['衆議院', '参議院'])->orderByDesc('scandal')->orderByRaw('CAST(bribe AS UNSIGNED) DESC')->take(100)->get();
        
        // 同じスコアの人数
        $sameScoreCount = 0;
        // 各順位を計算
        $rank = 1;
        $previousScore = null;
        foreach ($diets as $diet) {
            if ($diet->scandal !== $previousScore) {
                $previousScore = $diet->scandal;
                $rank += $sameScoreCount;
                $sameScoreCount = 1;
            } else {
                $sameScoreCount++;
            }
            if ($rank <= 100) {
                $diet->rank = $rank;
            } else {
                $diet->rank = null;
            }    
            if ($diet->birthDay !== 0) {
                $birthday = $diet->birthDay;
                $diet->age = Carbon::parse($birthday)->age;
            } else {
                 // データがnullの場合、年齢をnullとするか、他の値に設定する
                $diet->age = null;
            }
            
        }
    
        $select='scandal';
        return view('diet/index', [
            'diets' => $diets,
            'select' => $select,
        ]);
    }
    

     //議員一覧表示
    public function all(){
    $diets = Diet::whereIn('type', ['衆議院', '参議院'])->orderBy('scandal', 'desc')->paginate(50);

    // 同じスコアの人数
    $sameScoreCount = 0;
    // 各順位を計算
    $rank = 1;
    $previousScore = null;
        foreach ($diets as $diet) {
            if ($diet->scandal !== $previousScore) {
                $previousScore = $diet->scandal;
                $rank += $sameScoreCount;
                $sameScoreCount = 1;
            } else {
                $sameScoreCount++;
            }
            $diet->rank = $rank;

            if ($diet->birthDay !== 0) {
                $birthday=$diet->birthDay;
                $diet->age = Carbon::parse($birthday)->age;
            } else {
                 // データがnullの場合、年齢をnullとするか、他の値に設定する
                $diet->age = null;
            }
    }

        $select='scandal';
        return view('diet/all', [
            'diets' => $diets,
            'select'=>$select,
        ]);
    }

    //党ごと,院ごと、ブロックごとのページ表示
    public function party($id){
        if($id=='jimin'){
            $diets = Diet::whereIn('type', ['衆議院', '参議院'])->where('party','=', '自民')->orderBy('scandal', 'desc')->paginate(50);
            $ave = Diet::whereIn('type', ['衆議院', '参議院'])->where('party', '自民')->avg('scandal');
        }elseif($id=='koumei'){
            $diets = Diet::whereIn('type', ['衆議院', '参議院'])->where('party','=', '公明')->orderBy('scandal', 'desc')->paginate(50);
            $ave = Diet::whereIn('type', ['衆議院', '参議院'])->where('party', '公明')->avg('scandal');
        }elseif($id=='rikken'){
            $diets = Diet::whereIn('type', ['衆議院', '参議院'])->where('party','=', '立憲')->orderBy('scandal', 'desc')->paginate(50);
            $ave = Diet::whereIn('type', ['衆議院', '参議院'])->where('party', '立憲')->avg('scandal');
        }elseif($id=='ishin'){
            $diets = Diet::whereIn('type', ['衆議院', '参議院'])->where('party','=', '維教')->orderBy('scandal', 'desc')->paginate(50);
            $ave = Diet::whereIn('type', ['衆議院', '参議院'])->where('party', '維教')->avg('scandal');
        }elseif($id=='kyousan'){ 
            $diets = Diet::whereIn('type', ['衆議院', '参議院'])->where('party','=', '共産')->orderBy('scandal', 'desc')->paginate(50);
            $ave = Diet::whereIn('type', ['衆議院', '参議院'])->where('party', '共産')->avg('scandal');
        }elseif($id=='kokumin'){ 
            $diets = Diet::whereIn('type', ['衆議院', '参議院'])->where('party','=', '国民')->orderBy('scandal', 'desc')->paginate(50);
            $ave = Diet::whereIn('type', ['衆議院', '参議院'])->where('party', '国民')->avg('scandal');
        }elseif($id=='reiwa'){
            $diets = Diet::whereIn('type', ['衆議院', '参議院'])->where('party','=', 'れ新')->orderBy('scandal', 'desc')->paginate(50);
            $ave = Diet::whereIn('type', ['衆議院', '参議院'])->where('party', 'れ新')->avg('scandal');
        }elseif($id=='shu'){
            $diets = Diet::where('type','=', '衆議院')->orderBy('scandal', 'desc')->paginate(50);
            $ave = Diet::where('type','=', '衆議院')->orderBy('scandal', 'desc')->avg('scandal');
        }elseif($id=='san'){
            $diets = Diet::where('type','=', '参議院')->orderBy('scandal', 'desc')->paginate(50);
            $ave = Diet::where('type','=', '衆議院')->orderBy('scandal', 'desc')->avg('scandal');
        }elseif($id=='hokkaido'){
                    $diets = Diet::whereIn('type', ['衆議院', '参議院'])->where('area','LIKE', '%北海道%')->orderBy('scandal', 'desc')->paginate(50);
                    $ave = Diet::whereIn('type', ['衆議院', '参議院'])->where('area','LIKE', '%北海道%')->orderBy('scandal', 'desc')->avg('scandal');
        }elseif($id=='touhoku'){
            $diets = Diet::where(function($query) {
                $query->where('area', 'LIKE', '%東北%')
                ->orWhere('area', 'LIKE', '%青森%')
                ->orWhere('area', 'LIKE', '%岩手%')
                ->orWhere('area', 'LIKE', '%宮城%')
                ->orWhere('area', 'LIKE', '%秋田%')
                ->orWhere('area', 'LIKE', '%山形%')
                ->orWhere('area', 'LIKE', '%福島%');
            })
            ->whereIn('type', ['衆議院', '参議院']) // ここに追加
            ->orderBy('scandal', 'desc')->paginate(50);
            $ave = Diet::where(function($query) {
                $query->where('area', 'LIKE', '%東北%')
                    ->orWhere('area', 'LIKE', '%青森%')
                    ->orWhere('area', 'LIKE', '%岩手%')
                    ->orWhere('area', 'LIKE', '%宮城%')
                    ->orWhere('area', 'LIKE', '%秋田%')
                    ->orWhere('area', 'LIKE', '%山形%')
                    ->orWhere('area', 'LIKE', '%福島%');
            })            
            ->whereIn('type', ['衆議院', '参議院']) // ここに追加
            ->avg('scandal');
        }elseif($id=='Nkanto'){
            $diets = Diet::where(function($query) {
                $query->where('area', 'LIKE', '%北関東%')
                ->orWhere('area', 'LIKE', '%茨城%')
                ->orWhere('area', 'LIKE', '%栃木%')
                ->orWhere('area', 'LIKE', '%群馬%')
                ->orWhere('area', 'LIKE', '%埼玉%');
            })            
            ->whereIn('type', ['衆議院', '参議院']) // ここに追加
            ->orderBy('scandal', 'desc')->paginate(50);
            $ave = Diet::where(function($query) {
                $query->where('area', 'LIKE', '%北関東%')
                ->orWhere('area', 'LIKE', '%茨城%')
                ->orWhere('area', 'LIKE', '%栃木%')
                ->orWhere('area', 'LIKE', '%群馬%')
                ->orWhere('area', 'LIKE', '%埼玉%');
            })            
            ->whereIn('type', ['衆議院', '参議院']) // ここに追加
            ->avg('scandal');
        }elseif($id=='Skanto'){
            $diets = Diet::where(function($query) {
                $query->where('area', 'LIKE', '%南関東%')
                ->orWhere('area', 'LIKE', '%千葉%')
                ->orWhere('area', 'LIKE', '%神奈川%')
                ->orWhere('area', 'LIKE', '%山梨%');
            })            
            ->whereIn('type', ['衆議院', '参議院']) // ここに追加
            ->orderBy('scandal', 'desc')->paginate(50);
            $ave = Diet::where(function($query) {
                $query->where('area', 'LIKE', '%南関東%')
                ->orWhere('area', 'LIKE', '%千葉%')
                ->orWhere('area', 'LIKE', '%神奈川%')
                ->orWhere('area', 'LIKE', '%山梨%');
            })            
            ->whereIn('type', ['衆議院', '参議院']) // ここに追加
            ->avg('scandal');
        }elseif($id=='tokyo'){
            $diets = Diet::where(function($query) {
                $query->where('area', 'LIKE', '%東京%');
            })->orderBy('scandal', 'desc')->paginate(50);
            $ave = Diet::where(function($query) {
                $query->where('area', 'LIKE', '%東京%');
            })->avg('scandal');
        }elseif($id=='hirei'){
            $diets = Diet::where(function($query) {
                $query->where('area', '=', '比例');
            })->paginate(50);
            $ave = Diet::where(function($query) {
                $query->where('area', '=', '比例');
            })->avg('scandal');
        }elseif($id=='tokai'){
            $diets = Diet::where(function($query) {
                $query->where('area', 'LIKE', '%東海%')
                ->orWhere('area', 'LIKE', '%岐阜%')
                ->orWhere('area', 'LIKE', '%静岡%')
                ->orWhere('area', 'LIKE', '%三重%')
                ->orWhere('area', 'LIKE', '%愛知%');
            })->orderBy('scandal', 'desc')->paginate(50);
            $ave = Diet::where(function($query) {
                $query->where('area', 'LIKE', '%東海%')
                ->orWhere('area', 'LIKE', '%岐阜%')
                ->orWhere('area', 'LIKE', '%静岡%')
                ->orWhere('area', 'LIKE', '%三重%')
                ->orWhere('area', 'LIKE', '%愛知%');
            })->avg('scandal');
        }elseif($id=='kinki'){
            $diets = Diet::where(function($query) {
                $query->where('area', 'LIKE', '%近畿%')
                ->orWhere('area', 'LIKE', '%大阪%')
                ->orWhere('area', 'LIKE', '%奈良%')
                ->orWhere('area', 'LIKE', '%京都%')
                ->orWhere('area', 'LIKE', '%和歌山%')
                ->orWhere('area', 'LIKE', '%滋賀%')
                ->orWhere('area', 'LIKE', '%兵庫%');
            })->orderBy('scandal', 'desc')->paginate(50);
            $ave = Diet::where(function($query) {
                $query->where('area', 'LIKE', '%近畿%')
                ->orWhere('area', 'LIKE', '%大阪%')
                ->orWhere('area', 'LIKE', '%奈良%')
                ->orWhere('area', 'LIKE', '%京都%')
                ->orWhere('area', 'LIKE', '%和歌山%')
                ->orWhere('area', 'LIKE', '%滋賀%')
                ->orWhere('area', 'LIKE', '%兵庫%');
            })->avg('scandal');
        }elseif($id=='hokuriku'){
            $diets = Diet::where(function($query) {
                $query->where('area', 'LIKE', '%北陸信越%')
                ->orWhere('area', 'LIKE', '%新潟%')
                ->orWhere('area', 'LIKE', '%富山%')
                ->orWhere('area', 'LIKE', '%石川%')
                ->orWhere('area', 'LIKE', '%福井%')
                ->orWhere('area', 'LIKE', '%長野%');
            })->orderBy('scandal', 'desc')->paginate(50);
            $ave = Diet::where(function($query) {
                $query->where('area', 'LIKE', '%北陸信越%')
                ->orWhere('area', 'LIKE', '%新潟%')
                ->orWhere('area', 'LIKE', '%富山%')
                ->orWhere('area', 'LIKE', '%石川%')
                ->orWhere('area', 'LIKE', '%福井%')
                ->orWhere('area', 'LIKE', '%長野%');
            })->avg('scandal');
        }elseif($id=='chugoku'){
            $diets = Diet::where(function($query) {
                $query->where('area', 'LIKE', '%中国%')
                ->orWhere('area', 'LIKE', '%鳥取%')
                ->orWhere('area', 'LIKE', '%島根%')
                ->orWhere('area', 'LIKE', '%岡山%')
                ->orWhere('area', 'LIKE', '%広島%')
                ->orWhere('area', 'LIKE', '%山口%');
            })->orderBy('scandal', 'desc')->paginate(50);
            $ave = Diet::where(function($query) {
                $query->where('area', 'LIKE', '%中国%')
                ->orWhere('area', 'LIKE', '%鳥取%')
                ->orWhere('area', 'LIKE', '%島根%')
                ->orWhere('area', 'LIKE', '%岡山%')
                ->orWhere('area', 'LIKE', '%広島%')
                ->orWhere('area', 'LIKE', '%山口%');
            })->avg('scandal');
        }elseif($id=='shikoku'){
            $diets = Diet::where(function($query) {
                $query->where('area', 'LIKE', '%四国%')
                ->orWhere('area', 'LIKE', '%高知%')
                ->orWhere('area', 'LIKE', '%愛媛%')
                ->orWhere('area', 'LIKE', '%香川%')
                ->orWhere('area', 'LIKE', '%徳島%');
            })->orderBy('scandal', 'desc')->paginate(50);
            $ave = Diet::where(function($query) {
                $query->where('area', 'LIKE', '%四国%')
                ->orWhere('area', 'LIKE', '%高知%')
                ->orWhere('area', 'LIKE', '%愛媛%')
                ->orWhere('area', 'LIKE', '%香川%')
                ->orWhere('area', 'LIKE', '%徳島%');
            })->avg('scandal');
        }elseif($id=='kyuushu'){
            $diets = Diet::where(function($query) {
                $query->where('area', 'LIKE', '%九州%')
                ->orWhere('area', 'LIKE', '%福岡%')
                ->orWhere('area', 'LIKE', '%佐賀%')
                ->orWhere('area', 'LIKE', '%長崎%')
                ->orWhere('area', 'LIKE', '%大分%')
                ->orWhere('area', 'LIKE', '%宮崎%')
                ->orWhere('area', 'LIKE', '%鹿児島%')
                ->orWhere('area', 'LIKE', '%沖縄%')
                ->orWhere('area', 'LIKE', '%熊本%');
            })->orderBy('scandal', 'desc')->paginate(50);
            $ave = Diet::where(function($query) {
                $query->where('area', 'LIKE', '%九州%')
                ->orWhere('area', 'LIKE', '%福岡%')
                ->orWhere('area', 'LIKE', '%佐賀%')
                ->orWhere('area', 'LIKE', '%長崎%')
                ->orWhere('area', 'LIKE', '%大分%')
                ->orWhere('area', 'LIKE', '%宮崎%')
                ->orWhere('area', 'LIKE', '%鹿児島%')
                ->orWhere('area', 'LIKE', '%沖縄%')
                ->orWhere('area', 'LIKE', '%熊本%');
            })->avg('scandal');
        }elseif($id=='bingo'){
            $diets = Diet::whereIn('type', ['衆議院', '参議院'])->where('bribe', '>', 0)
            ->where('cult', 1)
            ->where('link', '>', 0)
            ->orderBy('scandal', 'desc')->paginate(50);
        $ave = Diet::whereIn('type', ['衆議院', '参議院'])->where('bribe', '>', 0)
            ->where('cult', 1)
            ->where('link', '>', 0)
            ->avg('scandal');
        }elseif($id=='bribe'){
            $diets = Diet::whereIn('type', ['衆議院', '参議院'])->where('bribe', '!=', 0)->orderByRaw('CAST(bribe AS UNSIGNED) DESC')->paginate(50);
            $ave = Diet::whereIn('type', ['衆議院', '参議院'])->where('bribe', '!=', null)->orderByRaw('CAST(bribe AS UNSIGNED) DESC')->avg('scandal');
        }elseif($id=='cult'){
            $diets = Diet::whereIn('type', ['衆議院', '参議院'])->where('cult', 1)->orderBy('scandal', 'desc')->paginate(50);
            $ave = Diet::whereIn('type', ['衆議院', '参議院'])->where('cult', 1)->orderBy('scandal', 'desc')->avg('scandal');
        }elseif($id=='heredity'){
            $diets = Diet::where('heredity', 1)
            ->where(function($query) {
                $query->where('type', '衆議院')
                    ->orWhere('type', '参議院');
            })
            ->orderBy('scandal', 'desc')
            ->paginate(50);            
            $ave = Diet::whereIn('type', ['衆議院', '参議院'])->where('heredity', 1)->orderBy('scandal', 'desc')->avg('scandal');
        }

    // 同じスコアの人数
    $sameScoreCount = 0;
    // 各順位を計算
    $rank = 1;
    $previousScore = null;
        foreach ($diets as $diet) {
            if($id == 'bribe'){
                if ($diet->bribe !== $previousScore) {
                    $previousScore = $diet->bribe;
                    $rank += $sameScoreCount;
                    $sameScoreCount = 1;
                } else {
                    $sameScoreCount++;
                }
            }else{
                if ($diet->scandal !== $previousScore) {
                    $previousScore = $diet->scandal;
                    $rank += $sameScoreCount;
                    $sameScoreCount = 1;
                } else {
                    $sameScoreCount++;
                }
            }
            
            $diet->rank = $rank;

            if ($diet->birthDay !== 0) {
                $birthday=$diet->birthDay;
                $diet->age = Carbon::parse($birthday)->age;
            } else {
                // データがnullの場合、年齢をnullとするか、他の値に設定する
                $diet->age = null;
            }
    }
    $average = number_format($ave, 1);

        $select='scandal';
        return view('diet/party', [
            'diets' => $diets,
            'id'=>$id,
            'select'=>$select,
            'average'=>$average,
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
        $parent=Diet::where('id',  $diet->heredity)->value('name');
        $parent_links = Link::where('diet_id','=',  $diet->heredity)->get();

        return view('diet/each', [
                    'diet' => $diet,
                    'genres' => $genres,
                    'id'=>$id,
                    'links'=>$links,
                    'now'=>$now,
                    'parent'=>$parent,
                    'parent_links'=>$parent_links,
                ]);
    }
    //ビンゴ議員表示
    public function bingo(){
        $diets = Diet::whereHas('bribe', function($query) {
            $query->where('value', '!=', null);
        })
        ->whereHas('cult', function($query) {
            $query->where('value', 1);
        })
        ->whereHas('link', function($query) {
            $query->where('value', '>', 0);
        })
        ->paginate(50);

            // 同じスコアの人数
    $sameScoreCount = 0;
    // 各順位を計算
    $rank = 1;
    $previousScore = null;
        foreach ($diets as $diet) {
            if ($diet->scandal !== $previousScore) {
                $previousScore = $diet->scandal;
                $rank += $sameScoreCount;
                $sameScoreCount = 1;
            } else {
                $sameScoreCount++;
            }
            $diet->rank = $rank;

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
    //誕生日入力終了に付きコメントアウト
    // public function update(Request $request, $id)
    // {
    //     $diet = Diet::find($id);
    //     $diet->birthDay = $request->input('birthDay');
    //     $diet->save();

    //     return redirect()->route('diet_each', ['id' => $id]);
    // }

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

    //投稿されたらメール送信
    $data = ['スレッドID' => $link->id];
    \Mail::to('info@itcha50.com')->send(new Report($data));

    // 承認待ち状態にメッセージを保存する
    Session::flash('success', '投稿が承認待ちに送信されました');
        
    // リダイレクト
    return redirect()->route('diet_each', ['id' => $id]);}
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

    // Twitterにツイートする例（ITアカウントは不適切なので)
    // $twitterHelper = new TwitterHelper();
    // $result = $twitterHelper->tweet_thread($link);

    $diet=Diet::where('id','=',$link->diet_id)->first();
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
        $newpoint = $diet->scandal + 3; //不正受給・資産公開法違反
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
    //党内検索
    public function search_party(Request $request,$id)
    {
        $keyword = $request->input('search');

        if($id=='jimin'){
            $query = Diet::query()->where('party','=', '自民');
        }elseif($id=='koumei'){
            $query = Diet::query()->where('party','=', '公明');
        }elseif($id=='rikken'){
            $query = Diet::query()->where('party','=', '立憲');
        }elseif($id=='ishin'){
            $query = Diet::query()->where('party','=', '維教');
        }elseif($id=='kyousan'){ 
            $query = Diet::query()->where('party','=', '共産');
        }elseif($id=='kokumin'){ 
            $query = Diet::query()->where('party','=', '民主');
        }elseif($id=='reiwa'){
            $query = Diet::query()->where('party','=', 'れ新');
        }elseif($id=='shu'){
            $query = Diet::query()->where('type','=', '衆議院');
        }elseif($id=='san'){
            $query = Diet::query()->where('type','=', '参議院');
        }elseif($id=='hirei'){
            $query = Diet::query()->where('area','=', '比例');
        }elseif($id=='touhoku'){
            $query = Diet::query()->where('area', 'LIKE', '%東北%')
            ->orWhere('area', 'LIKE', '%青森%')
            ->orWhere('area', 'LIKE', '%岩手%')
            ->orWhere('area', 'LIKE', '%宮城%')
            ->orWhere('area', 'LIKE', '%秋田%')
            ->orWhere('area', 'LIKE', '%山形%')
            ->orWhere('area', 'LIKE', '%福島%');
        }elseif($id=='Nkanto'){
            $query = Diet::query()->where('area', 'LIKE', '%北関東%')
            ->orWhere('area', 'LIKE', '%茨城%')
            ->orWhere('area', 'LIKE', '%栃木%')
            ->orWhere('area', 'LIKE', '%群馬%')
            ->orWhere('area', 'LIKE', '%埼玉%');
        }elseif($id=='Skanto'){
            $query = Diet::query()->where('area', 'LIKE', '%南関東%')
            ->orWhere('area', 'LIKE', '%千葉%')
            ->orWhere('area', 'LIKE', '%神奈川%')
            ->orWhere('area', 'LIKE', '%山梨%');
        }elseif($id=='tokyo'){
            $query = Diet::query()->here('area', 'LIKE', '%東京%');
        }elseif($id=='tokai'){
            $query = Diet::query()->where('area', 'LIKE', '%東海%')
            ->orWhere('area', 'LIKE', '%岐阜%')
            ->orWhere('area', 'LIKE', '%静岡%')
            ->orWhere('area', 'LIKE', '%三重%')
            ->orWhere('area', 'LIKE', '%愛知%');
        }elseif($id=='kinki'){
            $query = Diet::query()->where('area', 'LIKE', '%近畿%')
            ->orWhere('area', 'LIKE', '%大阪%')
            ->orWhere('area', 'LIKE', '%奈良%')
            ->orWhere('area', 'LIKE', '%京都%')
            ->orWhere('area', 'LIKE', '%和歌山%')
            ->orWhere('area', 'LIKE', '%滋賀%')
            ->orWhere('area', 'LIKE', '%兵庫%');
        }elseif($id=='hokuriku'){
            $query = Diet::query()->where('area', 'LIKE', '%北陸信越%')
            ->orWhere('area', 'LIKE', '%新潟%')
            ->orWhere('area', 'LIKE', '%富山%')
            ->orWhere('area', 'LIKE', '%石川%')
            ->orWhere('area', 'LIKE', '%福井%')
            ->orWhere('area', 'LIKE', '%長野%');
        }elseif($id=='chugoku'){
            $query = Diet::query()->where('area', 'LIKE', '%中国%')
            ->orWhere('area', 'LIKE', '%鳥取%')
            ->orWhere('area', 'LIKE', '%島根%')
            ->orWhere('area', 'LIKE', '%岡山%')
            ->orWhere('area', 'LIKE', '%広島%')
            ->orWhere('area', 'LIKE', '%山口%');
        }elseif($id=='shikoku'){
            $query = Diet::query()->where('area', 'LIKE', '%四国%')
            ->orWhere('area', 'LIKE', '%高知%')
            ->orWhere('area', 'LIKE', '%愛媛%')
            ->orWhere('area', 'LIKE', '%香川%')
            ->orWhere('area', 'LIKE', '%徳島%');
        }elseif($id=='kyuushu'){
            $query = Diet::query()->where('area', 'LIKE', '%九州%')
            ->orWhere('area', 'LIKE', '%福岡%')
            ->orWhere('area', 'LIKE', '%佐賀%')
            ->orWhere('area', 'LIKE', '%長崎%')
            ->orWhere('area', 'LIKE', '%大分%')
            ->orWhere('area', 'LIKE', '%宮崎%')
            ->orWhere('area', 'LIKE', '%鹿児島%')
            ->orWhere('area', 'LIKE', '%沖縄%')
            ->orWhere('area', 'LIKE', '%熊本%');
        }elseif($id=='bingo'){
            $query = Diet::where('bribe', '>', 0)
            ->where('cult', 1)
            ->where('link', '>', 0);
        }elseif($id=='bribe'){
            $query = Diet::where('bribe', '!=', null)->orderByRaw('CAST(bribe AS UNSIGNED) DESC');
        }elseif($id=='cult'){
            $query = Diet::where('cult', 1)->orderBy('scandal', 'desc');
        }

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
        $dietsQuery = Diet::whereIn('type', ['衆議院', '参議院']); // クエリビルダを生成

        // デフォルトの並び替え基準（スコアのみ）
        $orderByColumns = ['scandal' => 'desc'];

        // 並び替えの基準に応じて、並び替え基準を設定
        if ($select == 'asc') {
            $orderByColumns = ['name_pronunciation' => 'asc', 'scandal' => 'desc'];
        } elseif ($select == 'desc') {
            $orderByColumns = ['name_pronunciation' => 'desc', 'scandal' => 'desc'];
        } elseif ($select == 'old') {
            $orderByColumns = ['birthDay' => 'asc', 'scandal' => 'desc'];
        } elseif ($select == 'young') {
            $orderByColumns = ['birthDay' => 'desc', 'scandal' => 'desc'];
        } elseif ($select == 'scandal') {
            $orderByColumns = ['scandal' => 'desc', 'bribe' => 'desc'];
        } elseif ($select == 'noScandal') {
            $orderByColumns = ['scandal' => 'asc', 'bribe' => 'asc'];
        } elseif ($select == 'bad') {
            $orderByColumns = ['bad' => 'desc', 'scandal' => 'desc'];
        }
        // 並び替えを適用
        foreach ($orderByColumns as $column => $direction) {
            if ($column === 'bribe') {
                // bribe カラムの並び替えに特別な処理を適用
                $dietsQuery->orderByRaw("CAST(bribe AS UNSIGNED) $direction");
            } else {
                $dietsQuery->orderBy($column, $direction);
            }
        }

        // ページネーションを適用
        $diets = $dietsQuery->paginate(50);

        //不祥事高い順を選んだ時だけ順位を表示するので
        if ($select == 'scandal') {
        // 同じスコアの人数
        $sameScoreCount = 0;
        // 各順位を計算
        $rank = 1;
        $previousScore = null;
        foreach ($diets as $diet) {
            if ($diet->scandal !== $previousScore) {
                $previousScore = $diet->scandal;
                $rank += $sameScoreCount;
                $sameScoreCount = 1;
            } else {
                $sameScoreCount++;
            }
            $diet->rank = $rank;
        }
        }
        foreach ($diets as $diet) {
            // 年齢の計算
            if ($diet->birthDay !== 0) {
                $birthday = $diet->birthDay;
                $diet->age = Carbon::parse($birthday)->age;
            } else {
                // データがnullの場合、年齢をnullとするか、他の値に設定する
                $diet->age = null;
            }
        }

    return view('diet/all', compact('diets', 'select'));
}
//党内並び替え
    public function party_sort(Request $request,$id,$average)
    {
    $select = $request->diet_narabi;

    // 並び替えロジック
    if($id=='jimin'){
        $dietsQuery = Diet::whereIn('type', ['衆議院', '参議院'])->where('party','=', '自民');
    }elseif($id=='koumei'){
        $dietsQuery = Diet::whereIn('type', ['衆議院', '参議院'])->where('party','=', '公明');
    }elseif($id=='rikken'){
        $dietsQuery = Diet::whereIn('type', ['衆議院', '参議院'])->where('party','=', '立憲');
    }elseif($id=='ishin'){
        $dietsQuery = Diet::whereIn('type', ['衆議院', '参議院'])->where('party','=', '維教');
    }elseif($id=='kyousan'){ 
        $dietsQuery = Diet::whereIn('type', ['衆議院', '参議院'])->where('party','=', '共産');
    }elseif($id=='kokumin'){ 
        $dietsQuery = Diet::whereIn('type', ['衆議院', '参議院'])->where('party','=', '民主');
    }elseif($id=='reiwa'){
        $dietsQuery = Diet::whereIn('type', ['衆議院', '参議院'])->where('party','=', 'れ新');
    }elseif($id=='shu'){
        $dietsQuery = Diet::whereIn('type', ['衆議院', '参議院'])->where('type','=', '衆議院');
    }elseif($id=='san'){
            $dietsQuery = Diet::query()->where('type','=', '参議院');   
    }elseif($id=='hirei'){
            $dietsQuery = Diet::query()->where('area','=', '比例'); 
    }elseif($id=='hokkaido'){
        $dietsQuery = Diet::query()->where('area','LIKE', '%北海道%');
    }elseif($id=='touhoku'){
        $dietsQuery = Diet::query()->where('area', 'LIKE', '%東北%')
        ->orWhere('area', 'LIKE', '%青森%')
        ->orWhere('area', 'LIKE', '%岩手%')
        ->orWhere('area', 'LIKE', '%宮城%')
        ->orWhere('area', 'LIKE', '%秋田%')
        ->orWhere('area', 'LIKE', '%山形%')
        ->orWhere('area', 'LIKE', '%福島%');
    }elseif($id=='Nkanto'){
        $dietsQuery = Diet::query()->where('area', 'LIKE', '%北関東%')
        ->orWhere('area', 'LIKE', '%茨城%')
        ->orWhere('area', 'LIKE', '%栃木%')
        ->orWhere('area', 'LIKE', '%群馬%')
        ->orWhere('area', 'LIKE', '%埼玉%');
    }elseif($id=='Skanto'){
        $dietsQuery = Diet::query()->where('area', 'LIKE', '%南関東%')
        ->orWhere('area', 'LIKE', '%千葉%')
        ->orWhere('area', 'LIKE', '%神奈川%')
        ->orWhere('area', 'LIKE', '%山梨%');
    }elseif($id=='tokyo'){
        $dietsQuery = Diet::query()->where('area', 'LIKE', '%東京%');
    }elseif($id=='tokai'){
        $dietsQuery = Diet::query()->where('area', 'LIKE', '%東海%')
        ->orWhere('area', 'LIKE', '%岐阜%')
        ->orWhere('area', 'LIKE', '%静岡%')
        ->orWhere('area', 'LIKE', '%三重%')
        ->orWhere('area', 'LIKE', '%愛知%');
    }elseif($id=='kinki'){
        $dietsQuery = Diet::query()->where('area', 'LIKE', '%近畿%')
        ->orWhere('area', 'LIKE', '%大阪%')
        ->orWhere('area', 'LIKE', '%奈良%')
        ->orWhere('area', 'LIKE', '%京都%')
        ->orWhere('area', 'LIKE', '%和歌山%')
        ->orWhere('area', 'LIKE', '%滋賀%')
        ->orWhere('area', 'LIKE', '%兵庫%');
    }elseif($id=='hokuriku'){
        $dietsQuery = Diet::query()->where('area', 'LIKE', '%北陸信越%')
        ->orWhere('area', 'LIKE', '%新潟%')
        ->orWhere('area', 'LIKE', '%富山%')
        ->orWhere('area', 'LIKE', '%石川%')
        ->orWhere('area', 'LIKE', '%福井%')
        ->orWhere('area', 'LIKE', '%長野%');
    }elseif($id=='chugoku'){
        $dietsQuery = Diet::query()->where('area', 'LIKE', '%中国%')
        ->orWhere('area', 'LIKE', '%鳥取%')
        ->orWhere('area', 'LIKE', '%島根%')
        ->orWhere('area', 'LIKE', '%岡山%')
        ->orWhere('area', 'LIKE', '%広島%')
        ->orWhere('area', 'LIKE', '%山口%');
    }elseif($id=='shikoku'){
        $dietsQuery = Diet::query()->where('area', 'LIKE', '%四国%')
        ->orWhere('area', 'LIKE', '%高知%')
        ->orWhere('area', 'LIKE', '%愛媛%')
        ->orWhere('area', 'LIKE', '%香川%')
        ->orWhere('area', 'LIKE', '%徳島%');
    }elseif($id=='kyuushu'){
        $dietsQuery = Diet::query()->where('area', 'LIKE', '%九州%')
        ->orWhere('area', 'LIKE', '%福岡%')
        ->orWhere('area', 'LIKE', '%佐賀%')
        ->orWhere('area', 'LIKE', '%長崎%')
        ->orWhere('area', 'LIKE', '%大分%')
        ->orWhere('area', 'LIKE', '%宮崎%')
        ->orWhere('area', 'LIKE', '%鹿児島%')
        ->orWhere('area', 'LIKE', '%沖縄%')
        ->orWhere('area', 'LIKE', '%熊本%');
    }elseif($id=='bingo'){
        $dietsQuery = Diet::where('bribe', '>', 0)
        ->where('cult', 1)
        ->where('link', '>', 0);
    }elseif($id=='bribe'){
        $dietsQuery = Diet::where('bribe', '!=', null)->orderByRaw('CAST(bribe AS UNSIGNED) DESC');
    }elseif($id=='cult'){
        $dietsQuery = Diet::where('cult', 1)->orderBy('scandal', 'desc');
    }elseif($id=='heredity'){
        $dietsQuery = Diet::where('heredity', 1)->orderBy('scandal', 'desc');
    }
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
        $orderByColumns = ['scandal' => 'desc', 'bribe' => 'desc'];
    } elseif ($select == 'noScandal') {
        $orderByColumns = ['scandal' => 'asc', 'bribe' => 'asc'];
    } elseif ($select == 'bad') {
        $orderByColumns = ['bad' => 'desc', 'scandal' => 'desc'];
    }
    // 並び替えを適用
    foreach ($orderByColumns as $column => $direction) {
        if ($column === 'bribe') {
            // bribe カラムの並び替えに特別な処理を適用
            $dietsQuery->orderByRaw("CAST(bribe AS UNSIGNED) $direction");
        } else {
            $dietsQuery->orderBy($column, $direction);
        } 
    }

    // ページネーションを適用
    $diets = $dietsQuery->paginate(50);

    //不祥事高い順を選んだ時だけ順位を表示するので
    if ($select == 'scandal') {
    // 同じスコアの人数
    $sameScoreCount = 0;
    // 各順位を計算
    $rank = 1;
    $previousScore = null;
    foreach ($diets as $diet) {
        if ($diet->scandal !== $previousScore) {
            $previousScore = $diet->scandal;
            $rank += $sameScoreCount;
            $sameScoreCount = 1;
        } else {
            $sameScoreCount++;
        }
        $diet->rank = $rank;
    }
    }
    foreach ($diets as $diet) {
        // 年齢の計算
        if ($diet->birthDay !== 0) {
            $birthday = $diet->birthDay;
            $diet->age = Carbon::parse($birthday)->age;
        } else {
            // データがnullの場合、年齢をnullとするか、他の値に設定する
            $diet->age = null;
        }
    }

    return view('diet/party', compact('diets', 'select','id','average'));
    }
/**
     * 選択したリンクを削除
     *
     * @param Request $request
     * @return Response
     */
    public function delete_link(Request $request)
    {
        $link = Link::where('id', $request->id)->delete();
        return redirect('diet/approve');
    }

    /*悪いね登録*/
    public function bad(Request $request,$id)
    {
        $diet = Diet::find($id);

        $diet->update([
            'bad' => intval($diet->bad) + 1 // link カラムを1つ増やす
        ]);

        $birthday=$diet->birthDay;
        $diet->age = Carbon::parse($birthday)->age;

        $genres = Genre::all()->pluck('genre', 'id');
        $now = new Carbon('now');

        $links = Link::where('diet_id','=', $id)->get();

        return view('diet/each_done', [
                    'diet' => $diet,
                    'genres' => $genres,
                    'id'=>$id,
                    'links'=>$links,
                    'now'=>$now,

                ]);
    }
    
    //円グラフ
    public function chart(){
        // 各政党の平均スキャンダル値を取得
        $averages = Diet::whereNotNull('type')
                        ->select('party', DB::raw('AVG(scandal) as average'))
                        ->whereNotNull('type')
                        ->where('party', '!=', '無')
                        ->where('party', '!=', '無所属')
                        ->groupBy('party')
                        ->pluck('average', 'party');
    
        // 各政党の人数
        $counts = Diet::whereNotNull('type')
                    ->select('party', DB::raw('count(*) as count'))
                    ->groupBy('party')
                    ->pluck('count', 'party');

        //不祥事ありの人数とない人数を取得
        $scandals = Diet::whereNotNull('type')
                    ->select('party', DB::raw('SUM(CASE WHEN scandal >= 1 THEN 1 ELSE 0 END) AS scandal_count'))
                    ->selectRaw('SUM(CASE WHEN scandal = 0 THEN 1 ELSE 0 END) AS no_scandal_count')
                    ->groupBy('party')
                    ->pluck('scandal_count', 'party');
                    
        // 平均不祥事度で降順にソート
        $averages = $averages->sortDesc();
        
        // データの整形
        $data = [];
        $rankedData = [];
        $rank = 1;
        $prevAverage = null;
        foreach ($averages as $party => $average) {
            // 同じ平均値の場合は同じ順位を付ける
            if ($prevAverage !== null && $average == $prevAverage) {
                $rank--;
            }
              // $countsから現在のパーティのcountを取得
            $count = isset($counts[$party]) ? $counts[$party] : 0;
            $scandal = isset($scandals[$party]) ? $scandals[$party] : 0;
            $average = number_format($average, 1);

            $data[] = [
                'party' => $party,
                'average' => $average,
                'rank' => $rank,
                'count' => $count,
                'scandal' => $scandal,
                'no_scandal' => $count - $scandal, // スキャンダルのない人数を計算

            ];
            $prevAverage = $average;
            $rank++;
        }
        // ランク毎にデータをグループ化
        foreach ($data as $item) {
            $rankedData[$item['rank']][] = $item;
        }
    
        // ビューにデータを渡す
        return view('diet.compare', compact('rankedData'));
    }

    //選挙向け選挙結果(選挙区別）
    public function next($id){
        $diets = Diet::where(function($query) use ($id) {
            $query->where('next', '=', $id)
                ->orWhere(function($query) use ($id) {
                    $query->whereNull('next')
                            ->where('area', '=', $id);
                });
        })->orderBy('scandal', 'asc')->get();
        foreach ($diets as $diet) {
        $birthday=$diet->birthDay;
        $diet->age = Carbon::parse($birthday)->age;
        }
        return view('diet.next',compact('diets','id'));

    }
}