<?php

namespace App\Http\Controllers;
use App\Models\Tim;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TimController extends Controller
{
    public function index()
    {
        $tim = Tim::all();
        return view('tim.home', compact(['tim']));
    }

    public function detail($id)
    {
        $tim = Tim::find($id);
        return view('tim.timdetail', compact(['tim']));
    }

    public function tambah()
    {

        return view('tim.tambahtim');
    }
}
