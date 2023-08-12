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
                    <img class="img-preview" src="{{asset('storage/'. $userprofile->image)}}" style="object-fit: cover; object-position:center" >  
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
            </div>
            <div id="wrapper0" class="form1-wrapper">
                <div class="input1">
                    <p class="m-0" >Nama</p>
                    <input  name="name"  maxlength="30" value="{{$userprofile->name}}" type="text" placeholder="Input nama..." >
                </div>
                <div class="input3">
                    <p class="m-0" >Username</p>
                    <input name="username" onchange="usernameInput()" onblur="removespace()" id="TitleInput" maxlength="30" value=" {{$userprofile->username}}" type="text" placeholder="Input Username...">
                </div>
                <div class="input4">
                    <p class="m-0" >Deskripsi</p>
                    <textarea name="deskripsi" class="p-2" value="" type="text" maxlength="255" placeholder="Input Deskripsi (maksimal 255)">{{$userprofile->deskripsi}}</textarea>
                </div>
            </div>
        </div>
        <div class="form2">
            <div class="header">
                Sosial Media
            </div>
            <div id="wrapper1" class="form2-wrapper">
                <div class="input1">
                    <p class="m-0" >Akun Instagram (https://www.instagram.com/[username]/)</p>
                    <input name="instagram" value="{{$userprofile->instagram}}"  type="text" placeholder="Input username akun Instagram..." >
                </div>
                <div class="input1">
                    <p class="m-0" >Akun facebook (https://web.facebook.com/[nama/username]) </p>
                    <input  name="facebook" value="{{$userprofile->facebook}}" type="text" placeholder="Input nama akun Facebook..." >
                </div>
                <div class="input1">
                    <p class="m-0" >Akun whatapps (https://wa.me/[nomor pengguna])</p>
                    <input  name="whatsapp" value="{{$userprofile->whatsapp}}" type="number" placeholder="Input nama nomor whatsapp..." >
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
                    <input name="usia" id="ageinput" type="number" value="{{$userprofile->usia}}" placeholder="masukkan Usia anda">
                </div>
                <div class="input3">
                    <p class="m-0" >Berat Badan</p>
                    <input name="berat_badan" id="weightin" type="number" value="{{$userprofile->berat_badan}}" placeholder="masukkan berat badan (Kg)" >
                </div>
                <div class="input4">
                    <p class="m-0" >Tinggi Badan</p>
                    <input name="tinggi_badan" id="heightinput" type="number" value="{{$userprofile->tinggi_badan}}" placeholder="masukkan Tinggi Badan (Cm)">
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
        <button class="add" type="submit" name="submit" onclick="RemoveSave()" value="save">Ubah</button>
    </form>
    <script src="/js/setting.js"></script>
</body>
</html>
