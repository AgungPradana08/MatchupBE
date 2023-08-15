<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Match Up</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <link rel="stylesheet" href="/css/mabar.css">
    <link rel="shortcut icon" type="image/x-icon" href="/css/img/vector.png">

</head>
<body>
    <nav class="navbar navbar-expand-sm p-0 position-fixed bg-white " style="width: 100vw; z-index: 100;">
        <div class="container bg-ms-primary ">
          <a class="navbar-brand" href="#"><img src="/css/img/logo.png" style="height: 5vh;" alt=""></a>
          <div class="collapse navbar-collapse"  id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
              <li class="nav-item mx-0 mx-lg-2">
                <a class="nav-link text-start text-lg-center " aria-current="page" href="/sparring/home"><span>Sparring</span></a>
              </li>
              <li class="nav-item mx-0 mx-lg-2">
                <a class="nav-link text-start text-lg-center active" aria-current="page" href="/mabar/home"><span>Mabar</span></a>
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
            <span style="color: black;"><strong>Halo</strong>, {{ Auth::user()->username }}</span>
            <img class="rounded-circle shadow rounded" src="{{ asset('storage/'. Auth::user()->image) }}" alt=""  style="object-fit: cover;">
          </a>
          <a class="user-nav" href="/notification">
            <img id="notificationIcon" class="rounded-circle" src="/css/img/notification.png" style="object-fit: cover; object-position:center;" alt="">
          </a>
        </div>
    </nav>
    <section class="container sparring-header" >
        <div class="banner text-uppercase" style="background-image: url(/css/img/dashboard-banner.png); background-size: cover; background-position: center;">
            Ayo Main Bersama
        </div>
    </section>
    <section class="container sparring-search " >
        <form action="/mabar/search" class="wrapper" method="get">
            <div style="grid-area: search1;" >
                <div class="icon icon-name" ></div>
                <input id="sparringname" type="search" name="search" style="font-size: 13px" type="text" placeholder="Masukkan nama Mabar...">
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
    <section class="container box-wrapper">
    @foreach ($usermabar as $mabar)
        <a class="box" href="/usermabar/{{$mabar->id}}/usermabardetail" >
            <button class="box-outer" style="width: 100%; height: 100%;" >
                <div class="box-top">
                <img class="box-logo rounded-circle " src="{{asset('storage/'. $mabar->image)}}" style="object-position: center; object-fit: cover;" alt="">
                <div class="title-box w-75 ms-md-2" >
                    <p class="m-0 p-0" style="font-size: 12px;" >{{$mabar->olahraga}}</p>
                    @if (strlen($mabar->title) > 23) 
                    <p class="p-0 m-1" style="font-size: 13px; font-family: opensans-bold;line-height: 20px" >{{$mabar->title}}</p>
                    @else
                    <p class="p-0 m-1" style="font-size: 18px; font-family: opensans-bold;line-height: 20px" >{{$mabar->title}}</p>
                    @endif
                    <div class="w-75">
                        {{-- @if ($DateNow > $mabar->tanggal_pertandingan)
                        <div class="age w-100">Selesai</div>   
                        @elseif ($mabar->joinedUsers->count() == $mabar->max_member && $DateNow <= $mabar->tanggal_pertandingan)
                        <div class="access w-100 text-light" style="background: #FE6B00" >Penuh</div>  
                        @else
                        <div class="access w-100">Terbuka</div>  
                        @endif --}}
                        @if ($mabar->joinedUsers->count() == $mabar->max_member && $DateNow > $mabar->tanggal_pertandingan)
                            <div class="finish-s w-100 d-flex align-items-center justify-content-center">Selesai</div> 
                        @elseif ($DateNow > $mabar->tanggal_pertandingan && $mabar->joinedUsers->count() !== $mabar->max_member)
                            <div class="finish w-100 d-flex align-items-center justify-content-center">Selesai</div> 
                        @elseif ($mabar->joinedUsers->count() == $mabar->max_member && $DateNow <= $mabar->tanggal_pertandingan)
                            <div class="access w-100 text-light" style="background: #FE6B00" >Penuh</div>  
                        @else
                            <div class="access w-100 " style="color: #FE6B00" >Terbuka</div> 
                        @endif
                        <div class="age w-100">{{$mabar->tingkatan}} </div> 
                    </div>
                </div>
            </div>
             <div class="box-bottom">
                 <div class="line">
                     <!-- <img class="bottom-icon" src="css/img/tanggak.png" alt=""> -->
                     <div style="background: url(/css/img/calender.png); background-position: center; background-size: contain;" class="bottom-icon">
 
                     </div>
                     {{$mabar->tanggal_pertandingan}}
                 </div>
                 <div class="line">
                     <!-- <img class="bottom-icon" src="css/img/lokasi.png" alt=""> -->
                     <div style="background: url(/css/img/target.png); background-position: center; background-size: contain;" class="bottom-icon">
 
                     </div>
                     {{$mabar->lokasi}}
                 </div>
                 <div class="line">
                     <div style="background: url(/css/img/price.png); background-position: center; background-size: contain;" class="bottom-icon">
 
                     </div>
                     {{$mabar->harga_tiket}}
                 </div>
                 <hr class=" p-0 m-1" >
                 <div style="display: flex; justify-content: space-between;" class="" >
                     <Span>Slot Terbatas</Span>
                     <span class="ms-3" style="font-family: opensans-bold; color: #FE6B00; " >{{ $mabar->joinedUsers->count() }}/{{ $mabar->max_member }}</span>
                 </div>
             </div>
            </button>
         </a>
    @endforeach
    </section> 
    <section class="no-data" >
        @if($usermabar->count() > 0)
        <section class="white-space" ></section>   
        @else   
        <div class="flag-icon" ></div>
        <p style="opacity: 50%;">Tidak ada hasil yang ditemukan.</p>
    @endif
    </section> 
    <div class="container fixed-bottom bottom-nav  d-block d-sm-none ">
        <div class="row mobile-nav">
            <a href="/sparring/home" class="col-3 ">
                <img width="30px" src="/css/img/bn-sparring.png" alt="" srcset="">
                <p class="m-0">Sparring</p>
            </a>
            <a href="/mabar/home" class="col-3 active-m">
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
    <script src="/js/mapslist.js"></script>
    <script src="/js/searchhome.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js" integrity="sha384-fbbOQedDUMZZ5KreZpsbe1LCZPVmfTnH7ois6mU1QK+m14rQ1l2bGBq41eYeM/fS" crossorigin="anonymous"></script>
</body>
</html>