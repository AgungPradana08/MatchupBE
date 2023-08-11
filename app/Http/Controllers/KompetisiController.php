<?php

namespace App\Http\Controllers;

use App\Models\Kompetisi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class KompetisiController extends Controller
{
    public function index()
    {
        // dd($request->all());
        $kompetisi = Kompetisi::all();
        $DateNow = date('Y-m-d');
        // dd($DateNow);
        return view('kompetisi.home', compact(['kompetisi','DateNow']));

    }

    public function detail($id)
    {
        $kompetisi = Kompetisi::find($id);
        return view('kompetisi.kompetisidetail', compact(['kompetisi']));
    }

    public function joinkompetisi($kompetisiId)
    {
        $pengguna = Auth::user();
        $kompetisi = Kompetisi::with('joinedKompetisi')->find($kompetisiId);

        if ($kompetisi) {
            // Cek apakah user sudah terdaftar sebagai peserta kompetisi$kompetisi
            if (!$kompetisi->joinedKompetisi->contains($pengguna->id)) {
                
                if ($kompetisi->joinedKompetisi->count() >= $kompetisi->max_member) {
                    return redirect()->route('kompetisi$kompetisi.detail', ['id' => $kompetisiId])->with('notification', 'Maaf, jumlah peserta acara Kompetisi telah mencapai batas maksimum!');
                }
                // Jika belum terdaftar, tambahkan user ke relasi Many-to-Many
                $kompetisi->joinedKompetisi()->attach($pengguna->id);
                return redirect()->route('kompetisi.detail', ['id' => $kompetisiId])->with('notification', 'Anda telah bergabung dengan Kompetisi ini!');
            } else {
                return redirect()->route('kompetisi.detail', ['id' => $kompetisiId])->with('notification', 'Anda sudah terdaftar sebagai peserta Kompetisi ini!');
            }
        } else {
            return redirect()->route('kompetisi.index')->with('error', 'Mabar tidak ditemukan!');
        }
    }
}
