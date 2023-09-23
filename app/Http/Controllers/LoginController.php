<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller {
    public function login_form(Request $request) {
        $title = 'Add article';

        return view('login', compact('title'));
    }

    public function authenticate(Request $request) {
        $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required', 'string', 'max:100']
        ]);

        $email = $request->email;
        $password = $request->password;
        $remember = $request->remember;

        if (Auth::attempt(['email' => $email, 'password' => $password], $remember)) {
            $request->session()->regenerate();

            return redirect()->route('index');
        }

        return back()->withErrors([
            'email' => 'Invalid login or password.'
        ]);
    }

    public function logout() {
        Auth::logout();

        return redirect()->route('index');
    }
}