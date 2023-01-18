<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Game;
use App\Models\Word;
use App\Models\History;
use App\Models\Point;
use Carbon\Carbon;


class ParentController extends Controller
{
    public function confirm(Request $request, $id,$test_id){
        /**user_id読み込み */
        $user=Auth::user();
        /**そのuserのポイントトータル*/
        $total=Game::where('user_id',$user->id)->value('point');

       /**Today's test履歴 */
       $point = new Point;
       $word = Word::find($test_id);
       $point->user_id = $user->id;
       $point->test_name = $word->test_name;
       $point->type = $word->type;
       $new_point = 1;
       $point->save();
       $points = Point::where('user_id','=',$user->id)->OrderBy('created_at', 'desc')->paginate(15);

        return view ('confirm',[
            'total'=>$total,
            'points'=>$points,
        ]);
}
}
