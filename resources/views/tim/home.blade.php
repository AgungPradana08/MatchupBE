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
            <img style="margin-left: 8%;" class="logo" src="/css/img/logo.png" alt="">
            <!-- <div style="margin-left: 8%;" class="logo">

            </div> -->
            <a class="sparring"  href="/sparring/home" >Sparring</a>
            <a class="mabar" href="/mabar/home">Mabar</a>
            <a class="kompetisi" href="/kompetisi/home" >Kompetisi</a>
            <a class="tim" style="color: #FE6B00;" href="#" >Tim</a>
        </div>
        <a class="user" style="margin-right: 4%; background-color: grey; color: white; " href="/userprofile/home"></a>
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
            <input type="text" placeholder="Cari Nama Tim..." >
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
    <section class="white-space" ></section>
    <a href="/tim/tambahtim" class="add-sparring" >+</a>   
</body>
</html>