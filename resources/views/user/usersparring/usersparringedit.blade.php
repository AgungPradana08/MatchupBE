<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Match UP</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <link rel="stylesheet" href="/css/editpage.css">
    <link rel="shortcut icon" type="image/x-icon" href="/css/img/vector.png">

</head>
<body>
    <div class="modal" id="exampleModal" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered ">
      <div class="modal-content" style="width: 32vw" >
        <div class="modal-header bg-primary-mu">
          <div class="blank logo-sm rounded-circle d-inline-block"></div>
          <h5 class=" modal-title ">
            Hapus Sparring <strong>{{$usersparring->nama_tim}}</strong>?
          </h5>
          <button type="button" class="btn-close "data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <p>Apakah anda yakin ingin menghapus sparring</p>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
          {{-- <button type="button" class="btn btn-danger">Keluar</button> --}}
            <form action="/usersparring/{{$usersparring->id}}" method="post">
                @csrf
                @method('delete')
                <button type="submit" class="btn btn-danger" style="color: white;" >Hapus</button>
            </form>
        </div>
      </div>
    </div>
  </div>

    <div class="navbar">
        <a href="/usersparring/home"></a>
        <p>Ubah sparring {{$usersparring->nama_tim}}</p>
        <a style="visibility: hidden;" ></a>
    </div>

    <form action="/usersparring/{{$usersparring->id}}" method="POST" enctype="multipart/form-data" class="content" >
        @method ('put')
        @csrf
        <div class="image-container">
            <div class="image-box" id="image-box" >
                <img class="img-preview"  src="{{asset('storage/'. $usersparring->image)}}" style="object-fit: cover; object-position: center;">  
                <div class="edit-image">
                    <label for="image">
                      <img class="image-box-1" style="border-radius: 100%" height="35px" src="/css/img/add-image.jpg">
                    </label>
                  
                    <input  style="display: none" type="file" id="image" name="image" onchange="previewImage()">
                  </div>
            </div>
        </div>
        <div class="form1">
            <div class="header">
                Title
            </div>
            <div id="wrapper0" class="form1-wrapper">
                <div class="input0">
                    <p class="m-0 p-0">Nama Tim</p>
                    <input name="nama_tim" maxlength="30" value="{{$usersparring->nama_tim}}" type="text" placeholder="Input nama Sparring (maksimal 30)" >
                </div>
                <div class="input1">
                    <p class="m-0 p-0">Nama Pertandingan</p>
                    <input oninput="InputChange()" maxlength="30" name="title" id="TitleInput" type="text" value="{{$usersparring->title}}" placeholder="Input nama pertandingan (maksimal 30)"  >
                </div>
                <div class="input2">
                    <p class="m-0 p-0">Olahraga</p>
                    <input  oninput="InputChange()" id="OlahragaSelect" name="olahraga" value="{{$usersparring->olahraga}}" class="title2" type="text" placeholder="TWO"  >
                </div>
                <div class="input3">
                    <p class="m-0 p-0">Deskrispi</p>
                    <textarea name="deskripsi" class="p-2" id="DesInput" maxlength="255" type="text" placeholder="Input deskripsi pertandingan (maksimal 255)">{{$usersparring->deskripsi}}</textarea>
                </div>
            </div>
        </div>
        <div class="form2">
            <div class="header">
                Lokasi
            </div>
            <div id="wrapper1" class="form2-wrapper-e">
                
                <div class="input1">
                    <p class="m-0 p-0">Rincian Lokasi</p>
                    <input id="locationtext" name="lokasi" value="{{$usersparring->lokasi}}" type="search" autocomplete="off" list="location_list" type="text" onchange="mapsviews()" readonly  >
                    <datalist id="location_list" >
                        {{-- <option value="Markas">Markas Sport Center, Jalan Jendral Sudirman, Rendeng, Kudus Regency, Central Java</option>
                        <option value="Berlian">Berlian Sport Centre, Jalan Lingkar Utara Kudus, Ledok, Karangmalang, Kabupaten Kudus, Jawa Tengah</option> --}}
                    </datalist>
                </div>
                <div class="input3">
                    <p class="m-0 p-0">Peta</p>
                    {{-- @foreach ($usersparring as $usersparring) --}}
                    <iframe id="frame-location" src="{{ $usersparring->embed_lokasi }}"></iframe>
                    <input type="text" class="d-none" name="detail_lokasi" value="{{ $usersparring->detail_lokasi }}" >
                    <input type="text" class="d-none" name="embed_lokasi" value="{{ $usersparring->embed_lokasi }}" >

                    {{-- @endforeach --}}
                </div>
                
            </div>
            
        </div>
        <div class="form3">
            <div class="header">
                Aksesibilitas
            </div>
            <div id="wrapper2" class="form3-wrapper">
                <div class="input4">
                    <p class="m-0 p-0">Tingkatan-umur</p>
                    <select oninput="InputChange()" id="TingkatanInput" class="ac-title2" type="text" placeholder="TWO" name="tingkatan" >
                        <option value="{{$usersparring->tingkatan}}">{{$usersparring->tingkatan}}</option>
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
                    <p class="m-0 p-0">Tanggal</p>
                    <input oninput="InputChange()" id="datepick" name="tanggal_pertandingan" type="date" placeholder="Input tanggal pertandingan..." value="{{$usersparring->tanggal_pertandingan}}"  >
                </div>
                <div class="input2">
                    <p class="m-0 p-0">Harga</p>
                    <input name="harga_tiket" oninput="InputChange()" id="HargaInput" type="text" placeholder="Input harga/tim..." value="{{$usersparring->harga_tiket}}"  >
                    <input name="min_member" class="d-none" type="text" value="{{$usersparring->min_member}}" readonly >
                    <input name="max_member"  class="d-none" type="text" value="{{$usersparring->max_member}}" readonly >

                </div>
                <div class="input3">
                        <p class="m-0 p-0">Lama Pertandingan</p>
                        <select oninput="InputChange()" id="LamaPertandinganSelect" class="ac-title2" type="text" placeholder="TWO" name="lama_pertandingan" value="{{$usersparring->lama_pertandingan}}"  >
                            <option value="30 Menit">30 Menit</option>
                            <option value="60 Menit">60 Menit</option>
                            <option value="90 Menit">90 Menit</option>
                            <option value="120 Menit">120 Menit</option>
                            <option value="120+ Menit">120+ Menit</option>
                        </select>
                </div>
                <div class="input4">
                    <p class="m-0 p-0">Pukul</p>
                    <input oninput="InputChange()" name="waktu_pertandingan" type="time" id="TimeSelect" placeholder="Input pukul pertandingan..." value="{{$usersparring->waktu_pertandingan}}"  >
                </div>
                <div class="input5">
                    <p class="m-0 p-0">Informasi Tambahan</p>
                    <textarea oninput="InputChange()" class="tambahaninfo" name="deskripsi_tambahan" id="TambahanDeskripsi" type="text" maxlength="255" placeholder="Input deskripsi pertandingan (maksimal 255)">{{$usersparring->deskripsi_tambahan}}</textarea>
                </div>
            </div>
        </div>
        <button class="add" type="submit" name="submit" value="save">Edit</button>
    </form>
        <div class="content1">
            <button class="delete d-flex align-items-center justify-content-center"  data-bs-toggle="modal" data-bs-target="#exampleModal" value="Delete">Delete</button>
        </div>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js" integrity="sha384-fbbOQedDUMZZ5KreZpsbe1LCZPVmfTnH7ois6mU1QK+m14rQ1l2bGBq41eYeM/fS" crossorigin="anonymous"></script>
    <script src="/js/mapslist.js"></script>
    <script src="/js/sparring.js"></script>
</body>
</html>
