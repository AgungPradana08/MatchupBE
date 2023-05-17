<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserMabarController extends Controller
{
    public function index()
    {
        return view('user.usermabar.home');
    }
}
