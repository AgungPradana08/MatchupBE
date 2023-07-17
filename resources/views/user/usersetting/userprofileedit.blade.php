<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Match UP</title>
    <link rel="stylesheet" href="/css/usersetting.css">
</head>
<body>
    <section class="navbar" >
        <div class="navbar-left">
            <a class="logo" href="/userprofile/home"></a>
            <a class="mabar" href="#" style="color: #FE6B00; " >Profile</a>
        </div>
        <div class="navbar-right">
            <a class="kontak" style="color:red;" href="/logout" >Log Out</a>
        </div>
    </section>

    <form action="/usersparring/store" method="POST" enctype="multipart/form-data" class="content" >
        @csrf
        <div class="image-container">
            <div class="image-box" >
                <img class="img-preview"  alt="">  
                <div class="edit-image">
                    <label for="image">
                    <img class="image-box-1" style="border-radius: 100%" height="35px" src="/css/img/add-image.jpg">
                    </label>
                    <input   style="display: none" type="file" id="image" name="image" onchange="previewImage()">
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
                    <input  name="title" id="TitleInput" type="text" placeholder="Input nama..." >
                </div>
                <div class="input3">
                    <p>Deskrispi</p>
                    <input name="deskripsi" id="DesInput" type="text" placeholder="Input deskripsi pertandingan...">
                </div>
            </div>
        </div>
        <div class="form2">
            <div class="header">
                Sosial Media
                <a id="drop1" onclick="dropdown(1)" ></a>
            </div>
            <div id="wrapper1" class="form2-wrapper">
                <div class="input1">
                    <p>link Instagram</p>
                    <input  name="title" id="TitleInput" type="text" placeholder="Input nama pertandingan..." >
                </div>
                <div class="input1">
                    <p>link facebook</p>
                    <input  name="title" id="TitleInput" type="text" placeholder="Input nama pertandingan..." >
                </div>
                <div class="input1">
                    <p>link whatapps</p>
                    <input  name="title" id="TitleInput" type="text" placeholder="Input nama pertandingan..." >
                </div>
            </div>
            
        </div>
        <div class="form3">
            <div class="header">
                Bio-Data
                <a id="drop2" onclick="dropdown(2)" ></a>
            </div>
            <div id="wrapper2" class="form3-wrapper">
                <div class="input1">
                    <p>Gender</p>
                    <select  id="MinInput" type="text" name="min_member" placeholder="min-member..." >
                        <option value="">Laki-Laki</option>
                        <option value="">Perempuan</option>
                    </select>
                </div>
                <div class="input2">
                    <p>Usia</p>
                    <input  type="number" placeholder="masukkan Usia anda">
                </div>
                <div class="input3">
                    <p>Berat Badan</p>
                    <input type="number" placeholder="masukkan berat badan (Kg)" >
                </div>
                <div class="input4">
                    <p>Tinggi Badan</p>
                    <input type="number" placeholder="masukkan Tinggi Badan (Cm)">
                </div>
            </div>
        </div>
        <div style="display:none;" class="form4">
            <div class="header">
                Informasi
                <a id="drop3" onclick="dropdown(3)" ></a>
            </div>
            <div id="wrapper3" class="form4-wrapper">
                <div class="input1">
                    <p>Tanggal</p>
                    <input  id="datepick" name="tanggal_pertandingan" type="date" placeholder="Input nama pertandingan..." >
                </div>
                <div class="input2">
                    <p>Harga</p>
                    <input name="harga_tiket"  id="HargaInput" type="text" placeholder="Input harga/tim..." >
                </div>
                <div class="input3">
                        <p>Lama Pertandingan</p>
                        <select  id="LamaPertandinganSelect" class="ac-title2" type="text" placeholder="TWO" name="lama_pertandingan" >
                            <option value="30 Menit">30 Menit</option>
                            <option value="60 Menit">60 Menit</option>
                            <option value="90 Menit">90 Menit</option>
                            <option value="120 Menit">120 Menit</option>
                            <option value="120+ Menit">120+ Menit</option>
                        </select>
                </div>
                <div class="input4">
                    <p>Pukul</p>
                    <input  name="waktu_pertandingan" type="time" id="TimeSelect" placeholder="Input pukul pertandingan..." >
                </div>
                <div class="input5">
                    <p>Informasi Tambahan</p>
                    <textarea  class="tambahaninfo" name="deskripsi_tambahan" id="TambahanDeskripsi" type="text" placeholder="Input deskripsi pertandingan..."></textarea>
                </div>
            </div>
        </div>
        <button class="add" type="submit" name="submit" onclick="RemoveSave()" value="save">Ubah</button>
    </form>
    <script src="/js/setting.js"></script>
</body>
</html>
