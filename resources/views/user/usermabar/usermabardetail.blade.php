<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Match Up</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <link rel="stylesheet" href="/css/mabardetail.css">
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
                Laporkan Pemilik mabar <strong>{{$usermabar->title}}</strong>?
              </h5>
              <button type="button" class="btn-close btn-close-white"data-bs-dismiss="modal" aria-label="Close"></button>
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
      
    <div id="notification" class="alert position-fixed notification justify-content-between mt-sm-4 mt-2 shadow-lg {{ session('notification') === 'Maaf, jumlah peserta acara mabar telah mencapai batas maksimum!' || session('notification') === 'Anda sudah terdaftar sebagai peserta Mabar ini!' || session('notification') === 'Anda telah bergabung dengan Mabar!'  ? 'appear' : 'd-none' }}"  role="alert">
        <p class="d-inline-block p-0 m-0 " >{{ session('notification') }}</p>
        <button type="button" class="btn-close" onclick="closenotification()" aria-label="Close"></button>
    </div>

    <nav class="navbar navbar-expand-lg p-0 position-fixed bg-white" style="width: 100vw; z-index: 100;">
        <div class="container bg-ms-primary ">
          <a class="navbar-brand" href="/mabar/home"><img src="\css\img\back button.png" style="height: 28px;" alt=""></a>
          <span>Detail Mabar</span>
          <button data-bs-toggle="modal" data-bs-target="#report" class="report" style="background: url(/css/img/report.png); background-size: contain;" style="height: 28px;" ></button>
        </div>
    </nav>
    <div class="container content">
        <div class="row">
            <div class="col-12 col-lg-6">
                <div class="title">
                    <img class="userlogo rounded-circle" src="{{asset ('storage/' . $usermabar->image)}}"  style="object-position: center; object-fit: cover;" >
                    <div class="ms-0 ms-sm-4 mt-3 mt-sm-0 " >
                        <h1>{{$usermabar->title}}</h1>
                        <div style="display: flex; align-items: center;" class="title-content">
                            <div class="sportlogo me-2" style="background: url(/css/img/futsal.jpg); background-size: contain; "></div>
                            <span class="me-2">{{$usermabar->olahraga}}</span>
                            <span>| {{$usermabar->lokasi}}</span>
                        </div>
                    </div>
                </div>
                <hr>
                <div class="description">
                    <h4>Deskripsi Mabar</h4>
                    <span class="des">{{$usermabar->deskripsi}}</span>
                </div>
                <hr>
                <div class="maps pb-lg-5 pb-0">
                    <h4>Lokasi Mabar</h4>
                    <p class="des " id="detaillokasi" >{{$usermabar->lokasi}}</p>
                    <iframe id="MapDisplay" class="maps"></iframe>
                </div>
                <hr class="d-block d-lg-none">
                <div class="d-block d-lg-none extra-description">
                    <h4>Deskripsi Tambahan</h4>
                    <span class="des">{{$usermabar->description_tambahan}}</span>
                </div>
                <hr class="d-block d-lg-none"> 
                <div class="box2-phone d-flex d-lg-none">
                    <h5>Member</h5>
                    <div class="mabar-member">
                        <div class="member">
                            @if($usermabar->host)
                                <img class="member-logo rounded-circle " src="{{asset('storage/'. $usermabar->host->image)}}" >
                                <div class="ms-2">
                                    <h6 class="m-0" >{{$usermabar->host->name}}</h6>
                                    <p class="m-0" >Host</p>
                            </div>
                            @endif
                        </div>
                        @foreach ($usermabar->players as $player)
                        <div class="member">
                            <img class="member-logo rounded-circle  " src="{{asset('storage/'. $player->image)}}"  style="object-fit: cover;" >
                            <div class="ms-2">
                                <h6 class="m-0 fw-bold" >{{$player->name}}</h6>
                                <p class="m-0 text-muted" >Player</p>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
                <hr class="d-block d-lg-none">
                    <div class="access-phone d-flex flex-column d-lg-none">
                        <h4>Biaya Pendaftaran</h4>
                        <h1>Rp. {{$usermabar->harga_tiket}} <span class="text-muted" >/orang</span> </h1>
                        <div class="two">{{$usermabar->tingkatan}} Tahun</div>
                    </div>
                    <hr class="d-block d-lg-none">
                    <div class="box-content d-block d-lg-none">
                        <table>
                            <tr>
                                <td>
                                    <div class="icon mx-auto" style="background: url(/css/img/calender.png); background-size: contain;"></div>
                                </td>
                                <td  style="font-family: opensans-bold;">Tanggal Pertandingan</td>
                            </tr>
                            <tr>
                                <td>
                                    
                                </td>
                                <td style="font-size: 13px;">{{$usermabar->tanggal_pertandingan}}</td>
                            </tr>
                            <td>
                                <div class="icon mx-auto" style="background: url(/css/img/clock.png); background-size: contain;"></div>
                            </td>
                            <td style="font-family: opensans-bold;">Lama Pertandingan</td>
                        </tr>
                        <tr>
                            <td>
                                
                            </td>
                            <td style="font-size: 13px;">{{$usermabar->lama_pertandingan}}</td>
                        </tr>
                        <td>
                            <div class="icon mx-auto" style="background: url(/css/img/target.png); background-size: contain;"></div>
                        </td>
                        <td style="font-family: opensans-bold;">Lokasi Mabar</td>
                        </tr>
                        <tr>
                            <td>
                                
                            </td>
                            <td style="font-size: 13px;" id="locationTarget" >{{$usermabar->lokasi}}</td>
                        </tr>
                            </table>
                    </div>
            </div>
            <div class=" offset-lg-1 col-lg-5 col-xl-4 col-12">
                <div class="box1 d-none d-lg-flex ">
                    <div class="access">
                        <h5>Biaya Pendaftaran</h5>
                        <h1>Rp. {{$usermabar->harga_tiket}} <span class="text-muted" >/orang</span> </h1>
                        <div class="two">{{$usermabar->tingkatan}} Tahun</div>
                    </div>
                    <div class="box-content ">
                        <table>
                            <tr>
                                <td>
                                    <div class="icon mx-auto" style="background: url(/css/img/calender.png); background-size: contain;"></div>
                                </td>
                                <td  style="font-family: opensans-bold;">Tanggal Pertandingan</td>
                            </tr>
                            <tr>
                                <td>
                                    
                                </td>
                                <td style="font-size: 13px;">{{$usermabar->tanggal_pertandingan}}</td>
                            </tr>
                            <td>
                                <div class="icon mx-auto" style="background: url(/css/img/clock.png); background-size: contain;"></div>
                            </td>
                            <td style="font-family: opensans-bold;">Lama Pertandingan</td>
                        </tr>
                        <tr>
                            <td>
                                
                            </td>
                            <td style="font-size: 13px;">{{$usermabar->lama_pertandingan}}</td>
                        </tr>
                            <td>
                                <div class="icon mx-auto" style="background: url(/css/img/target.png); background-size: contain;"></div>
                            </td>
                            <td style="font-family: opensans-bold;">Lokasi Mabar</td>
                        </tr>
                        <tr>

                            
                            <td></td>
                            <td style="font-size: 13px;" id="locationTarget"  >{{$usermabar->lokasi}} </td>
                        </tr>
                            </table>
                    </div>
                    @if ($usermabar->joinedUsers->count() == $usermabar->max_member )
                        <button class="ambil" type="submit">Mabar Penuh</button>
                    @else
                    <button class="ambil" data-bs-toggle="modal" data-bs-target="#exampleModal" >Ambil Mabar</button>
                        <form action="{{ route('mabar.join', ['id' => $usermabar->id]) }}" method="POST">
                            @csrf
                            <div class="modal" id="exampleModal" tabindex="-1">
                                <div class="modal-dialog modal-dialog-centered ">
                                  <div class="modal-content" style="width: 32vw" >
                                    <div class="modal-header bg-primary-mu">
                                      <div class="blank logo-sm rounded-circle d-inline-block"></div>
                                      <h5 class=" modal-title ">
                                        Bergabung Mabar <strong>{{$usermabar->title}}</strong>?
                                      </h5>
                                      <button type="button" class="btn-close btn-close-white"data-bs-dismiss="modal" aria-label="Close"></button>
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
                                                    <td style="font-size: 13px;">{{$usermabar->tanggal_pertandingan}}</td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <div class="icon mx-auto" style="background: url(/css/img/clock.png); background-size: contain;"></div>
                                                    </td>
                                                    <td style="font-family: opensans-bold;">Jadwal Mabar</td>
                                                </tr>
                                                <tr>
                                                    <td></td>
                                                    <td style="font-size: 13px;">{{$usermabar->lama_pertandingan}}</td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <div class="icon mx-auto" style="background: url(/css/img/target.png); background-size: contain;"></div>
                                                    </td>
                                                    <td style="font-family: opensans-bold;">Lokasi Mabar</td>
                                                </tr>
                                                <tr>
                                                    <td></td>
                                                    <td style="font-size: 13px;" id="locationTarget">{{$usermabar->lokasi}}</td>
                                                </tr>
                                            </table>
                                        <hr>
                                      <p> <strong style="color: red">Anda tidak akan bisa keluar setelah anda bergabung!!!</strong>, anda akan harus menunggu sampai mabar ini selesai</p>
                                    </div>
                                    <div class="modal-footer">
                                      <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                                      {{-- <button type="button" class="btn btn-danger">Keluar</button> --}}
                                      <button type="submit" class="btn" style="color: white; background-color: #FE6B00;" >Masuk</button>
                                    </div>
                                  </div>
                                </div>
                              </div>
                        </form>
                    @endif
                </div>
                <div class="box2 d-none d-lg-block">
                    <h5>Player</h5>
                    <div class="mabar-member">
                        {{-- <div class="member">
                            @if($usermabar->host)
                                <img class="member-logo rounded-circle " src="{{asset('storage/'. $usermabar->host->image)}}" >
                                <div class="ms-2">
                                    <h6 class="m-0" >{{$usermabar->host->name}}</h6>
                                    <p class="m-0" >Host</p>
                            </div>
                            @endif
                        </div> --}}
                        @foreach ($usermabar->players as $player)
                        <div class="member">
                            <img class="member-logo rounded-circle " src="{{asset('storage/'. $player->image)}}" >
                            <div class="ms-2">
                                <h6 class="fw-bold m-0" >{{$player->name}}</h6>
                                <p class="m-0 text-muted" >Player</p>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container fixed-bottom bg-white d-block d-lg-none">
        <div class="row phone-button">
            @if ($usermabar->joinedUsers->count() == $usermabar->max_member )
                        <button class="ambil" type="submit">Mabar Penuh</button>
                    @else
                        <form action="{{ route('mabar.join', ['id' => $usermabar->id]) }}" method="POST">
                            @csrf
                            <button class="ambil" type="submit">Ambil Mabar</button>
                        </form>
            @endif  
        </div>
    </div>
    <script src="/js/notification.js"></script>
    <section class="white-space" ></section> 
    <script src="/js/mapslist.js"></script>
    <script src="/js/detailsparring.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js" integrity="sha384-fbbOQedDUMZZ5KreZpsbe1LCZPVmfTnH7ois6mU1QK+m14rQ1l2bGBq41eYeM/fS" crossorigin="anonymous"></script>
</body>
</html>