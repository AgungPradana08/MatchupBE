<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Match Up</title>
    <link rel="stylesheet" href="/css/mabardetail.css">
</head>
<body>
    <section class="navbar" >
        <a class="navbar-btn" href="/mabar/home"><img src="/css/img/back button.png" alt=""></a>
        <a class="navbar-nav"  >Detail Mabar</a>

        <a class="navbar-btn"  href="#"><img src="/css/img/report.png" alt=""></a>
    </section>
    <section class="container" >
        <div class="left-content">
            <div class="left1">
                <div class="left1-logo">
                <img class="left1-logo" src="{{asset ('storage/' . $usermabar->image)}}" alt="">
                </div>
                <div class="left1-box">
                    <p>{{$usermabar->title}}</p>
                    <div style="display: flex; align-items: center; width: 50%;">
                        <img class="left1-icon" src="/css/img/bola icon.png" alt="">
                        <!-- <div class="left1-icon">

                        </div> -->
                        <p style="font-size: 0.8vw; margin-left: 5%;" >{{$usermabar->olahraga}}</p>
                    </div>
                    <div>
                        <div class="access">
                        {{$usermabar->aksebilitas}}
                        </div>
                        <div class="age">
                        {{$usermabar->tingkatan}}
                        </div>
                    </div>
                </div>
            </div>
            <hr>
            <div class="left2">
                <div>Deskripsi usermabar</div>
                <span>{{$usermabar->deskripsi}}</span>
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
            <div>
                <span class="biaya" >Biaya Masuk</span>
            <span class="harga" style="display: block;" >Rp {{$usermabar->harga_tiket}} <text style="color: grey; font-size: 1.3vw;" >/Tim</text> </span>
            <button>
                Bergabung
            </button>
            <div class="line1">
                <div style="background: url(/css/img/calender.png); background-position: center; background-size: contain;" class="icon">

                </div>
                {{$usermabar->tanggal_pertandingan}}
            </div>  
            <div class="line1">
                <div style="background: url(/css/img/target.png); background-position: center; background-size: contain;" class="icon">

                </div>
                <span id="locationTarget" >{{$usermabar->lokasi}}</span>
            </div>
            <div class="line1">
                <div style="background: url(/css/img/clock.png); background-position: center; background-size: contain;" class="icon">

                </div>
                {{$usermabar->lama_pertandingan}}
            </div>
            <br>
            <span class="biaya" >Informasi Tambahan</span><br><br>

            <span style="font-size: 1vw;" >{{$usermabar->deskripsi_tambahan}}</span>

            </div>
            <div class="member">
                <div class="member-top">
                    <span style="font-size: 1.2vw; color: grey; " >Member</span>
                    <span style="font-size: 1.2vw; color: grey; ">1</span>
                </div>
                <div class="member-bottom">
                    <div class="member1">
                        <div class="host-logo">
                            
                        </div>
                        <span style="margin-left: 5%;" >
                            <p style="font-family: opensans-bold; font-size: 1vw; " >{{ Auth::user()->username}}</p>
                            <p style="font-size: 0.8vw;">Host</p>
                        </span>
                    {{-- </div>
                        <div class="member1">
                        <div class="member-logo">
                            
                        </div>
                        <span style="margin-left: 5%;" >
                            <p style="font-family: opensans-bold; font-size: 1vw; " >USERNAME</p>
                            <p style="font-size: 0.8vw;">member</p>
                        </span>
                    </div> --}}
                    
                </div>
            </div>
        </div>
    </section>
    <section class="white-space" ></section> 
    <script src="/js/mapslist.js"></script>
    <script>
        DetectMap()

        function DetectMap() {
            var Target = document.getElementById("locationTarget")
            var detail = document.getElementById("detaillokasi")
            var mapsview = document.getElementById("MapDisplay")

            
                for (let index = 0; index < maps.length; index++) {
                if (Target.innerHTML === maps[index].lokasi) {
                    detail.innerHTML = maps[index].detaillokasi
                    mapsview.src = maps[index].embed
                    break; // Menghentikan iterasi setelah menemukan kecocokan
                }
            }
        }
    </script>
</body>
</html>