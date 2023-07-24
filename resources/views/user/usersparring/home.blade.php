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
</head>
<body>
    <div id="notification" class="alert position-absolute notification justify-content-between mt-sm-4 mt-2 {{ session('notification') === 'Sparring berhasil di tambah' || session('notification') === 'Sparring berhasil di hapus' || session('notification') === 'Sparring Berhasil di edit' ? 'appear' : 'd-none' }}"  role="alert">
        <p class="d-inline-block p-0 m-0 " >{{ session('notification') }}</p>
        <button type="button" class="btn-close btn-close-white" onclick="closenotification()" aria-label="Close"></button>
    </div>
    <nav class="navbar navbar-expand-sm p-0 position-fixed bg-white " style="width: 100vw; z-index: 100;">
        <div class="container bg-ms-primary ">
          <a class="navbar-brand" href="/sparring/home"><img src="/css/img/back button.png" style="height: 5vh;" alt=""></a>
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
    @foreach ($usersparring as $sparring)
        <div class="box shadow-ms ">
           <button class="box-outer" style="width: 100%; height: 100%;" >
            <div class="box-top">
                <div class="edit-data">
                    <a class="see-button p-0 m-0" href="/usersparring/{{$sparring->id}}/usersparringdetail" >
                    </a>
                    <a class="edit-button p-0 m-0" href="/usersparring/{{$sparring->id}}/usersparringedit"></a>
                </div>
                <img class="box-logo p-0 m-0 rounded-circle" src="{{asset('storage/'. $sparring->image)}}" alt="">
                <div class="title-box ms-md-2" >
                    <p class="m-0 " style="font-size: 12px; overflow: hidden;" >{{$sparring->olahraga}}</p>
                    <p class="m-0" style="font-size: 20px; font-family: opensans-bold;" >{{$sparring->title}}</p>
                    <div>
                        <div class="age">{{$sparring->tingkatan}} Tahun</div> 
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
    <a href="/usersparring/usersparringtambah" class="add-sparring" >+</a>
    <script src="/js/notification.js"></script>
    <script src="/js/mapslist.js"></script>
    <script src="/js/searchhome.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js" integrity="sha384-fbbOQedDUMZZ5KreZpsbe1LCZPVmfTnH7ois6mU1QK+m14rQ1l2bGBq41eYeM/fS" crossorigin="anonymous"></script>
</body>
</html>