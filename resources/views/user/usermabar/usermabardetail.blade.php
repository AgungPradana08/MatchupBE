<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Match Up</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <link rel="stylesheet" href="/css/mabardetail.css">
</head>
<body>
    <nav class="navbar navbar-expand-lg p-0 position-fixed bg-white" style="width: 100vw; z-index: 100;">
        <div class="container bg-ms-primary ">
          <a class="navbar-brand" href="/mabar/home"><img src="/css/img/back button.png" style="height: 5vh;" alt=""></a>
          <span>DETAIL</span>
          <button class="report" style="background:  url(/css/img/report.png); background-size: contain;" ></button>
        </div>
    </nav>
    <div class="container content">
        <div class="row">
            <div class="col-12 col-lg-6">
                <div class="title">
                    <img class="userlogo rounded-circle" src="{{asset ('storage/' . $usermabar->image)}}" >
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
                    <h4>Lokasi Sparring</h4>
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
                            <img class="member-logo rounded-circle " src="{{asset('storage/'. $player->image)}}" >
                            <div class="ms-2">
                                <h6 class="m-0" >{{$player->name}}</h6>
                                <p class="m-0" >Player</p>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
                <hr class="d-block d-lg-none">
                    <div class="access-phone d-flex flex-column d-lg-none">
                        <h4>Biaya Pendaftaran</h4>
                        <h1>Rp. {{$usermabar->harga_tiket}} <span class="text-muted" >/tim</span> </h1>
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
                            <td style="font-size: 13px;">{{$usermabar->lama_pertandingan}} jam</td>
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
                        <h4>Biaya Pendaftaran</h4>
                        <h1>Rp. {{$usermabar->harga_tiket}} <span class="text-muted" >/tim</span> </h1>
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
                            <td style="font-size: 13px;">{{$usermabar->lama_pertandingan}} Jam</td>
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
                    <form action="{{ route('mabar.join', ['id' => $usermabar->id]) }}" method="POST">
                        @csrf
                        <button class="ambil" type="submit">Ambil Mabar</button>
                    </form>
                </div>
                <div class="box2 d-none d-lg-block">
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
                            <img class="member-logo rounded-circle " src="{{asset('storage/'. $player->image)}}" >
                            <div class="ms-2">
                                <h6 class="m-0" >{{$player->name}}</h6>
                                <p class="m-0" >Player</p>
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
            <a class="col-12 href="">Ambil Mabar</a>
        </div>
    </div>
    <section class="white-space" ></section> 
    <script src="/js/mapslist.js"></script>
    <script src="/js/detailsparring.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js" integrity="sha384-fbbOQedDUMZZ5KreZpsbe1LCZPVmfTnH7ois6mU1QK+m14rQ1l2bGBq41eYeM/fS" crossorigin="anonymous"></script>
</body>
</html>