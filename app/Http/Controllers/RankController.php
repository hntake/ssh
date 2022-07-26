<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Word;
use App\Models\Nice;


class RankController extends Controller
{
    public function point()
    {
        $users =User::orderBy('point','desc')->paginate(15);
            return view('point',[
                'users' =>$users,
            ]);

    }

      /*他人のプロフィール画面表示*/
      public function mypicture( Request $request, $id)
      {
          $user = User::where('id', $request->id)->first();
          $words = Word::where('user_name', '=', $user->user_name)->get();
          $nice=Nice::where('created_id', $request->id)->where('user_id', auth()->user()->id)->first();
          $count = Nice::where('created_id', $request->id)->count();
          return view('mypicture', [
              'user' => $user,
              'words' => $words,
              'nice' => $nice,
              'count' =>$count,
          ]);
      }
}
