<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Match UP</title>
    <link rel="stylesheet" href="/css/tambahsparring.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
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
    <form action="/usersparring/store" method="POST" enctype="multipart/form-data">
        @csrf
            <div class="image-box" >
                <img class="img-preview"  alt="">  
                <div class="edit-image">
                    <label for="image">
                      <img class="image-box-1" style="border-radius: 100%" height="35px" src="/css/img/add-image.jpg">
                    </label>
                  
                    <input style="display: none" type="file" id="image" name="image" onchange="previewImage()">
                  </div>
                
            </div>
        </div>
    </section>
    <section class="title" >
            <div class="title-container">
                <div style="background: red;" >
                    <input class="title-1" name="title" type="text" id="TitleInput" placeholder="Masukkan Title..."  >

                    @error ('title')
                        <p class="text-danger" >{{ $message }}</p>
                    @enderror
                </div>

                <select name="olahraga" class="title2" type="text" placeholder="TWO">
                    <option value="" >Pilih Olahraga...</option>
                    <option value="Sepak Bola">Sepak Bola</option>
                    <option value="Futsal">Futsal</option>
                    <option value="Ping Pong">Ping Pong</option>
                    <option value="Bulutangkis">Bulutangkis</option>
                    <option value="Renang">Renang</option>
                </select>
                @error ('olahraga')
                        <p class="text-danger" >{{ $message }}</p>
                @enderror
                <input class="title3" type="text" name="deskripsi" placeholder="Masukkan Deskripsi" >
                @error ('deskripsi')
                        <p class="text-danger" >{{ $message }}</p>
                @enderror
            </div>
        </section>
        <section style="margin-top: 5vh;" class="location" >
            <span style="padding: 1%;" >LOKASI</span>
            <div class="location-container">
                <input class="title1" type="text" name="lokasi" placeholder="Rincian Lokasi Sparring..." >
                @error ('lokasi')
                        <p class="text-danger" >{{ $message }}</p>
                @enderror
                <div class="map">

                </div>
            </div>
        </section>
        <section style="margin-top: 5vh;" class="accessibility"  >
            <span style="padding: 1%;" >AKSEBILITAS</span>
            <div class="access-container">
                <input style="margin-left: 0.1%;"class="ac-title1" type="text" placeholder="Min-Member" name="min_member" >
                @error ('min_member')
                        <p class="text-danger" >{{ $message }}</p>
                @enderror
                <input class="ac-title1" type="text" placeholder="Max-member" name="max_member" >
                @error ('max_member')
                        <p class="text-danger" >{{ $message }}</p>
                @enderror
                <select class="ac-title2" type="text" placeholder="TWO" name="aksebilitas" >
                    <option value="">Terbuka/Privat</option>
                    <option value="Terbuka">Terbuka</option>
                    <option value="Private">Private</option>
                </select>
                @error ('aksebilitas')
                        <p class="text-danger" >{{ $message }}</p>
                @enderror
                <select class="ac-title2" type="text" placeholder="TWO" name="tingkatan" >
                    <option value="">Pilih Tingkatan...</option>
                    <option value="7-10">7-10 Tahun</option>
                    <option value="10-17">10-17 Tahun</option>
                    <option value="17-20">17-20 Tahun</option>
                </select>
                @error ('tingkatan')
                        <p class="text-danger" >{{ $message }}</p>
                @enderror
            </div>
        </section>
        <section style="margin-top: 5vh;" class="title" >
            <span style="padding: 1%;" >INFORMASI</span>
            <div class="information-container">
                <input class="info1" id="datepick"  type="date"  placeholder="Tanggal Pertandingan..." name="tanggal_pertandingan" >
                @error ('tanggal_pertandingan')
                        <p class="text-danger" >{{ $message }}</p>
                @enderror
                <input class="info2" type="text" placeholder="Harga Tiket..." name="harga_tiket" >
                @error ('harga_tiket')
                        <p class="text-danger" >{{ $message }}</p>
                @enderror
                <input class="info3" type="text" placeholder="Lama Pertandingan..." name="lama_pertandingan" >
                @error ('lama_pertandingan')
                        <p class="text-danger" >{{ $message }}</p>
                @enderror
                <input class="info3" type="time" placeholder="Waktu Pertandingan..." name="waktu_pertandingan" >
                @error ('waktu_pertandingan')
                        <p class="text-danger" >{{ $message }}</p>
                @enderror
                <input class="info4" type="text" placeholder="Deskripsi Tambahan..." name="deskripsi_tambahan" >
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
    <script src="/js/sparring.js"></script>
</body>
</html>
