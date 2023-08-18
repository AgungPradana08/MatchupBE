<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Match UP</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <link rel="stylesheet" href="/css/EditTeam.css">
    <link rel="shortcut icon" type="image/x-icon" href="/css/img/vector.png">

</head>
<body>

    <div class="modal" id="KickPlayer" tabindex="-1">
        <div class="modal-dialog modal-dialog-centered ">
          <div class="modal-content" style="width: 32vw" >
            <div class="modal-header bg-primary-mu">
              <div class="blank logo-sm rounded-circle d-inline-block"></div>
              <h5 class=" modal-title ">
                Keluarkan [Player] Dari Tim <strong>{{$usertim->nama_tim}}</strong>?
              </h5>
              <button type="button" class="btn-close "data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
              <p>Apakah anda yakin ingin Mengeluarkan pengguna ini dari Tim?</p>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
              {{-- <button type="button" class="btn btn-danger">Keluar</button> --}}
              <button type="submit" class="btn btn-danger" style="color: white;" >Hapus</button>
            </div>
          </div>
        </div>
      </div>

    <div class="modal" id="exampleModal" tabindex="-1">
        <div class="modal-dialog modal-dialog-centered ">
          <div class="modal-content" style="width: 32vw" >
            <div class="modal-header bg-primary-mu">
              <div class="blank logo-sm rounded-circle d-inline-block"></div>
              <h5 class=" modal-title ">
                Hapus Tim <strong>{{$usertim->nama_tim}}</strong>?
              </h5>
              <button type="button" class="btn-close "data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
              <p>Apakah anda yakin ingin menghapus Tim ini?</p>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
              {{-- <button type="button" class="btn btn-danger">Keluar</button> --}}
              <form action="/usertim/{{$usertim->id}}" method="post">
                @csrf
                @method('delete')
                <button type="submit" class="btn btn-danger" style="color: white;" >Hapus</button>
              </form>
            </div>
          </div>
        </div>
      </div>

    <div class="navbar">
        <a href="/usertim/home"></a>
        <p class="m-0" >Edit Tim {{$usertim->nama_tim}}</p>
        <a style="visibility: hidden;" ></a>
    </div>

    <form action="/usertim/{{$usertim->id}}" method="POST" enctype="multipart/form-data" class="content" >
        @method('put')
        @csrf
        <div class="image-container">
            <div class="image-box" id="image-box" >
                <img class="img-preview"  src="{{asset('storage/'. $usertim->image)}}" style="object-fit: cover; object-position: center;">  
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
            <div class="input1">
            </div>
            <div id="wrapper0" class="form1-wrapper-mabar">
                <div class="input1">
                    <p class="m-0" >Nama Tim</p>
                    <input oninput="InputChange()" maxlength="30" name="nama_tim" value="{{$usertim->nama_tim}}" id="TitleInput" type="text" placeholder="Input nama tim (maksimal 30)" >
                </div>
                <div class="input2">
                    <p class="m-0" >Olahraga</p>
                    <input oninput="InputChange()" id="OlahragaSelect" name="olahraga" value="{{$usertim->olahraga}}" class="title2" type="text" placeholder="TWO" readonly>
                </div>
                <div class="input3-des">
                    <p class="m-0" >Deskrispi</p>
                    <textarea name="deskripsi" maxlength="255" id="DesInput"  type="text" placeholder="Input deskripsi tim (maksimal 255)" style="resize: none" >{{$usertim->deskripsi}}</textarea>
                </div>
            </div>
        </div>
        
        <div class="form3">
            <div class="header">
                Aksebilitas
            </div>
            <div id="wrapper2" class="form3-wrapper">
                <div class="input2">
                    <p class="m-0" >Max-member</p>
                    <input oninput="InputChange()" id="MaxInput" value="{{$usertim->max_member}}" name="max_member" type="text" placeholder="max-member..." readonly>
                </div>
                <div class="input2">
                    <p class="m-0" >Area Bermain</p>
                    <input oninput="InputChange()" id="MaxInput" value="{{$usertim->area_bermain}}" name="area_bermain" type="text" placeholder="Masukkan kota area bermain..." readonly>
                </div>
                <div class="input4">
                    <p class="m-0" >Tingkatan-umur</p>
                    <select oninput="InputChange()" id="TingkatanInput" class="ac-title2" type="text" placeholder="TWO" name="tingkatan" >
                        <option value="{{$usertim->tingkatan}}" >{{$usertim->tingkatan}}</option>
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
                Member
            </div>
            <div class="wrapper p-3">
                <div class="member-wrapper p-2">
                    <div class="member-box d-flex align-items-center justify-content-between p-1">
                        <div class="div w-75 h-100 d-flex align-items-center" >
                            <img class="member-logo rounded-circle" style="box-shadow: 0px 4px 4px rgba(0, 0, 0, 0.25);" >
                            <span class="ms-2" >
                                <h6 class="fw-bold" >Title</h6>
                                <p class="m-0" >Member</p>
                            </span>
                        </div>
                        <a data-bs-toggle="modal" data-bs-target="#KickPlayer" class="me-3 kick-button" >
                        </a>
                    </div>
                </div>
            </div>
        </div>

        <div class="form4">
            <div class="header">
                Informasi
            </div>
            <div id="wrapper3" class="form4-wrapper">
                <div class="input1">
                    <p class="m-0" >Nomor Telpon</p>
                    <input name="nomor_telepon" onchange="limitPhoneLength(this)" value="{{$usertim->nomor_telepon}}" type="number" placeholder="Input nomor telpon..." >
                </div>
                <div class="input2">
                    <p class="m-0" >Instagram</p>
                    <input name="instagram" value="{{$usertim->instagram}}" type="instagram" placeholder="Input Tag instagram..." >
                </div>
                <div class="input3">
                        <p class="m-0" >whatapps</p>
                    <input name="whatsapp" onchange="limitNumberLength(this)" value="{{$usertim->whatsapp}}" type="whatsapp" placeholder="Masukkan nomor whatapps...">
                </div>
                <div class="input4">
                    <p class="m-0" >Facebook</p>
                    <input name="facebook" value="{{$usertim->facebook}}" type="facebook" placeholder="Input nama Facebook..." >
                </div>
            </div>
        </div>
        <button class="add" type="submit" name="submit" onclick="RemoveSave()" value="save">Edit</button>
    </form>
    <div class="content1">
        <button class="delete d-flex align-items-center justify-content-center"  data-bs-toggle="modal" data-bs-target="#exampleModal" value="Delete">Delete</button>
    </div>
        {{-- <form class="content1" action="/usertim/{{$usertim->id}}" method="POST">
            @csrf
            @method('delete')
            <input class="delete" type="submit" value="Delete">
        </form> --}}
        <div class="white-space">

        </div>
    </form>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js" integrity="sha384-fbbOQedDUMZZ5KreZpsbe1LCZPVmfTnH7ois6mU1QK+m14rQ1l2bGBq41eYeM/fS" crossorigin="anonymous"></script>
    <script src="/js/mapslist.js"></script>
    <script src="/js/tambah.js"></script>
    <script src="/js/tambahtim.js"></script>
</body>
</html>
