<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Match Up</title>
    <link rel="stylesheet" href="/css/kompetisideatil.css">
</head>
<body>
    <section class="navbar" >
        <a href="/kompetisi/home">
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
                <div style="background-image: url(/css/img/pxg.png);" class="left1-logo">

                </div>
                <div class="left1-box">
                    <p>{{$kompetisi->title}}</p>
                    <div style="display: flex; align-items: center; width: 50%;">
                        <img class="left1-icon" src="/css/img/bola icon.png" alt="">
                        <!-- <div class="left1-icon">

                        </div> -->
                        <p style="font-size: 0.8vw; margin-left: 5%;" >{{$kompetisi->olahraga}}</p>
                    </div>
                    <div>
                        <div class="access">
                        {{$kompetisi->aksebilitas}}
                        </div>
                        <div class="age">
                        {{$kompetisi->tingkatan}}
                        </div>
                    </div>
                </div>
            </div>
            <hr>
            <div class="left2">
                <div>Deskripsi Mabar</div>
                <span>{{$kompetisi->deskripsi}}</span>
            </div>
            <div class="left-prize">
                <div>Prize Pool</div>
                <div class="prize-grid">
                    <div class="prize-box">
                        <div class="prize-logo">

                        </div>
                        <span class="prize-content" >
                            <span style="font-family: opensans-bold; color: black; font-size: 1.2vw; " >JUARA I</span>
                            <span>Prize</span>
                        </span>
                    </div>
                    <div class="prize-box">
                        <div class="prize-logo">

                        </div>
                        <span class="prize-content" >
                            <span style="font-family: opensans-bold; color: black; font-size: 1.2vw; " >JUARA II</span>
                            <span>Prize</span>
                        </span>
                    </div>
                    <div class="prize-box">
                        <div class="prize-logo">

                        </div>
                        <span class="prize-content" >
                            <span style="font-family: opensans-bold; color: black; font-size: 1.2vw; " >JUARA III</span>
                            <span>Prize</span>
                        </span>
                    </div>
                </div>
            </div>
            <hr>
            <div class="left3">
                <div>Lokasi Mabar</div>
                <span>Detail Lokasi</span>
                <div class="maps">

                </div>
            </div>
        </div>
        <div class="right-content"> 
            <div>
                <span class="biaya" >Biaya Masuk</span>
            <span class="harga" style="display: block;" >Rp {{$kompetisi->harga_tiket}} <text style="color: grey; font-size: 1.3vw;" >/Tim</text> </span>
            <button>
                Ambil Sparring
            </button>
            <div class="line1">
                <div style="background: url(/css/img/calender.png); background-position: center; background-size: contain;" class="icon">

                </div>
                {{$kompetisi->tanggal_pertandingan}}
            </div>  
            <div class="line1">
                <div style="background: url(/css/img/target.png); background-position: center; background-size: contain;" class="icon">

                </div>
                {{$kompetisi->lokasi}}
            </div>
            <div class="line1">
                <div style="background: url(/css/img/clock.png); background-position: center; background-size: contain;" class="icon">

                </div>
                {{$kompetisi->lama_pertandingan}}
            </div>
            <br>
            <span class="biaya" >Informasi Tambahan</span><br><br>

            <span style="font-size: 1vw;" >{{$kompetisi->deskripsi_tambahan}}</span>

            </div>
            <div class="member">
                <div class="member-top">
                    <span style="font-size: 1.2vw; color: grey; " >Member</span>
                    <span style="font-size: 1.2vw; color: grey; ">0</span>
                </div>
                <div class="member-bottom">
                    <div class="member1">
                        <div class="member-logo">
                            
                        </div>
                        <span style="margin-left: 5%;" >
                            <p style="font-family: opensans-bold; font-size: 1vw; " >Team</p>
                            <p style="font-size: 0.8vw;">Member</p>
                        </span>
                    </div>
                        <div class="member1">
                        <div class="member-logo">
                            
                        </div>
                        <span style="margin-left: 5%;" >
                            <p style="font-family: opensans-bold; font-size: 1vw; " >Team</p>
                            <p style="font-size: 0.8vw;">member</p>
                        </span>
                    </div>
                    
                </div>
            </div>
        </div>
    </section>
    <section class="white-space" ></section> 
</body>
</html>