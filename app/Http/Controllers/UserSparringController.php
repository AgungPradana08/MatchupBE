<?php

namespace App\Http\Controllers;
use Pusher\Pusher;
use App\Models\User;
use App\Models\Notifikasi;
use App\Models\UserSparring;
use Illuminate\Http\Request;
use App\Events\SparringTaken;
use Illuminate\Support\Carbon;
use App\Events\JoinNotification;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;
use App\Notifications\EventNotification;
use Illuminate\Support\Facades\Notification;

class UserSparringController extends Controller
{   
    public function __construct()
    {
        $this->middleware(['auth', 'verified']);
    }

    public function index() 
    {   
        // $usersparring = UserSparring::all();
        $user = User::find(1);
        $DateNow = date('Y-m-d');
        $pengguna = Auth::user();
        $usersparring = UserSparring::where('user_id', session('user_id'))->get();
        
        if ($pengguna->skor < 50) {
            return view('/banscreen');
        } else {
            return view('user.usersparring.home', compact(['usersparring','DateNow','user']));
            
        }
        
    }

    public function index2(User $user)
    {   
        $DateNow = date('Y-m-d');
        $usersparring = UserSparring::all();
        // $sparringterbaru = UserSparring::orderBy('tanggal_pertandingan', 'desc')->get();

        // $user = User::all();
        return view('sparring.home', compact(['usersparring', 'user','DateNow',]));
    }

    public function tambah()
    {   

        $user = Auth::user();

        if ($user->skor < 85) {
            return redirect()->route('usersparring.home')->with('notification', 'Anda Tidak di izinkan membuat sparring.');
        }

         if ($user->teams->isEmpty()) {
            // Jika belum, arahkan user ke halaman tertentu atau tampilkan pesan peringatan
            return redirect()->route('usersparring.home')->with('notification', 'Anda harus tergabung dalam tim terlebih dahulu atau memiliki sebelum dapat membuat sparring.');
        }
        
        $usersparring = UserSparring::all();
        $timyangdiikuti = $user->poststim->first();

  
        // $namatim = $timyangdiikuti->nama_tim;

        // $user = User::find(); // Mendapatkan objek user dengan ID 1
        // $timyangdiikuti = $user->poststim()->get();  
        // $namatim = $timyangdiikuti->nama_tim;


        return view('user.usersparring.tambahsparringnew', compact(['usersparring', 'timyangdiikuti']));
    }

    public function store(Request $request)
    {
        $pengguna = Auth::user();

        $this->validate($request, [
            'title' => 'required',
            'nama_tim' => 'required',
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
        $image = $request->image->storeAs('image2', $file_name);

        
        $usertimId = $pengguna->userTim->id ?? null; // Cek jika pengguna sudah memiliki tim

        // Jika pengguna belum memiliki tim, cari tim dari pengguna yang baru saja bergabung dengan sparring
        if (!$usertimId) {
            $latestJoinedUser = UserSparring::where('user_id', '!=', $pengguna->id)
                ->orderByDesc('created_at')
                ->first();

            if ($latestJoinedUser) {
                $usertimId = $latestJoinedUser->usertim_id;
            }
        }

        $post = UserSparring::create([
            'user_id' => $pengguna->id,
            'usertim_id' => $pengguna->userTim->id, // Simpan usertim_id di sini
            'title' => $request->title,
            'nama_tim' => $request->nama_tim,
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

        // $UserTarget = 1;
        // $user = User::find($UserTarget);

        // $post->joinedSparrings()->attach($pengguna->id);
        // if ($pengguna->SparringTims) {
        //     $post->teams()->attach($pengguna->SparringTims->id);
        //     $post->save();
        // }    
        $usertimId = $pengguna->usertim->id;
        $post->joinedSparrings()->attach($pengguna->id, ['usertim_id' => $usertimId]);

        // $eventname = "$ tambah data";
        // Notification::send($user, new EventNotification($eventname));

        session()->flash('notification', 'Sparring berhasil ditambahkan');
        return redirect('/usersparring/home');
    }

    public function detail($usersparringId)
    {
        $DateNow = date('Y-m-d');
        $usersparring = UserSparring::with(['joinedSparrings.teams', 'joinedSparrings.sparringTeams'])->find($usersparringId);
        $origin = Auth::user()->id;
        

        // $usersparring = UserSparring::find($id);
        // $takesparring = UserSparring::with('ambilsparring')->get();
        return view('user.usersparring.usersparringdetailnew', compact(['usersparring','DateNow','origin']));
        // return view('user.usersparring.usersparringdetail', compact(['usersparring']));
    }

    public function edit($id)
    {
        // dd($id);
        $usersparring = UserSparring::find($id);
        return view('user.usersparring.usersparringedit', compact(['usersparring']));
    }
    
    public function update($id, Request $request)
    {

        $usersparring = UserSparring::find($id);



        if ($request->hasFile('image')) {
            // Jika pengguna mengunggah gambar baru
            $file_name = $request->image->getClientOriginalName();
            $image = $request->image->storeAs('image2', $file_name);
        } else {
            // Jika pengguna tidak mengunggah gambar baru
            // Gunakan foto yang sudah ada di database
            $image = $usersparring->image;
        };

        // dd($request->all());
        

        // $usersparring->update($request -> except(['_token','submit',]));
        $usersparring->update([
            'title' => $request->title,
            'nama_tim' => $request->nama_tim,
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

        

        return redirect('/usersparring/home');
        
    }

    public function destroy($id)
    {
        $usersparring = UserSparring::find($id);
        $usersparring->delete();
        return redirect('/usersparring/home');
    }

    public function search(Request $request)
    {
        $DateNow = date('Y-m-d');
        $searchtitle = $request->input('search');
        $olahragaFilter = $request->input('olahraga');
        $lokasiFilter = $request->input('lokasi');

        $usersparring = UserSparring::query();

        if ($searchtitle) {
            $usersparring->where('title', 'like', '%'.$searchtitle.'%');
        }

        if ($olahragaFilter) {
            $usersparring->where('olahraga', $olahragaFilter);
        }
        if ($lokasiFilter) {
            $usersparring->where('lokasi', $lokasiFilter);
        }

        $usersparring = $usersparring->get();

        return view('sparring.home', compact(['usersparring', 'DateNow']));
    }

    public function search2(Request $request)
    {   
        $DateNow = date('Y-m-d');
        $searchtitle = $request->input('search');
        $olahragaFilter = $request->input('olahraga');
        $lokasiFilter = $request->input('lokasi');

        $usersparring = UserSparring::query();
        // $usersparring = UserSparring::where('user_id', session('user_id'))->get();

        if ($searchtitle) {
            $usersparring->where('title', 'like', '%'.$searchtitle.'%');
        }

        if ($olahragaFilter) {
            $usersparring->where('olahraga', $olahragaFilter);
        }
        if ($lokasiFilter) {
            $usersparring->where('lokasi', $lokasiFilter);
        }

        // $usersparring = $usersparring->get();
        $usersparring = $usersparring->where('user_id', session('user_id'))->get();

        return view('user.usersparring.home', compact(['usersparring', 'DateNow']));
    }

    public function versus()
    {
        return view('user.usersparring.versus');
    }

    public function versusstore($id, Request $request)
    {
        // dd($request->all());
        $usersparrings = UserSparring::find($id);
        $usersparrings->update($request->nama_tim_lawan);
        return redirect('sparring.home');
    }
    
    public function versusedit($id)
    {
        // dd($id);
        $versus = UserSparring::find($id);
        return view('user.usersparring.usersparringdetailnew', compact(['versus']));
    }

    public function joinsparring($usersparringId)
    {
        $pengguna = Auth::user();
        $sparring = UserSparring::with('joinedSparrings.sparringTeams')->find($usersparringId);

        $userTim = $pengguna->teams->first();

        if (!$userTim) {
            return redirect()->route('sparring.detail', ['id' => $usersparringId])->with('notification', 'Maaf, Anda harus bergabung dengan tim terlebih dahulu sebelum dapat bergabung dengan Sparring!');
        }
        
        $usertimId = $userTim->id;
        $namaTimLawan = $userTim->nama_tim;
        $imageTimLawan = $userTim->image;

        if ($sparring) {
            // Cek apakah user sudah terdaftar sebagai peserta sparring
            if (!$sparring->joinedSparrings->contains($pengguna->id)) {
                // Cek apakah user sudah bergabung dengan sparring
                if ($pengguna->teams->isEmpty()) {
                    return redirect()->route('sparring.detail', ['id' => $usersparringId])->with('notification', 'Maaf, Anda harus bergabung dengan tim terlebih dahulu sebelum dapat bergabung dengan Sparring!');
                }

                if ($sparring->joinedSparrings->count() >= $sparring->max_member) {
                    return redirect()->route('sparring.detail', ['id' => $usersparringId])->with('notification', 'Maaf, jumlah peserta acara sparing telah mencapai batas maksimum!');
                }
                // Jika belum terdaftar dan sudah bergabung dengan tim, tambahkan user ke relasi Many-to-Many
                $sparring->joinedSparrings()->attach($pengguna->id, [
                    'usertim_id' => $usertimId,
                    'nama_tim_lawan' => $namaTimLawan,
                    'image_tim_lawan' => $imageTimLawan,

                ]);

                event(new SparringTaken(Auth::user(), $sparring));

                 // Buat notifikasi
                $sparringCreator = $sparring->user;
                $notificationMessage = "Sparring yang Anda buat telah diambil oleh seseorang.";

                $notification = new Notifikasi([
                    'user_id' => $sparringCreator->id,
                    'message' => $notificationMessage
                ]);
                $notification->save();

                // Ambil nama tim lawan dari sparring pertama yang di-join oleh user
                if ($sparring->joinedSparrings->first()->sparringTeams->isNotEmpty()) {
                    $namaTimLawan = $sparring->joinedSparrings->first()->sparringTeams->first()->nama_tim_lawan;
                    
                    // Update kolom nama_tim_lawan pada tabel matches_sparring
                    // $sparring->pivot->update(['nama_tim_lawan' => $namaTimLawan]);

                    $sparring->joinedSparrings->first()->pivot->update(['nama_tim_lawan' => $namaTimLawan]);
                }
                // event(new JoinNotification($namaTimLawan . "telah bergabung event sparring " . $userTim));
                return redirect()->route('sparring.detail', ['id' => $usersparringId])->with('notification', 'Anda telah bergabung dengan Sparring!');
            } else {
                $option = array(
                    'cluster' => 'ap1',
                    'useTLS' => true
                );
                
                $pusher = new Pusher(
                    '6eb6fee921b475b51b2d',
                    '40da46983988980660fc',
                    '1649652',
                    $option
                );
                
                $penerimaid = "1";
                $data = "seseorang telah bergabung dengan event sparringmu(Private)";
                $data = "seseorang telah bergabung dengan event sparringmu";

                $pusher->trigger("private.$penerimaid", "my-event", ['message' => $data]);


                return redirect()->route('sparring.detail', ['id' => $usersparringId])->with('notification', 'Anda sudah terdaftar sebagai peserta Sparring ini!');
            }
        } else {
            return redirect()->route('mabar.index')->with('error', 'Sparring tidak ditemukan!');
        }
    }





    // public function joinsparring2($usersparringId)
    // {
    //     $user = Auth::user();

    //     // Panggil fungsi joinSparring dari model User untuk bergabung dengan sparring
    //     $result = $user->joinSparring($usersparringId);

    //     if ($result) {
    //         return redirect()->route('sparring.detail', ['id' => $usersparringId])->with('notification', 'Anda telah bergabung dengan Sparring!');
    //     } else {
    //         return redirect()->route('sparring.detail', ['id' => $usersparringId])->with('error', 'Anda harus bergabung dengan Tim terlebih dahulu.');
    //     }
    // }
    
}
