<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Match UP</title>
    <link rel="stylesheet" href="/css/tambahmabar.css">
</head>
<body>
    <section class="navbar" >
        <a href="/mabar/home">
        
        </a>
        <p>TAMBAH MABAR</p>
        <a style="visibility: hidden;" href="#">
        
        </a>
    </section>
    <section class="content" >
        <div class="add-image">
<form action="/mabar/store" method="POST">
    @csrf
            <div class="image-box">
                <button class="edit-image">
                    <!-- Add Image -->
                </button>
            </div>
        </div>
    </section>
    <section class="title" >
        <span style="padding: 1%;" >JUDUL</span>
        <div class="title-container">
            <input class="title1" name="title" type="text" placeholder="ONE" >
            <select class="title2" name="olahraga"type="text" placeholder="TWO" >
                <option value="" >Pilih Olahraga...</option>
                <option value="Sepak Bola">Sepak Bola</option>
                <option value="Futsal">Futsal</option>
                <option value="Ping Pong">Ping Pong</option>
                <option value="Bulutangkis">Bulutangkis</option>
                <option value="Renang">Renang</option>
            </select>
            <input class="title3" name="deskripsi" type="text" placeholder="THREE" >
        </div>
    </section>
    <section style="margin-top: 5vh;" class="location" >
        <span style="padding: 1%;" >LOKASI</span>
        <div class="location-container">
            <input class="title1" name="lokasi" type="text" placeholder="ONE" >
            <div class="map">

            </div>
        </div>
    </section>
    <section style="margin-top: 5vh;" class="accessibility" >
        <span style="padding: 1%;" >LOKASI</span>
        <div class="access-container">
            <input style="margin-left: 0.1%;"class="ac-title1" name="min_member" type="text" placeholder="ONE" >
            <input class="ac-title1" name="max_member" type="text" placeholder="TWO" >
            <select class="ac-title2" name="aksebilitas" type="text" placeholder="TWO" >
                <option value="">Terbuka/Privat</option>
                <option value="Terbuka">Terbuka</option>
                <option value="Terbuka">Private</option>
            </select>
            <select class="ac-title2" name="tingkatan" type="text" placeholder="TWO" >
                <option value="">Pilih Tingkatan...</option>
                <option value="7-10">7-10</option>
                <option value="10-17">10-17</option>
                <option value="17-20">17-20</option>
            </select>
        </div>
    </section>
    <section style="margin-top: 5vh;" class="title" >
        <span style="padding: 1%;" >INFORMASI</span>
        <div class="des-container">
            <input class="des-title1" name="tanggal_pertandingan" type="text" placeholder="ONE" >
            <input class="des-title2" name="harga_tiket" type="text" placeholder="TWO" >
        </div>
    </section>
    <section style="margin-top: 5vh;" class="add-button">
        <button style="height: 10vh;" class="add-sparring" type="submit" value="save" >
            BUAT
        </button>
    </section>
</form>
    <section class="white-space" ></section>
    <section class="add-sparring" ></section>
</body>
</html>