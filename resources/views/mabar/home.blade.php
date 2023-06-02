<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Match Up</title>
    <link rel="stylesheet" href="/css/mabar.css">
</head>
<body>
    <section class="navbar" >
        <div class="navbar-left">
            <img style="margin-left: 8%;" class="logo" src="/css/img/logo.png" alt="">
            <!-- <div style="margin-left: 8%;" class="logo">

            </div> -->
            <a class="sparring" href="/sparring/home" >Sparring</a>
            <a class="mabar" href="#" style="color: #FE6B00;" >Mabar</a>
            <a class="kompetisi" href="/kompetisi/home" >Kompetisi</a>
            <a class="tim" href="/tim/home" >Tim</a>
        </div>
        <a class="user" style="margin-right: 4%; background-color: grey; color: white; " href="/userprofile/home"></a>
    </section>
    <section class="sparring-header" >
        <div class="banner" style="background-image: url(/css/img/dashboard-banner.png); background-size: cover; background-position: center;">
            EVENT MABAR
        </div>
    </section>
    <section class="sparring-search"  >
        <div class="input-box">
            <!-- <img class="icon-box" src="css/img/search.png" alt=""> -->
            <div style="background: url(/css/img/search.png); background-position: center; background-size: contain;" class="icon-box">
            </div>
            
            <input id="sparring-name" onchange="InputChange()" type="text" placeholder="Cari Nama Mabar..." >
        </div>
        <div class="input-box">
            <div style="background: url(/css/img/location.png); background-position: center; background-size: contain;" class="icon-box">
            </div>
            <select id="sparring-location" onchange="InputChange()" name="" >
                <option value="" disabled selected hidden>Pilih Nama Lokasi...</option>
                <option value="">ITEM 1</option>
                <option value="">ITEM 1</option>
                <option value="">ITEM 1</option>
            </select>
        </div>
        <div class="input-box">
            <div style="background: url(/css/img/keyword.png); background-position: center; background-size: contain;" class="icon-box">
            </div>
            <select name="" id="sparring-sport" onchange="InputChange()" >
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
    @foreach ($mabar as $mabar)
        <a class="box" href="/mabar/{{$mabar->id}}/mabardetail" >
            <button class="box-outer" style="width: 100%; height: 100%;" >
             <div class="box-top">
             <img class="box-logo" src="{{asset('storage/'. $mabar->image)}}" alt="">
                 <!-- <div class="box-logo">
 
                 </div> -->
                 <div style="margin-left: 5%; width: 60%;" >
                     <p style="font-size: 0.8vw;" >{{$mabar->olahraga}}</p>
                     <p style="font-size: 1.5vw; font-family: opensans-bold; margin-top: 3%;" >{{$mabar->title}}</p>
                    <p>Nama Host</p>
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
                 <hr>
                 <div style="display: flex; justify-content: space-between; " >
                     <Span>Slot Terbatas</Span>
                     <span style="font-family: opensans-bold; color: #FE6B00; " >0/12</span>
                 </div>
             </div>
            </button>
         </a>
    @endforeach
    </section> 
    <section class="white-space" ></section>   
    <a href="/mabar/tambahmabar" class="add-sparring" >+</a>
</body>
</html>