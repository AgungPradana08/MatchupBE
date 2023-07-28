<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Match UP</title>
    <link rel="stylesheet" href="/css/usersetting.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <link rel="shortcut icon" type="image/x-icon" href="/css/img/vector.png">

</head>
<body>
    <section class="navbar position-fixed" >
        <div class="navbar-left">
            <a class="logo" href="/userprofile/home"></a>
            <a class="mabar" href="#" style="color: #FE6B00; " >Profile</a>
        </div>
        <div class="navbar-right">
            <a class="kontak" style="color:red;" href="/logout" >Log Out</a>
        </div>
    </section>

    <form action="/userprofile/{id}/settings" method="POST" enctype="multipart/form-data" class="content" >
        @method('put')
        @csrf
        <div class="image-container">
            <div class="image-box" >
                    <img class="img-preview" src="{{asset('storage/'. $userprofile->image)}}">  
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
                    <p class="m-0" >Nama</p>
                    <input  name="name" id="TitleInput" value="{{$userprofile->name}}" type="text" placeholder="Input nama..." >
                </div>
                <div class="input3">
                    <p class="m-0" >Username</p>
                    <input name="username" id="DesInput" value="{{$userprofile->username}}" type="text" placeholder="Input Username...">
                </div>
            </div>
        </div>
        <div class="form2">
            <div class="header">
                Sosial Media
            </div>
            <div id="wrapper1" class="form2-wrapper">
                <div class="input1">
                    <p class="m-0" >link Instagram</p>
                    <input  name="title" id="TitleInput" type="text" placeholder="Input nama pertandingan..." >
                </div>
                <div class="input1">
                    <p class="m-0" >link facebook</p>
                    <input  name="title" id="TitleInput" type="text" placeholder="Input nama pertandingan..." >
                </div>
                <div class="input1">
                    <p class="m-0" >link whatapps</p>
                    <input  name="title" id="TitleInput" type="text" placeholder="Input nama pertandingan..." >
                </div>
            </div>
            
        </div>
        <div class="form3">
            <div class="header">
                Bio-Data
            </div>
            <div id="wrapper2" class="form3-wrapper">
                <div class="input1">
                    <p class="m-0" >Gender</p>
                    <select  id="MinInput" type="text" name="gender" placeholder="min-member..." >
                        <option value="Laki-Laki">Laki-Laki</option>
                        <option value="Perempuan">Perempuan</option>
                    </select>
                </div>
                <div class="input2">
                    <p class="m-0" >Usia</p>
                    <input name="usia" type="number" value="{{$userprofile->usia}}" placeholder="masukkan Usia anda">
                </div>
                <div class="input3">
                    <p class="m-0" >Berat Badan</p>
                    <input name="berat_badan" type="number" value="{{$userprofile->berat_badan}}" placeholder="masukkan berat badan (Kg)" >
                </div>
                <div class="input4">
                    <p class="m-0" >Tinggi Badan</p>
                    <input name="tinggi_badan" type="number" value="{{$userprofile->tinggi_badan}}" placeholder="masukkan Tinggi Badan (Cm)">
                </div>
            </div>
        </div>
        <div style="display:none;" class="form4">
            <div class="header">
                Informasi
            </div>
            <div id="wrapper3" class="form4-wrapper">
                <div class="input1">
                    <p class="m-0" >Tanggal</p>
                    <input  id="datepick" name="tanggal_pertandingan" type="date" placeholder="Input nama pertandingan..." >
                </div>
                <div class="input2">
                    <p class="m-0" >Harga</p>
                    <input name="harga_tiket"  id="HargaInput" type="text" placeholder="Input harga/tim..." >
                </div>
                <div class="input3">
                        <p class="m-0" >Lama Pertandingan</p>
                        <select  id="LamaPertandinganSelect" class="ac-title2" type="text" placeholder="TWO" name="lama_pertandingan" >
                            <option value="30 Menit">30 Menit</option>
                            <option value="60 Menit">60 Menit</option>
                            <option value="90 Menit">90 Menit</option>
                            <option value="120 Menit">120 Menit</option>
                            <option value="120+ Menit">120+ Menit</option>
                        </select>
                </div>
                <div class="input4">
                    <p class="m-0" >Pukul</p>
                    <input  name="waktu_pertandingan" type="time" id="TimeSelect" placeholder="Input pukul pertandingan..." >
                </div>
                <div class="input5">
                    <p class="m-0" >Informasi Tambahan</p>
                    <textarea  class="tambahaninfo" name="deskripsi_tambahan" id="TambahanDeskripsi" type="text" placeholder="Input deskripsi pertandingan..."></textarea>
                </div>
            </div>
        </div>
        <div class="form4">
            <div class="header">
                Tentang Saya
            </div>
            <div class="form4-wrapper">
                <div>
                    <p class="m-0" >Olahraga</p>
                    <select class="olahraga w-100 h-75 p-2" name="olahraga" style="font-size: 13px" id="sparringsport" onchange="InputChange()" >
                        <option value="">Pilih Cabang Olahraga...</option>
                        <option value="Futsal">Futsal</option>
                        <option value="Sepak Bola">Sepak Bola</option>
                        <option value="Badminton">Badminton</option>
                        <option value="Ping Pong">Ping Pong</option>
                        <option value="Renang">Renang</option>
                    </select>
                </div>
                <textarea name="usia" class="p-2" style="resize: none" type="number" value="{{$userprofile->usia}}" placeholder="Deskripsi"></textarea>
                <div>
                    <p class="m-0" >Tim Favorit</p>
                    <select class="tim w-100 h-75 p-2" name="olahraga" style="font-size: 13px" id="sparringsport" onchange="InputChange()" >
                        <option value="">Pilih Tim Favorit...</option>
                        <option value="Futsal">Futsal</option>
                        <option value="Sepak Bola">Sepak Bola</option>
                        <option value="Badminton">Badminton</option>
                        <option value="Ping Pong">Ping Pong</option>
                        <option value="Renang">Renang</option>
                    </select>
                </div>
                <textarea name="usia" class="p-2" type="number" style="resize: none" value="{{$userprofile->usia}}" placeholder="Deskripsi"></textarea>
                <div>
                    <p class="m-0" >Status</p>
                    <select class="status w-100 h-75 p-2" name="olahraga" style="font-size: 13px" id="sparringsport" onchange="InputChange()" >
                        <option value="">Pilih Cabang Olahraga...</option>
                        <option value="Aktif">Aktif</option>
                        <option value="Tidak Aktif">Tidak Aktif</option>
                    </select>
                </div>
                <textarea name="usia" class="p-2" type="number" style="resize: none" value="{{$userprofile->usia}}" placeholder="Deskripsi"></textarea>

            </div>
        </div>
        <button class="add" type="submit" name="submit" onclick="RemoveSave()" value="save">Ubah</button>
    </form>
    <script src="/js/setting.js"></script>
</body>
</html>
