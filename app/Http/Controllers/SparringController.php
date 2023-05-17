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

    public function tambah()
    {
        return view('sparring.tambahsparring');
    }

    public function store(Request $request)
    {
        // dd($request->all());
        // $validateData = $request->validate([
        //     'title' => 'required',
        //     'olahraga'         => 'required',
        //     'deskripsi'    => 'required',
        //     'lokasi'        => 'required',
        //     'min_member'      => 'required',
        //     'max_member'      => 'required',
        //     'aksebilitas'      => 'required',
        //     'tingkatan'      => 'required',
        //     'tanggal_pertandingan'  => 'required',
        //     'harga_tiket'      => 'required',
        //     'lama_pertandingan'      => 'required',
        //     'deskripsi_tambahan'      => 'required',
        // ]);
        
        // Sparring::create($validateData);
        // return redirect('/sparring/home');
        Sparring::create($request -> all());
        return redirect('/sparring/home');
    }

    public function detail($id)
    {
        $sparring = Sparring::find($id);
        return view('sparring.sparringdetail', compact(['sparring']));
    }
}
