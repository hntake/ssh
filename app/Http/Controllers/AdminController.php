<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Word;
use App\Models\User;
use App\Models\Nice;
use App\Models\History;
use App\Models\News;
use App\Models\Comment;
use Illuminate\Support\Facades\Auth;


class AdminController extends Controller
{
    public function id_view( Request $request, $id)
    {
            $user = User::where('id', '=',$id)->pluck('user_name');
            $test_ids = History::where('tested_user', '=',$user)->get()->pluck('test_id')->toArray();
            $histories = History::where('school', '=', Auth::user()->school)->where('tested_user', '=',$user)->whereIn('test_id', $test_ids)->OrderBy('created_at', 'desc')->paginate(15);
            $crtest = Word::where('user_name','=',$user)->get()->pluck('id')->toArray();
            $words = Word::where('user_name','=',$user)->whereIn('id',$crtest)->OrderBy('created_at', 'desc')->paginate(15);
            $users =User::where('id', '=',$id)->OrderBy('created_at', 'desc')->paginate(15);

            return view('id_view', [
                'id' => $id,
                'histories' => $histories,
                'words'=> $words,
                'users'=>$users,
            ]);
        }
        /*コメント投稿*/
    public function comment( Request $request, $id)
    {
            $comment= User::where('id', '=',$id)->pluck('comment');
            $postcomment = $request->comment;
            $commnet = User::where('id', '=',$id)
            ->update([
                'comment' => $postcomment
            ]);

            $user =User::find($id);
            $comment = new Comment;
            $comment->name =$user->name;
            $comment->school1= $user->school1;
            $comment->comment = $postcomment;
            $comment->save();

            return redirect()->route('id_view', [
                'id' => $id,
            ])->with('status','コメント投稿しました');
        }


        /*オーナーコメント表示*/
        public function comment_index(Request $request )
    {
        if ($request->user('admin')?->admin_level > 1) {
            $comments = Comment::where('school1','=',  Auth::user()->school)->orderBy('updated_at','desc')->paginate(10);

            return view('comment',[
                'comments' => $comments,
            ]);
        }
        else{
            return view('adminLogin');
        }
    }
}
