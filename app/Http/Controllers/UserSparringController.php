<?php

namespace App\Http\Controllers;

use App\Models\UserSparring;
use Illuminate\Http\Request;

class UserSparringController extends Controller
{
    public function index()
    {   
        $usersparring = UserSparring::all();
        return view('user.usersparring.home', compact(['usersparring'])) ;
    }

    public function tambah()
    {
        return view('user.usersparring.usersparringtambah');
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
        $image = $request->image->storeAs('image2', $file_name);

        UserSparring::create([
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
        return redirect('/usersparring/home');
    }

    public function detail($id)
    {
        $usersparring = UserSparring::find($id);
        return view('user.usersparring.usersparringdetail', compact(['usersparring']));
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
        $usersparring->update($request -> except(['_token','submit']));
        return redirect('/usersparring/home');
    }

    public function destroy($id)
    {
        $usersparring = UserSparring::find($id);
        $usersparring->delete();
        return redirect('/usersparring/home');
    }
}
