<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="/css/tambahsparringnewnew.css">
    <link rel="shortcut icon" type="image/x-icon" href="/css/img/vector.png">

</head>
<body>
    <section class="navbar" >
        <a class="navbar-btn" href="sparringpage.html"><img src="css/img/back button.png" alt=""></a>
        <a class="navbar-nav" onclick="DetailSparring()" href="#Detail">Nama Sparring</a>
        <a class="navbar-nav" onclick="VersusSparring()" href="#Versus">Versus</a>
        <a class="navbar-btn"  href="#"><img src="css/img/report.png" alt=""></a>
    </section>
    <div class="wrapper">
        <div id="Detail" class="container1">
            <div class="left-content">
                <div class="left1">
                    <img class="left1-logo" src="css/img/pxg.png" alt="">
                    <!-- <div class="left1-logo">
    
                    </div> -->
                    <div class="left1-box">
                        <p>TITLE</p>
                        <div style="display: flex; align-items: center; width: 50%;">
                            <img class="left1-icon" src="css/img/bola icon.png" alt="">
                            <!-- <div class="left1-icon">
    
                            </div> -->
                            <p style="font-size: 0.8vw; margin-left: 5%;" >Olahraga</p>
                        </div>
                        <div>
                            <div class="access">
                                Terbuka
                            </div>
                            <div class="age">
                                15-17
                            </div>
                        </div>
                    </div>
                </div>
                <hr>
                <div class="left2">
                    <div>Deskripsi Sparring</div>
                    <span>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum luctus ultrices erat. Fusce dapibus eros elit, quis consectetur tortor interdum eget. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia curae; Nam scelerisque pretium nisl id efficitur. Vivamus vestibulum hendrerit neque, vitae venenatis lorem ornare ac. Maecenas gravida in est eu laoreet. Vestibulum interdum sapien metus, in vehicula ligula fringilla in. Praesent Ornar</span>
                </div>
                <hr>
                <div class="left3">
                    <div>Lokasi Sparring</div>
                    <span>Detail Lokasi</span>
                    <div class="maps">
    
                    </div>
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
                    <div style="background: url(css/img/calender.png); background-position: center; background-size: contain;" class="icon">
    
                    </div>
                    Tanggal Dan Waktu
                </div>
                <div class="line1">
                    <div style="background: url(css/img/target.png); background-position: center; background-size: contain;" class="icon">
    
                    </div>
                    Lokasi
                </div>
                <div class="line1">
                    <div style="background: url(css/img/clock.png); background-position: center; background-size: contain;" class="icon">
    
                    </div>
                    Lama Bermain
                </div>
                <br>
                <span class="biaya" >Informasi Tambahan</span><br><br>
    
                <span style="font-size: 1vw;" >Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum luctus ultrices erat. Fusce dapibus eros elit, quis consectetur tortor interdum eget. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia curae; Nam scelerisque pretium nisl id efficitur. Vivamus vestibulum hendrerit neque, vitae venenatis lorem ornare ac. Maecenas gravida in est eu laoreet. Vestibulum interdum sapien metus, in vehicula ligula fringilla in. Praesent Ornar</span>
            </div>

        </div>
        <div id="Versus" class="container2">
            <div class="vs-background">
                <img id="teambackground1" class="background-away" src="css/img/manchester city.png" alt="">
                <img id="teambackground2" class="background-home" src="css/img/psg.png" alt="">
            </div>
            <div class="vs-away-home">
                <div id="awayteam" class="vs-away"></div>
                <div id="hometeam" class="vs-home"></div>
            </div>
            <div class="vs-detail">
                <div class="vs-container">
                    <div class="de-title">
                        UEFA Champion League
                    </div>
                    <div class="de-away">
                        <img src="css/img/pxg.png" class="box-icon"  alt="">
                        <p style="margin-top: 5%;" >name</p>
                    </div>
                    <div class="de-vs">
                        VS
                    </div>
                    <div class="de-home">
                        <img src="css/img/psg.png" class="box-icon"  alt="">
                        <p style="margin-top: 5%;" >name</p>
                    </div>
                    <div class="de-button">
                        <a class="primary" href="">
                            <button>AMBIL SPARRING</button>
                        </a>
                        <a class="secondary" href="">
                            <button>BTN</button>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="/js/sparring.js"></script>
</body>
</html>