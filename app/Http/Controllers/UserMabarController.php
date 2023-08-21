<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Matching;
use App\Models\UserMabar;
use App\Events\MabarTaken;
use App\Models\Notifikasi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserMabarController extends Controller
{
    public function index()
    {
        $DateNow = date('Y-m-d');
        // $usermabar = UserMabar::all();
        $usermabar = UserMabar::where('user_id', session('user_id'))->get();
        return view('user.usermabar.home', compact(['usermabar','DateNow']));
    }

    public function index2()
    {   
        $DateNow = date('Y-m-d');
        $usermabar = UserMabar::all();
        $mabarterbaru = UserMabar::orderBy('tanggal_pertandingan', 'desc')->get();
        return view('mabar.home', compact(['usermabar','DateNow', 'mabarterbaru'])) ;
    }

    public function tambah()
    {
        $user = Auth::user();
        $usermabar = UserMabar::all();

        if ($user->skor < 75) {
            return redirect()->route('usermabar.home')->with('notification', 'Anda Tidak di izinkan membuat Mabar.');
        }

        return view('user.usermabar.usermabartambah', compact(['usermabar']));
    }

    public function store(Request $request)
    {
        // dd($request->all());

        $pengguna = Auth::user();

        $this->validate($request, rules: [
            'title' => 'required',
            'image' => 'required|mimes:jpg,jpeg,png,gif',
            'olahraga' => 'required',
            'deskripsi' => 'required',
            'lokasi' => 'required',
            'detail_lokasi' => 'required',
            'embed_lokasi' => 'required',
            'min_member' => 'required',
            'max_member' => 'required',
            'tingkatan' => 'required',
            'tanggal_pertandingan' => 'required',
            'harga_tiket' => 'required',
            'lama_pertandingan' => 'required',
            'waktu_pertandingan' => 'required',
        ]);

        $file_name = $request->image->getClientOriginalName();
        $image = $request->image->storeAs('image4', $file_name);

        $mabar = UserMabar::create([
            'user_id' => $pengguna->id,
            'host_id' => $pengguna->id,
            'title' => $request->title,
            'image' => $image,
            'olahraga' => $request->olahraga,
            'deskripsi' => $request->deskripsi,
            'lokasi' => $request->lokasi,
            'detail_lokasi' => $request->detail_lokasi,
            'embed_lokasi' => $request->embed_lokasi,
            'min_member' => $request->min_member,
            'max_member' => $request->max_member,
            'tingkatan' => $request->tingkatan,
            'tanggal_pertandingan' => $request->tanggal_pertandingan,
            'harga_tiket' => $request->harga_tiket,
            'lama_pertandingan' => $request->lama_pertandingan,
            'waktu_pertandingan' => $request->waktu_pertandingan,
            'deskripsi_tambahan' => $request->deskripsi_tambahan,
        ]);

        // $pengguna->postsmabar()->save($mabar);
        $mabar->joinedUsers()->attach($pengguna->id);
        session()->flash('notification', 'Mabar berhasil di tambah');
        return redirect('/usermabar/home');
    }   

    public function search(Request $request)
    {
        $DateNow = date('Y-m-d');
        $searchtitle = $request->input('search');
        $olahragaFilter = $request->input('olahraga');
        $lokasiFilter = $request->input('lokasi');
        // $mabarterbaru = UserMabar::orderBy('tanggal_pertandingan', 'desc')->get();

        $usermabar = UserMabar::query();

        if ($searchtitle) {
            $usermabar->where('title', 'like', '%'.$searchtitle.'%');
        }

        if ($olahragaFilter) {
            $usermabar->where('olahraga', $olahragaFilter);
        }
        if ($lokasiFilter) {
            $usermabar->where('lokasi', $lokasiFilter);
        }

        $usermabar = $usermabar->get();

        return view('mabar.home', compact(['usermabar', 'DateNow',]));
    }

    public function search2(Request $request)
    {   
        $DateNow = date('Y-m-d');
        $searchtitle = $request->input('search');
        $olahragaFilter = $request->input('olahraga');
        $lokasiFilter = $request->input('lokasi');

        $usermabar = UserMabar::query();

        if ($searchtitle) {
            $usermabar->where('title', 'like', '%'.$searchtitle.'%');
        }

        if ($olahragaFilter) {
            $usermabar->where('olahraga', $olahragaFilter);
        }
        if ($lokasiFilter) {
            $usermabar->where('lokasi', $lokasiFilter);
        }

        // $usermabar = $usermabar->get();
        $usermabar = $usermabar->where('user_id', session('user_id'))->get();

        return view('user.usermabar.home', compact(['usermabar', 'DateNow']));
    }

    public function detail($id)
    {
        $origin = Auth::user()->id;
        $DateNow = date('Y-m-d');
        $usermabar = UserMabar::with('joinedUsers')->findOrFail($id);
        $pengguna = Auth::user();
        $isJoined = $usermabar->joinedUsers->contains('id', $origin);

        // dd($usermabar->joinedUsers->contains('id', $origin));
        return view('user.usermabar.usermabardetail', compact('usermabar', 'pengguna','origin','DateNow'));
    }

    public function edit($id)
    {
        // dd($id);
        $usermabar = UserMabar::find($id);
        return view('user.usermabar.usermabaredit', compact(['usermabar']));
    }
    
    public function update($id, Request $request)
    {
        $usermabar = UserMabar::find($id);

        if ($request->hasFile('image')) {
            // Jika pengguna mengunggah gambar baru
            $file_name = $request->image->getClientOriginalName();
            $image = $request->image->storeAs('image2', $file_name);
        } else {
            // Jika pengguna tidak mengunggah gambar baru
            // Gunakan foto yang sudah ada di database
            $image = $usermabar->image;
        };

        $usermabar->update([
            'title' => $request->title,
            'image' => $image,
            'olahraga' => $request->olahraga,
            'deskripsi' => $request->deskripsi,
            'lokasi' => $request->lokasi,
            'detail_lokasi' => $request->detail_lokasi,
            'embed_lokasi' => $request->embed_lokasi,
            'min_member' => $request->min_member,
            'max_member' => $request->max_member,
            'tingkatan' => $request->tingkatan,
            'tanggal_pertandingan' => $request->tanggal_pertandingan,
            'harga_tiket' => $request->harga_tiket,
            'lama_pertandingan' => $request->lama_pertandingan,
            'waktu_pertandingan' => $request->waktu_pertandingan,
            'deskripsi_tambahan' => $request->deskripsi_tambahan,
        ]);
        return redirect('/usermabar/home');
    }

    public function destroy($id)
    {
        $usermabar = UserMabar::find($id);
        $usermabar->delete();
        return redirect('/usermabar/home');
    }

    public function joinmabar($usermabarId)
    {
        $pengguna = Auth::user();
        $mabar = UserMabar::with('joinedUsers')->find($usermabarId);

        if ($mabar) {
            // Cek apakah user sudah terdaftar sebagai peserta mabar
            if (!$mabar->joinedUsers->contains($pengguna->id)) {
                
                if ($mabar->joinedUsers->count() >= $mabar->max_member) {
                    return redirect()->route('mabar.detail', ['id' => $usermabarId])->with('notification', 'Maaf, jumlah peserta acara mabar telah mencapai batas maksimum!');
                }

                event(new MabarTaken(Auth::user(), $mabar));

                 // Buat notifikasi
                $mabarCreator = $mabar->user;
                $notificationMessage = "$pengguna->name telah Bergabung ke dalam Mabar $mabar->title  Anda! ";

                $notification = new Notifikasi([
                    'user_id' => $mabarCreator->id,
                    'message' => $notificationMessage,
                ]);
                $notification->save();
                
                if ($pengguna->readnotif == "false") {
                    $mabarCreator->update(['readnotif' => "true"]);
                    $mabarCreator->save();
                }

                // Jika belum terdaftar, tambahkan user ke relasi Many-to-Many
                $mabar->joinedUsers()->attach($pengguna->id);
                return redirect()->route('mabar.detail', ['id' => $usermabarId])->with('notification', 'Anda telah bergabung dengan Mabar!');
            } else {
                return redirect()->route('mabar.detail', ['id' => $usermabarId])->with('notification', 'Anda sudah terdaftar sebagai peserta Mabar ini!');
            }
        } else {
            return redirect()->route('mabar.index')->with('error', 'Mabar tidak ditemukan!');
        }
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
}
