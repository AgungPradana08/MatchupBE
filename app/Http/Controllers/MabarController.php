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
        Mabar::create($request -> all());
        return redirect('/mabar/home');
    }
}
