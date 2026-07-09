<?php

namespace App\Livewire;

use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Login extends Component
{
    public $email = '';
    public $password = '';

    public function login()
    {
        $this->validate([
            'email' => 'required|email',
            'password' => 'required|string',
        ]);

        $credentials = [
            'email' => $this->email,
            'password' => $this->password,
        ];

        if (Auth::attempt($credentials)) {
            request()->session()->regenerate();

            $user = Auth::user();

            if ($user->role_id == 2) {
                return redirect()->route('manager');
            }

            return redirect()->intended('/home');
        }

        $this->addError('email', 'Email hoặc mật khẩu không đúng');
    }

    public function render()
    {
        return view('livewire.login');
    }
}