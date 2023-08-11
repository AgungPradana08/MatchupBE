<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use App\Notifications\VerifyEmailNotification;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

class LoginController extends Controller
{
    
    use AuthenticatesUsers;

    protected function sendEmailVerificationNotification(Request $request)
    {
        $user = $request->user();

        if ($user && !$user->hasVerifiedEmail()) {
            $user->sendEmailVerificationNotification();
        }
    }

    protected function authenticated(Request $request, $user)
    {
        if (!$user->hasVerifiedEmail()) {
            return $this->sendEmailVerificationNotification($request);
        }

        return redirect()->intended($this->redirectPath());
    }
    
    public function showlogin()
    {
        return view('login.login');
    }

    public function login(Request $request)
    {
        // $user = Auth::user();
        // session(['user_id' => $user->id]);

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
            return redirect('/sparring/home')->with('notification', 'Welcome');
        }else{
            //return 'gagal'
            return redirect('/login')->with('error', 'true');
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

        $user = User::create($data);

        $user->sendEmailVerificationNotification();

        Auth::login($user);

        $infologin = [
            'email' => $request->email,
            'password' => $request->password,
        ];
        if (Auth::attempt($infologin)) {
            return redirect('/verify-email')->with('notification', 'new-account');
        }else{
            return 'gagal';
            // return redirect('/login')->withErrors('username dan password yang di masukkan tidak valid');
        }
            
        // Buat pengguna baru
        // $user = User::create($request->all());

        

        // Login pengguna baru
        

        return redirect('/verify-email');
    }
    
    public function logout()
    {
        Auth::logout();
        session()->flush();
        return redirect('/');
    }
}
