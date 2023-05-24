<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Match UP</title>
    <link rel="stylesheet" href="/css/tambahsparringnew.css">
</head>
<body>

    <div class="navbar">
        <a href="/usersparring/home"></a>
        <p>Tambah sparring</p>
        <a style="visibility: hidden;" ></a>
    </div>

    <form action="/usersparring/store" method="POST" enctype="multipart/form-data" class="content" >
        @csrf
        <div class="image-container">
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
        <div class="form1">
            <div class="header">
                Title
                <a id="drop0" onclick="dropdown(0)" ></a>
            </div>
            <div id="wrapper0" class="form1-wrapper">
                <div class="input1">
                    <p>Nama</p>
                    <input name="title" type="text" placeholder="Input nama pertandingan..." >
                </div>
                <div class="input2">
                    <p>Olahraga</p>
                    <select name="olahraga" class="title2" type="text" placeholder="TWO">
                        <option value="" >Pilih Olahraga...</option>
                        <option value="Sepak Bola">Sepak Bola</option>
                        <option value="Futsal">Futsal</option>
                        <option value="Ping Pong">Ping Pong</option>
                        <option value="Bulutangkis">Bulutangkis</option>
                        <option value="Renang">Renang</option>
                    </select>
                </div>
                <div class="input3">
                    <p>Deskrispi</p>
                    <input name="deskripsi" type="text" placeholder="Input deskripsi pertandingan...">
                </div>
            </div>
        </div>
        <div class="form2">
            <div class="header">
                Lokasi
                <a id="drop1" onclick="dropdown(1)" ></a>
            </div>
            <div id="wrapper1" class="form2-wrapper">
                <div class="input1">
                    <p>Rincian Lokasi</p>
                    <input name="lokasi" type="text" placeholder="masukkan nama lokasi..." >
                </div>
                <div class="input3">
                    <p>Peta</p>
                    <input type="text" placeholder="Input deskripsi pertandingan...">
                </div>
            </div>
        </div>
        <div class="form3">
            <div class="header">
                Aksesibilitas
                <a id="drop2" onclick="dropdown(2)" ></a>
            </div>
            <div id="wrapper2" class="form3-wrapper">
                <div class="input1">
                    <p>Member</p>
                    <input type="text" name="min_member" placeholder="min-member..." >
                </div>
                <div class="input2">
                    <p style="opacity: 0%;" >Peta</p>
                    <input name="max_member" type="text" placeholder="max-member...">
                </div>
                <div class="input3">
                    <p>Akses</p>
                    <select class="ac-title2" type="text" placeholder="TWO" name="aksebilitas" >
                        <option value="">Terbuka/Privat</option>
                        <option value="Terbuka">Terbuka</option>
                        <option value="Private">Private</option>
                    </select>
                </div>
                <div class="input4">
                    <p>Tingkatan-umur</p>
                    <select class="ac-title2" type="text" placeholder="TWO" name="tingkatan" >
                        <option value="">Pilih Tingkatan...</option>
                        <option value="7-10">6-12 Tahun</option>
                        <option value="12-15">12-15 Tahun</option>
                        <option value="15-18">15-18 Tahun</option>
                        <option value="18-21">18-21 Tahun</option>
                        <option value="21+">21+ Tahun</option>
                    </select>
                </div>
            </div>
        </div>
        <div class="form1">
            <div class="header">
                Informasi
                <a id="drop3" onclick="dropdown(3)" ></a>
            </div>
            <div id="wrapper3" class="form4-wrapper">
                <div class="input1">
                    <p>tanggal</p>
                    <input id="datepick" name="tanggal_pertandingan" type="date" placeholder="Input nama pertandingan..." >
                </div>
                <div class="input2">
                    <p>harga</p>
                    <input name="harga_tiket" type="text" placeholder="Input harga/tim..." >
                </div>
                <div class="input3">
                    <p>lama pertandingan</p>
                    <input name="lama_pertandingan" type="number" placeholder="Input jam" >
                </div>
                <div class="input4">
                    <p>Pukul</p>
                    <input name="waktu_pertandingan" type="time" placeholder="Input pukul pertandingan..." >
                </div>
                <div class="input5">
                    <p>Informasi Tambahan</p>
                    <input name="deskripsi_tambahan" type="text" placeholder="Input deskripsi pertandingan...">
                </div>
            </div>
        </div>
        <button class="add" type="submit" name="submit" value="save">TAMBAH</button>
    </form>
    <script src="/js/sparring.js"></script>
</body>
</html>
