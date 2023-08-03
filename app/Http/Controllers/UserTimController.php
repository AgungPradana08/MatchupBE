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
        $usertim = UserTim::where('user_id', session('user_id'))->get();
        return view('user.usertim.home', compact(['usertim']));
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
            'image' => 'required|mimes:jpg,jpeg,png,gif',
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

        // $pengguna->poststim()->save($tim);
        $tim->joinedPlayers()->attach($pengguna->id);
        session()->flash('notification', 'Tim berhasil di tambah');
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

    public function search(Request $request)
    {
        $searchtitle = $request->input('search');
        $olahragaFilter = $request->input('olahraga');
        $lokasiFilter = $request->input('lokasi');

        $usertim = UserTim::query();

        if ($searchtitle) {
            $usertim->where('title', 'like', '%'.$searchtitle.'%');
        }

        if ($olahragaFilter) {
            $usertim->where('olahraga', $olahragaFilter);
        }
        if ($lokasiFilter) {
            $usertim->where('lokasi', $lokasiFilter);
        }

        $usertim = $usertim->get();

        return view('tim.home', compact(['usertim']));
    }

    public function search2(Request $request)
    {
        $searchtitle = $request->input('search');
        $olahragaFilter = $request->input('olahraga');
        $lokasiFilter = $request->input('lokasi');

        $usertim = UserTim::query();

        if ($searchtitle) {
            $usertim->where('title', 'like', '%'.$searchtitle.'%');
        }

        if ($olahragaFilter) {
            $usertim->where('olahraga', $olahragaFilter);
        }
        if ($lokasiFilter) {
            $usertim->where('lokasi', $lokasiFilter);
        }

        // $usertim = $usertim->get();
        $usertim = $usertim->where('user_id', session('user_id'))->get();

        return view('user.usertim.home', compact(['usertim']));
    }

    public function jointim($usertimId)
    {
        $pengguna = Auth::user();
        $tim = UserTim::with('joinedPlayers')->find($usertimId);

        if ($tim) {
            // Cek apakah user sudah terdaftar sebagai peserta tim
            if (!$tim->joinedPlayers->contains($pengguna->id)) {
                // Cek apakah user sudah bergabung dengan tim lain atau menjadi team leader di tim lain
                $isJoinedOtherTeam = $pengguna->teams->isNotEmpty();
                $isTeamLeaderInOtherTeam = $pengguna->hostedTeams->isNotEmpty();

                if ($isJoinedOtherTeam || $isTeamLeaderInOtherTeam) {
                    return redirect()->route('tim.detail', ['id' => $usertimId])->with('notification', 'Maaf, Anda hanya dapat bergabung dengan satu tim!');
                }

                if ($pengguna->hostedTim) {
                    return redirect()->route('tim.detail', ['id' => $usertimId])->with('notification', 'Anda telah menjadi team leader pada tim lain dan tidak dapat bergabung dengan tim lainnya.');
                }

                if ($tim->joinedPlayers->count() >= $tim->max_member) {
                    return redirect()->route('tim.detail', ['id' => $usertimId])->with('notification', 'Maaf, jumlah peserta tim telah mencapai batas maksimum!');
                }
                // Jika belum terdaftar, tambahkan user ke relasi Many-to-Many
                $tim->joinedPlayers()->attach($pengguna->id);
                return redirect()->route('tim.detail', ['id' => $usertimId])->with('notification', 'Anda telah bergabung dengan Tim!');
            } else {
                return redirect()->route('tim.detail', ['id' => $usertimId])->with('notification', 'Anda sudah terdaftar sebagai peserta Tim ini!');
            }
        } else {
            return redirect()->route('tim.index')->with('error', 'Tim tidak ditemukan!');
        }
    }


    public function leaveTim($usertimId)
    {
        $pengguna = Auth::user();
        $tim = UserTim::with('joinedPlayers')->find($usertimId);

        if ($tim) {
            // Cek apakah user sudah terdaftar sebagai peserta tim
            if ($tim->joinedPlayers->contains($pengguna->id)) {
                // Hapus user dari relasi Many-to-Many
                $tim->joinedPlayers()->detach($pengguna->id);
                // Jika pengguna adalah host tim, set host_id menjadi nul
                if ($tim->host_id === $pengguna->id) {
                    $tim->host_id = null;
                    $tim->save();
                }
                return redirect()->route('tim.detail', ['id' => $usertimId])->with('notification', 'Anda telah keluar dari Tim.');
            } else {
                return redirect()->route('tim.detail', ['id' => $usertimId])->with('notification', 'Anda belum terdaftar sebagai peserta Tim ini.');
            }
        } else {
            return redirect()->route('tim.index')->with('error', 'Tim tidak ditemukan!');
        }
    }


}
