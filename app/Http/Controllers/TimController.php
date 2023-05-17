<?php

namespace App\Http\Controllers;

use App\Models\Tim;
use Illuminate\Http\Request;

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
}
