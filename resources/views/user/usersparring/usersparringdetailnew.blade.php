<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="/css/detailsparringnewnew.css">
</head>
<body>
    <section class="navbar" >
        <a class="navbar-btn" href="/sparring/home"><img src="/css/img/back button.png" alt=""></a>
        <a class="navbar-nav"  >Detail Sparring</a>
        <a class="navbar-nav"  >{{$usersparring->title}}</a>

        <a class="navbar-btn"  href="#"><img src="/css/img/report.png" alt=""></a>
    </section>
    <div class="wrapper">
        <div id="Detail" class="container1">
            <a class="versus" id="versus-bookmark" onclick="VersusSparring()" href="#Versus">Versus</a>
            <div class="left-content">
                <div class="left1">
                    <img class="left1-logo" src="{{asset ('storage/' . $usersparring->image)}}" alt="">
                    <!-- <div class="left1-logo">
    
                    </div> -->
                    <div class="left1-box">
                        <p>{{$usersparring->title}}</p>
                        <div style="display: flex; align-items: center; width: 50%;">
                            <img class="left1-icon" src="/css/img/bola icon.png" alt="">
                            <!-- <div class="left1-icon">
    
                            </div> -->
                            <p style="font-size: 0.8vw; margin-left: 5%;" >{{$usersparring->olahraga}}</p>
                        </div>
                        <div>
                            <div class="access">
                                {{$usersparring->aksebilitas}}
                            </div>
                            <div class="age">
                                {{$usersparring->tingkatan}}
                            </div>
                        </div>
                    </div>
                </div>
                <hr>
                <div class="left2">
                    <div>Deskripsi Sparring</div>
                    <span>{{$usersparring->deskripsi}}</span>
                </div>
                <hr>
                <div class="left3">
                    <div>Lokasi Sparring</div>
                    <span id="detaillokasi" >Detail Lokasi</span>
                    <iframe  id="MapDisplay" class="maps">
    
                    </iframe>
                </div>
                <section class="white-space" ></section>
            </div>
            <div class="right-content">
                <span class="biaya" >Biaya Masuk</span>
                <span class="harga" style="display: block;" >Rp 5000 <text style="color: grey; font-size: 1.3vw;" >/Tim</text> </span>
                <button>
                    Ambil Sparring
                </button>
                <div class="line1">
                    <div style="background: url(/css/img/calender.png); background-position: center; background-size: contain;" class="icon">
    
                    </div>
                    {{$usersparring->tanggal_pertandingan}}
                </div>
                <div class="line1">
                    <div style="background: url(/css/img/target.png); background-position: center; background-size: contain;" class="icon">
    
                    </div>
                    <span id="locationTarget" >{{$usersparring->lokasi}}</span>
                </div>
                <div class="line1">
                    <div style="background: url(/css/img/clock.png); background-position: center; background-size: contain;" class="icon">
    
                    </div>
                    {{$usersparring->lama_pertandingan}}
                </div>
                <br>
                <span class="biaya" >Informasi Tambahan</span><br><br>
    
                <span style="font-size: 1vw;" >{{$usersparring->deskripsi_tambahan}}</span>
            </div>

        </div>
        <div id="Versus" class="container2">
            <a class="detail" id="detail-bookmark" onclick="detailSparring()" href="#Detail">Detail</a>
            <div class="vs-background">
                <img id="teambackground1" class="background-away" src="/css/img/psg.png" alt="">
                <img id="teambackground2" class="background-home" src="{{asset ('storage/' . $usersparring->image)}}" alt="">
            </div>
            <div class="vs-away-home">
                <div id="awayteam" class="vs-away"></div>
                <div id="hometeam" class="vs-home"></div>
            </div>
            <div class="vs-detail">
                <div class="vs-container">
                    <div class="de-title">
                        {{$usersparring->title}}
                    </div>
                    <div class="de-away">
                        <img src="/css/img/psg.png" class="box-icon"  alt="">
                        {{-- @foreach ($takesparring as $takesparring) --}}
                        <p style="margin-top: 5%;" >nama</p>
                        {{-- @endforeach --}}
                    </div>
                    <div class="de-vs">
                        VS
                    </div>
                    <div class="de-home">
                        <img src="{{asset ('storage/' . $usersparring->image)}}" class="box-icon"  alt="">
                        <p style="margin-top: 5%;" >{{$usersparring->nama_tim}}</p>
                    </div>
                    {{-- <div class="de-detail">
                        <table>
                            <tr>
                                <td class="td1" >

                                </td>
                                <td style="opacity: 70%" >

                                    harga
                                </td>
                                <td>
                                    {{$usersparring->harga_tiket}}
                                </td>
                            </tr>
                            <tr>
                                <td class="td2">

                                </td>
                                <td style="opacity: 70%" >
                                    Tanggal dan waktu
                                </td>
                                <td>
                                    {{$usersparring->tanggal_pertandingan}}
                                </td>
                            </tr>
                            <tr>
                                <td class="td3">

                                </td>
                                <td style="opacity: 70%" >
                                    Lokasi/Avenue
                                </td>
                                <td>
                                    {{$usersparring->lokasi}}
                                </td>
                            </tr>
                            <tr>
                                <td class="td4">

                                </td>
                                <td  style="opacity: 70%"  >
                                    Lama Permainan
                                </td>
                                <td>
                                    {{$usersparring->lama_pertandingan}}
                                </td>
                            </tr>
                        </table>
                    </div> --}}
                    <div class="de-button">
                        <a class="primary" href="/usersparring/versus">
                            <button>AMBIL SPARRING</button>
                        </a>
                    </div>
                </div>
            </div>

        </div>
    </div>
    <script src="/js/mapslist.js"></script>
    <script src="/js/detailsparring.js"></script>
</body>
</html>