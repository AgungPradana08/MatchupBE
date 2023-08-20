<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Match Up</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <link rel="stylesheet" href="/css/tim.css">
    <link rel="shortcut icon" type="image/x-icon" href="/css/img/vector.png">
        {{-- PUSHER --}}
        <script src="https://js.pusher.com/8.2.0/pusher.min.js"></script>
        <script>
    
            // Enable pusher logging - don't include this in production
            Pusher.logToConsole = true;
    
            var pusher = new Pusher('6eb6fee921b475b51b2d', {
            cluster: 'ap1'
            });
    
            var channel = pusher.subscribe('my-channel');
            channel.bind('my-event', function(data) {
            alert(JSON.stringify(data));
            });
        </script>

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
            <span style="color: black;"><strong>Halo</strong>, {{ Auth::user()->username }}</span>
            <img class="rounded-circle shadow rounded" src="{{ asset('storage/'. Auth::user()->image) }}" alt=""  style="object-fit: cover;">
          </a>
          <a class="user-nav" href="/notifikasi">
            <img id="notificationIcon" class="rounded-circle" src="{{ Auth::user()->readnotif == "true" ? '/css/img/notificationplus.png  ' : '/css/img/notification.png' }}" style="object-fit: cover; object-position:center;" alt="">
          </a>
        </div>
    </nav>
    <section class="container sparring-header" >
        <div class="banner text-uppercase" style="background-image: url(/css/img/tim-banner.png); background-size: cover; background-position: center;">
        </div>
    </section>
    <section class="container sparring-search " >
        <form action="/tim/search" class="wrapper" method="get">
            <div style="grid-area: search1;" >
                <div class="icon icon-name" ></div>
                <input id="sparringname" type="search" name="search" style="font-size: 13px" type="text" placeholder="Masukkan nama Tim...">
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
    @foreach ($usertim as $tim)
        <a class="box" href="/tim/{{$tim->id}}/timdetail" >
           <button class="box-outer" style="width: 100%; height: 100%;" >
            <div class="box-top">
                <img class="box-logo" src="{{asset ('storage/' . $tim->image)}}" alt="" style="object-position: center; object-fit: cover; box-shadow: 0px 4px 4px rgba(0, 0, 0, 0.25) ;">
                <div class="title-box" style="width: 70%;" >
                    <div class="d-flex justify-content-between" >
                        <p class="p-0 m-0" style="font-size: 12px;" >{{$tim->olahraga}}</p>
                        <div>
                            @for ($i = 0; $i < $tim->skor/10; $i++)
                            <img class="my-auto" style="height: 15px; width: 15px;" src="/css/img/fire.png" >
                        @endfor 
                        </div>
                    </div>
                    @if (strlen($tim->nama_tim) > 23)
                    <p class="p-0 my-1" style="font-size: 10px; font-family: opensans-bold;line-height: 20px" >{{$tim->nama_tim}}</p>
                    @elseif (strlen($tim->nama_tim) > 10)
                    <p class="p-0 my-1" style="font-size: 15 px; font-family: opensans-bold;line-height: 20px" >{{$tim->nama_tim}}</p>
                    @else
                    <p class="p-0 my-1" style="font-size: 18px; font-family: opensans-bold;line-height: 20px" >{{$tim->nama_tim}}</p>
                    @endif
                    <div class="w-75 d-flex">
                        @if ($tim->joinedPlayers->count() == $tim->max_member)
                            <div class="access w-50 text-light" style="background-color: #FE6B00" >Penuh</div>   
                        @else
                            <div class="access w-50">Terbuka</div>  
                        @endif
                        <div class="age w-50">{{$tim->tingkatan}}</div>
                    </div>
                </div>
            </div>
            <div class="box-bottom">    
                <div class="word-wrappers text-muted" style=" font-size: 12px" >{{$tim->deskripsi}}</div>
                <hr class="mb-2">
                <div style="width: 100%;" class="d-flex align-items-center justify-content-between m-0 p-0" >
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
                <img width="30px" src="/css/img/bn-sparring.png" alt="" srcset="" >
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