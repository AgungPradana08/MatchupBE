<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Match Up</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <link rel="stylesheet" href="/css/tim.css">
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
                <a class="nav-link text-start text-lg-center " aria-current="page" href="/mabar/home"><span>Mabar</span></a>
              </li>
              <li class="nav-item mx-0 mx-lg-2">
                <a class="nav-link text-start text-lg-center" aria-current="page"href="/kompetisi/home"><span>Kompetisi</span></a>
              </li>
              <li class="nav-item mx-0 mx-lg-2">
                <a class="nav-link text-start text-lg-center active" aria-current="page" href="/tim/home"><span>Tim</span></a>
              </li>
            </ul>
          </div>
          <a href="/userprofile/home" class="user-nav" style="text-decoration: none;">
            <span style="color: black;">Halo, {{ Auth::user()->username }}</span>
            <img class="rounded-circle" src="{{ asset('storage/'. Auth::user()->image) }}" alt="">
          </a>
        </div>
    </nav>
    <section class="container sparring-header" >
        <div class="banner text-uppercase" style="background-image: url(/css/img/dashboard-banner.png); background-size: cover; background-position: center;">
            Mulai Berkolaborasi
        </div>
    </section>
    <section class="container sparring-search " >
        <form action="/tim/search" class="wrapper" method="get">
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
                    <option value="Renang">Renang</option>
                </select>
            </div>
            <button style="grid-area: button;">CARI</button>
        </form>
    </section>
    <section class="container box-wrapper">
    @foreach ($usertim as $tim)
        <a class="box" href="/tim/{{$tim->id}}/timdetail" >
           <button class="box-outer" style="width: 100%; height: 100%;" >
            <div class="box-top">
                <img class="box-logo" src="{{asset ('storage/' . $tim->image)}}" alt="">
                <div class="title-box" style="width: 100%;" >
                    <p class="p-0 m-0" style="font-size: 12px;" >{{$tim->olahraga}}</p>
                    <p class="p-0 m-0" style="font-size: 18px; font-family: opensans-bold; margin-top: 3%;" >{{$tim->nama_tim}}</p>
                    <div>
                            <div class="age">
                            {{$tim->tingkatan}}
                            </div>
                    </div>
                </div>
            </div>
            <div class="box-bottom">    
                <span style="height: 40vh;" >{{$tim->deskripsi}}</span>
                <hr>
                <div style="width: 100%;" class="d-flex align-items-center justify-content-between" >
                    Slot Tersedia
                    <span class="p-0 m-0" style="font-family: opensans-bold; color: #FE6B00; " >{{ $tim->joinedPlayers->count() }}/{{ $tim->max_member }}</span>
                 </div>
            </div>
           </button>
        </a>
    @endforeach
</section> 
<section class="no-data" >
    @if($usertim->count() > 0)
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
            <a href="/mabar/home" class="col-3">
                <img width="30px" src="/css/img/bn-mabar.png" alt="">
                <p class="m-0">Mabar</p>
            </a>
            <a href="/kompetisi/home" class="col-3 ">
                <img width="30px" src="/css/img/bn-kompetisi.png" alt="">
                <p class="m-0">Kompetisi</p>
            </a>
            <a href="/tim/home" class="col-3 active-m">
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