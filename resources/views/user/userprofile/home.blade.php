<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Match up</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <link rel="stylesheet" href="/css/notification.css">
    <link rel="stylesheet" href="/css/userdetailnew.css">
    <link rel="shortcut icon" type="image/x-icon" href="/css/img/vector.png">

</head>
<body>
    <div class="modal" id="Olahraga" tabindex="-1">
        <div class="modal-dialog modal-dialog-centered ">
          <div class="modal-content" style="width: 32vw" >
            <div class="modal-header bg-primary-mu">
              <div class="blank logo-sm rounded-circle d-inline-block"></div>
              <h6 class=" modal-title ">
                Olahraga Favorit Saya: <strong>Futsal</strong> </strong>
              </h5>
              <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                    <textarea class="w-100" style="resize: none" name="" id="" cols="30" rows="10" readonly> </textarea>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
              {{-- <button type="button" class="btn btn-danger">Keluar</button> --}}
            </div>
          </div>
        </div>
      </div>
    <div id="notification" class="alert position-absolute notification justify-content-between mt-sm-4 mt-2 {{ session('notification') === 'Akun berhasil di update' ? 'appear' : 'd-none' }}"  role="alert">
        <p class="d-inline-block p-0 m-0 " >{{ session('notification') }}</p>
        <button type="button" class="btn-close btn-close-white" onclick="closenotification()" aria-label="Close"></button>
    </div>
    <nav class="navbar navbar-expand-sm p-0 position-fixed  " style="width: 100vw; z-index: 100;">
        <div class="container  ">
          <a class="navbar-brand" href="/sparring/home"><img src="/css/img/gobackwhite.png" style="height: 5vh;" alt=""></a>
          <div class="collapse navbar-collapse"  id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
              <li class="nav-item mx-0 mx-lg-2">
                <a class="nav-link text-start text-lg-center active" aria-current="page" href="/userprofile/home"><span>Profil</span></a>
              </li>
              <li class="nav-item mx-0 mx-lg-2">
                <a class="nav-link text-start text-lg-center" aria-current="page" href="/usersparring/home"><span>Sparring</span></a>
              </li>
              <li class="nav-item mx-0 mx-lg-2">
                <a class="nav-link text-start text-lg-center" aria-current="page"href="/usermabar/home"><span>Mabar</span></a>
              </li>
              <li class="nav-item mx-0 mx-lg-2">
                <a class="nav-link text-start text-lg-center" aria-current="page" href="/usertim/home"><span>Tim</span></a>
              </li>
            </ul>
          </div>
        </div>
    </nav>
    <div class="background"></div>
    <div class="content container">
        <div class="profile">
            <div class="image-box" >
                <img class="img-preview" src="{{asset('storage/'. $pengguna->image)}}" alt="" style="object-fit: cover; object-position: center;">  
                <div class="edit-image">
                    <label for="image">
                      <a href="/userprofile/setting">
                        <img class="image-box-1 rounded-circle" src="/css/img/setting.jpg">
                      </a>
                    </label>
                </div>
            </div>
            <span class="username" >{{$pengguna->username}}</span>
            <span class="name" >{{$pengguna->name}}</span>
            <hr>
            <span class="deskripsi" >Deskripsi</span>
            <div class="social">
                
                {{-- WOI INI SOCIALNYA GA BISA DIPENCET --}}
                <a class="instagram">

                </a>
                <a class="facebook">

                </a>
                <a class="whatapps">

                </a>
            </div>
            <hr>
            <div class="bio">
                <div class="opening">
                    Bio Data
                </div>
                <div id="biocontent"  style="padding: 2%" >
                    <table >
                        <tr>
                            <td class="bio1" >  
                                    <div class="icon" style="background: url(/css/img/gender.png); background-size:contain;"></div>
                            </td>
                            <td>
                                Gender
                            </td>
                            <td>
                                {{$pengguna->gender}}
                            </td>
                        </tr>
                        <tr>
                            <td class="bio1">
                                    <div class="icon" style="background: url(/css/img/age.png); background-size:contain;"></div>
                            </td>
                            <td>
                                Usia
                            </td>
                            <td>
                                {{$pengguna->usia}} Tahun
                            </td>
                        </tr>
                        <tr>
                            <td class="bio1">
                                    <div class="icon" style="background: url(/css/img/weight.png); background-size:contain;" ></div>
                            </td>
                            <td>
                                Berat Badan
                            </td>
                            <td>
                                {{$pengguna->berat_badan}} Kg
                            </td>
                        </tr>
                        <tr>
                            <td class="bio1">
                                    <div class="icon" style="background: url(/css/img/height.png); background-size:contain;"></div>
                            </td>
                            <td>
                                Tinggi Badan
                            </td>
                            <td>
                                {{$pengguna->tinggi_badan}} CM
                            </td>
                        </tr>
                    </table>
                </div>
                {{-- <div class="bio-wrapper">
                    <div class="bio-row">
                        <div class="icon"></div>
                        <span>gender</span>
                        <span>L/P</span>
                    </div>
                    <div class="bio-row">
                        <div class="icon"></div>
                        <span>gender</span>
                        <span>L/P</span>
                    </div>
                    <div class="bio-row">
                        <div class="icon"></div>
                        <span>gender</span>
                        <span>L/P</span>
                    </div>
                    <div class="bio-row">
                        <div class="icon"></div>
                        <span>gender</span>
                        <span>L/P</span>
                    </div>
                </div> --}}
                {{-- <div class="bio-wrapper">
                    <span>
                        <div class="icon"></div>
                        gender
                    </span>
                    <span>
                        L/P
                    </span>
                    <span>
                        <div class="icon"></div>
                        Usia
                    </span>
                    <span>
                        Tahun
                    </span>
                    <span>
                        <div class="icon"></div>
                        Berat Badan
                    </span>
                    <span>
                        kg
                    </span>
                    <span>
                        <div class="icon"></div>
                        Tinggi Dadan
                    </span>
                    <span>
                        Cm
                    </span>

                </div> --}}
            </div>
            {{-- <div class="activity">
                <div class="opening">
                    Tentang Aku
                </div>
                <div id="accontent" class="activity-wrapper">
                    <span>

                        Olahraga
                    </span>
                    <span class="d-flex justify-content-center" >
                       <img class="icon-big m-0 p-0" src="/css/img/futsal.jpg" alt="">
                    </span>
                    <span>
                        <button data-bs-toggle="modal" data-bs-target="#Olahraga" >Info Lengkap</button>
                    </span>
                    <span>

                        Status
                    </span>
                    <span class="fw-bold d-flex justify-content-center" >
                        Aktif
                    </span>
                    <span>
                        <button data-bs-toggle="modal" data-bs-target="#Olahraga" href="">Info Lengkap</button>
                    </span>
                </div>
        </div> --}}
        <div class="white-space"></div>
    </div>
    <div class="container fixed-bottom bottom-nav  d-block d-sm-none ">
        <div class="row mobile-nav">
            <a href="/userprofile/home" class="col-3 active-m">
                <img width="30px" src="/css/img/userwhite.png" >
                <p class="m-0">Profile</p>
            </a>
            <a href="/usersparring/home" class="col-3">
                <img width="30px" src="/css/img/bn-sparring.png" >
                <p class="m-0">Sparring</p>
            </a>
            <a href="/usermabar/home" class="col-3">
                <img width="30px" src="/css/img/bn-mabar.png" >
                <p class="m-0">Mabar</p>
            </a>
            <a href="/usertim/home" class="col-3">
                <img width="30px" src="/css/img/bn-tim.png  " >
                <p class="m-0">Tim</p>
            </a>    
        </div>
    </div>
    <script src="/js/notification.js"></script>
    <section class="white-space" ></section>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js" integrity="sha384-fbbOQedDUMZZ5KreZpsbe1LCZPVmfTnH7ois6mU1QK+m14rQ1l2bGBq41eYeM/fS" crossorigin="anonymous"></script>
</body>
</html>