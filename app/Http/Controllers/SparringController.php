<?php

namespace App\Http\Controllers;

use App\Models\Sparring;
use Illuminate\Http\Request;
use Illuminate\Mail\Message;

class SparringController extends Controller
{
    public function index()
    {
        $sparring = Sparring::all();
        return view('sparring.home', compact(['sparring']));
    }

    public function tambah(Request $request)
    {
        return view('sparring.tambahsparring');
    }

    public function store(Request $request)
    {
        // dd($request->all());
        $this->validate($request, rules: [
            'title' => 'required',
        ]);

        $file_name = $request->image->getClientOriginalName();
        $image = $request->image->storeAs('image', $file_name);

        Sparring::create([
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
            'deskripsi_tambahan' => $request->deskripsi_tambahan,
        ]);
        return redirect('/sparring/home');
    }

    public function detail($id)
    {
        $sparring = Sparring::find($id);
        return view('sparring.sparringdetail', compact(['sparring']));
    }
}
