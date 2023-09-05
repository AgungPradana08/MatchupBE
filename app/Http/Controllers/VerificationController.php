<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\VerifiesEmails;

class VerificationController extends Controller
{
    use VerifiesEmails;

    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('throttle:6,1')->only('resend');
    }
    
    public function showVerificationForm(){
        return view ('auth.verify');
    }

    public function verify(Request $request){
        
        $user = $request->user();

        if ($user->hasVerifiedEmail()) {
            return redirect()->route('sparring.home'); // Redirect jika email sudah diverifikasi
        }

        $verificationTime = $user->email_verified_at;
        $expirationTime = Carbon::parse($verificationTime)->addMinutes(1);
    
        if (Carbon::now()->gt($expirationTime)) {
            // Email verifikasi kedaluwarsa, tambahkan logika sesuai kebutuhan Anda
            return redirect('/verifikasigagal')->with('expired', true);
        }

        $user->markEmailAsVerified();

        return redirect('/verifikasiberhasil')->with('verified', true);
    }

    public function resend(Request $request)
    {
        if ($request->user()->hasVerifiedEmail()) {
            return redirect()->route('/sparring/home'); // Redirect jika email sudah diverifikasi
        }

        $request->user()->sendEmailVerificationNotification();

        return back()->with('resent', true); // Redirect dengan pesan pengiriman ulang sukses
    }

    public function verifikasiberhasil(){

        return view('auth.verifyberhasil');
        
    }

    public function verifikasigagal(){
        return view('auth.expired');
    }
}
