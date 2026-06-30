<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use App\Models\User;
use App\Http\Requests\RegisterRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function register(){
        return view('register');
    }

    public function postRegister(RegisterRequest $request){
        User::create([
            'name' => $request->get('name'),
            'email' => $request->get('email'),
            'password' => Hash::make($request->get('password'))
        ]);
        return back()->with('message','Register successfully');
    }

    public function login(){
        return view('login');
    }

    public function postLogin(LoginRequest $request)
    {
        $credentials = $request->only('email','password');

        if (Auth::attempt($credentials)) {
            // Login thành công
            $request->session()->regenerate();
            return redirect()->intended('/home');
        }

        return back()
            ->withInput($request->only('email'))
            ->with('message', 'Email hoặc mật khẩu không đúng');
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('login')->with('message', 'Bạn đã đăng xuất');
    }
}
