<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Match Up</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <link rel="stylesheet" href="/css/timdetail.css">
    <link rel="stylesheet" href="/css/notification.css">
    <link rel="shortcut icon" type="image/x-icon" href="/css/img/vector.png">
</head>
<body>
    <div class="modal" id="report" tabindex="-1">
        <div class="modal-dialog modal-dialog-centered ">
          <div class="modal-content" style="width: 32vw" >
            <div class="modal-header bg-primary-mu">
              <div class="blank logo-sm rounded-circle d-inline-block"></div>
              <h5 class=" modal-title ">
                Laporkan Pemilik Tim <strong>{{$usertim->nama_tim}}</strong>?
              </h5>
              <button type="button" class="btn-close "data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body modal-wrapper">
                <div class="d-flex align-items-center" style="grid-area: report1">
                    <input type="checkbox" id="report1" name="report1" value="Bike">
                    <label for="report1"> Kata kasar/SARA</label><br>
                </div>
                <div class="d-flex align-items-center" style="grid-area: report2">
                    <input type="checkbox" id="report2" name="report2" value="Bike">
                    <label for="report2"> Logo/avatar tidak pantas</label><br>
                </div>
                <div class="d-flex align-items-center" style="grid-area: report3">
                    <input type="checkbox" id="report3" name="report3" value="Bike">
                    <label for="report3"> Spam</label><br>
                </div>
                <div class="d-flex align-items-center" style="grid-area: report4">
                    <input type="checkbox" id="report4" name="report4" value="Bike">
                    <label for="report4"> penipuan</label><br>
                </div>
                <textarea style="grid-area: report5; resize: none" maxlength="225" name="" id="" cols="30" placeholder="Masukkan deskripsi tambahan (maksimal 255)" rows="10"></textarea>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
              {{-- <button type="button" class="btn btn-danger">Keluar</button> --}}
              <button type="submit" class="btn" style="color: white; background-color: #FE6B00;" >Kirim</button>
            </div>
          </div>
        </div>
      </div>
    <div id="notification" class="alert position-absolute notification justify-content-between mt-sm-4 mt-2 shadow-lg {{ session('notification') === 'Maaf, jumlah peserta tim telah mencapai batas maksimum!' || session('notification') === 'Anda telah bergabung dengan Tim!' || session('notification') === 'Anda sudah terdaftar sebagai peserta Tim ini!' || session('notification') === 'Anda telah keluar dari Tim.' ? 'appear' : 'd-none' }}"  role="alert">
        <p class="d-inline-block p-0 m-0 " >{{ session('notification') }}</p>
        <button type="button" class="btn-close " onclick="closenotification()" aria-label="Close"></button>
    </div>
    <nav class="navbar navbar-expand-lg p-0 position-fixed bg-white" style="width: 100vw; z-index: 100;">
        <div class="container bg-ms-primary ">
          <a class="navbar-brand" href="/tim/home"><img src="\css\img\back button.png" style="height: 28px;" alt=""></a>
          <span>Detail {{$usertim->nama_tim}}</span>
          <button data-bs-toggle="modal" data-bs-target="#report" class="report" style="background: url(/css/img/report.png); background-size: contain;" style="height: 28px;" ></button>
        </div>
    </nav>
    <div class="container content">
        <div class="row">
            <div class="col-12 col-lg-6">
                <div class="title">
                    <img class="userlogo rounded-circle" src="{{asset ('storage/' . $usertim->image)}}" >
                    <div class="ms-0 ms-sm-4 mt-3 mt-sm-0 " >
                        <h1>{{$usertim->nama_tim}}</h1>
                        <div style="display: flex; align-items: center;" class="title-content">
                            <div class="sportlogo me-2" style="background: url(/css/img/futsal.jpg); background-size: contain; "></div>
                            <span class="me-2">{{$usertim->olahraga}} | </span> <span>{{$usertim->area_bermain}}</span>
                            
                        </div>
                    </div>
                </div>
                <hr>
                <div class="description">
                    <h4>Deskripsi Mabar</h4>
                    <span class="des">{{$usertim->deskripsi}}</span>
                </div>
                <hr>
                <div class="left3">
                    <div style="display: flex; justify-content: space-between;" >
                        <h4>Member Tim</h4>
                        <h4>{{ $usertim->joinedPlayers->count() }}/{{ $usertim->max_member }}</h4>
                    </div>
                    <div class="maps">
                        {{-- @if($usertim->hostTim)
                            <div class="member">
                                <img class="member-logo rounded-circle " src="{{asset('storage/'. $usertim->hostTim->image)}}" >
                                <div class="ms-2">
                                    <h6 class="m-0" >{{$usertim->hostTim->name}}</h6>
                                    <p class="m-0" >Host</p>
                                </div>
                            </div>
                         @endif --}}
                    @foreach ($usertim->playersTim as $player)
                    <div class="member">
                        <img class="member-logo rounded-circle " src="{{asset('storage/'. $player->image)}}" >
                        <div class="ms-2">
                            <h6 class="m-0 fw-bold" >{{$player->name}}</h6>
                            <p class="m-0 text-muted" >Member</p>
                        </div>
                    </div>
                    @endforeach
                    </div>
                </div>
                <section class="white-space d-none d-lg-block" ></section> 
                <hr class="d-block d-lg-none">
                    <div class="access-phone d-flex flex-column d-lg-none">
                        <h4>Tingkatan</h4>
                        <div class="two">{{$usertim->tingkatan}}</div>
                        <h5 class="m-0 mt-3" >Bermain Sekitar</h5>
                        <h3 class="fw-bold m-0" style="color: #FE6B00" >Kudus</h3>
                    </div>
                    <hr class="d-block d-lg-none">
                    <div class="box-content d-block d-lg-none">
                        <table>
                            <tr>
                                <td>
                                    <div class="icon mx-auto" style="background:  url(/css/img/phone.png); background-size: contain;"  ></div>
                                </td>
                                <td  style="font-family: opensans;">phone Number</td>
                            </tr>
                            <td>
                                <div class="icon mx-auto" style="background:  url(/css/img/instagram.jpg); background-size: contain;"></div>
                            </td>
                            <td style="font-family: opensans;" >instagram</td>
                        </tr>
                        <td>
                            <div class="icon mx-auto" style="background:  url(/css/img/whatapps.jpg); background-size: contain;"></div>
                        </td>
                        <td style="font-family: opensans;">whatapps</td>
                        </tr>
                        <tr>
                            <td>
                                <div class="icon mx-auto" style="background:  url(/css/img/facebook.jpg); background-size: contain;"  ></div>
                            </td>
                            <td  style="font-family: opensans;">facebook</td>
                        </tr>
                        </table>
                    </div>
            </div>
            <div class=" offset-lg-1 col-lg-5 col-xl-4 col-12">
                <div class="box1 d-none d-lg-flex ">
                    <div class="access">
                        <h5>Tingkatan</h5>
                        <div class="two" style="font-size: 15px" >{{$usertim->tingkatan}}</div>
                        <h5 class="m-0 mt-3" >Radius Bermain</h5>
                        <h3 class="fw-bold m-0" style="color: #FE6B00" >{{$usertim->area_bermain}}</h3>
                    </div>
                    <div class="box-content ">
                        <table>
                            <tr>
                                <td>
                                    <div class="icon mx-auto" style="background:  url(/css/img/phone.png); background-size: contain;"    ></div>
                                </td>
                                <td  style="font-family: opensans;">{{$usertim->nomor_telepon}}</td>
                            </tr>
                            <td>
                                <div class="icon mx-auto" style="background:  url(/css/img/instagram.jpg); background-size: contain;"></div>
                            </td>
                            <td style="font-family: opensans;" >{{$usertim->instagram}}</td>
                        </tr>
                        <td>
                            <div class="icon mx-auto" style="background:  url(/css/img/whatapps.jpg); background-size: contain;"></div>
                        </td>
                        <td style="font-family: opensans;">{{$usertim->whatsapp}}</td>
                        </tr>
                        <tr>
                            <td>
                                <div class="icon mx-auto" style="background:  url(/css/img/facebook.jpg); background-size: contain;"  ></div>
                            </td>
                            <td  style="font-family: opensans;">{{$usertim->facebook}}</td>
                        </tr>
                        </table>
                    </div>
                    @if (!$usertim->joinedPlayers->contains(Auth::user()->id))
                        @if ( $usertim->joinedPlayers->count() ==  $usertim->max_member)
                            <button class="ambil" >Tim Penuh</button>
                        @else
                        <form action="{{ route('tim.join', ['id' => $usertim->id]) }}" method="POST">
                            @csrf
                            <button class="ambil" type="submit">BERGABUNG SEKARANG</button>
                        </form>
                        @endif
                    <!-- Jika pengguna sudah bergabung dengan tim, tampilkan tombol "KELUAR TIM" -->
                    @else
                        <form action="{{ route('tim.leave', ['id' => $usertim->id]) }}" method="POST">
                            @csrf
                            <a class=" btn keluar bg-danger d-flex align-items-center justify-content-center" type="submit" data-bs-toggle="modal" data-bs-target="#exampleModal" >KELUAR TIM</a>

                            <div class="modal" id="exampleModal" tabindex="-1">
                                <div class="modal-dialog modal-dialog-centered ">
                                  <div class="modal-content" style="width: 32vw" >
                                    <div class="modal-header bg-primary-mu">
                                      <div class="blank logo-sm rounded-circle d-inline-block"></div>
                                      <h5 class=" modal-title ">
                                        Keluar Dari {{$usertim->nama_tim}}?
                                      </h5>
                                      <button type="button" class="btn-close "data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                      <p  >Anda yakin ingin keluar dari tim ini?</p>
                                    </div>
                                    <div class="modal-footer">
                                      <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                                      {{-- <button type="button" class="btn btn-danger">Keluar</button> --}}
                                      <button type="submit" class="btn btn-danger">Keluar</button>
                                    </div>
                                  </div>
                                </div>
                              </div>
                        </form>
                    @endif
                </div>
            </div>
        </div>
    </div>
    <div class="container fixed-bottom bg-white d-block d-lg-none">
        <form action="{{ route('tim.join', ['id' => $usertim->id]) }}" method="POST">
            @csrf
            <button class="ambil" type="submit">BERGABUNG SEKARANG</button>
        </form>
    </div>
    <section class="white-space" ></section>
    <script src="/js/notification.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js" integrity="sha384-fbbOQedDUMZZ5KreZpsbe1LCZPVmfTnH7ois6mU1QK+m14rQ1l2bGBq41eYeM/fS" crossorigin="anonymous"></script>
</body>
</html>