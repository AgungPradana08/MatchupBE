<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Match Up</title>
    <link rel="stylesheet" href="/css/sparringpage.css">
</head>
<body>
    <section class="navbar" >
        <div class="navbar-left">
            <img style="margin-left: 8%;" class="logo" src="/css/img/logo.png" alt="">
            <!-- <div style="margin-left: 8%;" class="logo">

            </div> -->
            <a class="sparring" style="color: #FE6B00;" href="sparringpage.html" >Sparring</a>
            <a class="mabar" href="/mabar/home">Mabar</a>
            <a class="kompetisi" href="/kompetisi/home" >Kompetisi</a>
            <a class="tim" href="/tim/home" >Tim</a>
        </div>
        <a class="user" style="margin-right: 4%; background-color: grey; color: white; " href="/userprofile/home"></a>
    </section>
    <section class="sparring-header" >
        <div class="banner" style="background-image: url(/css/img/dashboard-banner.png); background-size: cover; background-position: center;">
            PILIH LAWAN SPARRING
        </div>
    </section>
    <section class="sparring-search" >
        <div class="input-box">
            <!-- <img class="icon-box" src="css/img/search.png" alt=""> -->
            <div style="background: url(/css/img/search.png); background-position: center; background-size: contain;" class="icon-box">
            </div>
            <input type="text" placeholder="Cari Nama Sparring..." >
        </div>
        <div class="input-box">
            <div style="background: url(/css/img/location.png); background-position: center; background-size: contain;" class="icon-box">
            </div>
            <select name="" id="" >
                <option value="" disabled selected hidden>Pilih Nama Lokasi...</option>
                <option value="">ITEM 1</option>
                <option value="">ITEM 1</option>
                <option value="">ITEM 1</option>
            </select>
        </div>
        <div class="input-box">
            <div style="background: url(/css/img/keyword.png); background-position: center; background-size: contain;" class="icon-box">
            </div>
            <select name="" id="" >
                <option value="" disabled selected hidden>Pilih Cabang Olahraga...</option>
                <option value="">ITEM 1</option>
                <option value="">ITEM 1</option>
                <option value="">ITEM 1</option>
            </select>
        </div>
        <button class="search" >
            Cari
        </button>
    </section>
    <section class="box-wrapper">
    @foreach ($sparring as $sparring)
        <a class="box" href="/sparring/{{$sparring->id}}/sparringdetail" >
           <button class="box-outer" style="width: 100%; height: 100%;" >
            <div class="box-top">
                <img class="box-logo" src="/css/img/pxg.png" alt="">
                <!-- <div class="box-logo">

                </div> -->
                <div style="margin-left: 5%; width: 60%;" >
                    <p style="font-size: 0.8vw;" >{{$sparring->olahraga}}</p>
                    <p style="font-size: 1.5vw; font-family: opensans-bold; margin-top: 3%;" >{{$sparring->title}}</p>
                    <div class="access">
                    {{$sparring->aksebilitas}}
                    </div>
                    <div class="age">
                    {{$sparring->tingkatan}}
                    </div>
                </div>
            </div>
            <div class="box-bottom">
                <div class="line">
                    <!-- <img class="bottom-icon" src="css/img/tanggak.png" alt=""> -->
                    <div style="background: url(/css/img/calender.png); background-position: center; background-size: contain;" class="bottom-icon">

                    </div>
                    {{$sparring->tanggal_pertandingan}}
                </div>
                <div class="line">
                    <!-- <img class="bottom-icon" src="css/img/lokasi.png" alt=""> -->
                    <div style="background: url(/css/img/target.png); background-position: center; background-size: contain;" class="bottom-icon">

                    </div>
                    {{$sparring->lokasi}}
                </div>
                <div class="line">
                    <div style="background: url(/css/img/price.png); background-position: center; background-size: contain;" class="bottom-icon">

                    </div>
                    {{$sparring->harga_tiket}}
                </div>

            </div>
           </button>
        </a>
        @endforeach
        
    </section> 
    <section class="white-space" ></section>   
    <a href="tambahsparring" class="add-sparring" >+</a>
</body>
</html>