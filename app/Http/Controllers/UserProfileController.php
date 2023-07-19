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

    public function update(Request $request){
        // dd($request->all());
        $pengguna = User::find(Auth::user()->id);


        $pengguna->update([
            $pengguna->name = $request->name,
            $pengguna->username = $request->username,
        ]);
        
        return redirect('/userprofile/home');
    }
}
