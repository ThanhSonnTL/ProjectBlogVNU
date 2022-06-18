<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginControllerResoucre extends Controller
{
    public function auth_login()
    {
        return view('auth.login');
    }
    public function getFormLogin()
    {
        $Lecturer = DB::select('select * from lecturers');
        $departments = DB::select('select * from departments');
        $Post = DB::select('select * from posts');
        $user = auth()->user();
        $name = $user->name;
        return view('admin.home')->with(['Lecturer'=>$Lecturer,'departments'=>$departments,'Post'=>$Post,'name'=>$name]);
        
    }
    public function submitLogin(Request $request)
    {
      
        $messages = [
            'email.required' => 'Email chưa có thông tin',
            'email.email' => 'Email không hợp lệ vui lòng kiểm tra lại',
            'email.exists' => 'Email chưa có trong hệ thống',
            'password.required' => 'Password chưa có thông tin'
        ];
        $request->validate([
            'email' => 'required|email|exists:users',
            'password' => 'required',
        ],  $messages );

        $email = $request->email;
        $password = $request->password;
        if (Auth::attempt([
            'email' => $email,
            'password' => $password,
        ])) {
            $user = User::where('email', $email)->first();
            Auth::login($user);
            $username=Auth::user()->name;
            
            
            
            return redirect()->route('admin');
        } else {
            return view('auth.login',['err' => 'Tài khoản hoặc mật khẩu chưa chính xác!']); 
        }
    }

    public function submitLogoutForm(){
        Auth::logout();
        return redirect()->route('formLogin');
    }
}
