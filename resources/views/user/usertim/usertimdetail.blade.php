<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Match Up</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <link rel="stylesheet" href="/css/userdetailnew.css">
    <link rel="stylesheet" href="/css/timdetail.css">
    <link rel="stylesheet" href="/css/notification.css">
    <link rel="shortcut icon" type="image/x-icon" href="/css/img/vector.png">
</head>
<body> 
    <form action="{{ route('report.tim')}}" method="post">
        @csrf   
        <div class="modal" id="report" tabindex="-1">
            <div class="modal-dialog modal-dialog-centered ">
              <div class="modal-content" style="width: 32vw" >
                <div class="modal-header bg-primary-mu">
                  <div class="blank logo-sm rounded-circle d-inline-block"></div>
                  <h5 class=" modal-title ">
                    Laporkan Tim <strong>{{$usertim->nama_tim}}</strong>?
                  </h5>
                  <button type="button" class="btn-close "data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body modal-wrapper">
                    <div class="d-flex align-items-center" style="grid-area: report1">
                        <input type="checkbox" id="timuser1" onchange="CheckboxTim()" name="timuser1" value="2">
                        <label for="timuser1"> Kata kasar/SARA</label><br>
                    </div>
                    <div class="d-flex align-items-center" style="grid-area: report2">
                        <input type="checkbox" id="timuser2" onchange="CheckboxTim()" name="timuser2" value="3">
                        <label for="timuser2"> Logo/avatar tidak pantas</label><br>
                    </div>
                    <div class="d-flex align-items-center" style="grid-area: report3">
                        <input type="checkbox" id="timuser3" onchange="CheckboxTim()" name="timuser3" value="2">
                        <label for="timuser3"> Spam</label><br>
                    </div>
                    <div class="d-flex align-items-center" style="grid-area: report4">
                        <input type="checkbox" id="timuser4" onchange="CheckboxTim()" name="timuser4" value="4">
                        <label for="timuser4"> Spam</label><br>
                    </div>
                    <textarea style="grid-area: report5; resize: none" maxlength="225" name="" id="" cols="30" placeholder="Masukkan deskripsi tambahan (maksimal 255)" rows="10"></textarea>
                    <input type="text" class="d-none" name="reporttimid" id="ReportPoin" value="{{ $usertim->id }}">
                    <input type="text" class="d-none" name="ReportTimPoin" id="ReportTimPoin">
    
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                  {{-- <button type="button" class="btn btn-danger">Keluar</button> --}}
                  <button type="submit" class="btn" style="color: white; background-color: #FE6B00;" >Kirim</button>
                </div>
              </div>
            </div>
        </div>
    </form>
    
    <div id="notification" class="alert position-absolute notification justify-content-between mt-sm-4 mt-2 shadow-lg {{ session('notification') === 'Pengguna berhasil dilaporkan.'|| session('notification') === 'Pengguna berhasil dilaporkan.'|| session('notification') === 'Maaf, jumlah peserta tim telah mencapai batas maksimum!' || session('notification') === 'Anda telah bergabung dengan Tim!' || session('notification') === 'Anda sudah terdaftar sebagai peserta Tim ini!' || session('notification') === 'Anda telah keluar dari Tim.'|| session('notification') === 'Maaf, Anda hanya dapat bergabung dengan satu tim!' ? 'appear' : 'd-none' }}"  role="alert">
        <p class="d-inline-block p-0 m-0 " >{{ session('notification') }}</p>
        <button type="button" class="btn-close " onclick="closenotification()" aria-label="Close"></button>
    </div>
    <nav class="navbar navbar-expand-lg p-0 position-fixed bg-white" style="width: 100vw; z-index: 100;">
        <div class="container bg-ms-primary ">
          <a class="navbar-brand" href="/tim/home"><img src="\css\img\back button.png" style="height: 28px;" alt=""></a>
          <span>Detail {{ $usertim->nama_tim }}</span>
          <button data-bs-toggle="modal" data-bs-target="#report" class="report" style="background: url(/css/img/report.png); background-size: contain;  visibility: hidden;" style="height: 28px;" ></button>
        </div>
    </nav>
    <div class="container content">
        <div class="row">
            <div class="col-12 col-lg-6">
                <div class="title">
                    <img class="userlogo rounded-circle" src="{{asset ('storage/' . $usertim->image)}}" style="object-fit: cover; object-position: center;" >
                    <div class="ms-0 ms-sm-4 mt-3 mt-sm-0 " >
                        <h1 class="fw-bold p-0 m-0" >{{$usertim->nama_tim}}</h1>
                        <div>
                        @for ($i = 0; $i < $usertim->skor/10; $i++)
                            <img style="height: 20px; width: 20px;" src="/css/img/fire.png" >
                        @endfor 
                        </div>
                        <div style="display: flex; align-items: center;" class="title-content mt-2 ">
                            <div class="sportlogo me-2" style="background: url(/css/img/futsal.jpg); background-size: contain; "></div>
                            <span>{{$usertim->olahraga}}</span> | <span>{{$usertim->area_bermain}}</span>
                            
                        </div>
                    </div>
                </div>
                <hr>
                <div class="description">
                    <h5 class="fw-bold" >Deskripsi Tim</h5>
                    <span style="font-size: 12px" class="des">{{$usertim->deskripsi}}</span>
                </div>
                <hr>
                <div class="left3">
                    <div style="display: flex; justify-content: space-between;" >
                        <h5 class="fw-bold" >Member Tim</h5>
                        <h5><strong style="font-family: opensans-bold;" >{{ $usertim->joinedPlayers->count() }}/{{ $usertim->max_member }}</strong></h5>
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
                         <div class="member d-flex align-items-center justify-content-between px-2">
                            <div class="d-flex align-items-center" >
                            <img class="member-logo rounded-circle" data-bs-toggle="modal" data-bs-target="#UserProfile{{ $player->id }}" src="{{asset('storage/'. $player->image)}}" style="object-fit: cover; object-position: center; cursor: pointer;" >
                                <div class="ms-2">
                                    <h6 data-bs-toggle="modal" data-bs-target="#UserProfile{{ $player->id }}" class="fw-bold m-0" style="cursor: pointer" >{{$player->name}}</h6>
                                    <form action="{{ route('tim.leave', ['id' => $usertim->id]) }}" method="POST">
                                        @csrf           
                                        <div class="modal" id="UserProfile{{ $player->id }}" tabindex="-1">
                                            <div class="modal-dialog modal-dialog-centered modal-lg" style="width: 80vw;height: 80vh">
                                              <div class="modal-content" style="width: 100%; height: 80vh" >
                                                <div class="modal-header text-light" style="background: #FE6B00" >
                                                  <div class="blank logo-sm rounded-circle d-inline-block"></div>
                                                  <h5 class=" modal-title ">
                                                    Profile <strong>{{$player->name}}</strong>
                                                  </h5>
                                                  <button type="button" class="btn-close btn-close-white "data-bs-dismiss="modal" aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body" style="overflow-y: scroll; height: 100%;" >
                                                    <div class="content-modal-size container d-flex flex-column justify-content-center align-items-center text-center">  
                                                        <div class="image-box-modal" >
                                                            <img class="img-preview-modal" width="50px" src="{{asset('storage/'. $player->image)}}" alt="" style="object-fit: cover; object-position: center;">  
                                                        </div>
                                                        <span class="username-modal " >{{$player->name}} </span>
                                                        <span class="name" >{{$player->username}}</span>
                                                        <hr>
                                                        <span class="deskripsi" >{{$player->deskripsi}}</span>
                                                        <div class="social">
                                                            
                                                            <a style="{{ $length = strlen($player->instagram) > 0 ? 'opacity: 100%' : 'opacity: 50%' }}" href="{{ strlen($player->instagram) > 0 ? 'https://www.instagram.com/' . $player->instagram : '#' }}" class="instagram">
                                            
                                                            </a>
                                                            <a style="{{ $length = strlen($player->facebook) > 0 ? 'opacity: 100%' : 'opacity: 50%' }}" href="{{ strlen($player->facebook) > 0 ? 'https://web.facebook.com/' . $player->facebook : '#' }}" class="facebook">
                                            
                                                            </a>
                                                            <a style="{{ $length = strlen($player->whatapps) > 0 ? 'opacity: 100%' : 'opacity: 50%' }}" href="{{ strlen($player->whatapps) > 0 ? 'https://wa.me/' . $player->whatsapp : '#' }}" class="whatapps">
                                            
                                                            </a>
                                                        </div>
                                                        <hr>
                                                        <div class="bio w-100">
                                                            <div class="opening">
                                                                Bio Data
                                                            </div>
                                                            <div >
                                                                <table>
                                                                    <tr>
                                                                        <td class="bio1 " style="border-bottom: 2px solid black;">  
                                                                            <div class="icon " style="background: url(/css/img/gender.png); background-size:contain; width: 30px; height:30px;"></div>
                                                                        </td>
                                                                        <td style="font-size: 13px; border-bottom: 2px solid black;">
                                                                            Gender
                                                                        </td>
                                                                        <td style="font-size: 13px; border-bottom: 2px solid black;"  >
                                                                            {{$player->gender}}
                                                                        </td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td class="bio1"style="border-bottom: 2px solid black;">
                                                                                <div class="icon" style="background: url(/css/img/age.png); background-size:contain; width: 30px; height:30px;" ></div>
                                                                        </td>
                                                                        <td style="font-size: 13px; border-bottom: 2px solid black;" >
                                                                            Usia
                                                                        </td>
                                                                        <td style="font-size: 13px; border-bottom: 2px solid black;">
                                                                            {{$player->usia}} Tahun
                                                                        </td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td class="bio1"style="border-bottom: 2px solid black;">
                                                                                <div class="icon" style="background: url(/css/img/weight.png); background-size:contain; width: 30px; height:30px;" ></div>
                                                                        </td>
                                                                        <td style="font-size: 13px; border-bottom: 2px solid black;" >
                                                                            Berat Badan
                                                                        </td>
                                                                        <td style="font-size: 13px; border-bottom: 2px solid black;" >
                                                                            {{$player->berat_badan}} Kg
                                                                        </td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td class="bio1"style="border-bottom: 2px solid black;">
                                                                                <div class="icon" style="background: url(/css/img/height.png); background-size:contain; width: 30px; height:30px;"></div>
                                                                        </td>
                                                                        <td style="font-size: 13px; border-bottom: 2px solid black;" >
                                                                            Tinggi Badan
                                                                        </td>
                                                                        <td style="font-size: 13px; border-bottom: 2px solid black;">
                                                                            {{$player->tinggi_badan}} CM
                                                                        </td>
                                                                    </tr>
                                                                </table>
                                                            </div>
                                                        </div> 
                                                    </div> 
                                                </div>
                                              </div>
                                            </div>
                                          </div>
                                    </form>
                                    @if ( $loop->index == 0 )
                                        <p class="m-0 text-muted" style="font-size: 12px" >Host</p>
                                    @else
                                        <p class="m-0 text-muted" style="font-size: 12px" >Player</p>
                                    @endif
                                </div>
                            </div>
                            @if (Auth::user()->id == $usertim->user_id && $loop->index == 0)
                                <a class="p-0 m-0 d-none" data-bs-toggle="modal" data-bs-target="#KickUser{{$player->id}}" ><img class="m-0 p-0 " width="25px" height="25px" src="/css/img/kick.jpg" alt=""></a>
                            @else
                                <form action="{{ route('report.player')}}" method="POST" >
                                    @csrf
                                    <a class="p-0 m-0 " data-bs-toggle="modal" data-bs-target="#KickUser{{$player->id}}" ><img class="m-0 p-0" width="25px" height="25px" src="/css/img/kick.jpg" alt=""></a>

                                    <div class="modal" id="KickUser{{$player->id}}" tabindex="-1">
                                        <div class="modal-dialog modal-dialog-centered ">
                                            <div class="modal-content" style="width: 32vw" >
                                              <div class="modal-header bg-primary-mu">
                                                <div class="blank logo-sm rounded-circle d-inline-block"></div>
                                                <h5 class=" modal-title ">
                                                  Keluarkan Pengguna <strong>{{$player->name}}</strong>?
                                                </h5>
                                                <button type="button" class="btn-close "data-bs-dismiss="modal" aria-label="Close"></button>
                                              </div>
                                              <div class="modal-body">
                                                <p style="font-size: 12px" >Apakah anda yakin ingin mengeluarkan {{ $player->name }} ini dari Tim anda?</p>
                                              </div>
                                              <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                                                {{-- <button type="button" class="btn btn-danger">Keluar</button> --}}
                                                <form action="" method="post">
                                                  @csrf
                                                  @method('delete')
                                                  <button type="submit" class="btn btn-danger" style="color: white;" >Keluarkan</button>
                                                </form>
                                              </div>
                                            </div>
                                          </div>
                                    </div>
                                </form>
                            @endif
                            <p class="m-0 text-muted d-none" style="font-size: 12px">{{ $loop->index + 1 }}</p>
                        </div>
                    @endforeach
                    </div>
                </div>
                <section class="white-space d-none d-lg-block" ></section> 
                <hr class="d-block d-lg-none">
                    <div class="access-phone d-flex flex-column d-lg-none">
                        <h5 class="" >Tingkatan</h5>
                        <div class="two">{{$usertim->tingkatan}}</div>
                        <h5 class="m-0 mt-3" >Bermain Sekitar</h5>
                        <h3 class="fw-bold m-0" style="color: #FE6B00" >Kudus</h3>
                    </div>
                    <hr class="d-block d-lg-none">
                    <div class="box-content d-block d-lg-none">
                        <table>
                            <tr>
                                <td >
                                    <div class="icon mx-auto" style="background:  url(/css/img/phone.png); background-size: contain;"  ></div>
                                </td>
                                <td style="font-family: opensans;">phone Number</td>
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
            <div class=" offset-lg-1 col-lg-5 col-xl-4 col-12" >
                <div class="box1 d-none d-lg-flex " style="border-radius: 8px"  >
                    <div class="access">
                        <h5 class="fw-bold m-1" >Tingkatan</h5>
                        <div class="two" style="font-size: 15px" >{{$usertim->tingkatan}}</div>
                        <h5 class="m-0 mt-3 fw-bold" >Radius Bermain</h5>
                        <h3 class="fw-bold m-1" style="color: #FE6B00" >{{$usertim->area_bermain}}</h3>
                    </div>
                    <div class="box-content ">
                        <table>
                            <tr>
                                <td width="10%">
                                    <img class="icon my-auto" src="/css/img/phone.png">
                                </td>
                                <td width="90%" style="font-family: opensans;">{{$usertim->nomor_telepon}}</td>
                            </tr>
                            <tr>
                                <td width="10%">
                                    <img class="icon my-auto" src="/css/img/instagram.jpg">
                                </td>
                                <td width="90%" style="font-family: opensans;" >{{$usertim->instagram}}</td>
                            </tr>
                            <tr>
                                <td width="10%">
                                    <img class="icon my-auto" src="/css/img/whatapps.jpg">
                                </td>
                                <td width="90%" style="font-family: opensans;">{{$usertim->whatsapp}}</td>
                            </tr>
                            <tr>
                                <td width="10%">
                                    <img class="icon my-auto" src="/css/img/facebook.jpg">
                                </td>
                                <td width="90%"  style="font-family: opensans;">{{$usertim->facebook}}</td>
                            </tr>
                        </table>
                    </div>
                    @if (Auth::user()->id == $usertim->user_id)
                    <a href="/usertim/{{ $usertim->id }}/usertimedit" style="text-decoration: none" class="ambil d-flex align-items-center justify-content-center"  >Edit Tim</a>
                    @else
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
    <script src="/js/report.js"></script>
    <script src="/js/notification.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js" integrity="sha384-fbbOQedDUMZZ5KreZpsbe1LCZPVmfTnH7ois6mU1QK+m14rQ1l2bGBq41eYeM/fS" crossorigin="anonymous"></script>
</body>
</html>