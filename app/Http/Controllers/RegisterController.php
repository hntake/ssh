<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\RegistersUsers;
use App\Models\AdminUser;
use Illuminate\Validation\Rules\Password;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;






class RegisterController extends Controller
{

    use RegistersUsers;

    public function adminRegisterForm(Request $request)
    {
        return view('adminRegister');
    }

    protected function adminValidator(array $data)
    {
        return Validator::make($data, [
            'school' => ['required', 'string', 'max:255','unique:App\Models\AdminUser'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:App\Models\AdminUser'],
            'password' => ['required', 'confirmed', Password::min(8)],
            'admin_level' => ['required', 'numeric'],
        ]);
    }

    protected function adminRegisterDatabase(array $data)
    {
        return AdminUser::create([
            'school' => $data['school'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            'admin_level' => $data['admin_level'],
        ]);
    }

    public function adminRegister(Request $request)
    {
        $this->adminValidator($request->all())->validate();

        $user = $this->adminRegisterDatabase($request->all());

        if ($user) {
            return view('admin', ['registered' => true, 'registered_email' => $user->email]);
        }
    }
}
