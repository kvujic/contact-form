<?php

namespace App\Http\Controllers;

use App\Http\Requests\RegisterRequest;
use App\Http\Requests\LoginRequest;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function register() {
        return view('register');
    }

    public function store(RegisterRequest $request) {
        $user = $request->only(['name', 'email', 'password']);
        $user['password'] = bcrypt($user['password']);
        User::create($user);
        return redirect('/login');
    }

    public function login() {
        return view('/admin');
    }

    public function authenticate(LoginRequest $request) {
        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            return redirect()->intended('/admin');
        }

        return back()->withErrors([ 
            'email' => 'ログインに失敗しました'
        ])->withInput();
    }
}
