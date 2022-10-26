<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Form;
use App\Models\News;

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

    public function wys (Request $request){
        if ($request->user('admin')?->admin_level === 10) {

            return view ('/blog/form');
        }
        else{
            return view('adminLogin');
        }
        return view ('/blog/wysiwyg');
      }
    public function news (Request $request){
        if ($request->user('admin')?->admin_level === 10) {

            return view ('/blog/form');
        }
        else{
            return view('adminLogin');
        }
        return view ('/news/wysiwyg');
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

    public function save_news (Request $request){
        $post = new News;
        $post->title = $request->title;
        $post->main = $request->main;
        $post->category = $request->category;
        $post->save();



        return redirect ('/news/index');
       }

     public function index (Request $request){
        $data = Form::orderBy('created_at', 'desc')->paginate(10);
        $eng = Form::where('category','=', '4')->orderBy('created_at', 'desc')->paginate(10);
        $vs = Form::where('category','=', '5')->orderBy('created_at', 'desc')->paginate(10);
        $etc = Form::where('category','=', '6')->orderBy('created_at', 'desc')->paginate(10);
        return view('/blog/post')->with(
            ['data' => $data,
             'eng'  => $eng,
             'vs'   => $vs,
             'etc'   => $etc,
        ]);
      }
     public function news_index (Request $request){
        $data = News::orderBy('created_at', 'desc')->paginate(10);
        $service = News::where('category','=', '7')->orderBy('created_at', 'desc')->paginate(10);
        $mente = News::where('category','=', '8')->orderBy('created_at', 'desc')->paginate(10);
        $etc = News::where('category','=', '6')->orderBy('created_at', 'desc')->paginate(10);
        $lelease= News::where('category','=', '9')->orderBy('created_at', 'desc')->paginate(10);
        return view('/news/post')->with(
            ['data' => $data,
             'service'  => $service,
             'mente'   => $mente,
             'etc'   => $etc,
             'lelease'   => $lelease,
        ]);
      }

     public function page (Request $request,$id){
        $data = Form::where('id', $request->id)->first();
        return view('blog/page', [
            'id' => $id,
            'data' => $data,
        ]);
      }

     public function news_page (Request $request,$id){
        $data = News::where('id', $request->id)->first();
        return view('news/page', [
            'id' => $id,
            'data' => $data,
        ]);
      }
}
