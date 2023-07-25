<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Matching;
use App\Models\UserMabar;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserMabarController extends Controller
{
    public function index()
    {
        // $usermabar = UserMabar::all();
        $usermabar = UserMabar::where('user_id', session('user_id'))->get();
        return view('user.usermabar.home', compact(['usermabar',]));
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

        $pengguna = Auth::user();

        $this->validate($request, rules: [
            'title' => 'required',
            'image' => 'required|mimes:jpg,jpeg,png',
            'olahraga' => 'required',
            'deskripsi' => 'required',
            'lokasi' => 'required',
            'min_member' => 'required',
            'max_member' => 'required',
            'tingkatan' => 'required',
            'tanggal_pertandingan' => 'required',
            'harga_tiket' => 'required',
            'lama_pertandingan' => 'required',
            'waktu_pertandingan' => 'required',
        ]);

        $file_name = $request->image->getClientOriginalName();
        $image = $request->image->storeAs('image4', $file_name);

        $mabar = UserMabar::create([
            'user_id' => $pengguna->id,
            'host_id' => $pengguna->id,
            'title' => $request->title,
            'image' => $image,
            'olahraga' => $request->olahraga,
            'deskripsi' => $request->deskripsi,
            'lokasi' => $request->lokasi,
            'min_member' => $request->min_member,
            'max_member' => $request->max_member,
            'tingkatan' => $request->tingkatan,
            'tanggal_pertandingan' => $request->tanggal_pertandingan,
            'harga_tiket' => $request->harga_tiket,
            'lama_pertandingan' => $request->lama_pertandingan,
            'waktu_pertandingan' => $request->waktu_pertandingan,
            'deskripsi_tambahan' => $request->deskripsi_tambahan,
        ]);

        // $pengguna->postsmabar()->save($mabar);
        $mabar->joinedUsers()->attach($pengguna->id);
        session()->flash('notification', 'Mabar berhasil ditambahkan.');
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

    public function search2(Request $request)
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

        return view('user.usermabar.home', compact(['usermabar']));
    }

    public function detail($id)
    {
        $usermabar = UserMabar::with('joinedUsers')->findOrFail($id);
        $pengguna = Auth::user();
        return view('user.usermabar.usermabardetail', compact('usermabar', 'pengguna'));
    }

    public function edit($id)
    {
        // dd($id);
        $usermabar = UserMabar::find($id);
        return view('user.usermabar.usermabaredit', compact(['usermabar']));
    }
    
    public function update($id, Request $request)
    {
        $usermabar = UserMabar::find($id);
        $file_name = $request->image->getClientOriginalName();
        $image = $request->image->storeAs('image4', $file_name);
        $usermabar->update([
            'title' => $request->title,
            'image' => $image,
            'olahraga' => $request->olahraga,
            'deskripsi' => $request->deskripsi,
            'lokasi' => $request->lokasi,
            'min_member' => $request->min_member,
            'max_member' => $request->max_member,
            'tingkatan' => $request->tingkatan,
            'tanggal_pertandingan' => $request->tanggal_pertandingan,
            'harga_tiket' => $request->harga_tiket,
            'lama_pertandingan' => $request->lama_pertandingan,
            'waktu_pertandingan' => $request->waktu_pertandingan,
            'deskripsi_tambahan' => $request->deskripsi_tambahan,
        ]);
        return redirect('/usermabar/home');
    }

    public function destroy($id)
    {
        $usermabar = UserMabar::find($id);
        $usermabar->delete();
        return redirect('/usermabar/home');
    }

    public function joinmabar($usermabarId)
    {
        $pengguna = Auth::user();
        $mabar = UserMabar::with('joinedUsers')->find($usermabarId);

        if ($mabar) {
            // Cek apakah user sudah terdaftar sebagai peserta mabar
            if (!$mabar->joinedUsers->contains($pengguna->id)) {
                
                if ($mabar->joinedUsers->count() >= $mabar->max_member) {
                    return redirect()->route('mabar.detail', ['id' => $usermabarId])->with('notification', 'Maaf, jumlah peserta acara mabar telah mencapai batas maksimum!');
                }
                // Jika belum terdaftar, tambahkan user ke relasi Many-to-Many
                $mabar->joinedUsers()->attach($pengguna->id);
                return redirect()->route('mabar.detail', ['id' => $usermabarId])->with('notification', 'Anda telah bergabung dengan Mabar!');
            } else {
                return redirect()->route('mabar.detail', ['id' => $usermabarId])->with('notification', 'Anda sudah terdaftar sebagai peserta Mabar ini!');
            }
        } else {
            return redirect()->route('mabar.index')->with('error', 'Mabar tidak ditemukan!');
        }
    }


}
