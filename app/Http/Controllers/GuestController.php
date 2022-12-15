<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Store;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use App\Mail\CouponMail;
use Carbon\Carbon;

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
 /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function storeValidator(array $data)
    {
        return Validator::make($data, [
            'type' => ['required', 'string', 'max:255'],
            'name' => ['required', 'string', 'max:255'],
            'name_kana' => ['required', 'string', 'max:255'],
            'code' => ['required', 'string', 'max:255'],
            'tel' => ['required','numeric','digits_between:10,11'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
        ]);
    }


    protected function storeRegisterDatabase(array $data)
    {
        $uploadImg = "";
        if (array_key_exists('image', $data)) {
            $uploadImg = $data['image'];
        }

          if($uploadImg !="") {
            $filePath = $uploadImg->store('public');
            $data['image'] = str_replace('public/', '', $filePath);

        return Store::create([
            'type' => $data['type'],
            'name' => $data['name'],
            'name_kana' => $data['name_kana'],
            'code' => $data['code'],
            'tel' => $data['tel'],
            'email' => $data['email'],
            'image' => $data['image'],
            'uuid'=>(string) Str::uuid(),
        ]);
    }
    else{
        return Store::create([
            'type' => $data['type'],
            'name' => $data['name'],
            'name_kana' => $data['name_kana'],
            'code' => $data['code'],
            'tel' => $data['tel'],
            'email' => $data['email'],
            'uuid'=>(string) Str::uuid(),
        ]);
    }
}
/*UUID生成*/
public function uuid (Request $request){

    $this->storeValidator($request->all())->validate();

    $store = $this->storeRegisterDatabase($request->all());

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
}
