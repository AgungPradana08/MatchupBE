<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserSparringController extends Controller
{
    public function index()
    {
        return view('user.usersparring.home');
    }
}
