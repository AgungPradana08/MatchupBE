<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Match Up</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <link rel="stylesheet" href="/css/user_mabar.css">
</head>
<body>
    <nav class="navbar navbar-expand-sm p-0 position-fixed bg-white " style="width: 100vw; z-index: 100;">
        <div class="container bg-ms-primary ">
          <a class="navbar-brand" href="/sparring/home"><img src="/css/img/back button.png" style="height: 5vh;" alt=""></a>
          <div class="collapse navbar-collapse"  id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
              <li class="nav-item mx-0 mx-lg-2">
                <a class="nav-link text-start text-lg-center " aria-current="page" href="/userprofile/home"><span>Profile</span></a>
              </li>
              <li class="nav-item mx-0 mx-lg-2">
                <a class="nav-link text-start text-lg-center " aria-current="page" href="/usersparring/home"><span>Sparring</span></a>
              </li>
              <li class="nav-item mx-0 mx-lg-2">
                <a class="nav-link text-start text-lg-center active" aria-current="page"href="/usermabar/home"><span>Mabar</span></a>
              </li>
              <li class="nav-item mx-0 mx-lg-2">
                <a class="nav-link text-start text-lg-center" aria-current="page" href="/usertim/home"><span>Tim</span></a>
              </li>
            </ul>
          </div>
        </div>
    </nav>
    <section class="container sparring-search " >
        <form action="/mabar/search" class="wrapper" method="get">
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
    @foreach ($usermabar as $mabar)
        <div class="box" href="/usermabar/{{$mabar->id}}/usermabardetail" >
            <button class="box-outer" style="width: 100%; height: 100%;" >
                <div class="box-top">
                    <div class="edit-data">
                        <a class="see-button" href="/usermabar/{{$mabar->id}}/usermabardetail" >
                        </a>
                        <a class="edit-button" href="/usermabar/{{$mabar->id}}/usermabaredit"></a>
                    </div>
                <img class="box-logo rounded-circle" src="{{asset('storage/'. $mabar->image)}}" alt="">
                <div class="title-box ms-md-2" >
                    <p class="m-0 " style="font-size: 12px;" >{{$mabar->olahraga}}</p>
                    <p class="m-0" style="font-size: 20px; font-family: opensans-bold;" >{{$mabar->title}}</p>
                    <div>
                        <div class="age">{{$mabar->tingkatan}}</div> 
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
                 <hr class="d-block m-1" >
                 <div style="display: flex; justify-content: space-between;" class="" >
                     <Span>Slot Terbatas</Span>
                     <span style="font-family: opensans-bold; color: #FE6B00; " class="ms-2 ms-lg-0 " >{{ $mabar->joinedUsers->count() }}/{{ $mabar->max_member }}</span>
                 </div>
             </div>
            </button>
         </div>
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
        <div class="row">
            <a href="/userprofile/home" class="col-3">
                <div class="bottom-nav-icon" style="background: url(/css/img/userwhite.png); background-size: contain;" ></div>
                <p class="m-0">Profile</p>
            </a>
            <a href="/usersparring/home" class="col-3">
                <div class="bottom-nav-icon" style="background: url(/css/img/bn-sparring.png); background-size: contain;"></div>
                <p class="m-0">Sparring</p>
            </a>
            <a href="/usermabar/home" class="col-3">
                <div class="bottom-nav-icon" style="background: url(/css/img/bn-mabar.png); background-size: contain;"></div>
                <p class="m-0">Mabar</p>
            </a>
            <a href="/usertim/home" class="col-3">
                <div class="bottom-nav-icon" style="background: url(/css/img/bn-tim.png); background-size: contain;"></div>
                <p class="m-0">Tim</p>
            </a>    
        </div>
    </div>
    <a href="/usermabar/tambah" class="add-sparring" >+</a>
    <script src="/js/mapslist.js"></script>
    <script src="/js/searchhome.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js" integrity="sha384-fbbOQedDUMZZ5KreZpsbe1LCZPVmfTnH7ois6mU1QK+m14rQ1l2bGBq41eYeM/fS" crossorigin="anonymous"></script>
</body>
</html>