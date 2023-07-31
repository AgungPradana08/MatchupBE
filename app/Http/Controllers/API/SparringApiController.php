<?php

namespace App\Http\Controllers\api;

use App\Models\UserSparring;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Http;

class SparringApiController extends Controller
{
    public function getdatasparring(){
        
        $usersparring = UserSparring::all();
        return response()->json([
            'data' => $usersparring
        ]);
    }

    public function index()
    {
        // $response = Http::timeout(60000)->get('http://127.0.0.1:8000/api/getdatasparring');
        $response = Http::get('http://127.0.0.1:8000/api/getdatasparring'); // Ganti URL dengan URL API Anda
        $data = $response->json(); // Konversi respons API menjadi array
        $usersparring = $data['data']; // Simpan data lokasi dalam variabel $peta
        return view('user.usersparring.tambahsparringnew', compact('usersparring'));
    }

    public function index2()
    {
        $url = 'http://127.0.0.1:8000/api/getdatasparring';
        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $response = curl_exec($ch);
        curl_close($ch);

        $data = json_decode($response, true);
        $usersparring = $data['data'];
        return view('user.usersparring.tambahsparringnew', compact('usersparring'));
    }

    public function datasparringapi(){
        $url = 'http://127.0.0.1:8000/api/getdatasparring';
        $response = Http::get($url);
        $data = $response->json();
        // dd($data);
        return view('testingapi.home', ['data' => $data]);
    }
}
