<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\UserSparring;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class UserSparringController extends Controller
{
    public function index()
    {   
        $usersparring = UserSparring::all();
        return view('user.usersparring.home', compact(['usersparring']));
    }

    public function index2(User $user)
    {   
        $usersparring = UserSparring::all();
        // $user = User::all();
        return view('sparring.home', compact(['usersparring', 'user'])) ;
    }

    public function tambah()
    {
        $usersparring = UserSparring::all();
        return view('user.usersparring.tambahsparringnew', compact(['usersparring']));
    }

    public function store(Request $request)
    {
        // dd($request->all());
        $pengguna = Auth::user();

        $this->validate($request, rules: [
            'title' => 'required',
            'nama_tim' => 'required',
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
        $image = $request->image->storeAs('image2', $file_name);

        $post = UserSparring::create([
            'title' => $request->title,
            'nama_tim' => $request->nama_tim,
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

        $pengguna->posts()->save($post);

        return redirect('/usersparring/home');
    }

    public function detail($id)
    {
        $usersparring = UserSparring::find($id);
        // $takesparring = UserSparring::with('ambilsparring')->get();
        return view('user.usersparring.usersparringdetailnew', compact(['usersparring']));
        // return view('user.usersparring.usersparringdetail', compact(['usersparring']));
    }

    public function edit($id)
    {
        // dd($id);
        $usersparring = UserSparring::find($id);
        return view('user.usersparring.usersparringedit', compact(['usersparring']));
    }
    
    public function update($id, Request $request)
    {
        $usersparring = UserSparring::find($id);
        $file_name = $request->image->getClientOriginalName();
        $image = $request->image->storeAs('image2', $file_name);
        // $usersparring->update($request -> except(['_token','submit',]));
        $usersparring->update([
            'title' => $request->title,
            'nama_tim' => $request->nama_tim,
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
        return redirect('/usersparring/home');
    }

    public function destroy($id)
    {
        $usersparring = UserSparring::find($id);
        $usersparring->delete();
        return redirect('/usersparring/home');
    }

    public function search(Request $request)
    {
        $searchtitle = $request->input('search');
        $olahragaFilter = $request->input('olahraga');
        $lokasiFilter = $request->input('lokasi');

        $usersparring = UserSparring::query();

        if ($searchtitle) {
            $usersparring->where('title', 'like', '%'.$searchtitle.'%');
        }

        if ($olahragaFilter) {
            $usersparring->where('olahraga', $olahragaFilter);
        }
        if ($lokasiFilter) {
            $usersparring->where('lokasi', $lokasiFilter);
        }

        $usersparring = $usersparring->get();

        return view('sparring.home', compact(['usersparring']));
    }

    public function versus()
    {
        return view('user.usersparring.versus');
    }

    public function versusstore($id, Request $request)
    {
        // dd($request->all());
        $usersparrings = UserSparring::find($id);
        $usersparrings->update($request->nama_tim_lawan);
        return redirect('sparring.home');
    }
    
    public function versusedit($id)
    {
        // dd($id);
        $versus = UserSparring::find($id);
        return view('user.usersparring.usersparringdetailnew', compact(['versus']));
    }
}
