<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Match up</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <link rel="stylesheet" href="/css/userteam.css">
    <link rel="stylesheet" href="/css/notification.css">
    <link rel="shortcut icon" type="image/x-icon" href="/css/img/vector.png">


</head>
<body>
    <div id="notification" class="alert position-absolute notification justify-content-between mt-sm-4 mt-2 shadow-lg {{ session('notification') === 'Anda Tidak di izinkan membuat Tim.' || session('notification') === 'Tim berhasil di tambah' || session('notification') === 'Tim berhasil di hapus' || session('notification') === 'Tim Berhasil di edit' ? 'appear' : 'd-none' }}"  role="alert">
        <p class="d-inline-block p-0 m-0 " >{{ session('notification') }}</p>
        <button type="button" class="btn-close " onclick="closenotification()" aria-label="Close"></button>
    </div>
    <nav class="navbar navbar-expand-sm p-0 position-fixed bg-white " style="width: 100vw; z-index: 100;">
        <div class="container bg-ms-primary ">
          <a class="navbar-brand" href="/tim/home"><img src="/css/img/back button.png" style="height: 4vh;" alt=""></a>
          <div class="collapse navbar-collapse"  id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
              <li class="nav-item mx-0 mx-lg-2">
                <a class="nav-link text-start text-lg-center " aria-current="page" href="/userprofile/home"><span>Profile</span></a>
              </li>
              <li class="nav-item mx-0 mx-lg-2">
                <a class="nav-link text-start text-lg-center " aria-current="page" href="/usersparring/home"><span>Sparring</span></a>
              </li>
              <li class="nav-item mx-0 mx-lg-2">
                <a class="nav-link text-start text-lg-center" aria-current="page"href="/usermabar/home"><span>Mabar</span></a>
              </li>
              <li class="nav-item mx-0 mx-lg-2">
                <a class="nav-link text-start text-lg-center active" aria-current="page" href="/usertim/home"><span>Tim</span></a>
              </li>
            </ul>
          </div>
        </div>
    </nav>
    <div class="container"></div>
    <section class="container sparring-search " >
        <form action="/usertim/search" class="wrapper" method="get">
            @if ($usertim->count() > 0)
                <a class="d-none d-lg-flex text-decoration-none align-items-center justify-content-center"  style="grid-area: add; opacity: 70%;">Maksimal Tim</a> 
            @else
                <a href="/usertim/tambahtim" class="d-none d-lg-flex text-decoration-none align-items-center justify-content-center" style="grid-area: add;">+ Tambah</a>
            @endif
            <div style="grid-area: search1; visibility: hidden;" >
                <div class="icon icon-name" ></div>
                <input id="sparringname" type="search" name="search" style="font-size: 13px" type="text" placeholder="masukkan nama">
            </div>
            <div style="grid-area: search3; visibility: hidden;">
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
            <button style="grid-area: button; visibility: hidden;">CARI</button>
        </form>
    </section>       
    </div>
    

    <div class="container">
        <section class="box-wrapper p-2 ">
            @foreach ($usertim as $usertim)
            <div class="box" >
            <a href="timdetail.html" >
               <button class="box-outer" style="width: 100%; height: 100%;" >
                <div class="box-top">
                    <div class="edit-data">
                        <a class="see-button" href="/usertim/{{$usertim->id}}/usertimdetail" >
                        </a>
                        <a class="edit-button" href="/usertim/{{$usertim->id}}/usertimedit"></a>
                    </div>
                    <div class="box-logo rounded-circle">
                        <img class="box-logo p-0 m-0 rounded-circle" src="{{asset('storage/'. $usertim->image)}}" alt="" style="object-fit: cover; object-position: center;">
                    </div>
                    <div style=" width: 100%;" class="letter-container pt-3 pt-lg-0" >
                        <p class="p-0 m-0" style="font-size: 12px; " >{{$usertim->olahraga}}</p>
                        @if (strlen($usertim->nama_tim) > 23) 
                        <p class="p-0 m-1" style="font-size: 13px; font-family: opensans-bold;line-height: 20px" >{{$usertim->nama_tim}}</p>
                        @else
                        <p class="p-0 m-1" style="font-size: 18px; font-family: opensans-bold;line-height: 20px" >{{$usertim->nama_tim}}</p>
                        @endif
                        <div>
                        @if ($usertim->joinedPlayers->count() == $usertim->max_member)
                            <div class="access text-light" style="background: #FE6B00" >Penuh</div>  
                        @else
                            <div class="access">Terbuka</div>  
                        @endif
                            <div class="age">
                                {{$usertim->tingkatan}}
                            </div>
                        </div>
                    </div>

                    
                </div>
                <div class="box-bottom">    
                    <div class="word-wrapper" style="height: 10vh; font-size: 12px" >{{$usertim->deskripsi}}</div>
                    <hr class="m-1" >
                    <div class="w-100 d-flex justify-content-center align-items-center justify-content-lg-between" style="width: 100%; display: flex; justify-content: center; align-items: center;" >
                        <p class="p-0 m-0 me-1" >
                         Slot Tersedia
                        </p>
                        <div style="color: #FE6B00; font-family: opensans-bold" class="slot-access">
                            {{ $usertim->joinedPlayers->count() }}/{{ $usertim->max_member }}
                         </div>
                     </div>
                </div>
               </button>
            </a>
        </div>
        @endforeach
        </section> 
        
    </div>
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
            <a href="/userprofile/home" class="col-3 ">
                <img width="30px" src="/css/img/userwhite.png" >
                <p class="m-0">Profile</p>
            </a>
            <a href="/usersparring/home" class="col-3">
                <img width="30px" src="/css/img/bn-sparring.png" >
                <p class="m-0">Sparring</p>
            </a>
            <a href="/usermabar/home" class="col-3 ">
                <img width="30px" src="/css/img/bn-mabar.png" >
                <p class="m-0">Mabar</p>
            </a>
            <a href="/usertim/home" class="col-3 active-m">
                <img width="30px" src="/css/img/bn-tim.png  " >
                <p class="m-0">Tim</p>
            </a>    
        </div>
    </div>
    <section class="white-space" ></section>
    <a href="/usertim/tambahtim" class="add-sparring d-flex d-lg-none" >+</a> 
    <script src="/js/notification.js"></script>
    <script src="/js/mapslist.js"></script>
    <script src="/js/searchhome.js"></script>
</body>
</html>