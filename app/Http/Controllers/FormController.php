<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Form;

class FormController extends Controller
{
    public function postpage (Request $request){
        if ($request->user('admin')?->admin_level === 10) {

            return view ('/blog/form');
        }
        else{
            return view('adminLogin');
        }
       }

    public function wys (){
        return view ('/blog/wysiwyg');
      }
    public function savenew (Request $request){
        $post = new Form;
        $post->title = $request->title;
        $post->main = $request->main;
        $post->category = $request->category;
        $post->save();

        // 画像の保存
    if($request->post_img){

        if($request->post_img->extension() == 'gif' || $request->post_img->extension() == 'jpeg' || $request->post_img->extension() == 'jpg' || $request->post_img->extension() == 'png'){
        $request->file('post_img')->storeAs('public/post_img', $post->id.'.'.$request->post_img->extension());
    }

}

        return redirect ('/blog/index');
       }

     public function index (Request $request){
        $data = Form::orderBy('created_at', 'desc')->paginate(10);
        $eng = Form::where('category','=', '1')->orderBy('created_at', 'desc')->paginate(10);
        $vs = Form::where('category','=', '2')->orderBy('created_at', 'desc')->paginate(10);
        $etc = Form::where('category','=', '3')->orderBy('created_at', 'desc')->paginate(10);
        return view('/blog/post')->with(
            ['data' => $data,
             'eng'  => $eng,
             'vs'   => $vs,
             'etc'   => $etc,
        ]);
      }
}
