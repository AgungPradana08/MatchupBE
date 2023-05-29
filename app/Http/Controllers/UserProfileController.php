<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;

use Illuminate\Http\Request;

class UserProfileController extends Controller
{
    public function index()
    {
        return view('user.userprofile.home');
    }
}
