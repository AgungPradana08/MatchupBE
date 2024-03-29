<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Match Up</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <link rel="stylesheet" href="/css/detailsparringnewnew.css">
    <link rel="stylesheet" href="/css/notification.css">
    <link rel="shortcut icon" type="image/x-icon" href="/css/img/vector.png">
</head>
<body>
    <form action="" method="post">
        @csrf   
        <div class="modal" id="report" tabindex="-1">
            <div class="modal-dialog modal-dialog-centered ">
              <div class="modal-content" style="width: 32vw" >
                <div class="modal-header bg-primary-mu">
                  <div class="blank logo-sm rounded-circle d-inline-block"></div>
                  <h5 class=" modal-title ">
                    Laporkan Tim <strong>{{$usersparring->nama_tim}}</strong>?
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
                    <input type="text" class="d-none" name="reporttimid" id="ReportPoin" value="{{ $usersparring->id }}">
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

    <div class="modal" id="KickTeam" tabindex="-1">
        <div class="modal-dialog modal-dialog-centered ">
          <div class="modal-content" style="width: 32vw" >
            <div class="modal-header bg-primary-mu">
              <div class="blank logo-sm rounded-circle d-inline-block"></div>
              <h5 class=" modal-title ">
                
                Keluarkan Tim <strong>{{$usersparring->nama_tim}}</strong>?
              </h5>
              <button type="button" class="btn-close "data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
              <p>Apakah anda yakin ingin mengeluarkan Tim ini dari sparring anda?</p>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>    
              {{-- <button type="button" class="btn btn-danger">Keluar</button> --}}
              <form action="{{ route('sparring.kicktim', ['usersparringId' => $usersparring->id, 'usertimId' => $usertim->id]) }}" method="post">
                @csrf
                <button type="submit" class="btn btn-danger" style="color: white;" >Keluarkan</button>
              </form>
            </div>
          </div>
        </div>
      </div>

    <div id="notification" class="alert position-fixed notification justify-content-between mt-sm-4 mt-2 shadow-lg {{ session('notification') === 'Maaf, Anda harus bergabung dengan tim terlebih dahulu sebelum dapat bergabung dengan Sparring!' || session('notification') === 'Anda sudah terdaftar sebagai peserta Sparring ini!' || session('notification') === 'Anda telah bergabung dengan Sparring!'  ? 'appear' : 'd-none' }}"  role="alert">
        <p class="d-inline-block p-0 m-0 " >{{ session('notification') }}</p>
        <button type="button" class="btn-close " onclick="closenotification()" aria-label="Close"></button>
    </div>
    <nav class="navbar navbar-expand-lg p-0 position-fixed bg-white" style="width: 100vw; z-index: 100;">
        <div class="container bg-ms-primary ">
          <a class="navbar-brand" href="/sparring/home"><img src="\css\img\back button.png" style="height: 28px;" alt=""></a>
          <span>Detail Sparring</span>
          <button data-bs-toggle="modal" data-bs-target="#report" class="report" style="background: url(/css/img/report.png); background-size: contain; {{ $usersparring->user_id !== $origin ? 'visibility: visible' : 'visibility: hidden' }}; visibility: hidden;" style="height: 28px;" ></button>
        </div>
    </nav>
    <div id="Versus" class="container2">
        <a class="detail" id="detail-bookmark" onclick="detailSparring()" href="#Detail">Detail</a>

        <div class="vs-away-home">
            <div id="hometeam" class="vs-home"></div>
            <div id="awayteam" class="vs-away"></div>
        </div>
        <div class="vs-detail">
                <div class="me-5" >
                    <a class=" " style="text-decoration: none; color: black" href="/tim/{{ $usersparring->SparringTims->id }}/timdetail">
                        <div class="de-away w-100">
                            <img src="{{asset ('storage/' . $usersparring->SparringTims->image)}}" class="box-icon shadow rounded rounded-circle mb-2"  alt="">
                            <div class="d-flexjustify-content-center align-items-center"  >
                                <p class="text-center p-0 m-0 " style="font-size: 18px"  >{{$usersparring->nama_tim}}</p> 
                                
                            </div>
                        </div>
                    </a>
                    <div class="d-flex w-100 justify-content-center mt-2" >
                        @if (Auth::user()->id == $usersparring->user_id)
                            <button  data-bs-toggle="modal" data-bs-target="#report" class="border-0 d-none" style="height: 25px; width: 25px; background: url(/css/img/report.png); background-size: contain;" ></button>
                        @else
                            @if ($DateNow >= $usersparring->tanggal_pertandingan && $TimeNow > $usersparring->waktu_pertandingan)
                            <button  data-bs-toggle="modal" data-bs-target="#report" class="border-0" style="height: 25px; width: 25px; background: url(/css/img/report.png); background-size: contain;" ></button>
                            @else
                            <button  data-bs-toggle="modal" data-bs-target="#report" class="border-0 d-none" style="height: 25px; width: 25px; background: url(/css/img/report.png); background-size: contain;" ></button>
                            @endif
                        @endif
                    </div>
                </div>
                <div class="de-vs">
                    VS
                </div>
                @if (count($usersparring->joinedSparrings) > 0)
                @foreach ($usersparring->joinedSparrings as $sparring)
                    @if ($sparring->pivot && strlen($sparring->pivot->image_tim_lawan) > 0)
                        <div class="ms-5" >
                            <a  style="text-decoration: none; color: black" href="/tim/{{ $sparring->pivot->usertim_id }}/timdetail">
                                <img src="{{ asset('storage/' . $sparring->pivot->image_tim_lawan) }}" class="box-icon shadow rounded rounded-circle" alt="">
                                <div class="d-flex justify-content-center align-items-center mt-2" >
                                    <p class="text-center d-inline-block p-0 m-0" style="font-size: 18px" >{{ $sparring->pivot->nama_tim_lawan }}</p>
                                </div>
                            </a>
                            <div class="d-flex w-100 mt-2 justify-content-center" >
                                <button data-bs-toggle="modal" data-bs-target="#KickTeam" class=" border-0 {{ Auth::user()->id == $usersparring->user_id && $DateNow < $usersparring->tanggal_pertandingan ? 'd-block' : 'd-none' }} " style="height: 25px; width: 25px; background: url(/css/img/kick.jpg); background-size: contain;"  ></button>
                            @if (Auth::user()->id == $sparring->pivot->user_id)
                                <button  data-bs-toggle="modal" data-bs-target="#report" class="border-0 d-none" style="height: 25px; width: 25px; background: url(/css/img/report.png); background-size: contain;" ></button>
                            @else
                                @if ($DateNow >= $usersparring->tanggal_pertandingan && $TimeNow > $usersparring->waktu_pertandingan )
                                <button  data-bs-toggle="modal" data-bs-target="#report"  class="border-0" style="height: 25px; width: 25px; background: url(/css/img/report.png); background-size: contain;" ></button>
                                @else
                                <button  data-bs-toggle="modal" data-bs-target="#report" class="border-0 d-none" style="height: 25px; width: 25px; background: url(/css/img/report.png); background-size: contain;" ></button>
                                @endif
                            @endif
                            </div>
                        </div>
                    @else
                        {{-- <img src="" class="box-icon shadow rounded rounded-circle" alt="">
                        <p style="margin-top: 5%;">???</p> --}}
                    @endif
                @endforeach
                {{-- @else
                    <p>???</p> --}}
                @endif  
        </div>

    </div>
    
</div>
    <div class="container content">
        <div class="row">
            <div class="col-12 col-lg-6">
                <div class="title">
                    <img class="userlogo rounded-circle" src="{{asset ('storage/' . $usersparring->image)}}"  style="object-position: center; object-fit: cover;" >
                    <div class="ms-0 ms-sm-4 mt-3 mt-sm-0" >
                        <h1 class="fw-bold" >{{$usersparring->title}}</h1>
                        <div style="display: flex; align-items: center;" class="title-content">
                            <div class="sportlogo me-2" style="background: url(/css/img/futsal.jpg); background-size: contain;"></div>
                            <span class="me-2">{{$usersparring->olahraga}}</span>
                            <span>| {{$usersparring->lokasi}}</span>
                        </div>
                    </div>
                </div>
                <hr>
                <div class="description">
                    <h5>Deskripsi Sparring</h5>
                    <span class="des" style="font-size: 12px;" >{{$usersparring->deskripsi}}</span>
                </div>
                <hr>
                <div class="maps pb-lg-5 pb-0">
                    <h5>Lokasi Sparring</h5>
                    <p class="" style="font-size: 12px;" >{{$usersparring->detail_lokasi}}</p>
                    <iframe id="MapDisplay" class="maps" src="{{$usersparring->embed_lokasi}}"></iframe>
                </div>
                <hr class=" d-block d-lg-none">
                <div class="d-block d-lg-none extra-description">
                    <h4>Deskripsi Tambahan</h4>
                    <span class="des"  style="font-size: 12px">{{$usersparring->deskripsi_tambahan}}</span>
                </div>
                <hr class=" d-block d-lg-none">
                    <div class="access-phone d-block d-lg-none">
                        <h4>Biaya Iuran Lapangan</h4>
                        <h1 class="m-0" >Rp {{$usersparring->harga_tiket}}<span class="text-muted m-0 p-0" >/tim</span> </h1>
                        <div class="two">{{$usersparring->tingkatan}} Tahun</div>
                    </div>
                    <hr class=" d-block d-lg-none">
                    <div class="box-content d-block d-lg-none">
                        <table class="m-0" width="100%">
                            <tr>
                                <th width="5%"></th>
                                <th width="95%"></th>
                            </tr>
                            <tr>
                                <td>
                                    <div class="icon mx-auto" style="background: url(/css/img/calender.png); background-size: contain;"></div>
                                </td>
                                <td style="font-family: opensans-bold;">Tanggal Permainan</td>
                            </tr>
                            <tr>
                                <td></td>
                                <td style="font-size: 13px;">{{$usersparring->tanggal_pertandingan}} | {{ $usersparring->waktu_pertandingan }}</td>
                            </tr>
                            <tr>
                                <td>
                                    <div class="icon mx-auto" style="background: url(/css/img/clock.png); background-size: contain;"></div>
                                </td>
                                <td style="font-family: opensans-bold;">Jadwal Sparring</td>
                            </tr>
                            <tr>
                                <td></td>
                                <td style="font-size: 13px;">{{$usersparring->lama_pertandingan}} jam</td>
                            </tr>
                            <tr>
                                <td>
                                    <div class="icon mx-auto" style="background: url(/css/img/target.png); background-size: contain;"></div>
                                </td>
                                <td style="font-family: opensans-bold;">Lokasi Sparring</td>
                            </tr>
                            <tr>
                                <td></td>
                                <td style="font-size: 13px;" id="locationTarget">{{$usersparring->lokasi}}</td>
                            </tr>
                        </table>
                    </div>
            </div>
            <div class=" offset-lg-1 col-lg-5 col-xl-4 col-12">
                <div class="box1 d-none d-lg-flex w-100 ">
                    <div class="access w-100 d-flex justify-content-center border-0">
                        <h5>Informasi Biaya Lapangan</h5>
                        <h1>Rp {{$usersparring->harga_tiket}}<span class="text-muted" > /tim</span> </h1>
                        <div class="two">{{$usersparring->tingkatan}} Tahun</div>
                    </div>
                    <div class="box-content ">
                        <table class="m-0" width="100%">
                            <tr>
                                <td>
                                    <div class="icon mx-auto" style="background: url(/css/img/calender.png); background-size: contain;"></div>
                                </td>
                                <td style="font-family: opensans-bold;">Tanggal Permainan</td>
                            </tr>
                            <tr>
                                <td></td>
                                <td style="font-size: 13px;">{{$usersparring->tanggal_pertandingan}} | {{ $usersparring->waktu_pertandingan }}</td>
                            </tr>
                            <tr>
                                <td>
                                    <div class="icon mx-auto" style="background: url(/css/img/clock.png); background-size: contain;"></div>
                                </td>
                                <td style="font-family: opensans-bold;">Jadwal Sparring</td>
                            </tr>
                            <tr>
                                <td></td>
                                <td style="font-size: 13px;">{{$usersparring->lama_pertandingan}} jam</td>
                            </tr>
                            <tr>
                                <td>
                                    <div class="icon mx-auto" style="background: url(/css/img/target.png); background-size: contain;"></div>
                                </td>
                                <td style="font-family: opensans-bold;">Lokasi Sparring</td>
                            </tr>
                            <tr>
                                <td></td>
                                <td style="font-size: 13px;" id="locationTarget">{{$usersparring->lokasi}}</td>
                            </tr>
                        </table>
                    </div>
                    @if (Auth::user()->id == $usersparring->user_id)
                        @if ($DateNow > $usersparring->tanggal_pertandingan)
                        <button class="ambil " style="background: #8F8F8F" >Sparring Selesai</button>
                        @elseif ($usersparring->joinedSparrings->count() == $usersparring->max_member)
                        <a style="text-decoration: none"  class="ambil d-flex align-items-center justify-content-center" >Siap Bertanding</a>
                        @else
                        <a href="/usersparring/{{$usersparring->id  }}/usersparringedit" style="text-decoration: none"  class="ambil d-flex align-items-center justify-content-center" >EDIT SPARRING</a>
                        @endif
                    @else
                        @if ($DateNow > $usersparring->tanggal_pertandingan)
                        <form>
                            <button class="ambil " style="background: #8F8F8F" >Sparring Selesai</button>
                        </form> 
                        @elseif ($usersparring->joinedSparrings->count() == $usersparring->max_member && $DateNow > $sparring->tanggal_pertandingan)
                        <form action="{{ route('sparring.join', ['id' => $usersparring->id]) }}" method="POST">
                            @csrf
                            <button class="ambil" >Sparring Penuh</button>
                        </form>  
                        @else
                        <button data-bs-toggle="modal" data-bs-target="#exampleModal" class="ambil" >Ambil Sparring</button>
                        @endif
                    @endif
                    <form action="{{ route('sparring.join', ['id' => $usersparring->id]) }}" method="POST">
                        @csrf
                        <div class="modal" id="exampleModal" tabindex="-1">
                            <div class="modal-dialog modal-dialog-centered ">
                              <div class="modal-content" style="width: 32vw" >
                                <div class="modal-header bg-primary-mu">
                                  <div class="blank logo-sm rounded-circle d-inline-block"></div>
                                  <h5 class=" modal-title ">
                                    Bergabung Sparring <strong>{{$usersparring->title}}</strong>?
                                  </h5>
                                  <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                    <div class="modal-body">
                                            <table class="m-0" width="100%">
                                                <tr>
                                                    <th width="5%"></th>
                                                    <th width="95%"></th>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <div class="icon mx-auto" style="background: url(/css/img/calender.png); background-size: contain;"></div>
                                                    </td>
                                                    <td style="font-family: opensans-bold;">Tanggal Permainan</td>
                                                </tr>
                                                <tr>
                                                    <td></td>
                                                    <td style="font-size: 13px;">{{$usersparring->tanggal_pertandingan}} | {{ $usersparring->waktu_pertandingan }}</td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <div class="icon mx-auto" style="background: url(/css/img/clock.png); background-size: contain;"></div>
                                                    </td>
                                                    <td style="font-family: opensans-bold;">Jadwal Sparring</td>
                                                </tr>
                                                <tr>
                                                    <td></td>
                                                    <td style="font-size: 13px;">{{$usersparring->lama_pertandingan}} jam</td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <div class="icon mx-auto" style="background: url(/css/img/target.png); background-size: contain;"></div>
                                                    </td>
                                                    <td style="font-family: opensans-bold;">Lokasi Sparring</td>
                                                </tr>
                                                <tr>
                                                    <td></td>
                                                    <td style="font-size: 13px;" id="locationTarget">{{$usersparring->lokasi}}</td>
                                                </tr>
                                            </table>
                                        <hr>
                                    <p><strong style="color: red">Anda tidak akan bisa keluar setelah anda bergabung!!!</strong>, anda akan harus menunggu sampai sparring ini selesai</p>
                                    </div>
                                <div class="modal-footer">
                                  <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                                  <button type="submit" class="btn" id="pay-button" style="color: white; background-color: #FE6B00;" >Ambil</button>
                                </div>
                              </div>
                            </div>
                        </div>
                    </form>

                    {{-- @if ($usersparring->joinedSparrings->count() == $usersparring->max_member)
                        @if ($DateNow > $sparring->tanggal_pertandingan)
                            <form>
                                <button class="ambil bg-danger" >Sparring Selesai</button>
                            </form>  
                        @else
                        <form action="{{ route('sparring.join', ['id' => $usersparring->id]) }}" method="POST">
                            @csrf
                            <button class="ambil" >Sparring Penuh</button>
                        </form>     
                        @endif  
                    @else
                    <button data-bs-toggle="modal" data-bs-target="#exampleModal" class="ambil" >Ambil Sparring</button>
                    <form action="{{ route('sparring.join', ['id' => $usersparring->id]) }}" method="POST">
                        @csrf
                        <div class="modal" id="exampleModal" tabindex="-1">
                            <div class="modal-dialog modal-dialog-centered ">
                              <div class="modal-content" style="width: 32vw" >
                                <div class="modal-header bg-primary-mu">
                                  <div class="blank logo-sm rounded-circle d-inline-block"></div>
                                  <h5 class=" modal-title ">
                                    Bergabung Sparring <strong>{{$usersparring->title}}</strong>?
                                  </h5>
                                  <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                    <div class="modal-body">
                                            <table class="m-0" width="100%">
                                                <tr>
                                                    <th width="5%"></th>
                                                    <th width="95%"></th>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <div class="icon mx-auto" style="background: url(/css/img/calender.png); background-size: contain;"></div>
                                                    </td>
                                                    <td style="font-family: opensans-bold;">Tanggal Permainan</td>
                                                </tr>
                                                <tr>
                                                    <td></td>
                                                    <td style="font-size: 13px;">{{$usersparring->tanggal_pertandingan}}</td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <div class="icon mx-auto" style="background: url(/css/img/clock.png); background-size: contain;"></div>
                                                    </td>
                                                    <td style="font-family: opensans-bold;">Jadwal Sparring</td>
                                                </tr>
                                                <tr>
                                                    <td></td>
                                                    <td style="font-size: 13px;">{{$usersparring->lama_pertandingan}} jam</td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <div class="icon mx-auto" style="background: url(/css/img/target.png); background-size: contain;"></div>
                                                    </td>
                                                    <td style="font-family: opensans-bold;">Lokasi Sparring</td>
                                                </tr>
                                                <tr>
                                                    <td></td>
                                                    <td style="font-size: 13px;" id="locationTarget">{{$usersparring->lokasi}}</td>
                                                </tr>
                                            </table>
                                        <hr>
                                    <p><strong style="color: red">Anda tidak akan bisa keluar setelah anda bergabung!!!</strong>, anda akan harus menunggu sampai sparring ini selesai</p>
                                    </div>
                                <div class="modal-footer">
                                  <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                                  <button type="button" class="btn btn-danger">Keluar</button>
                                  <button type="submit" class="btn" style="color: white; background-color: #FE6B00;" >Ambil</button>
                                </div>
                              </div>
                            </div>
                        </div>
                    </form>
                    @endif --}}
                </div>
                <div class="box2 d-none d-lg-block">
                    <h5>Deskripsi Tambahan</h5>
                    <span  style="font-size: 12px" >{{$usersparring->deskripsi_tambahan}}</span>
                </div>
            </div>
        </div>
    </div>
    <div class="white-space d-none d-lg-block"></div>
    {{-- <div class="container fixed-bottom bg-white d-block d-lg-none">
        @if ($usersparring->joinedSparrings->count() == $usersparring->max_member)
                        @if ($DateNow > $sparring->tanggal_pertandingan)
                            <form>
                                <button class="ambil bg-danger" >Sparring Selesai</button>
                            </form>  
                        @else
                        <form action="{{ route('sparring.join', ['id' => $usersparring->id]) }}" method="POST" class="row phone-button">
                            @csrf
                            <button class="col-12 ambil" type="submit" >Sparring Penuh</button>
                        </form>    
                        @endif  
                    @else
                    <form action="{{ route('sparring.join', ['id' => $usersparring->id]) }}" method="POST" class="row phone-button">
                        @csrf
                        <button class="col-12 ambil" type="submit" >Ambil Sparring</button>
                    </form>
        @endif
    </div> --}}


    {{-- <script type="text/javascript">
        // For example trigger on button clicked, or any time you need
        var payButton = document.getElementById('pay-button');
        payButton.addEventListener('click', function () {
          // Trigger snap popup. @TODO: Replace TRANSACTION_TOKEN_HERE with your transaction token
          window.snap.pay('{{$snapToken}}', {
            onSuccess: function(result){
              /* You may add your own implementation here */
              alert("payment success!");
            // window.location.href = '/invoice/{{$order->id}}'
                console.log(result);
            },
            onPending: function(result){
              /* You may add your own implementation here */
              alert("wating your payment!"); console.log(result);
            },
            onError: function(result){
              /* You may add your own implementation here */
              alert("payment failed!"); console.log(result);
            },
            onClose: function(){
              /* You may add your own implementation here */
              alert('you closed the popup without finishing the payment');
            }
          })
        });
      </script> --}}


    <script src="/js/notification.js"></script>
    <script src="/js/mapslist.js"></script>
    <script src="/js/detailsparring.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js" integrity="sha384-fbbOQedDUMZZ5KreZpsbe1LCZPVmfTnH7ois6mU1QK+m14rQ1l2bGBq41eYeM/fS" crossorigin="anonymous"></script>
</body>
</html>