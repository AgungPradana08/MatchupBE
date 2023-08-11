<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class VerificationController extends Controller
{
    public function showVerificationForm(){
        return view ('auth.verify');
    }

    public function verify(Request $request){
        
        $user = $request->user();

        if ($user->hasVerifiedEmail()) {
            return redirect()->route('sparring.home'); // Redirect jika email sudah diverifikasi
        }

        $user->markEmailAsVerified();

        return redirect()->route('sparring.home')->with('verified', true);
    }

    public function resend(Request $request)
    {
        if ($request->user()->hasVerifiedEmail()) {
            return redirect()->route('/sparring/home'); // Redirect jika email sudah diverifikasi
        }

        $request->user()->sendEmailVerificationNotification();

        return back()->with('resent', true); // Redirect dengan pesan pengiriman ulang sukses
    }
}
