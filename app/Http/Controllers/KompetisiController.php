<?php

namespace App\Http\Controllers;

use App\Models\Kompetisi;
use Illuminate\Http\Request;

class KompetisiController extends Controller
{
    public function index()
    {
        $kompetisi = Kompetisi::all();
        return view('kompetisi.home', compact(['kompetisi']));
    }

    public function detail($id)
    {
        $kompetisi = Kompetisi::find($id);
        return view('kompetisi.kompetisidetail', compact(['kompetisi']));
    }
}
