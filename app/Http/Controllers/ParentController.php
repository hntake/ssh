<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Game;
use App\Models\Word;
use App\Models\Point;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB; // DB ファサードを use する



class ParentController extends Controller
{
    /**確認ページの表示 */
    public function confirm(Request $request, $id,$test_id){
        /**user_id読み込み */
        /*    $user=Auth::user();
        $user_id = $user->id;
        $game = Game::where('user_id', $user_id)->first();
        $game->point++;
        $game->save(); */
        /**そのuserのポイントトータル*/
        /*         $total=Game::where('user_id',$user->id)->value('point');
        */
        $user=Auth::user();
        $date = new Carbon('now');
        $word = Word::find($test_id);
        $today= Point::where('user_id','=',$user->id)->whereDate('created_at', '>=', $date->subDay())->first();
        if($today===null){
            $point = new Point;
            $point->user_id = $user->id;
            $point->test_name = $word->test_name;
            $point->type = $word->type;
            $point->save();
        }
       /**Today's test履歴 */
       $points = Point::where('user_id','=',$user->id)->OrderBy('created_at', 'desc')->paginate(15);

       /*Gameへのポイント受け渡し*/
       $total = DB::table('points')
       ->where('user_id', $user->id)
       ->count();

       $game = Game::where('user_id','=',$user->id)->first();
       $game
        ->update([
            'point' =>$total
        ]);
        return view ('confirm',[
            'total'=>$total,
            'points'=>$points,
            'game'=>$game,
        ]);
}
   /*目標設定ページ表示*/
   public function goal( Request $request)
   {
        $user=Auth::user();
        $id = Auth::user('id');
        $game = Game::where('user_id', '=',$id->id)->first();

        return view ('goal',[
            'user'=> $user,
            'id'=>$id,
            'game'=>$game,
        ]);
   }

   /*目標設定*/
   public function goal_post( Request $request, $id)
   {
           $user=Auth::user();
           $goal = Game::where('user_id', '=',$id)->first();
           $postgoal = $request->goal;
           $post_point = $request->goal_point;
           $goal
           ->update([
               'goal' => $postgoal,
               'goal_point' => $post_point,
           ]);


           return redirect()->route('goal',[
            'user'=> $user,
            'id'=>$id,
        ])->with('status','目標を変更しました');
       }
}
