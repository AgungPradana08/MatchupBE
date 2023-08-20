<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Match Up</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <link rel="stylesheet" href="/css/user-sparring.css">
    <link rel="stylesheet" href="/css/notification.css">
    <link rel="shortcut icon" type="image/x-icon" href="/css/img/vector.png">

</head>
<body>
 
    <div id="notification" class="alert position-absolute notification justify-content-between mt-sm-4 mt-2 shadow-lg {{ session('notification') === 'Anda Tidak di izinkan membuat sparring.' || session('notification') === 'Anda harus tergabung dalam tim terlebih dahulu atau memiliki sebelum dapat membuat sparring.' || session('notification') === 'Sparring berhasil di tambah' || session('notification') === 'Sparring berhasil di hapus' || session('notification') === 'Sparring Berhasil di edit' ? 'appear' : 'd-none' }}"  role="alert">
        <p class="d-inline-block p-0 m-0 " >{{ session('notification') }}</p>
        <button type="button" class="btn-close " onclick="closenotification()" aria-label="Close"></button>
    </div>
    <nav class="navbar navbar-expand-sm p-0 position-fixed bg-white " style="width: 100vw; z-index: 100;">
        <div class="container bg-ms-primary ">
          <a class="navbar-brand" href="/sparring/home"><img src="/css/img/back button.png" style="height: 4vh;" alt=""></a>
          <div class="collapse navbar-collapse"  id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
              <li class="nav-item mx-0 mx-lg-2">
                <a class="nav-link text-start text-lg-center " aria-current="page" href="/userprofile/home"><span>Profile</span></a>
              </li>
              <li class="nav-item mx-0 mx-lg-2">
                <a class="nav-link text-start text-lg-center active" aria-current="page" href="/usersparring/home"><span>Sparring</span></a>
              </li>
              <li class="nav-item mx-0 mx-lg-2">
                <a class="nav-link text-start text-lg-center" aria-current="page"href="/usermabar/home"><span>Mabar</span></a>
              </li>
              <li class="nav-item mx-0 mx-lg-2">
                <a class="nav-link text-start text-lg-center" aria-current="page" href="/usertim/home"><span>Tim</span></a>
              </li>
              
            </ul>
          </div>
        </div>
    </nav>
    <section class="container sparring-search " >
        <form action="/usersparring/search" class="wrapper" method="get">
            <a href="/usersparring/usersparringtambah" class="d-none d-lg-flex text-decoration-none align-items-center justify-content-center" style="grid-area: add;">+ Tambah</a>
            <div style="grid-area: search1;" >
                <div class="icon icon-name" ></div>
                <input id="sparringname" type="search" name="search" style="font-size: 13px" type="text" placeholder="masukkan nama">
            </div>
            <div style="grid-area: search2;">
                <div class="icon icon-location"></div>
                <input class="Searchmap" placeholder="Masukkan nama lokasi..." style="font-size: 13px" id="sparringlocation" name="lokasi" type="search" autocomplete="off" list="location_list" type="text" 			onchange="InputChange()" >
                <datalist id="location_list" >
                    
                </datalist>
            </div>
            <div style="grid-area: search3;">
                <div class="icon icon-sport"></div>
                <select class="searchsport" name="olahraga" style="font-size: 13px" id="sparringsport" onchange="InputChange()" >
                    <option value="">Pilih Cabang Olahraga...</option>
                    <option value="Futsal">Futsal</option>
                    <option value="Sepak Bola">Sepak Bola</option>
                    <option value="Badminton">Badminton</option>
                    <option value="Ping Pong">Ping Pong</option>
                    <option value="Voli">Voli</option>
                </select>
            </div>
            <button style="grid-area: button;">CARI</button>
        </form>
    </section>
    {{-- <section>
        @foreach ($user->notifications as $notification)
        @if ($notification->type === 'App\Notifications\EventNotification')
            <p>Data Add {{ $notification->data['eventname'] }}</p>
        @endif
    @endforeach --}}
    
    </section>
    <section class="container box-wrapper">
    @foreach ($usersparring as $sparring)
    <div class="modal" id="exampleModal{{ $sparring->id }}" tabindex="-1">
        <div class="modal-dialog modal-dialog-centered ">
          <div class="modal-content" style="width: 32vw" >
            <div class="modal-header bg-primary-mu">
              <div class="blank logo-sm rounded-circle d-inline-block"></div>
              <h5 class=" modal-title ">
                Hapus Sparring <strong>{{$sparring->title}}</strong>?
              </h5>
              <button type="button" class="btn-close "data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
              <p>Apakah anda yakin ingin menghapus Sparring</p>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
              {{-- <button type="button" class="btn btn-danger">Keluar</button> --}}
              <form action="/sparring/{{ $sparring->id }}" method="post">
                @csrf
                @method('delete')
              <button type="submit" class="btn btn-danger" style="color: white;" >Hapus</button>
              </form>
            </div>
          </div>
        </div>
      </div>
        <div class="box shadow-ms ">
           <button class="box-outer" style="width: 100%; height: 100%;" >
            <div class="box-top">
                <div class="edit-data ">
                    <a class="see-button p-0 m-0" href="/usersparring/{{$sparring->id}}/usersparringdetail" >
                    </a>
                    <a class="edit-button p-0 m-0 {{ $sparring->joinedSparrings->count() == $sparring->max_member || $DateNow > $sparring->tanggal_pertandingan ? 'd-none' : 'd-flex'  }} " href="/usersparring/{{$sparring->id}}/usersparringedit"></a>
                    <a class="delete-button p-0 m-0" data-bs-toggle="modal" data-bs-target="#exampleModal{{ $sparring->id }}" {{ $DateNow > $sparring->tanggal_pertandingan ? 'd-flex' : 'd-none'  }} "></a>
                    
                </div>
                <img class="box-logo p-0 m-0 rounded-circle" src="{{asset('storage/'. $sparring->image)}}" alt="" style="object-fit: cover; object-position: center;" >
                <div class="title-box  ms-0" >
                    <p class="m-0 p-0" style="font-size: 12px;" >{{$sparring->olahraga}}</p>
                    @if (strlen($sparring->title) > 23) 
                    <p class="p-0 my-1" style="font-size: 13px; font-family: opensans-bold;line-height: 20px" >{{$sparring->title}}</p>
                    @else
                    <p class="p-0 my-1" style="font-size: 18px; font-family: opensans-bold;line-height: 20px" >{{$sparring->title}}</p>
                    @endif
                    <div>
                        @if ($sparring->joinedSparrings->count() == $sparring->max_member && $DateNow > $sparring->tanggal_pertandingan)
                        <div class="finish-s text-light" style="background: grey" >Selesai</div>  
                        @elseif ($DateNow > $sparring->tanggal_pertandingan && $sparring->joinedSparrings->count() == 1)
                        <div class="finish" style="background: #ffffff" >Selesai</div>  
                        @elseif ($sparring->joinedSparrings->count() == $sparring->max_member && $DateNow <= $sparring->tanggal_pertandingan)
                            <div class="access text-light" style="background: #FE6B00" >Penuh</div>  
                        @else
                            <div class="access " style="color: #FE6B00" >Terbuka</div> 
                        @endif
                        <div class="age">{{$sparring->tingkatan}}</div> 
                    </div>
                </div>
            </div>
            <div class="box-bottom">
                <div class="line text-muted ">
                    <div style="background: url(/css/img/calender.png); background-position: center; background-size: contain;" class="bottom-icon">

                    </div>
                    {{$sparring->tanggal_pertandingan}} | {{$sparring->waktu_pertandingan}}
                </div>
                <div class="line text-muted ">
                    <div style="background: url(/css/img/target.png); background-position: center; background-size: contain;" class="bottom-icon">

                    </div>
                    {{$sparring->lokasi}}
                </div>
                <div class="line text-muted ">
                    <div style="background: url(/css/img/price.png); background-position: center; background-size: contain;" class="bottom-icon">

                    </div>
                    Rp {{$sparring->harga_tiket}}
                    
                </div>

            </div>
           </button>
        </div>
        @endforeach
        
    </section> 
    <section class="no-data" >
        @if($usersparring->count() > 0)
        <section class="white-space" ></section>   
        @else
        <div class="flag-icon" ></div>
        <p style="opacity: 50%;">Tidak ada hasil yang ditemukan.</p>
    @endif
    </section>
    <div class="container fixed-bottom bottom-nav  d-block d-sm-none ">
        <div class="row mobile-nav">
            <a href="/userprofile/home" class="col-3 ">
                <img width="30px" src="/css/img/userwhite.png" >
                <p class="m-0">Profile</p>
            </a>
            <a href="/usersparring/home" class="col-3 active-m">
                <img width="30px" src="/css/img/bn-sparring.png" >
                <p class="m-0">Sparring</p>
            </a>
            <a href="/usermabar/home" class="col-3">
                <img width="30px" src="/css/img/bn-mabar.png" >
                <p class="m-0">Mabar</p>
            </a>
            <a href="/usertim/home" class="col-3 ">
                <img width="30px" src="/css/img/bn-tim.png  " >
                <p class="m-0">Tim</p>
            </a>    
        </div>
    </div>
    <a href="/usersparring/usersparringtambah" class="add-sparring d-flex d-lg-none" >+</a>
    <script src="/js/notification.js"></script>
    <script src="/js/mapslist.js"></script>
    <script src="/js/searchhome.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js" integrity="sha384-fbbOQedDUMZZ5KreZpsbe1LCZPVmfTnH7ois6mU1QK+m14rQ1l2bGBq41eYeM/fS" crossorigin="anonymous"></script>
</body>
</html>