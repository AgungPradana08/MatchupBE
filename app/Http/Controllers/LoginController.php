<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class LoginController extends Controller
{
    public function showlogin()
    {
        return view('login.login');
    }

    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required',
            'password' => 'required'
        ],[
            'email.required' => 'Email wajib diisi',
            'password.required' => 'password wajib diisi',
        ]);

        $infologin = [
            'email' => $request->email,
            'password' => $request->password,
        ];

        if (Auth::attempt($infologin)) {
            return redirect('/sparring/home');
        }else{
            return 'gagal';
            // return redirect('/login')->withErrors('username dan password yang di masukkan tidak valid');
        }
    }

    public function showregister()
    {
        return view('login.signup');
        // return view('login.register');
    }

    public function register(Request $request)
    {
        // dd($request->all());
        $request->validate([
            // 'username' => 'required',
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6'
        ],[
            // 'username' => 'username wajib diisi', 
            'name.required' => 'Name wajib diisi',
            'email.required' => 'Email wajib diisi',
            'email.email' => 'silahkan masukkan email yang valid',
            'email.unique' => 'Email sudah pernah digunakan, silahkan masukkan yang lain',
            'password.required' => 'password wajib diisi',
            'password.min' => 'minimum password yang diizinkan adalah 6 karakter',
        ]);

        $file_name = $request->image->getClientOriginalName();
        $image = $request->image->storeAs('image3', $file_name);

        $data = [
            'username' => $request->username,
            'image' => $image,
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ];

        User::create($data);

        $infologin = [
            'email' => $request->email,
            'password' => $request->password,
        ];
        if (Auth::attempt($infologin)) {
            return redirect('/login');
        }else{
            return 'gagal';
            // return redirect('/login')->withErrors('username dan password yang di masukkan tidak valid');
        }

        // Buat pengguna baru
        $user = User::create($request->all());

        // Login pengguna baru
        Auth::login($user);

        return redirect('/login');
    }
    
    public function logout()
    {
        Auth::logout();
        session()->flush();
        return redirect('/');
    }
}
