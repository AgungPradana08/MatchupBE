<?php

namespace App\Http\Controllers;
use App\Models\User;

use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Auth;

class UserProfileController extends Controller
{
    public function index()
    {   
        // $pengguna = User::all();
        $pengguna = Auth::user();
        session(['user_id' => $pengguna->id]);
        return view('user.userprofile.home', compact(['pengguna']));
    }

    public function edit()
    {
        $userprofile = Auth::user();
        return view('user.userprofile.userprofileedit', compact(['userprofile']));
    }

    public function update(Request $request){
        // dd($request->all());
        $pengguna = User::find(Auth::user()->id);

        if ($request->hasFile('image')) {
            // Jika pengguna mengunggah gambar baru
            $file_name = $request->image->getClientOriginalName();
            $image = $request->image->storeAs('image2', $file_name);
        } else {
            // Jika pengguna tidak mengunggah gambar baru
            // Gunakan foto yang sudah ada di database
            $image = $pengguna->image;
        }

        $pengguna->update([
            'image' => $image,
            $pengguna->name = $request->name,
            $pengguna->username = $request->username,
            $pengguna->deskripsi = $request->deskripsi,
            $pengguna->instagram = $request->instagram,
            $pengguna->facebook = $request->facebook,
            $pengguna->whatsapp = $request->whatsapp,
            $pengguna->gender = $request->gender,
            $pengguna->usia = $request->usia,
            $pengguna->berat_badan = $request->berat_badan,
            $pengguna->tinggi_badan = $request->tinggi_badan,
        ]);
        
        return redirect('/userprofile/home');
    }
}
