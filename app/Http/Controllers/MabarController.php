<?php

namespace App\Http\Controllers;

use App\Models\Mabar;
use Illuminate\Http\Request;

class MabarController extends Controller
{
    public function index()
    {
        $mabar = Mabar::all();
        return view('mabar.home', compact(['mabar']));
    }

    public function detail($id)
    {
        $mabar = Mabar::find($id);
        return view('mabar.mabardetail', compact(['mabar']));
    }

    public function tambah()
    {
        return view('mabar.tambahmabar');
    }

    public function store(Request $request)
    {
        $file_name = $request->image->getClientOriginalName();
        $image = $request->image->storeAs('image1', $file_name);

        Mabar::create([
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
        ]);
        return redirect('/mabar/home');
    }
}
