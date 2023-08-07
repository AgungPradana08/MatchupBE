<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Http;

class LokasiController extends Controller
{
    public function getdatalocation(){
        
        $lokasi = DB::table('map')->get();
        return response()->json([
            'data' => $lokasi
        ]);
    }

    public function getapidatalocation()
    {
        // $response = Http::timeout(60000)->get('http://127.0.0.1:8000/api/getdatalocation');
        $response = Http::get('http://127.0.0.1:8000/api/getdatalocation'); // Ganti URL dengan URL API Anda
        $data = $response->json(); // Konversi respons API menjadi array
        $peta = $data['data']; // Simpan data lokasi dalam variabel $peta
        return view('user.usersparring.tambahsparringnew', compact('peta'));
    }

    public function index(){
        $map = DB::table('map')->get();
        session()->flash('page', 'pengguna');
        return view('home.pengguna.home', compact(['map']));
    }
}
