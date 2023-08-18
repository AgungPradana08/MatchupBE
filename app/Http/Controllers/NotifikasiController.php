<?php

namespace App\Http\Controllers;

use App\Models\Notifikasi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class NotifikasiController extends Controller
{
    public function shownotifikasi(){

        $user = Auth::user();
        $notifikasi = Notifikasi::where('user_id', $user->id)->orderBy('created_at', 'desc')->get();

        
        if ($user->readnotif == "true") {
            $user->readnotif = "false";
            $user->save();
        }

        return view('notifikasi.home', compact('notifikasi'));

        $notifikasi->read_at = now();
        $notifikasi->save();

    }
}
