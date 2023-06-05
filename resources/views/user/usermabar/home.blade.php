<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Match Up</title>
    <link rel="stylesheet" href="/css/user_mabar.css">
</head>
<body>
    <section class="navbar" >
        <div class="navbar-left">
            <a class="logo" href="/sparring/home">
        
            </a>
            <!-- <div style="margin-left: 7%;" class="logo">

            </div> -->
            <a class="home" href="/userprofile/home" >Profil</a>
            <a class="tentang" href="/usersparring/home">Sparring</a>
            <a class="mabar" href="#" style="color: #FE6B00; " >Mabar</a>
            <a class="kontak" href="/usertim/home" >Tim</a>
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
        @foreach ($usermabar as $usermabar)
        <div class="box">
            <a href="mabardetail.html">
            <button class="box-outer" style="width: 100%; height: 100%;" >
                <div class="box-top">
                    <div class="edit-data">
                        <a class="see-button" href="/usermabar/{{$usermabar->id}}/usermabardetail">
                        </a>
                        <a class="edit-button" href="/usermabar/{{$usermabar->id}}/usermabaredit"></a>
                    </div>
                    <img class="box-logo" src="{{asset('storage/'. $usermabar->image)}}" alt="">
                    <div style="margin-left: 5%; width: 60%;" >
                        <p style="font-size: 0.8vw;" >Mabar | {{$usermabar->olahraga}}</p>
                        <p style="font-size: 1.5vw; font-family: opensans-bold; margin-top: 3%;" >{{$usermabar->title}}</p>
                        <p>Pemilik / host</p>
                    </div>
                </div>
                <div class="box-bottom">
                    <div class="line">
                        
                        <div style="background: url(/css/img/calender.png); background-position: center; background-size: contain;" class="bottom-icon">

                        </div>
                        {{$usermabar->tanggal_pertandingan}}
                    </div>
                    <div class="line">
                        
                        <div style="background: url(/css/img/target.png); background-position: center; background-size: contain;" class="bottom-icon">

                        </div>
                        {{$usermabar->lokasi}}
                    </div>
                    <div class="line">
                        <div style="background: url(/css/img/price.png); background-position: center; background-size: contain;" class="bottom-icon">

                        </div>
                        {{$usermabar->harga_tiket}}
                    </div>
                </div>

            </button>
            </a>
        </div>
        @endforeach
    </section> 
    <section class="white-space" ></section>   
    <a href="/usermabar/tambah" class="add-sparring" >+</a>
    <script src="/js/mapslist.js"></script>
    <script src="/js/searchhome.js"></script>
</body>
</html>