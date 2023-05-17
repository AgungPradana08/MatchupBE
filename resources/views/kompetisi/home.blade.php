<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Match Up</title>
    <link rel="stylesheet" href="/css/kompetisi.css">
</head>
<body>
    <section class="navbar" >
        <div class="navbar-left">
            <img style="margin-left: 8%;" class="logo" src="/css/img/logo.png" alt="">
            <!-- <div style="margin-left: 8%;" class="logo">

            </div> -->
            <a class="sparring" href="/sparring/home" >Sparring</a>
            <a class="mabar" href="/mabar/home" >Mabar</a>
            <a class="kompetisi" style="color: #FE6B00;"  href="#" >Kompetisi</a>
            <a class="tim" href="/tim/home" >Tim</a>
        </div>
        <a class="user" style="margin-right: 4%; background-color: grey; color: white; " href="userdetail.html"></a>
    </section>
    <section class="sparring-header" >
        <div class="banner" style="background-image: url(/css/img/dashboard-banner.png); background-size: cover; background-position: center;">
            CARI KOMPETISI
        </div>
    </section>
    <section class="sparring-search" >
        <div class="input-box">
            <!-- <img class="icon-box" src="css/img/search.png" alt=""> -->
            <div style="background: url(/css/img/search.png); background-position: center; background-size: contain;" class="icon-box">
            </div>
            <input type="text" placeholder="Cari Nama Kompetisi..." >
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
    @foreach ($kompetisi as $kompetisi)
        <a class="box" href="/kompetisi/{{$kompetisi->id}}/kompetisidetail" >
           <button class="box-outer" style="width: 100%; height: 100%;" >
            <div class="box-top">
                <img class="box-logo" src="/css/img/pxg.png" alt="">
                <!-- <div class="box-logo">

                </div> -->
                <div style="margin-left: 5%; width: 60%;" >
                    <p style="font-size: 0.8vw;" >{{$kompetisi->olahraga}}</p>
                    <p style="font-size: 1.5vw; font-family: opensans-bold; margin-top: 3%;" >{{$kompetisi->title}}</p>
                    <div class="access">
                    {{$kompetisi->aksebilitas}}
                    </div>
                    <div class="age">
                    {{$kompetisi->tingkatan}}
                    </div>
                </div>
            </div>
            <div class="box-bottom">
                <div class="line">
                    <!-- <img class="bottom-icon" src="css/img/tanggak.png" alt=""> -->
                    <div style="background: url(/css/img/calender.png); background-position: center; background-size: contain;" class="bottom-icon">

                    </div>
                    {{$kompetisi->tanggal_pertandingan}}
                </div>
                <div class="line">
                    <!-- <img class="bottom-icon" src="css/img/lokasi.png" alt=""> -->
                    <div style="background: url(/css/img/target.png); background-position: center; background-size: contain;" class="bottom-icon">

                    </div>
                    {{$kompetisi->lokasi}}
                </div>
                <div class="line">
                    <div style="background: url(/css/img/price.png); background-position: center; background-size: contain;" class="bottom-icon">

                    </div>
                    {{$kompetisi->harga_tiket}}
                </div>
                <hr>
                <div style="width: 100%; display: flex; justify-content: space-between; align-items: center;" >
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
    <section class="white-space" ></section>   
</body>
</html>