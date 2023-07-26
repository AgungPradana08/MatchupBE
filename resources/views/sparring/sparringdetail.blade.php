<!DOCTYPE html
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Match Up</title>
    <link rel="stylesheet" href="/css/sparringdetail.css">
    <link rel="stylesheet" href="/css/notification.css">
    <link rel="shortcut icon" type="image/x-icon" href="/css/img/vector.png">

</head>
<body>
    
    <div id="notification" class="alert position-absolute notification justify-content-between mt-sm-4 mt-2 {{ session('notification') === 'Sparring sudah Penuh' || session('notification') === 'Anda berhasil bergabung' ? 'appear' : 'd-none' }}"  role="alert">
        <p class="d-inline-block p-0 m-0 " >{{ session('notification') }}</p>
        <button type="button" class="btn-close btn-close-white" onclick="closenotification()" aria-label="Close"></button>
    </div>

    <section class="navbar" >
        <a href="/sparring/home">
        <img src="/css/img/back button.png" alt="">
        </a>
        <p>DETAIL</p>
        <a href="#">
        <img src="/css/img/report.png" alt="">
        </a>
    </section>
    <section class="container" >
        <div class="left-content">
            <div class="left1">
                <img class="left1-logo" src="{{asset ('storage/' . $sparring->image)}}" alt="">
                <!-- <div class="left1-logo">

                </div> -->
                <div class="left1-box">
                    <p>{{$sparring->title}}</p>
                    <div style="display: flex; align-items: center; width: 50%;">
                        <img class="left1-icon" src="/css/img/bola icon.png" alt="">
                        <!-- <div class="left1-icon">

                        </div> -->
                        <p style="font-size: 0.8vw; margin-left: 5%;" >{{$sparring->olahraga}}</p>
                    </div>
                    <div>
                        <div class="access">
                        {{$sparring->aksebilitas}}
                        </div>
                        <div class="age">
                        {{$sparring->tingkatan}}
                        </div>
                    </div>
                </div>
            </div>
            <hr>
            <div class="left2">
                <div>Deskripsi Sparring</div>
                <span>{{$sparring->deskripsi}}</span>
            </div>
            <hr>
            <div class="left3">
                <div>Lokasi Sparring</div>
                <span>Detail Lokasi</span>
                <div class="maps">

                </div>
            </div>
        </div>
        <div class="right-content">
            <span class="biaya" >Biaya Masuk</span>
            <span class="harga" style="display: block;" >Rp {{$sparring->harga_tiket}} <text style="color: grey; font-size: 1.3vw;" >/Tim</text> </span>
            <button>
                Ambil Sparring
            </button>
            <div class="line1">
                <div style="background: url(/css/img/calender.png); background-position: center; background-size: contain;" class="icon">

                </div>
                {{$sparring->tanggal_pertandingan}} | {{$sparring->waktu_pertandingan}}
            </div>
            <div class="line1">
                <div style="background: url(/css/img/target.png); background-position: center; background-size: contain;" class="icon">

                </div>
                {{$sparring->lokasi}}
            </div>
            <div class="line1">
                <div style="background: url(/css/img/clock.png); background-position: center; background-size: contain;" class="icon">

                </div>
                {{$sparring->lama_pertandingan}}
            </div>
            <br>
            <span class="biaya" >Informasi Tambahan</span><br><br>

            <span style="font-size: 1vw;" >{{$sparring->deskripsi_tambahan}}</span>
        </div>
    </section>
    <script src="/js/notification.js"></script>
    <section class="white-space" ></section>

</body>
</html>