<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;


class RankController extends Controller
{
    public function point()
    {
        $users =User::orderBy('point','desc')->paginate(15);
            return view('point',[
                'users' =>$users,
            ]);

    }
    public function point_school($id)
    {
        $users =User::where('school','=',$id)->
         orderBy('point','desc')->paginate(15);
            return view('point',[
                'users' =>$users,
            ]);

    }
}
