<?php

namespace App\Http\Controllers;

use App\Models\Sparring;
use Illuminate\Http\Request;

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
        Sparring::create($request -> all());
        return redirect('/sparring/home');
    }

    public function detail($id)
    {
        $sparring = Sparring::find($id);
        return view('sparring.sparringdetail', compact(['sparring']));
    }
}
