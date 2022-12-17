<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Store;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use App\Mail\CouponMail;
use Carbon\Carbon;
use Illuminate\Support\Facades\Storage;


class GuestController extends Controller
{



/**UUID生成ページへ */
public function create_index (Request $request){
    if ($request->user('admin')?->admin_level === 10) {

        return view ('/guest/create');        }
    else{
        return view('adminLogin');
    }

  }

/*UUID生成*/
public function uuid (Request $request){

   /*  $this->storeValidator($request->all())->validate();

    $store = $this->storeRegisterDatabase($request->all());
 */
    $validate = $request->validate([
        'type' => ['required', 'string', 'max:255'],
            'name' => ['required', 'string', 'max:255'],
            'name_kana' => ['required', 'string', 'max:255'],
            'code' => ['required', 'string', 'max:255'],
            'tel' => ['required','numeric','digits_between:10,11'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
        ]);

        $store= new Store;
        $store->type = $request->type;
        $store->name =$request->name;
        $store->name_kana =$request->name_kana;
        $store->code = $request->code;
        $store->tel = $request->tel;
        $store->email = $request->email;
        $store->uuid =(string) Str::uuid();
        $store->save();


    return view ('/guest/list');
   }
/*店舗リスト/
/**
 * Show the application dashboard.
 *
 * @return \Illuminate\Contracts\Support\Renderable
 */
public function list(Request $request)
{
    if ($request->user('admin')?->admin_level === 10) {

        $guests = Store::orderBy('created_at', 'desc')->paginate(10);

        return view('guest/list', [
            'guests'=>$guests,
        ]);

        }
        else{
            return view('adminLogin');
        }
    }
    /**
     * 選択した店舗の写真編集画面へ
     *
     * @param Request $request
     * @return Response
     */
    public function edit_picture(Request $request, $id)
    {
        $guest = Store::where('id', $request->id)->first();
        return view('/guest/edit_store_picture', [
            'id' => $id,
            'guest' => $guest,
        ]);
    }
    /**
     * 選択した店舗の写真追加変更
     *
     * @param Request $request
     * @return Response
     */
    public function uploadpic(Request $request,$id)
    {
        // 画像ファイルインスタンス取得
        // 現在の画像へのパスをセット
        $uploadImg = $request->image;
        $filePath = $uploadImg->store('public');
        $data['image'] = str_replace('public/', '', $filePath);

        // 現在の画像ファイルの削除
        $guest = Store::where('id', $id)->pluck('image');

        Storage::disk('public')->delete($guest[0]);
        // 選択された画像ファイルを保存してパスをセット

        // データベースを更新
        $guest = Store::find($id);
        // if (array_key_exists('image', $user)) {

        $guest->update([
            'image' => $data['image']
        ]);

        return redirect()->route('guest.list')->with('status','画像を変更しました！');
    }


    /**
     * 選択した店舗の写真を削除
     *
     * @param Request $request
     * @return Response
     */
    public function deletepic($id)
    {
        $path =Store::where('id', $id)->pluck('image');
        if (isset($path)) {
            $guest = Store::find(Auth::id());
            $guest->update([
                'image' => ''
            ]);
            }

            /* $user =User::where('id', $request->id)->value('image'); */

            return redirect('guest/list');
    }
}
