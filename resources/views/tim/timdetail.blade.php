<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Match Up</title>
    <link rel="stylesheet" href="/css/timdetail.css">
</head>
<body>
    <section class="navbar" >
        <a href="/tim/home">
        <img src="/css/img/back button.png" alt="">
        </a>
        <p>TITLE</p>
        <a href="#">
        <img src="/css/img/report.png" alt="">
        </a>
    </section>
    <section class="container" >
        <div class="left-content">
            <div class="left1">
                <img class="left1-logo" src="/css/img/pxg.png" alt="">
                <!-- <div class="left1-logo">

                </div> -->
                <div class="left1-box">
                    <p>{{$tim->title}}</p>
                    <div style="display: flex; align-items: center; width: 50%;">
                        <img class="left1-icon" src="/css/img/bola icon.png" alt="">
                        <!-- <div class="left1-icon">

                        </div> -->
                        <p style="font-size: 0.8vw; margin-left: 5%;" >{{$tim->olahraga}}</p>
                    </div>
                    <div>
                        <div class="access">
                        {{$tim->aksebilitas}}
                        </div>
                        <div class="age">
                        {{$tim->tingkatan}}
                        </div>
                    </div>
                </div>
            </div>
            <hr>
            <div class="left2">
                <div>Deskripsi Tim</div>
                <span>{{$tim->deskripsi}}</span>
            </div>
            <hr>
            <div class="left3">
                <div>Member Tim</div>
                <div class="maps">
                    <div class="box">
                        <div class="box-logo">

                        </div>
                        <span style="margin-left: 5%;" >
                            <p style="font-family: opensans-bold; font-size: 1vw; " >USERNAME</p>
                            <p style="font-size: 0.8vw;">Lore</p>
                        </span>
                    </div>
                </div>
            </div>
        </div>
        <div class="right-content">
            <span class="biaya" >Biaya Masuk</span>
            <span class="harga" style="display: block;" >Rp {{$tim->harga_tiket}} <text style="color: grey; font-size: 1.3vw;" >/Orang</text> </span>
            <button>
                Bergabung
            </button>
            <div class="line1" style="margin-bottom: 2vh;" >
                Jumlah Slot: 0/12
            </div>
            <span class="biaya" >Informasi Tambahan</span><br>
            <div class="line1">
                <div style="background: url(/css/img/user.png); background-position: center; background-size: contain;" class="icon">

                </div>
                Pemilik
            </div>
            <div class="line1">
                <div style="background: url(/css/img/instagram.jpg); background-position: center; background-size: contain;" class="icon">

                </div>
                Instagram
            </div>
            <div class="line1">
                <div style="background: url(/css/img/whatapps.jpg); background-position: center; background-size: contain;" class="icon">

                </div>
                WhatApps
            </div>
            <div class="line1">
                <div style="background: url(/css/img/facebook.jpg); background-position: center; background-size: contain;" class="icon">

                </div>
                Facebook
            </div>
            <br>
            
            <span style="font-size: 1vw;" >{{$tim->deskripsi_tambahan}}</span>
        </div>
    </section>
    <section class="white-space" ></section>

</body>
</html>