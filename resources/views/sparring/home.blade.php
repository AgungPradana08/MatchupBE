<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Match Up</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <link rel="stylesheet" href="/css/sparringpage.css">
    <link rel="shortcut icon" href="/css/img/logo-matchup.png" type="image/x-icon">
    <link rel="stylesheet" href="/css/notification.css">
    <link rel="shortcut icon" type="image/x-icon" href="/css/img/vector.png">
    {{-- PUSHER --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/toastify-js/src/toastify.min.css">
    <script src="https://js.pusher.com/8.2.0/pusher.min.js"></script>

    <script>

        // Enable pusher logging - don't include this in production
        var pusher = new Pusher('6eb6fee921b475b51b2d', {
        cluster: 'ap1'
        });

        var privateChannel = pusher.subscribe('private.{{ Auth::user()->id }}');
        privateChannel.bind('my-event', function(resp) {
            console.log("Hello")
            document.getElementById("notificationIcon").src = "/css/img/notificationplus.png";
            Toastify({
            text: resp.message, // Menggunakan resp.message untuk mengakses pesan notifikasi
            duration: 3000,
            newWindow: true,
            gravity: "top", // `top` or `bottom`
            position: "center", // `left`, `center` or `right`
            stopOnFocus: true, // Prevents dismissing of toast on hover
            style: {
                background: "#333", // Warna latar belakang dark
                color: "#fff", // Warna teks putih
                height: "50px",
                "display": "flex",
                "justify-content": "space-between",
                "align-items": "center",
                "border-radius": "8px",
            },
            close: true, // Aktifkan tombol close
            className: "toast-custom",
            onClick: function(){}
        }).showToast();
             // Gunakan resp.message untuk mengakses pesan notifikasi
        });
    </script>

</head>
<body>
    <div id="notification" class="alert shadow-lg position-absolute notification justify-content-between mt-sm-4 mt-2 {{ session('notification') === 'Welcome' ? 'appear' : 'd-none' }}"  role="alert">
        <p class="d-inline-block p-0 m-0 " >Selamat Datang, {{ Auth::user()->username }}</p>
        <button type="button" class="btn-close " onclick="closenotification()" aria-label="Close"></button>
    </div>
    <nav class="navbar navbar-expand-sm p-0 position-fixed bg-white " style="width: 100vw; z-index: 100;">
        <div class="container bg-ms-primary ">
          <a class="navbar-brand" href="#"><img src="/css/img/logo.png" style="height: 5vh;" alt=""></a>
          <div class="collapse navbar-collapse"  id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
              <li class="nav-item mx-0 mx-lg-2">
                <a class="nav-link text-start text-lg-center active" aria-current="page" href="/sparring/home"><span>Sparring</span></a>
              </li>
              <li class="nav-item mx-0 mx-lg-2">
                <a class="nav-link text-start text-lg-center" aria-current="page" href="/mabar/home"><span>Mabar</span></a>
              </li>
              <li class="nav-item mx-0 mx-lg-2">
                <a class="nav-link text-start text-lg-center" aria-current="page"href="/kompetisi/home"><span>Kompetisi</span></a>
              </li>
              <li class="nav-item mx-0 mx-lg-2">
                <a class="nav-link text-start text-lg-center" aria-current="page" href="/tim/home"><span>Tim</span></a>
              </li>
            </ul>
          </div>
          <a href="/userprofile/home" class="user-nav" style="text-decoration: none;">
            <span style="color: black;"><span class="fw-bold" >Halo</span>, {{ Auth::user()->username }}</span>
            <img class="rounded-circle shadow rounded" src="{{ asset('storage/'. Auth::user()->image) }}" style="object-fit: cover; object-position:center;" alt="">
          </a>
          <a class="user-nav" href="/notifikasi">
            <img id="notificationIcon" class="rounded-circle" src="/css/img/notification.png" style="object-fit: cover; object-position:center;" alt="">
          </a>
        </div>
    </nav>
    <section class="container sparring-header" >
        <div class="banner" style="background-image: url(/css/img/dashboard-banner.png); background-size: cover; background-position: center;">
            PILIH LAWAN SPARRING
        </div>
    </section>
    <section class="container sparring-search " >
        <form action="/sparring/search" class="wrapper" method="get">
            <div style="grid-area: search1;" >
                <div class="icon icon-name" ></div>
                <input id="sparringname" type="search" name="search" style="font-size: 13px" type="text" placeholder="Masukkan nama Sparring...">
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
                    <option class="text-muted" value="">Pilih Cabang Olahraga...</option>
                    <option value="Futsal">Futsal</option>
                    <option value="Sepak Bola">Sepak Bola</option>
                    <option value="Badminton">Badminton</option>
                    <option value="Ping Pong">Ping Pong</option>
                    <option value="Voli">voli</option>
                </select>
            </div>
            <button style="grid-area: button;">CARI</button>
        </form>
    </section>
    <section class="container box-wrapper">
    @foreach ($usersparring as $sparring)
        <a class="box" href="/usersparring/{{$sparring->id}}/usersparringdetail" >
           <button class="box-outer" style="width: 100%; height: 100%;" >
            <div class="box-top">
                <img class="box-logo rounded-circle" src="{{asset('storage/'. $sparring->image)}}" alt="" style="object-position: center; object-fit: cover;">
                <div class="title-box ms-md-2" >
                    <p class="m-0 " style="font-size: 12px;" >{{$sparring->olahraga}}</p>
                    <p class="m-0" style="font-size: 20px; font-family: opensans-bold;" >{{$sparring->title}}</p>
                    <div class="w-75 d-flex" >
                        {{-- @if ($sparring->joinedSparrings->count() == $sparring->max_member && $DateNow > $sparring->tanggal_pertandingan)
                            <div class="age w-50">Selesai</div>   
                            @else @if ($sparring->joinedSparrings->count() == $sparring->max_member && $DateNow <= $sparring->tanggal_pertandingan)
                            <div class="age w-50">Penuh</div>  
                                
                            @else
                            <div class="age w-50">Terbuka</div>  
                        @endif --}}
                        {{-- @if ($DateNow > $sparring->tanggal_pertandingan)
                        <div class="access w-50 bg-danger text-light d-flex align-items-center justify-content-center" style="border: 3px solid red"  >Selesai</div>   
                        @elseif ($sparring->joinedSparrings->count() == $sparring->max_member && $DateNow <= $sparring->tanggal_pertandingan)
                            <div class="access w-50 text-light" style="background: #FE6B00" >Penuh</div>  
                        @else
                            <div class="access w-50">Terbuka</div>  
                        @endif --}}

                        
                        @if ($sparring->joinedSparrings->count() == $sparring->max_member && $DateNow > $sparring->tanggal_pertandingan)
                            <div class="finish-s w-50 d-flex align-items-center justify-content-center">Selesai</div> 
                        @elseif ($DateNow > $sparring->tanggal_pertandingan && $sparring->joinedSparrings->count() == 1)
                            <div class="finish w-50 d-flex align-items-center justify-content-center">Selesai</div> 
                        @elseif ($sparring->joinedSparrings->count() == $sparring->max_member && $DateNow <= $sparring->tanggal_pertandingan)
                            <div class="access w-50 text-light" style="background: #FE6B00" >Penuh</div>  
                        @else
                            <div class="access w-50 " style="color: #FE6B00" >Terbuka</div> 
                        @endif
                        
                        <div class="age w-50">{{$sparring->tingkatan}}</div> 
                    </div>
                </div>
            </div>
            <div class="box-bottom">
                <div class="line">
                    <div style="background: url(/css/img/calender.png); background-position: center; background-size: contain;" class="bottom-icon">

                    </div>
                    {{$sparring->tanggal_pertandingan}} | {{$sparring->waktu_pertandingan}}
                </div>
                <div class="line">
                    <div style="background: url(/css/img/target.png); background-position: center; background-size: contain;" class="bottom-icon">

                    </div>
                    {{$sparring->lokasi}}
                </div>
                <div class="line">
                    <div style="background: url(/css/img/price.png); background-position: center; background-size: contain;" class="bottom-icon">

                    </div>
                    Rp {{$sparring->harga_tiket}}
                </div>
                <div style="display: flex; justify-content: space-between;" class="d-none" >
                    <Span>Slot Terbatas</Span>
                    <span style="font-family: opensans-bold; color: #FE6B00; " >{{ $sparring->joinedSparrings->count() }}/{{ $sparring->max_member }}</span>
                </div>

            </div>
           </button>
        </a>
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
            <a href="/sparring/home" class="col-3 active-m">
                <img width="30px" src="/css/img/bn-sparring.png" alt="" srcset="">
                <p class="m-0">Sparring</p>
            </a>
            <a href="/mabar/home" class="col-3">
                <img width="30px" src="/css/img/bn-mabar.png" alt="">
                <p class="m-0">Mabar</p>
            </a>
            <a href="/kompetisi/home" class="col-3">
                <img width="30px" src="/css/img/bn-kompetisi.png" alt="">
                <p class="m-0">Kompetisi</p>
            </a>
            <a href="/tim/home" class="col-3">
                <img width="30px" src="/css/img/bn-sparring.png" alt="">
                <p class="m-0">Tim</p>
            </a>    
        </div>
    </div>
    <script src="/js/notification.js"></script>
    <script src="/js/mapslist.js"></script>
    <script src="/js/searchhome.js"></script>
    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/toastify-js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js" integrity="sha384-fbbOQedDUMZZ5KreZpsbe1LCZPVmfTnH7ois6mU1QK+m14rQ1l2bGBq41eYeM/fS" crossorigin="anonymous"></script>
</body>
</html>