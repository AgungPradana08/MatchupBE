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
                          {{-- <button class="maps-box p-3 b-0" data-filter="markas" onclick="mapsList(0)" data-bs-dismiss="modal">
                              <h6 class="fw-bold">Markas Sport Center</h6>
                              <p>Detail</p>
                          </button> --}}
                          {{-- <button class="maps-box p-3 b-0" data-filter="berlian" onclick="mapsList(1)" data-bs-dismiss="modal">
                              <h6 class="fw-bold">Berlian Sport Center</h6>
                              <p>Detail</p>
                          </button>
                          <button class="maps-box p-3 b-0" data-filter="lapangan_besito" onclick="mapsList(2)" data-bs-dismiss="modal">
                              <h6 class="fw-bold">Lapangan Besito</h6>
                              <p>Detail</p>
                          </button> --}}
                  </div>
                  {{-- @endforeach --}}
                </div>
                
              <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Batal</button>
              </div>
            </div>
          </div>
        </div>
    </div>

    <div class="navbar">
        <a  href="/usermabar/home"></a>
        <p class="m-0" >Tambah Mabar</p>
        <a style="visibility: hidden;" ></a>
    </div>

    <form action="/usermabar/store" method="POST" enctype="multipart/form-data" class="content" >
        @csrf
        <div class="image-container">
            <div class="image-box" id="image-box" >
                <img class="img-preview"  alt="" style="object-fit: cover; object-position: center;">  
                <div class="edit-image">
                    <label for="image">
                    <img class="image-box-1" style="border-radius: 100%" height="35px" src="/css/img/add-image.jpg" style="object-fit: cover; object-position: center">
                    </label>
                    <input oninput="InputChange()"  style="display: none" type="file" id="image" name="image" onchange="previewImage()" required>
                </div>
            </div>
        </div>
        <div class="form1">
            <div class="header">
                Title
            </div>
            <div class="input1">
            </div>
            <div id="wrapper0" class="form1-wrapper-mabar">
                <div class="input1">
                    <p class="m-0" >Nama Mabar</p>
                    <input oninput="InputChange()" maxlength="30" name="title" id="TitleInput" type="text" placeholder="Input nama pertandingan (maksimal 30)" required>
                </div>
                <div class="input2">
                    <p class="m-0" >Olahraga</p>
                    <select oninput="InputChange()" id="OlahragaSelect" name="olahraga" class="title2" type="text" placeholder="TWO" required>
                        <option value="" >Pilih Olahraga...</option>
                        <option value="Sepak Bola">Sepak Bola</option>
                        <option value="Futsal">Futsal</option>
                        <option value="Mini Soccer">Mini Soccer</option>
                        <option value="Ping Pong">Ping Pong</option>
                        <option value="Badminton">Badminton</option>
                    </select>
                </div>
                <div class="input3-des">
                    <p class="m-0" >Deskrispi</p>
                    <textarea class="p-2" name="deskripsi" id="DesInput" type="text" maxlength="255" placeholder="Input deskripsi pertandingan (maksimal 255)" required></textarea>
                </div>
            </div>
        </div>
        <div class="form2">
            <div class="header">
                Lokasi

            </div>
            <div id="wrapper1" class="form2-wrapper">
                
                {{-- <div class="input1">
                    <p class="m-0" >Rincian Lokasi</p>
                    <input id="locationtext" name="lokasi" type="search" autocomplete="off" list="location_list" type="text" onchange="locationinput()" >
                    <datalist id="location_list" >
                    </datalist>
                </div> --}}

                <div class="input1" style="grid-area: maps-detail;">
                    <p class="m-0" >Rincian Lokasi</p>
                    <input id="locationtext" name="lokasi" type="search" autocomplete="off" list="location_list" type="text" placeholder="pilih lokasi sparring..." onchange="locationinput()" readonly required>
                    <input id="locationtext_detail" class="d-none" name="detail_lokasi" type="text">
                </div>
                <div class="d-flex align-items-center justify-content-center" >
                    <a data-bs-toggle="modal" data-bs-target="#MapsInput" class="w-100 mt-2  align-items-center justify-content-center add-maps d-none d-md-flex " style="grid-area: map-button; height: 55%" >Masukkan Lokasi</a>
                    <a data-bs-toggle="modal" data-bs-target="#MapsInput" class="w-100 h-50 d-flex align-items-center justify-content-center add-logo  d-flex d-md-none" style="grid-area: map-button;" >Logo</a>

                </div>
                <div style="grid-area: maps;" class="input3">
                    <p class="m-0" >Peta</p>
                    {{-- @foreach ($usersparring as $usersparring) --}}
                    <iframe id="frame-location" src=""></iframe>
                    <input class="d-none" name="embed_lokasi" id="frame_url"  type="text">
                    {{-- @endforeach --}}
                </div>
            </div>
        </div>
        <div class="form3">
            <div class="header">
                Aksesibilitas
            </div>
            <div id="wrapper2" class="form3-wrappermabars">
                <div class="input1 d-none">
                    <p class="m-0" >Min Member</p>
                    <input oninput="InputChange()" id="MinInput" type="text" name="min_member" value="1" placeholder="min-member..." readonly required>
                </div>
                <div class="input1">
                    <p class="m-0" >Max Member</p>
                    <input oninput="InputChange()" id="MaxInput" name="max_member" type="number" placeholder="max-member (12)" required>
                </div>
                <div class="input2">
                    <p class="m-0" >Tingkatan-umur</p>
                    <select oninput="InputChange()" id="TingkatanInput" class="ac-title2 h-75" type="text" placeholder="TWO" name="tingkatan" required>
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
        <div class="form4">
            <div class="header">
                Informasi
            </div>
            <div id="wrapper3" class="form4-wrapper">
                <div class="input1">
                    <p class="m-0" >Tanggal</p>
                    <input oninput="InputChange()" id="datepick" name="tanggal_pertandingan" type="date" placeholder="Input nama pertandingan..." required>
                </div>
                <div class="input2">
                    <p class="m-0" >Harga</p>
                    <input name="harga_tiket" oninput="InputChange()" id="harga_input" type="text" placeholder="Input harga/tim..."  required>
                </div>
                <div class="input3">
                        <p class="m-0" >Lama Pertandingan</p>
                        <select oninput="InputChange()" id="LamaPertandinganSelect" class="ac-title2 " type="text" placeholder="TWO" name="lama_pertandingan" onchange="Price()" required>
                            <option value="1">60 Menit</option>
                            <option value="2">120 Menit</option>
                            <option value="3">120+ Menit</option>
                        </select>
                </div>
                <div class="input4">
                    <p class="m-0" >Pukul</p>
                    <input oninput="InputChange()" name="waktu_pertandingan" type="time" id="TimeSelect" placeholder="Input pukul pertandingan..." required >
                </div>
                <div class="input5">
                    <p class="m-0" >Informasi Tambahan</p>
                    <textarea oninput="InputChange()" class="tambahaninfo" maxlength="255" name="deskripsi_tambahan" id="TambahanDeskripsi" type="text" placeholder="Input deskripsi pertandingan (maksimal 255)" ></textarea>
                </div>
            </div>
        </div>
        <button class="add" type="submit" name="submit" onclick="RemoveSave()" value="save">TAMBAH</button>
        <div class="white-space">

        </div>
    </form>
    <script src="/js/mapslist.js"></script>
    <script src="/js/tambah.js"></script>
    <script src="/js/sparring.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
</body>
</html>
