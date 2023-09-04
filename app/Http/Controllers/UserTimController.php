<?php

namespace App\Http\Controllers;

use App\Models\Tim;
use App\Models\User;
use App\Models\UserTim;
use App\Events\TimTaken;
use App\Models\Notifikasi;
use Illuminate\Http\Request;
use App\Events\JoinNotification;
use Illuminate\Support\Facades\Auth;

class UserTimController extends Controller
{
    public function index()
    {
        $pengguna = auth()->user();
        $DateNow = date('Y-m-d');
        $timyangdiikuti = $pengguna->joinedTeams;
        $usertim = UserTim::where('user_id', session('user_id'))->get();

        // dd($usertim, $pengguna->id);

   
        return view('user.usertim.home', compact(['pengguna','usertim','DateNow', 'timyangdiikuti']));
    }

    public function index2(User $user)
    {   
        $pengguna = auth()->user();

        $timyangdiikuti = $pengguna->teams;
        $timLainnya = UserTim::whereNotIn('id', $timyangdiikuti->pluck('id'))->get();
        
        $sortedteams = $timyangdiikuti->concat($timLainnya);
        $usertim = UserTim::all();

        // dd();
        
        // $user = User::all();
        return view('tim.home', compact(['usertim', 'sortedteams']));
    }

    public function tambah()
    {
        $user = Auth::user();
        

        if ($user->skor < 75) {
            return redirect()->route('tim.home')->with('notification', 'Anda Tidak di izinkan membuat Tim.');
        }

        return view('user.usertim.tambahtim');
    }

    public function detail($id)
    {
        $origin = Auth::user()->id;
        $usertim = UserTim::find($id);
        $pengguna = intval($id);

        // dd($usertim->user_id);

        // dd($pengguna,Auth::user()->id);
        return view('user.usertim.usertimdetail', compact(['usertim','origin']));
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
            'area_bermain' => 'required',
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
            'area_bermain' => $request->area_bermain,
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



        if ($request->hasFile('image')) {
            // Jika pengguna mengunggah gambar baru
            $file_name = $request->image->getClientOriginalName();
            $image = $request->image->storeAs('image2', $file_name);
        } else {
            // Jika pengguna tidak mengunggah gambar baru
            // Gunakan foto yang sudah ada di database
            $image = $usertim->image;
        };
        
        // $usersparring->update($request -> except(['_token','submit',]));
        $usertim->update([
            'nama_tim' => $request->nama_tim,
            'image' => $image,
            'olahraga' => $request->olahraga,
            'deskripsi' => $request->deskripsi,
            'max_member' => $request->max_member,
            'area_bermain' => $request->area_bermain,
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
            $usertim->where('nama_tim', 'like', '%'.$searchtitle.'%');
        }

        if ($olahragaFilter) {
            $usertim->where('olahraga', $olahragaFilter);
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
            $usertim->where('nama_tim', 'like', '%'.$searchtitle.'%');
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

                event(new TimTaken(Auth::user(), $tim));

                 // Buat notifikasi
                $timCreator = $tim->user;
                $notificationMessage = "$pengguna->name telah bergabung dengan Tim $tim->nama_tim";

                $notification = new Notifikasi([
                    'user_id' => $timCreator->id,
                    'message' => $notificationMessage,
                    'url' => "/usertim/$tim->id/usertimdetail",
                    
                ]);
                $notification->save();

                if ($pengguna->readnotif == "false") {
                    $timCreator->update(['readnotif' => "true"]);
                    $timCreator->save();
                }

                // Jika belum terdaftar, tambahkan user ke relasi Many-to-Many
                $tim->joinedPlayers()->attach($pengguna->id);
                // event(new JoinNotification($pengguna . "telah bergabung tim anda "));
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

    public function kickPlayer(User $player)
    {
        // Lakukan validasi apakah pengguna yang ingin mengeluarkan pemain memiliki hak untuk melakukannya
        // Contoh: Anda mungkin ingin memeriksa apakah pengguna saat ini adalah kapten tim

        // Jika validasi berhasil, lakukan tindakan penghapusan pemain dari tim
        $player->delete();

        // Redirect atau kembali ke halaman yang sesuai, misalnya ke halaman tim
        return redirect()->back()->with('notification', 'Pengguna berhasil dikick.');
    }


    public function processForm(Request $request)
    {
    $namaInput = $request->input('user_id');
    $checkboxInput = $request->input('reportuserpoint');

    $user = User::find($namaInput);

    if ($user) {
        // Kurangkan skor pengguna
        $user->skor -= $checkboxInput;

        // Simpan perubahan pada database
        $user->save();

        return redirect()->back()->with('notification', 'Pengguna berhasil dilaporkan.');
    } else {
        return redirect()->back()->with('error', 'Pengguna tidak ditemukan.');
    }
    
    // Lakukan operasi yang diperlukan dengan data yang diterima dari formulir
    }

    public function reporttim(Request $request)
    {
    $TimInput = $request->input('reporttimid');
    $checkboxTimInput = $request->input('ReportTimPoin');

    $tim = UserTim::find($TimInput);

    if ($tim) {
        // Kurangkan skor pengguna
        $tim->skor -= $checkboxTimInput;

        // Simpan perubahan pada database
        $tim->save();

        return redirect()->back()->with('notification', 'Pengguna berhasil dilaporkan.');
    } else {
        return redirect()->back()->with('error', 'Pengguna tidak ditemukan.');
    }
    
    // Lakukan operasi yang diperlukan dengan data yang diterima dari formulir
    }


}
