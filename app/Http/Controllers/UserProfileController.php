<?php

namespace App\Http\Controllers;
use App\Models\User;

use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Auth;

class UserProfileController extends Controller
{
    public function index()
    {   
        // $pengguna = User::all();
        $pengguna = Auth::user();
        return view('user.userprofile.home', compact(['pengguna']));
    }

    public function edit()
    {
        $userprofile = Auth::user();
        return view('user.userprofile.userprofileedit', compact(['userprofile']));
    }

    // public function update(Request $request)
    // {
    //     $pengguna = Auth::user();

    //     $validatedData = $request->validate([
    //         'username' => ['required', 'string', 'max:255', Rule::unique('users')->ignore($pengguna->id)],
    //     ]);

    //     $pengguna->username = $validatedData['username'];
    //     $pengguna->save($request -> except(['_token','submit']));
    // }
}
