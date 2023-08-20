<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Match Up</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <link rel="stylesheet" href="/css/userdetailnew.css">
    <link rel="stylesheet" href="/css/kompetisideatil.css">
    <link rel="stylesheet" href="/css/notification.css">
    <link rel="shortcut icon" type="image/x-icon" href="/css/img/vector.png">

</head> 
<body>
    <div id="notification" class="alert position-fixed notification justify-content-between mt-sm-4 mt-2 shadow-lg {{ session('notification') === 'Maaf, jumlah peserta acara Kompetisi telah mencapai batas maksimum!' || session('notification') === 'Anda telah bergabung dengan Kompetisi ini!' || session('notification') === 'Anda sudah terdaftar sebagai peserta Kompetisi ini!'  ? 'appear' : 'd-none' }}"  role="alert">
        <p class="d-inline-block p-0 m-0 " >{{ session('notification') }}</p>
        <button type="button" class="btn-close" onclick="closenotification()" aria-label="Close"></button>
    </div>
    <nav class="navbar navbar-expand-lg p-0 position-fixed bg-white" style="width: 100vw; z-index: 100;">
        <div class="container bg-ms-primary ">
          <a class="navbar-brand" href="/kompetisi/home"><img src="\css\img\back button.png" style="height: 28px;" alt=""></a>
          <span>Detail Kompetisi</span>
          <button data-bs-toggle="modal" data-bs-target="#report" class="report" style="background: url(/css/img/report.png); background-size: contain;" style="height: 28px;" ></button>
        </div>
    </nav>
    <div class="container content">
        <div class="row">
            <div class="col-12 col-lg-6">
                <div class="title">
                    <img class="userlogo rounded-circle" src="{{asset ('storage/' . $kompetisi->image)}}" >
                    <div class="ms-0 ms-sm-4 mt-3 mt-sm-0 " >
                        <h1 class="fw-bold" >{{$kompetisi->title}}</h1>
                        <div style="display: flex; align-items: center;" class="title-content">
                            <div class="sportlogo me-2"></div>
                            <span class="me-2">{{$kompetisi->olahraga}}</span>
                            <span>|{{$kompetisi->lokasi}}</span>
                        </div>
                    </div>
                </div>
                <hr>
                <div class="description">
                    <h5 class="fw-bold" >Deskripsi Kompetisi</h5>
                    <span class="des" style="font-size: 12px" >{{$kompetisi->deskripsi}}</span>
                </div>
                <hr>
                <div class="price">
                    <h5  class="fw-bold"  >Prize Pool</h5>
                    <div class="pricewrapper">
                        <div class="price-box">
                            <img src="/css/img/achievement.png" class="trophy mb-lg-0 mb-2">
                            <h5 class="d-inline-block ms-0 ms-lg-3 fw-bold" >Juara 1</h5>
                            <p class="mt-lg-2 mt-0" style="font-size: 12px" >{{$kompetisi->juara_pertama}}</p>
                        </div>
                        <div class="price-box">
                            <img src="/css/img/achievement.png" class="trophy mb-lg-0 mb-2">
                            <h5 class="d-inline-block ms-0 ms-lg-3 fw-bold" >Juara 2</h5>
                            <p class="mt-lg-2 mt-0" style="font-size: 12px" >{{$kompetisi->juara_kedua}}</p>
                        </div>
                        <div class="price-box">
                            <img src="/css/img/achievement.png" class="trophy mb-lg-0 mb-2">
                            <h5 class="d-inline-block ms-0 ms-lg-3 fw-bold" >Juara 1</h5>
                            <p class="mt-lg-2 mt-0" style="font-size: 12px" >{{$kompetisi->juara_ketiga}}</p>
                        </div>
                    </div>
                </div>
                <hr>
                <div class="maps pb-lg-5 pb-0">
                    <h5  class="fw-bold"  >Lokasi Sparring</h5>
                    <p style="font-size: 12px" class="des" id="detaillokasi" >{{$kompetisi->lokasi}}</p>
                    <iframe id="MapDisplay" ></iframe>
                </div>
                <hr class="d-block d-lg-none">
                <div class="d-block d-lg-none extra-description">
                    <h5>Deskripsi Tambahan</h5>
                    <span class="des">{{$kompetisi->description_tambahan}}</span>
                </div>
                <hr>
                <div class="box2-phone d-flex d-lg-none">
                    <h5>Member</h5>
                    <div class="mabar-member">
                        <div class="member">
                            <img class="member-logo rounded-circle " src="{{asset('storage/'. Auth::user()->image)}}"  style="object-fit: cover;">
                            <div class="ms-2">
                                <h6 class="m-0" >{{ Auth::user()->username}}</h6>
                                <p class="m-0" >Host</p>
                            </div>
                        </div>
                        
                    </div>
                </div>
                <hr class="d-block d-lg-none">
                    <div class="access-phone d-flex d-lg-none">
                        <h4>Biaya Pendaftaran</h4>
                        <h1>Rp. {{$kompetisi->harga_tiket}} <span class="text-muted" >/tim</span> </h1>
                        <div class="access-badge d-flex justify-content-center" >
                            <div class="two w-75">{{$kompetisi->tingkatan}} Tahun</div>
                        </div>
                    </div>
                    <hr class="d-block d-lg-none">
                    <div class="box-content d-block d-lg-none">
                        <table>
                            <tr>
                                <td>
                                    <div class="icon mx-auto"   ></div>
                                </td>
                                <td  style="font-family: opensans-bold;">Tanggal Pertandingan</td>
                            </tr>
                            <tr>
                                <td>
                                    
                                </td>
                                <td style="font-size: 13px;">{{$kompetisi->tanggal_pertandingan}}</td>
                            </tr>
                            <td>
                                <div class="icon mx-auto"></div>
                            </td>
                            <td style="font-family: opensans-bold;">Lama Pertandingan</td>
                        </tr>
                        <tr>
                            <td>
                                
                            </td>
                            <td style="font-size: 13px;">{{$kompetisi->lama_pertandingan}}</td>
                        </tr>
                        <td>
                            <div class="icon mx-auto"></div>
                        </td>
                        <td style="font-family: opensans-bold;">Lokasi Kompetisi</td>
                        </tr>
                        <tr>
                            <td>
                                
                            </td>
                            <td style="font-size: 13px;"  >{{$kompetisi->lokasi}} </td>
                        </tr>
                            </table>
                    </div>
            </div>
            <div class=" offset-lg-1 col-lg-5 col-xl-4 col-12">
                <div class="box1 d-none d-lg-flex ">
                    <div class="access w-100 d-flex justify-content-center border-0">
                        <h5>Biaya Pendaftaran</h5>
                        <h1 class="w-100 text-center" >Rp. {{$kompetisi->harga_tiket}}<span style="display: inline-block" class="text-muted" > /tim</span> </h1>
                        <div class="two">{{$kompetisi->tingkatan}} Tahun</div>
                    </div>
                    <div class="box-content ">
                        <table>
                            <tr>
                                <td width="10%" >
                                    <div class="icon mx-auto" style="background: url(/css/img/calender.png); background-size: contain;"></div>
                                </td>
                                <td width="90%" style="font-family: opensans-bold;">Tanggal Pertandingan</td>
                            </tr>
                            <tr>
                                <td width="10%" >
                                    
                                </td>
                                <td width="90%" style="font-size: 13px;">{{$kompetisi->tanggal_pertandingan}}</td>
                            </tr>
                            <tr>
                                <td  width="10%"  >
                                    <div class="icon mx-auto" style="background: url(/css/img/clock.png); background-size: contain;"></div>
                                </td>
                                <td width="90%" style="font-family: opensans-bold;">Lama Pertandingan</td>
                            </tr>
                            <tr>
                                <td width="10%">
                                    
                                </td>
                                <td width="90%" style="font-size: 13px;">{{$kompetisi->lama_pertandingan}} jam</td>
                            </tr>
                            <tr>
                                <td width="10%">
                                    <div class="icon mx-auto" style="background: url(/css/img/target.png); background-size: contain;"></div>
                                </td>
                                <td width="90%" style="font-family: opensans-bold;">Lokasi Mabar</td>
                            </tr>
                            <tr>
                                <td width="10%"></td>
                                <td width="90%" style="font-size: 13px;" id="locationTarget"  >{{$kompetisi->lokasi}} </td>
                            </tr>
                        </table>
                    </div>
                    @if ($DateNow > $kompetisi->tanggal_pertandingan)
                        <button class="ambil" style="background:#8F8F8F;" >Kompetisi Selesai</button>
                    @elseif ($kompetisi->joinedKompetisi->count() == $kompetisi->max_member)
                        <button class="ambil" >Kompetisi Penuh</button>
                    @elseif ($isJoined)
                        <button class="ambil" >Anda Telah Bergabung</button>
                    @else
                    <button class="ambil" data-bs-toggle="modal" data-bs-target="#exampleModal"  >Join Kompetisi</button>
                    <form action="{{ route('kompetisi.join', ['id' => $kompetisi->id]) }}" method="POST">
                        @csrf
                        <div class="modal" id="exampleModal" tabindex="-1">
                            <div class="modal-dialog modal-dialog-centered ">
                              <div class="modal-content" style="width: 32vw" >
                                <div class="modal-header bg-primary-mu">
                                  <div class="blank logo-sm rounded-circle d-inline-block"></div>
                                  <h5 class=" modal-title ">
                                    Bergabung Kompetisi <strong>{{$kompetisi->title}}</strong>?
                                  </h5>
                                  <button type="button" class="btn-close "data-bs-dismiss="modal" aria-label="Close"></button>
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
                                                <td style="font-size: 13px;">{{$kompetisi->tanggal_pertandingan}}</td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <div class="icon mx-auto" style="background: url(/css/img/clock.png); background-size: contain;"></div>
                                                </td>
                                                <td style="font-family: opensans-bold;">Jadwal Sparring</td>
                                            </tr>
                                            <tr>
                                                <td></td>
                                                <td style="font-size: 13px;">{{$kompetisi->lama_pertandingan}} jam</td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <div class="icon mx-auto" style="background: url(/css/img/target.png); background-size: contain;"></div>
                                                </td>
                                                <td style="font-family: opensans-bold;">Lokasi Sparring</td>
                                            </tr>
                                            <tr>
                                                <td></td>
                                                <td style="font-size: 13px;" id="locationTarget">{{$kompetisi->lokasi}}</td>
                                            </tr>
                                        </table>
                                    <hr>
                                  <p> <strong style="color: red">Anda tidak akan bisa keluar setelah anda bergabung!!!,</strong> anda akan harus menunggu sampai Kompetisi ini selesai</p>
                                </div>
                                <div class="modal-footer">
                                  <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                                  {{-- <button type="button" class="btn btn-danger">Keluar</button> --}}
                                  <button type="submit" class="btn" style="color: white; background-color: #FE6B00;" >Join</button>
                                </div>
                              </div>
                            </div>
                          </div>
                    </form>
                    @endif
                </div>
                <div class="box2 d-none d-lg-block">
                    <h5>Member</h5>
                    <div class="mabar-member">
                        @foreach ($kompetisi->playersKompetisi as $player)
                        <div class="member">
                            <img style="cursor: pointer" data-bs-toggle="modal" data-bs-target="#UserProfile{{ $player->id }}" class="member-logo rounded-circle " src="{{asset('storage/'. $player->image)}}" >
                            <form action="{{ route('tim.leave', ['id' => $kompetisi->id]) }}" method="POST">
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
                                                    <a style="{{ $length = strlen($player->instagram) > 0 ? 'opacity: 100%' : 'opacity: 50%' }}" href="{{ strlen($player->instagram) > 0 ? 'https://web.facebook.com/' . $player->facebook : '#' }}" class="facebook">
                                    
                                                    </a>
                                                    <a style="{{ $length = strlen($player->instagram) > 0 ? 'opacity: 100%' : 'opacity: 50%' }}" href="{{ strlen($player->instagram) > 0 ? 'https://wa.me/' . $player->whatsapp : '#' }}" class="whatapps">
                                    
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
                            <div class="ms-2">
                                <h6 class="m-0" data-bs-toggle="modal" style="cursor: pointer" data-bs-target="#UserProfile{{ $player->id }}" >{{$player->name}}</h6>
                                <p class="m-0" >Participants</p>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container fixed-bottom bg-white d-block d-lg-none">
        {{-- @if ($kompetisi->joinedKompetisi->count() == $kompetisi->max_member )
                        <button class="ambil" type="submit">Kompetisi Penuh</button>
                    @else
                        <form action="{{ route('kompetisi.join', ['id' => $kompetisi->id]) }}" method="POST">
                            @csrf
                            <button class="ambil" type="submit">JOIN KOMPETISI</button>
                        </form>
            @endif   --}}
    </div>
    <section class="white-space" ></section> 
    <script src="/js/mapslist.js"></script>
    <script>
    DetectMap();

    function DetectMap() {
        var Target = document.getElementById("locationTarget");
        var detail = document.getElementById("detaillokasi");
        var mapsview = document.getElementById("MapDisplay");

        for (let index = 0; index < maps.length; index++) {
            if (Target.innerHTML === maps[index].lokasi) {
                detail.innerHTML = maps[index].detaillokasi;
                mapsview.src = maps[index].embed
                break;
            }
        }
    }
    </script>
    <script src="/js/notification.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js" integrity="sha384-fbbOQedDUMZZ5KreZpsbe1LCZPVmfTnH7ois6mU1QK+m14rQ1l2bGBq41eYeM/fS" crossorigin="anonymous"></script>
</body>
</body>
</html>