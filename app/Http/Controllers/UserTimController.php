<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserTimController extends Controller
{
    public function index()
    {
        return view('user.usertim.home');
    }

    public function tambah()
    {
        return view('user.usertim.tambahtim');
    }
}
