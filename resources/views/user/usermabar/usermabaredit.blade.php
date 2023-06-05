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
        <a href="/usermabar/home"></a>
        <p>Ubah sparring</p>
        <a style="visibility: hidden;" ></a>
    </div>

    <form action="/usermabar/{{$usermabar->id}}" method="POST" enctype="multipart/form-data" class="content" >
        @method ('put')
        @csrf
        <div class="image-container">
            <div class="image-box" >
                <img class="img-preview"  src="{{asset('storage/'. $usermabar->image)}}">  
                <div class="edit-image">
                    <label for="image">
                    <img class="image-box-1" style="border-radius: 100%" height="35px" src="/css/img/add-image.jpg">
                    </label>
                    <input oninput="InputChange()"  style="display: none" type="file" id="image" name="image" onchange="previewImage()">
                </div>
            </div>
        </div>
        <div class="form1">
            <div class="header">
                Title
                <a id="drop0" onclick="dropdown(0)" ></a>
            </div>
            {{-- <div class="input1">
                <p>Nama Tim</p>
                <input name="nama_tim" value="{{$usermabar->nama_tim}}" type="text" placeholder="Input nama tim..." >
            </div> --}}
            <div id="wrapper0" class="form1-wrapper">
                <div class="input1">
                    <p>Nama Pertandingan</p>
                    <input oninput="InputChange()" name="title" id="TitleInput" type="text" value="{{$usermabar->title}}" placeholder="Input nama pertandingan..." >
                </div>
                <div class="input2">
                    <p>Olahraga</p>
                    <select oninput="InputChange()" id="OlahragaSelect" name="olahraga" class="title2" type="text" placeholder="TWO">
                        <option value="{{$usermabar->olahraga}}" >{{$usermabar->olahraga}}</option>
                        <option value="Sepak Bola">Sepak Bola</option>
                        <option value="Futsal">Futsal</option>
                        <option value="Ping Pong">Ping Pong</option>
                        <option value="Badminton">Badminton</option>
                        <option value="Renang">Renang</option>
                    </select>
                </div>
                <div class="input3">
                    <p>Deskrispi</p>
                    <input name="deskripsi" id="DesInput" type="text" value="{{$usermabar->deskripsi}}" placeholder="Input deskripsi pertandingan...">
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
                    <input id="locationtext" name="lokasi" value="{{$usermabar->lokasi}}" type="search" autocomplete="off" list="location_list" type="text" onchange="mapsviews()" >
                    <datalist id="location_list" >
                        {{-- <option value="Markas">Markas Sport Center, Jalan Jendral Sudirman, Rendeng, Kudus Regency, Central Java</option>
                        <option value="Berlian">Berlian Sport Centre, Jalan Lingkar Utara Kudus, Ledok, Karangmalang, Kabupaten Kudus, Jawa Tengah</option> --}}
                    </datalist>
                </div>
                <div class="input3">
                    <p>Peta</p>
                    {{-- @foreach ($usersparring as $usersparring) --}}
                    <iframe id="frame-location" src=""></iframe>
                    {{-- @endforeach --}}
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
                    <input oninput="InputChange()" id="MinInput" type="text" name="min_member" placeholder="min-member..." value="{{$usermabar->min_member}}" >
                </div>
                <div class="input2">
                    <p style="opacity: 0%;" >Peta</p>
                    <input oninput="InputChange()" id="MaxInput" name="max_member" type="text" placeholder="max-member..."  value="{{$usermabar->max_member}}" >
                </div>
                <div class="input3">
                    <p>Aksesibilitas</p>
                    <select oninput="InputChange()" id="AksesInput" class="ac-title2" type="text" placeholder="TWO" name="aksebilitas" >
                        <option value="{{$usermabar->aksebilitas}}">{{$usermabar->aksebilitas}}</option>
                        <option value="Terbuka">Public</option>
                        <option value="Private">Private</option>
                    </select>
                </div>
                <div class="input4">
                    <p>Tingkatan-umur</p>
                    <select oninput="InputChange()" id="TingkatanInput" class="ac-title2" type="text" placeholder="TWO" name="tingkatan" >
                        <option value="{{$usermabar->tingkatan}}">{{$usermabar->tingkatan}}</option>
                        <option value="7-10">6-12 Tahun</option>
                        <option value="12-15">12-15 Tahun</option>
                        <option value="15-18">15-18 Tahun</option>
                        <option value="18-21">18-21 Tahun</option>
                        <option value="21+">21+ Tahun</option>
                    </select>
                </div>
            </div>
        </div>
        <div class="form4">
            <div class="header">
                Informasi
                <a id="drop3" onclick="dropdown(3)" ></a>
            </div>
            <div id="wrapper3" class="form4-wrapper">
                <div class="input1">
                    <p>Tanggal</p>
                    <input oninput="InputChange()" id="datepick" name="tanggal_pertandingan" type="date" placeholder="Input tanggal pertandingan..." value="{{$usermabar->tanggal_pertandingan}}" >
                </div>
                <div class="input2">
                    <p>Harga</p>
                    <input name="harga_tiket" oninput="InputChange()" id="HargaInput" type="text" placeholder="Input harga/tim..." value="{{$usermabar->harga_tiket}}" >
                </div>
                <div class="input3">
                        <p>Lama Pertandingan</p>
                        <select oninput="InputChange()" id="LamaPertandinganSelect" class="ac-title2" type="text" placeholder="TWO" name="lama_pertandingan" value="{{$usermabar->lama_pertandingan}}" >
                            <option value="30 Menit">30 Menit</option>
                            <option value="60 Menit">60 Menit</option>
                            <option value="90 Menit">90 Menit</option>
                            <option value="120 Menit">120 Menit</option>
                            <option value="120+ Menit">120+ Menit</option>
                        </select>
                </div>
                <div class="input4">
                    <p>Pukul</p>
                    <input oninput="InputChange()" name="waktu_pertandingan" type="time" id="TimeSelect" placeholder="Input pukul pertandingan..." value="{{$usermabar->waktu_pertandingan}}" >
                </div>
                <div class="input5">
                    <p>Informasi Tambahan</p>
                    <textarea oninput="InputChange()" class="tambahaninfo" name="deskripsi_tambahan" id="TambahanDeskripsi" type="text" placeholder="Input deskripsi pertandingan..." value="{{$usermabar->deskripsi_tambahan}}" ></textarea>
                </div>
            </div>
        </div>
        <button class="add" type="submit" name="submit" value="save">Edit</button>
    </form>
        <form action="/usermabar/{{$usermabar->id}}" method="POST">
            @csrf
            @method('delete')
            <input class="add" type="submit" value="Delete">
        </form>
    
    <script src="/js/mapslist.js"></script>
    <script src="/js/sparring.js"></script>
</body>
</html>
