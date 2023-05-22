<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class LoginController extends Controller
{
    public function index()
    {
        return view('login.login');
    }

    public function authenticate(Request $request)
    {
        Session::flash('email', $request->email);

        $request->validate([
            'email' => 'required',
            'password' => 'required',
        ], [
            'email.required' => 'Email Wajib diisi',
            'password.required' => 'Password Wajib diisi',
        ]);

        $infologin = [
            'email' => $request->email,
            'password' => $request->password
        ];

        if (Auth::attempt($infologin)) {
            $request->session()->regenerate();
            return redirect()->intended('/home');
        }

        return back()->with('loginError', 'Login failed!');
    }
}
