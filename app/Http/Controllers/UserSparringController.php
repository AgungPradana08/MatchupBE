<?php

namespace App\Http\Controllers;
use Pusher\Pusher;
use App\Models\User;
use App\Models\Order;
use App\Models\UserMabar;
use App\Models\Notifikasi;
use App\Models\UserSparring;
use Illuminate\Http\Request;
use App\Events\SparringTaken;
use Illuminate\Support\Carbon;
use App\Events\JoinNotification;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\Controller;
use App\Models\MatchesSparring;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;
use App\Notifications\EventNotification;
use Illuminate\Support\Facades\Notification;// Import model UserSparring


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
        $TimeNow = Carbon::now('Asia/Jakarta'); 
        $TimeFormatted = $TimeNow->format('H:i');
        $usersparring = UserSparring::where('user_id', session('user_id'))->get();


        
        
        if ($pengguna->skor < 50) {
            return view('/banscreen');
        } else {
            return view('user.usersparring.home', compact(['usersparring','DateNow','user','TimeFormatted']));
            
        }
        
    }

    public function index2(User $user)
    {   
        $DateNow = date('Y-m-d');
        $usersparring = UserSparring::all();
        $sparringterbaru = UserSparring::orderByRaw('ABS(DATEDIFF(tanggal_pertandingan, NOW()))')->get();
        $TimeNow = Carbon::now('Asia/Jakarta'); 
        $TimeFormatted = $TimeNow->format('H:i');
        // $sparringterbaru = UserSparring::orderBy('tanggal_pertandingan', 'desc')->get();

        foreach ($usersparring as $sparring) {              
            $tanggalPertandingan = Carbon::parse($sparring->tanggal_pertandingan);
            $DeleteDate = $tanggalPertandingan->addDays(2);
            $DateNow = date('Y-m-d');  
            if ($DateNow > $DeleteDate) {
                $sparring->delete();
            }

            // dd( $TimeFormatted , $TimeFormatted > $sparring->waktu_pertandingan );
        }


        // $user = User::all();
        return view('sparring.home', compact(['usersparring', 'user','DateNow','TimeFormatted', 'sparringterbaru']));
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
        // dd($request->all());
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
            'deskripsi_tambahan' => 'required',
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

        $post->joinedSparrings()->attach($request->input('pengambil_id'));
        
        // $eventname = "$ tambah data";
        // Notification::send($user, new EventNotification($eventname));

        session()->flash('notification', 'Sparring berhasil ditambahkan');
        return redirect('/usersparring/home');
    }

    public function detail($id, Request $request,)
    {
        $DateNow = date('Y-m-d');
        $TimeNow = Carbon::now('Asia/Jakarta'); 
        $TimeFormatted = $TimeNow->format('H:i');
        $usersparring = UserSparring::with(['joinedSparrings.teams', 'joinedSparrings.sparringTeams'])->find($id);
        $origin = Auth::user()->id;
        $usertim = Auth::user()->usertim;

        // $usersparring = UserSparring::find($id);
        // $takesparring = UserSparring::with('ambilsparring')->get();
        return view('user.usersparring.usersparringdetailnew', compact(['usersparring','DateNow','origin','TimeNow','TimeFormatted', 'usertim']));
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

        if ($DateNow) {
            $usersparring->whereDate('tanggal_pertandingan', '>=', $DateNow);
        }

        $usersparring = $usersparring->get();

        $sparringterbaru = UserSparring::orderByRaw('ABS(DATEDIFF(tanggal_pertandingan, NOW()))')->get();

        return view('sparring.home', compact(['usersparring', 'DateNow', 'sparringterbaru']));
    }

    public function search2(Request $request)
    {   
        $DateNow = date('Y-m-d');
        $TimeNow = Carbon::now('Asia/Jakarta'); 
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
        $readnotif = $pengguna->true;
        $hargaTiket = $sparring->harga_tiket;

        $nama = $pengguna->name;
        $total_price = $sparring->harga_tiket;

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

                // $order = new Order([
                //     'user_id' => $pengguna->id,
                //     'nama' => $nama,
                //     'total_price' => $total_price,
                //     'quantity' => 1,
                // ]);

                // $sparring->orders()->save($order);

                event(new SparringTaken(Auth::user(), $sparring));

                 // Buat notifikasi
                $sparringCreator = $sparring->user;
                $notificationMessage = "Tim " . $namaTimLawan . " Telah bergabung dengan Sparring " . $sparring->title;

                $notification = new Notifikasi([
                    'user_id' => $sparringCreator->id,
                    'message' => $notificationMessage,
                    'url' => "/usersparring/$sparring->id/usersparringdetail#Detail",

                ]);
                $notification->save();

                if ($pengguna->readnotif == "false") {
                    $sparringCreator->update(['readnotif' => "true"]);
                    $sparringCreator->save();
                }

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

//     public function removeTeamFromSparring($usersparringId, $usertimId)
// {
//     // Dapatkan si pengguna yang sedang login
//     $pengguna = Auth::user();

//     // Temukan sparring yang sesuai dengan ID yang diberikan
//     $sparring = UserSparring::findOrFail($usersparringId);

//     // Periksa apakah si pengguna adalah pembuat sparring
//     if ($sparring->user_id !== $pengguna->id) {
//         return redirect()->back()->with('error', 'Anda tidak memiliki izin untuk mengeluarkan tim dari Sparring ini.');
//     }

//     // Dapatkan hubungan joinedSparrings dengan pivot data
//     $joinedSparrings = $sparring->joinedSparrings()
//         ->wherePivot('user_id', $usertimId)
//         ->first();

//     // Periksa apakah hubungan ditemukan
//     if ($joinedSparrings) {
//         // Perbarui pivot data dengan mengatur kolom nama_tim_lawan dan image_tim_lawan menjadi null
//         $joinedSparrings->pivot->nama_tim_lawan = null;
//         $joinedSparrings->pivot->image_tim_lawan = null;
//         $joinedSparrings->pivot->save();

//         return redirect()->back()->with('notification', 'Tim berhasil dikeluarkan dari Sparring.');
//     }

//     return redirect()->back()->with('error', 'Tim tidak ditemukan dalam Sparring ini.');
// }

public function removeTeamFromSparring(Request $request, $sparringId)
{
    // Validasi dan logika lainnya...

    $sparring = UserSparring::findOrFail($sparringId);

    // Hapus hanya pengambil sparring dari tabel matches_sparring
    $sparring->joinedSparrings()->detach($request->input('pengambil_id'));

    return redirect()->back()->with('success', 'Pengambil sparring berhasil dihapus.');
}

    // public function removeTeamFromSparring($usersparringId, $usertimId)
    // {
    //     // Temukan sparring yang sesuai berdasarkan $usersparringId
    //     $sparring = UserSparring::findOrFail($usersparringId);

    //     // Hapus tim dengan ID $usertimId dari sparring
    //     $sparring->removeTeam($usertimId);

    //     // return view('user.usersparring.usersparringdetailnew',);
    //     return redirect()->back()->with('notification', 'Tim berhasil dikeluarkan dari sparring.');
    // }

    


    // public function removeTeamFromSparring($usersparringId, $matches_sparringId)
    // {
    //     $pengguna = Auth::user();
    //     $sparring = MatchesSparring::with('joinedSparrings.sparringTeams')->find($usersparringId);

    //     $sparring->joinedSparrings()->updateExistingPivot($pengguna->id, [
    //         'nama_tim_lawan' => null,
    //         'image_tim_lawan' => null,

    //     ]);

    //     $sparring->save();

    //     // $sparring->removeTeam($usertimId);

    //     // $sparring->joinedTeams()->detach($sparring->id);
    //     // $sparring->removeTeam($usertimId);

    //     return redirect()->back()->with('notification', 'Tim berhasil dikeluarkan dari sparring.');
    // }





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
