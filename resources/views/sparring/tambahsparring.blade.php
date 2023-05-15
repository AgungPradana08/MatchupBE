<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Match UP</title>
    <link rel="stylesheet" href="/css/tambahsparring.css">
</head>
<body>
    <section class="navbar" >
        <a href="/sparring/home">
        
        </a>
        <p>TAMBAH SPARING</p>
        <a style="visibility: hidden;" href="#">
        
        </a>
    </section>
    <section class="content" >
        <div class="add-image">
            <div class="image-box">
                <button class="edit-image">
                    <!-- Add Image -->
                </button>
            </div>
        </div>
    </section>
    <section class="title" >
        <span style="padding: 1%;" >JUDUL</span>
        <form action="/sparring/store" method="POST">
        @csrf
        <div class="title-container">
            <input class="title1" type="text" placeholder="Masukkan Title..." >
            <select class="title2" type="text" placeholder="TWO" >
                <option value="" disabled selected hidden>Pilih Olahraga...</option>
                <option value="">Sepak Bola</option>
                <option value="">Futsal</option>
                <option value="">Ping Pong</option>
                <option value="">Bulutangkis</option>
                <option value="">Renang</option>
            </select>
            <input class="title3" type="text" placeholder="Masukkan Deskripsi" >
        </div>
    </section>
    <section style="margin-top: 5vh;" class="location" >
        <span style="padding: 1%;" >LOKASI</span>
        <div class="location-container">
            <input class="title1" type="text" placeholder="Rincian Lokasi Sparring..." >
            <div class="map">

            </div>
        </div>
    </section>
    <section style="margin-top: 5vh;" class="accessibility" >
        <span style="padding: 1%;" >LOKASI</span>
        <div class="access-container">
            <input style="margin-left: 0.1%;"class="ac-title1" type="text" placeholder="Min-Member" >
            <input class="ac-title1" type="text" placeholder="Max-member" >
            <select class="ac-title2" type="text" placeholder="TWO" >
                <option value="" disabled selected hidden>Terbuka/Privat</option>
                <option value="">Terbuka</option>
                <option value="">Private</option>
            </select>
            <select class="ac-title2" type="text" placeholder="TWO" >
                <option value="" disabled selected hidden>Pilih Tingkatan...</option>
                <option value="">7-10</option>
                <option value="">10-17</option>
                <option value="">17-20</option>
            </select>
        </div>
    </section>
    <section style="margin-top: 5vh;" class="title" >
        <span style="padding: 1%;" >INFORMASI</span>
        <div class="information-container">
            <input class="info1" type="text" placeholder="Tanggal Pertandingan..." >
            <input class="info2" type="text" placeholder="Harga Tiket..." >
            <input class="info3" type="text" placeholder="Lama Pertandingan..." >
            <input class="info4" type="text" placeholder="Deskripsi Tambahan..." >
        </div>
    </section>
    <section style="margin-top: 5vh;" class="add-button">
        <button style="height: 10vh;" class="add-sparring" value="save" >
            BUAT
        </button>
    </section>
    </form>
    <section class="white-space" ></section>
    <section class="add-sparring" ></section>
</body>
</html>