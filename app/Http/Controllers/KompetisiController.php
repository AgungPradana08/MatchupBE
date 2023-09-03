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
        $kompetisiterbaru = Kompetisi::orderByRaw('ABS(DATEDIFF(tanggal_pertandingan, NOW()))')->get();
        // dd($DateNow);
        return view('kompetisi.home', compact(['kompetisi','DateNow', 'kompetisiterbaru']));

    }

    public function detail($id)
    {

        $DateNow = date('Y-m-d');
        $kompetisi = Kompetisi::find($id);
        $pengguna = Auth::user();
        $origin = Auth::user()->id;
        $kompetisi = Kompetisi::with('joinedKompetisi')->find($id);

        $isJoined = $kompetisi->joinedKompetisi->contains('id', $pengguna->id);

        return view('kompetisi.kompetisidetail', compact(['kompetisi','DateNow','pengguna','origin','isJoined']));
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
