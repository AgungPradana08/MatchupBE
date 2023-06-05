<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Match Up</title>
    <link rel="stylesheet" href="/css/tim.css">
</head>
<body>
    <section class="navbar" >
        <div class="navbar-left">
            <img class="logo" src="/css/img/logo.png" alt="">
            <!-- <div style="margin-left: 8%;" class="logo">

            </div> -->
            <a class="sparring"  href="/sparring/home" >Sparring</a>
            <a class="mabar" href="/mabar/home">Mabar</a>
            <a class="kompetisi" href="/kompetisi/home" >Kompetisi</a>
            <a class="tim" style="color: #FE6B00;" href="#" >Tim</a>
        </div>
        <a href="/userprofile/home" class="navbar-right" >
            <p style="font-size: 14px; font-family: opensans-bold;" >Nama</p>
            <img src="" alt="">
        </a>
    </section>
    <section class="sparring-header" >
        <div class="banner" style="background-image: url(/css/img/dashboard-banner.png); background-size: cover; background-position: center;">
            BERKOLABORASI
        </div>
    </section>
    <section class="sparring-search" >
        <div class="input-box">
            <!-- <img class="icon-box" src="css/img/search.png" alt=""> -->
            <div style="background: url(/css/img/search.png); background-position: center; background-size: contain;" class="icon-box">
            </div>
            <form action="/sparring/search" method="GET">
                <input class="searchname" id="sparringname" type="search" name="search" onchange="InputChange()" placeholder="Cari Nama Sparring...">
                </div>
                <div class="input-box">
                    <div style="background: url(/css/img/location.png); background-position: center; background-size: contain;" class="icon-box">
                    </div>
                    <input class="Searchmap" placeholder="Masukkan nama lokasi..." id="sparringlocation" name="lokasi" type="search" autocomplete="off" list="location_list" type="text" onchange="InputChange()" >
                    <datalist id="location_list" >
                        {{-- <option value="Markas">Markas Sport Center, Jalan Jendral Sudirman, Rendeng, Kudus Regency, Central Java</option>
                        <option value="Berlian">Berlian Sport Centre, Jalan Lingkar Utara Kudus, Ledok, Karangmalang, Kabupaten Kudus, Jawa Tengah</option> --}}
                    </datalist>
                </div>
                <div class="input-box">
                    <div style="background: url(/css/img/keyword.png); background-position: center; background-size: contain;" class="icon-box">
                    </div>
                    <select class="searchsport" name="olahraga"  id="sparringsport" onchange="InputChange()" >
                        <option value="">Pilih Cabang Olahraga...</option>
                        <option value="Futsal">Futsal</option>
                        <option value="Sepak Bola">Sepak Bola</option>
                        <option value="Badminton">Badminton</option>
                        <option value="Ping Pong">Ping Pong</option>
                        <option value="Renang">Renang</option>
                    </select>
                </div>
                <button class="search" type="submit">
                    Cari
                </button>
            </form>
    </section>
    <section class="box-wrapper">
    @foreach ($tim as $tim)
        <a class="box" href="/tim/{{$tim->id}}/timdetail" >
           <button class="box-outer" style="width: 100%; height: 100%;" >
            <div class="box-top">
                <img class="box-logo" src="/css/img/pxg.png" alt="">
                <!-- <div class="box-logo">

                </div> -->
                <div style="margin-left: 5%; width: 60%;" >
                    <p style="font-size: 0.8vw;" >{{$tim->olahraga}}</p>
                    <p style="font-size: 1.5vw; font-family: opensans-bold; margin-top: 3%;" >{{$tim->title}}</p>
                    <div class="access">
                    {{$tim->aksebilitas}}
                    </div>
                    <div class="age">
                    {{$tim->tingkatan}}
                    </div>
                </div>
            </div>
            <div class="box-bottom">    
                <span style="height: 40vh;" >{{$tim->deskripsi}}</span>
                <hr>
                <div style="width: 100%; display: flex; justify-content: space-between; align-items: center;margin-top: 5px;" >
                    <p>
                     Slot Tersedia
                    </p>
                    <span style="font-family: opensans-bold; color: #FE6B00; " >5/12</span>
                 </div>
            </div>
           </button>
        </a>
    @endforeach
    </section> 
    <section class="no-data" >
        <div class="flag-icon" ></div>
        <p style="opacity: 50%;" >Tidak ada hasil yang ditemukan.</p>
    </section>
    <script src="/js/mapslist.js"></script>
    <script src="/js/searchhome.js"></script>   
</body>
</html>