<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\Models\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use App\Jobs\SendVerificationEmail;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'user_name' => ['required', 'unique:users','string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\Models\User
     */
    protected function create(array $data)
    {
        $uploadImg = "";
        if (array_key_exists('image', $data)) {
            $uploadImg = $data['image'];
        }
/*         $uploadImg = $data['image'];
        if($uploadImg->isValid()) {*/
          if($uploadImg !="") {
            $filePath = $uploadImg->store('public');
            $data['image'] = str_replace('public/', '', $filePath);

            return User::create([
                'name' => $data['name'],
                'user_name' => $data['user_name'],
/*              'school' => $data['school'],*/
                'year' => $data['year'],
                'place' => $data['place'],
                'image' => $data['image'],
                'email' => $data['email'],
                'password' => Hash::make($data['password']),
                'email_token' => base64_encode($data['email']),

            ]);
        }
        else{
            return User::create([
                'name' => $data['name'],
                'user_name' => $data['user_name'],
                'school' => $data['school'],
                'year' => $data['year'],
                'place' => $data['place'],
                'image' => '',
                'email' => $data['email'],
                'password' => Hash::make($data['password']),
            ]);
        }
    }
        /**
    *  Handle a registration request for the application.
    *
    * @param \Illuminate\Http\Request $request
    * @return \Illuminate\Http\Response
    */
   /*  public function register(Request $request)
    {
      $this->validator($request->all())->validate();
      event(new Registered($user = $this->create($request->all())));
      dispatch(new SendVerificationEmail($user));
      return view('auth.verify');
    } */

    /**
    *  Handle a registration request for the application.
    *
    * @param $token
    * @return \Illuminate\Http\Response
    */
    /* public function verify($token)
    {
      $user = User::where('email_token',$token)->first();
      $user->verified = 1;
      if($user->save()) {
        return view('auth.emailconfirm',['user'=>$user]);
      }
    } */
}
