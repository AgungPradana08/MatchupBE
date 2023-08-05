<?php

namespace App\Http\Controllers;

use App\Models\Kompetisi;
use Illuminate\Http\Request;

class KompetisiController extends Controller
{
    public function index()
    {
        $kompetisi = Kompetisi::all();
        $DateNow = date('Y-m-d');
        return view('kompetisi.home', compact(['kompetisi','DateNow']));
    }

    public function detail($id)
    {
        $kompetisi = Kompetisi::find($id);
        return view('kompetisi.kompetisidetail', compact(['kompetisi']));
    }
}
