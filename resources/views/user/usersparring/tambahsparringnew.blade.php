<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Match UP</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <link rel="stylesheet" href="/css/tambahsparringnew.css">
    <link rel="shortcut icon" type="image/x-icon" href="/css/img/vector.png">

</head>
<body>

    <div class="modal" id="MapsInput" tabindex="-1">
        <div class="modal-dialog modal-dialog-centered">
          <div class="modal-content" >
            <div class="modal-header bg-primary-mu">
              <div class="blank logo-sm rounded-circle d-inline-block"></div>
              <h5 class="ps-2 modal-title ">
                Tambah Peta
              </h5>
              <button type="button" class="btn-close "data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <input class="w-100 ps-3" type="text" id="searchinput" onkeyup="searchLocation()" placeholder="Masukkan Nama Lokasi" style="height: 10%; border: 3px solid #FFA767; border-radius: 8px" type="text">
                {{-- @foreach ($peta as $peta) --}}
                <div id="table_data" class="w-100 maps-wrapper">
                        <button class="maps-box p-3 b-0" data-filter="markas" onclick="mapsList(0)" data-bs-dismiss="modal">
                            <h6 class="fw-bold">markas haram</h6>
                            <p>Detail</p>
                        </button>
                </div>
                {{-- @endforeach --}}
              </div>
              
            <div class="modal-footer">
              <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Batal</button>
            </div>
          </div>
        </div>
      </div>

    <div class="navbar">
        <a href="/usersparring/home"></a>
        <p class="m-0"  class="m-0" >Tambah sparring</p>
        <a style="visibility: hidden;" ></a>
    </div>

    <form action="/usersparring/store" method="POST" enctype="multipart/form-data" class="content" style="padding-bottom: 10vh" >
        @csrf
        <div class="image-container">
            <div class="image-box" id="image-box" >
                <img class="img-preview"  alt="" style="object-fit: cover; object-position: center">  
                <div class="edit-image">
                    <label for="image">
                    <img class="image-box-1" style="border-radius: 100%" height="35px" src="/css/img/add-image.jpg">
                    </label>
                    <input   style="display: none" type="file" id="image" name="image" onchange="previewImage()" required>
                </div>
            </div>
        </div>
        <div class="form1">
            <div class="header">
                Title
            </div>
            <div id="wrapper0" class="form1-wrapper">
                <div class="input0">
                    <p class="m-0" >Nama Tim</p>
                    <input name="nama_tim" value="{{$namatim}}" type="text" maxlength="30" placeholder="Input nama tim (maksimal 30)" readonly >
                </div>
                <div class="input1">
                    <p class="m-0" >Nama Pertandingan</p>
                    <input  name="title" id="TitleInput" maxlength="30" type="text" placeholder="Input nama pertandingan (maksimal 30)" required>
                </div>
                <div class="input2">
                    <p class="m-0" >Olahraga</p>
                    <select  id="OlahragaSelect" name="olahraga" class="title2" type="text" placeholder="TWO" required>
                        <option value="" >Pilih Olahraga...</option>
                        <option value="Sepak Bola">Sepak Bola</option>
                        <option value="Futsal">Futsal</option>
                        <option value="Ping Pong">Ping Pong</option>
                        <option value="Badminton">Badminton</option>
                        <option value="Renang">Renang</option>
                    </select>
                </div>
                <div class="input3">
                    <p class="m-0" >Deskrispi</p>
                    <textarea name="deskripsi" id="DesInput" type="text" maxlength="255" placeholder="Input deskripsi pertandingan (maksimal 255)" required></textarea>
                </div>
            </div>
        </div>
        <div class="form2">
            <div class="header">
                Lokasi

            </div>
            <div id="wrapper1" class="form2-wrapper">
                
                {{-- <div class="input1">
                    <p class="m-0" > </p>
                    <input id="locationtext" name="lokasi" type="search" autocomplete="off" list="location_list" type="text" onchange="locationinput()" >
                    <datalist id="location_list" >
                    </datalist>
                </div> --}}

                <div class="input1" style="grid-area: maps-detail;">
                    <p class="m-0" >Rincian Lokasi</p>
                    <input id="locationtext" name="lokasi" type="search" autocomplete="off" list="location_list" type="text" placeholder="pilih lokasi sparring..." onchange="locationinput()" readonly re>
                </div>
                <div class="d-flex align-items-center justify-content-center" >
                    <a data-bs-toggle="modal" data-bs-target="#MapsInput" class="w-100 mt-2  align-items-center justify-content-center add-maps d-none d-md-flex " style="grid-area: map-button; height: 60%" >Masukkan Lokasi</a>
                    <a data-bs-toggle="modal" data-bs-target="#MapsInput" class="w-100 h-50 d-flex align-items-center justify-content-center add-logo  d-flex d-md-none" style="grid-area: map-button;" >Logo</a>

                </div>
                <div style="grid-area: maps;" class="input3">
                    <p class="m-0" >Peta</p>
                    {{-- @foreach ($usersparring as $usersparring) --}}
                    <iframe id="frame-location" src=""></iframe>
                    {{-- @endforeach --}}
                </div>
            </div>
        </div>
        <div class="form3">
            <div class="header">
                Tingkatan

            </div>
            <div id="wrapper2" class="form3-wrapper">

                <div class="input4">
                    <p class="m-0" >Tingkatan-umur</p>
                    <select  id="TingkatanInput" class="ac-title2" type="text" placeholder="TWO" name="tingkatan" required >
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
        <div class="input1 d-none">
            <p class="m-0 " >Member</p>
            <input  id="MinInput" type="text" name="min_member" placeholder="min-member..." value="1" >
        </div>
        <div class="input2 d-none">
            <p class="m-0"  style="opacity: 0%;" >Peta</p>
            <input  id="MaxInput" name="max_member" type="text" placeholder="max-member..." value="2">
        </div>
        <div class="form4">
            <div class="header">
                Informasi

            </div>
            <div id="wrapper3" class="form4-wrapper">
                <div class="input1">
                    <p class="m-0" >Tanggal</p>
                    <input   name="tanggal_pertandingan" type="date" placeholder="Input nama pertandingan..." required >
                </div>
                <div class="input2">
                    <p class="m-0" >Harga</p>
                    <input name="harga_tiket"  id="HargaInput" type="text" placeholder="Input harga/tim..." readonly >
                </div>
                <div class="input3">
                        <p class="m-0" >Lama Pertandingan</p>
                        <select  id="LamaPertandinganSelect" class="ac-title2" type="text" placeholder="TWO" name="lama_pertandingan" onchange="Price()" required >
                            <option value="1">30 Menit</option>
                            <option value="1">60 Menit</option>
                            <option value="2">90 Menit</option>
                            <option value="2">120 Menit</option>
                            <option value="3">120+ Menit</option>
                        </select>
                </div>
                <div class="input4">
                    <p class="m-0" >Pukul</p>
                    <input  name="waktu_pertandingan" type="time" id="TimeSelect" placeholder="Input pukul pertandingan..." required >
                </div>
                <div class="input5">
                    <p class="m-0" >Informasi Tambahan</p>
                    <textarea maxlength="255"  class="tambahaninfo" name="deskripsi_tambahan" id="TambahanDeskripsi" type="text" placeholder="Input deskripsi pertandingan (maksimal 255)"></textarea>
                </div>
            </div>
        </div>
        <button class="add" type="submit" name="submit" value="save">TAMBAH</button>
        
    </form>
    <script src="/js/mapslist.js"></script>
    <script src="/js/tambah.js"></script>
    <script src="/js/sparring.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
</body>
</html>
