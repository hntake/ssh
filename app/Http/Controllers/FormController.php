<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Form;
use App\Models\News;
use App\Models\Cases;
use App\Models\category;
use Illuminate\Support\Facades\Auth;

class FormController extends Controller
{

/**ブログ作成ページへ */
    public function wys (Request $request){
        if ($request->user('admin')?->admin_level === 10) {

            return view ('/blog/wysiwyg');        
        }elseif($request->user('admin')?->admin_level === 20){

            $id=Category::where('email',$request->user('admin')?->email)->value('id');
            return view ('/blog/blog',[
                'id'=>$id,
            ]);   
        }
        else{
            return view('adminLogin');
        }

}
/*お知らせ作成ページへ*/
    public function news (Request $request){
        if ($request->user('admin')?->admin_level === 10) {

            return view ('/news/wysiwyg');
        }
        else{
            return view('adminLogin');
        }
    }
/*事象作成ページへ*/
    public function case (Request $request){
        if ($request->user('admin')?->admin_level === 10) {

            return view ('/case/wysiwyg');
        }
        else{
            return view('adminLogin');
        }
    }
/*ブログ保存*/
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
/*事象保存*/
    public function savecase (Request $request){
        $post = new Cases;
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

        return redirect ('/case/index');
    }

/*お知らせ保存*/
    public function save_news (Request $request){
        $post = new News;
        $post->title = $request->title;
        $post->main = $request->main;
        $post->category = $request->category;
        $post->save();



        return redirect ('/news/index');
    }
/*ブログトップページ表示*/
    public function index (Request $request){
        $data = Form::where('category', '<=', '6')->orderBy('created_at', 'desc')->paginate(10);        
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
/*事象トップページ表示*/
    public function caseindex (Request $request){
        $data = Cases::orderBy('created_at', 'desc')->paginate(10);
        $eng = Cases::where('category','=', '4')->orderBy('created_at', 'desc')->paginate(10);
        $vs = Cases::where('category','=', '5')->orderBy('created_at', 'desc')->paginate(10);
        $etc = Cases::where('category','=', '6')->orderBy('created_at', 'desc')->paginate(10);
        return view('/case/post')->with(
            ['data' => $data,
            'eng'  => $eng,
            'vs'   => $vs,
            'etc'   => $etc,
        ]);
    }
/*お知らせトップページ表示*/
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
/*選択したブログページ表示*/
    public function page (Request $request,$id){
        $data = Form::where('id', $request->id)->first();
        return view('blog/page', [
            'id' => $id,
            'data' => $data,
        ]);
    }
/*選択したお知らせページ表示*/
    public function news_page (Request $request,$id){
        $data = News::where('id', $request->id)->first();
        return view('news/page', [
            'id' => $id,
            'data' => $data,
        ]);
    }
/*選択した事象ページ表示*/
    public function case_page (Request $request,$id){
        $data = Cases::where('id', $request->id)->first();
        return view('case/page', [
            'id' => $id,
            'data' => $data,
        ]);
    }
/*専用ブログトップぺージ:$id=category_id*/
public function house (Request $request,$id){
    $houses = Form::where('category','=', $id)->orderBy('created_at', 'desc')->paginate(10);
    $category=Category::where('id','=',$id)->first();
     // $adminを初期化
    $admin = false;

    $adminUser = Auth::guard('admin')->user(); // 管理者用ガードを指定
    if ($adminUser && $adminUser->admin_level === 20) {
        $admin = true;
    } else {
        $admin = false; // または他の適切な処理
    }
    
    return view('blog/house',[
        'houses' => $houses,
        'category' => $category,
        'admin' => $admin,

    ]);
}
/**ブログ作成ページへ */
public function create (Request $request){

}
/*専用ブログ保存$id=category_id*/
    public function confirm(Request $request,$id)
    {
        $title = $request->input('title');
        $main = $request->input('main');
        $post_img = $request->file('post_img');

        return view('blog.confirm', compact('title', 'main', 'post_img','id'));
    }

    public function save(Request $request,$id)
    {

        $action = $request->input('action');
        if ($action == 'save') {
            $post = new Form;
            $post->title = $request->title;
            $post->main = $request->main;
            $post->category = $id;
            $post->save();
        } elseif ($action == 'draft') {
            $post = new Form;
            $post->title = $request->title;
            $post->main = $request->main;
            $post->category = $id;
            $post->action = 1;
            $post->save();
        }

        // 画像の保存
        if($request->post_img){

            if($request->post_img->extension() == 'gif' || $request->post_img->extension() == 'jpeg' || $request->post_img->extension() == 'jpg' || $request->post_img->extension() == 'png'){
            $request->file('post_img')->storeAs('public/post_img', $post->id.'.'.$request->post_img->extension());
            }
        }

        $houses = Form::where('category','=', $id)->orderBy('created_at', 'desc')->paginate(10);
        $category=Category::where('id','=',$id)->first();
        return view('blog/house',[
            'houses' => $houses,
            'category' => $category,
        ]);
    }
        //確認画面で目ページに戻る
        public function back($id)
        {
            return redirect()->route('blog.blog', ['id' => $id]);
        }

        // 編集ページの表示
        public function edit($id)
        {
            $blog = Form::findOrFail($id); // IDでブログを取得
            return view('blog.edit', compact('blog'));
        }

        // 編集内容の保存
        public function update(Request $request, $id)
        {
            $blog = Form::findOrFail($id); // IDでブログを取得

            // 入力検証
            $request->validate([
                'title' => 'required|max:255',
                'main' => 'required',
            ]);

            // ブログの更新
            $blog->title = $request->input('title');
            $blog->main = $request->input('main');
            $blog->save();

            return redirect()->route('blog.house', ['categoryId' => $blog->category])
                            ->with('success', 'ブログを更新しました');
        }

        // ブログの削除
        public function delete($id)
        {
            $blog = Form::findOrFail($id); // IDでブログを取得
            $category=$blog->category;
            $blog->delete(); // 削除

            return redirect()->route('blog.house', ['id' => $category])
                            ->with('success', 'ブログを削除しました');
        }
        }
