<?php

namespace App\Http\Controllers;

use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Mail\Mailer;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;

class ForgotPasswordController extends Controller
{
    public function showForgetPasswordForm()
    {
        return view('auth.forgetPassword');
    }

    public function submitForgetPasswordForm(Request $request)
    {
        $messages = [
            'email.required' => 'Email chưa có thông tin',
            'email.email' => 'Email không hợp lệ vui lòng kiểm tra lại',
            'email.exists' => 'Email chưa có trong hệ thống',
        ];
        $request->validate([
            'email' => 'required|email|exists:users',
        ],$messages);

        $token = Str::random(64);

        DB::table('password_resets')->insert([
            'email' => $request->email,
            'token' => $token,
            'created_at' => Carbon::now()
        ]);

        Mail::send('auth.EmailForgetPassword', ['token' => $token], function ($message) use ($request) {
            $message->to($request->email);
            $message->subject('Reset Password');
        });

        return back()->with('message', 'Vui lòng kiểm tra email của bạn!');
    }

    public function showResetPasswordForm($token) {
        return view('auth.forgetPasswordLink', ['token' => $token]);
    }

    public function submitResetPasswordForm(Request $request)
    {
        $messages = [
            'email.required' => 'Email chưa có thông tin',
            'email.email' => 'Email không hợp lệ vui lòng kiểm tra lại',
            'email.exists' => 'Email chưa có trong hệ thống',
            'password.required' => 'Password chưa có thông tin',
            'password.min' => 'Password tối thiểu gồm 6 kí tự',
            'password_confirmation.confirmed' => 'Password chưa khớp vui lòng kiểm tra lại',
            'password_confirmation.required' => 'Trường này không được để trống',
        ];
        $request->validate([
            'email' => 'required|email|exists:users',
            'password' => 'required|min:6',
            'password_confirmation' => 'required|confirmed'
        ],$messages);

        $updatePassword = DB::table('password_resets')
            ->where([
                'email' => $request->email,
                'token' => $request->token
            ])
            ->first();

        if(!$updatePassword){
            return back()->withInput()->with('error', 'Đổi mật khẩu thất bại vui lòng kiểm tra lại!');
        }

        $user = User::where('email', $request->email)
            ->update(['password' => Hash::make($request->password)]);

        DB::table('password_resets')->where(['email'=> $request->email])->delete();

        return redirect()->route('formLogin')->with('message', 'Bạn đổi mật khẩu thành công hãy tiến hành đăng nhập!');
    }
}
