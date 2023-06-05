<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\UserMabar;
use Illuminate\Http\Request;

class UserMabarController extends Controller
{
    public function index()
    {
        $usermabar = UserMabar::all();
        return view('user.usermabar.home', compact(['usermabar']));
    }

    public function index2()
    {   
        $usermabar = UserMabar::all();
        return view('mabar.home', compact(['usermabar'])) ;
    }

    public function tambah()
    {
        $usermabar = UserMabar::all();
        return view('user.usermabar.usermabartambah', compact(['usermabar']));
    }

    public function store(Request $request)
    {
        // dd($request->all());

        $this->validate($request, rules: [
            'title' => 'required',
            'image' => 'required|mimes:jpg,jpeg,png',
            'olahraga' => 'required',
            'deskripsi' => 'required',
            'lokasi' => 'required',
            'min_member' => 'required',
            'max_member' => 'required',
            'aksebilitas' => 'required',
            'tingkatan' => 'required',
            'tanggal_pertandingan' => 'required',
            'harga_tiket' => 'required',
            'lama_pertandingan' => 'required',
            'waktu_pertandingan' => 'required',
        ]);

        $file_name = $request->image->getClientOriginalName();
        $image = $request->image->storeAs('image4', $file_name);

        UserMabar::create([
            'title' => $request->title,
            'image' => $image,
            'olahraga' => $request->olahraga,
            'deskripsi' => $request->deskripsi,
            'lokasi' => $request->lokasi,
            'min_member' => $request->min_member,
            'max_member' => $request->max_member,
            'aksebilitas' => $request->aksebilitas,
            'tingkatan' => $request->tingkatan,
            'tanggal_pertandingan' => $request->tanggal_pertandingan,
            'harga_tiket' => $request->harga_tiket,
            'lama_pertandingan' => $request->lama_pertandingan,
            'waktu_pertandingan' => $request->waktu_pertandingan,
            'deskripsi_tambahan' => $request->deskripsi_tambahan,
        ]);
        return redirect('/usermabar/home');
    }

    public function search(Request $request)
    {
        $searchtitle = $request->input('search');
        $olahragaFilter = $request->input('olahraga');
        $lokasiFilter = $request->input('lokasi');

        $usermabar = UserMabar::query();

        if ($searchtitle) {
            $usermabar->where('title', 'like', '%'.$searchtitle.'%');
        }

        if ($olahragaFilter) {
            $usermabar->where('olahraga', $olahragaFilter);
        }
        if ($lokasiFilter) {
            $usermabar->where('lokasi', $lokasiFilter);
        }

        $usermabar = $usermabar->get();

        return view('mabar.home', compact(['usermabar']));
    }

    public function detail($id)
    {
        $usermabar = UserMabar::find($id);
        // $takesparring = UserSparring::with('ambilsparring')->get();
        return view('user.usermabar.usermabardetail', compact(['usermabar']));
        // return view('user.usersparring.usersparringdetail', compact(['usersparring']));
    }

}
