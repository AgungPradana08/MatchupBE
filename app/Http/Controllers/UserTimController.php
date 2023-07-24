<?php

namespace App\Http\Controllers;

use App\Models\Tim;
use App\Models\User;
use App\Models\UserTim;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserTimController extends Controller
{
    public function index()
    {
        $usertim = UserTim::all();
        return view('user.usertim.home', compact('usertim'));
    }

    public function index2(User $user)
    {   
        $usertim = UserTim::all();
        // $user = User::all();
        return view('tim.home', compact(['usertim'])) ;
    }

    public function tambah()
    {
        return view('user.usertim.tambahtim');
    }

    public function detail($id)
    {
        $usertim = UserTim::find($id);
        return view('user.usertim.usertimdetail', compact(['usertim']));
    }

    public function store(Request $request)
    {
        // dd($request->all());
        $pengguna = Auth::user();

        $this->validate($request, rules: [
            'nama_tim' => 'required',
            'image' => 'required|mimes:jpg,jpeg,png',
            'olahraga' => 'required',
            'deskripsi' => 'required',
            'max_member' => 'required',
            'tingkatan' => 'required',
            'nomor_telepon' => 'required',
            'instagram' => 'required',
            'whatsapp' => 'required',
            'facebook' => 'required',
        ]);

        $file_name = $request->image->getClientOriginalName();
        $image = $request->image->storeAs('image2', $file_name);

        $tim = UserTim::create([
            'user_id' => $pengguna->id,
            'nama_tim' => $request->nama_tim,
            'image' => $image,
            'olahraga' => $request->olahraga,
            'deskripsi' => $request->deskripsi,
            'max_member' => $request->max_member,
            'tingkatan' => $request->tingkatan,
            'nomor_telepon' => $request->nomor_telepon,
            'instagram' => $request->instagram,
            'whatsapp' => $request->whatsapp,
            'facebook' => $request->facebook,
        ]);

        $pengguna->poststim()->save($tim);

        return redirect('/usertim/home');
    }
    
    public function edit($id)
    {
        // dd($id);
        $usertim = UserTim::find($id);
        return view('user.usertim.usertimedit', compact(['usertim']));
    }

    public function update($id, Request $request)
    {
        $usertim = UserTim::find($id);

        $file_name = $request->image->getClientOriginalName();
        $image = $request->image->storeAs('image2', $file_name);
        
        // $usersparring->update($request -> except(['_token','submit',]));
        $usertim->update([
            'nama_tim' => $request->nama_tim,
            'image' => $image,
            'olahraga' => $request->olahraga,
            'deskripsi' => $request->deskripsi,
            'max_member' => $request->max_member,
            'tingkatan' => $request->tingkatan,
            'nomor_telepon' => $request->nomor_telepon,
            'instagram' => $request->instagram,
            'whatsapp' => $request->whatsapp,
            'facebook' => $request->facebook,
        ]);
        return redirect('/usertim/home');
    }

    public function destroy($id)
    {
        $usertim = UserTim::find($id);
        $usertim->delete();
        return redirect('/usertim/home');
    }
}
