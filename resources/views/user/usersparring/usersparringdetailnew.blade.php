<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <link rel="stylesheet" href="/css/detailsparringnewnew.css">
    <link rel="stylesheet" href="/css/notification.css">
    <link rel="shortcut icon" type="image/x-icon" href="/css/img/vector.png">

</head>
<body>
    <div id="notification" class="alert position-fixed notification justify-content-between mt-sm-4 mt-2 {{ session('notification') === 'Maaf, Anda harus bergabung dengan tim terlebih dahulu sebelum dapat bergabung dengan Sparring!' || session('notification') === 'Anda sudah terdaftar sebagai peserta Sparring ini!' || session('notification') === 'Anda telah bergabung dengan Sparring!'  ? 'appear' : 'd-none' }}"  role="alert">
        <p class="d-inline-block p-0 m-0 " >{{ session('notification') }}</p>
        <button type="button" class="btn-close btn-close-white" onclick="closenotification()" aria-label="Close"></button>
    </div>
    <nav class="navbar navbar-expand-lg p-0 position-fixed bg-white" style="width: 100vw; z-index: 100;">
        <div class="container bg-ms-primary ">
          <a class="navbar-brand" href="/sparring/home"><img src="\css\img\back button.png" style="height: 5vh;" alt=""></a>
          <span>Detail Sparring</span>
          <button class="report" style="background: url(/css/img/report.png); background-size: contain;" ></button>
        </div>
    </nav>
    <div id="Versus" class="container2">
        <a class="detail" id="detail-bookmark" onclick="detailSparring()" href="#Detail">Detail</a>

        <div class="vs-away-home">
            <div id="awayteam" class="vs-away"></div>
            <div id="hometeam" class="vs-home"></div>
        </div>
        <div class="vs-detail">
                <div class="de-away me-5">
                    <img src="/css/img/psg.png" class="box-icon"  alt="">
                    @if ($usersparring->joinedSparrings)
                        @foreach ($usersparring->joinedSparrings as $sparring)
                            @if ($sparring->pivot->nama_tim_lawan)
                                <p style="margin-top: 5%;">{{ $sparring->pivot->nama_tim_lawan }}</p>
                            @else
                                <p style="margin-top: 5%;">???</p>
                            @endif
                        @endforeach
                    @else
                        <p style="margin-top: 5%;">Belum ada sparring yang diikuti</p>
                    @endif

                </div>
                <div class="de-vs">
                    VS
                </div>
                <div class="de-home ms-5 ">
                    <img src="{{asset ('storage/' . $usersparring->image)}}" class="box-icon"  alt="">
                    <p style="margin-top: 5%;" >{{$usersparring->nama_tim}}</p>
                </div>
                {{-- <div class="de-detail">
                    <table>
                        <tr>
                            <td class="td1" >

                            </td>
                            <td style="opacity: 70%" >

                                harga
                            </td>
                            <td>
                                {{$usersparring->harga_tiket}}
                            </td>
                        </tr>
                        <tr>
                            <td class="td2">

                            </td>
                            <td style="opacity: 70%" >
                                Tanggal dan waktu
                            </td>
                            <td>
                                {{$usersparring->tanggal_pertandingan}}
                            </td>
                        </tr>
                        <tr>
                            <td class="td3">

                            </td>
                            <td style="opacity: 70%" >
                                Lokasi/Avenue
                            </td>
                            <td>
                                {{$usersparring->lokasi}}
                            </td>
                        </tr>
                        <tr>
                            <td class="td4">

                            </td>
                            <td  style="opacity: 70%"  >
                                Lama Permainan
                            </td>
                            <td>
                                {{$usersparring->lama_pertandingan}}
                            </td>
                        </tr>
                    </table>
                </div> --}}
                {{-- <div class="de-button">
                    <a class="primary" href="/usersparring/versus">
                        <button>AMBIL SPARRING</button>
                    </a>
                </div> --}}
        </div>

    </div>
    
</div>
    <div class="container content">
        <div class="row">
            <div class="col-12 col-lg-6">
                <div class="title">
                    <img class="userlogo rounded-circle" src="{{asset ('storage/' . $usersparring->image)}}" >
                    <div class="ms-0 ms-sm-4 mt-3 mt-sm-0" >
                        <h1>{{$usersparring->title}}</h1>
                        <div style="display: flex; align-items: center;" class="title-content">
                            <div class="sportlogo me-2" style="background: url(/css/img/futsal.jpg); background-size: contain;"></div>
                            <span class="me-2">{{$usersparring->olahraga}}</span>
                            <span>| {{$usersparring->lokasi}}</span>
                        </div>
                    </div>
                </div>
                <hr>
                <div class="description">
                    <h4>Deskripsi Sparring</h4>
                    <span class="des">{{$usersparring->deskripsi}}</span>
                </div>
                <hr>
                <div class="maps pb-lg-5 pb-0">
                    <h4>Lokasi Sparring</h4>
                    <p class="des " id="detaillokasi" >{{$usersparring->lokasi}}</p>
                    <iframe id="MapDisplay" class="maps"></iframe>
                </div>
                <hr class=" d-block d-lg-none">
                <div class="d-block d-lg-none extra-description">
                    <h4>Deskripsi Tambahan</h4>
                    <span class="des">{{$usersparring->deskripsi_tambahan}}</span>
                </div>
                <hr class=" d-block d-lg-none">
                    <div class="access-phone d-block d-lg-none">
                        <h4>Biaya Pendaftaran</h4>
                        <h1 class="m-0" >Rp. 750,000<span class="text-muted m-0 p-0" >/tim</span> </h1>
                        <div class="access-badge" >
                            <div class="one">{{$usersparring->aksebilitas}}</div>
                            <div class="two">{{ $usersparring->tingkatan }} Tahun</div>
                        </div>
                    </div>
                    <hr class=" d-block d-lg-none">
                    <div class="box-content d-block d-lg-none">
                        <table>
                            <tr>
                                <td>
                                    <div class="icon mx-auto" style="background: url(/css/img/calender.png); background-size: contain;"  ></div>
                                </td>
                                <td  style="font-family: opensans-bold;">tanggal Permainan</td>
                            </tr>
                            <tr>
                                <td>
                                    
                                </td>
                                <td style="font-size: 13px;">{{$usersparring->tanggal_pertandingan}}</td>
                            </tr>
                            <td>
                                <div class="icon mx-auto" style="background: url(/css/img/clock.png); background-size: contain;"></div>
                            </td>
                            <td style="font-family: opensans-bold;">Jadwal Sparring</td>
                        </tr>
                        <tr>
                            <td>
                                
                            </td>
                            <td style="font-size: 13px;">{{$usersparring->lama_pertandingan}}</td>
                        </tr>
                        <td>
                            <div class="icon mx-auto" style="background: url(/css/img/target.png); background-size: contain;"></div>
                        </td>
                        <td style="font-family: opensans-bold;">Lokasi Sparring</td>
                        </tr>
                        <tr>
                            <td>
                                
                            </td>
                            <td style="font-size: 13px;" id="locationTarget" >{{$usersparring->lokasi}}</td>
                        </tr>
                        </table>
                    </div>
            </div>
            <div class=" offset-lg-1 col-lg-5 col-xl-4 col-12">
                <div class="box1 d-none d-lg-flex w-100 ">
                    <div class="access w-100 d-flex justify-content-center border-0">
                        <h4>Biaya Pendaftaran</h4>
                        <h1>Rp. 750,000<span class="text-muted" >/tim</span> </h1>
                        <div class="two">{{$usersparring->tingkatan}} Tahun</div>
                    </div>
                    <div class="box-content ">
                        <table>
                            <tr>
                                <td>
                                    <div class="icon mx-auto" style="background: url(/css/img/calender.png); background-size: contain;"  ></div>
                                </td>
                                <td  style="font-family: opensans-bold;">tanggal Permainan</td>
                            </tr>
                            <tr>
                                <td>
                                    
                                </td>
                                <td style="font-size: 13px;">{{$usersparring->tanggal_pertandingan}}</td>
                            </tr>
                            <td>
                                <div class="icon mx-auto" style="background: url(/css/img/clock.png); background-size: contain;"></div>
                            </td>
                            <td style="font-family: opensans-bold;">Jadwal Sparring</td>
                        </tr>
                        <tr>
                            <td>
                                
                            </td>
                            <td style="font-size: 13px;">{{$usersparring->lama_pertandingan}}</td>
                        </tr>
                        <td>
                            <div class="icon mx-auto" style="background: url(/css/img/target.png); background-size: contain;"></div>
                        </td>
                        <td style="font-family: opensans-bold;">Lokasi Sparring</td>
                        </tr>
                        <tr>
                            <td>
                                
                            </td>
                            <td style="font-size: 13px;" id="locationTarget" >{{$usersparring->lokasi}}</td>
                        </tr>
                        </table>
                    </div>
                    <form action="{{ route('sparring.join', ['id' => $usersparring->id]) }}" method="POST">
                        @csrf
                        <button class="ambil" type="submit">Ambil Sparring</button>
                    </form>
                </div>
                <div class="box2 d-none d-lg-block">
                    <h5>Deskripsi Tambahan</h5>
                    <span>{{$usersparring->deskripsi_tambahan}}</span>
                </div>
            </div>
        </div>
    </div>
    <div class="container fixed-bottom bg-white d-block d-lg-none">
        <form action="{{ route('sparring.join', ['id' => $usersparring->id]) }}" method="POST" class="row phone-button">
            @csrf
            <button class="col-12 ambil" type="submit" >Ambil Sparring</button>
        </form>
    </div>
    <script src="/js/notification.js"></script>
    <script src="/js/mapslist.js"></script>
    <script src="/js/detailsparring.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js" integrity="sha384-fbbOQedDUMZZ5KreZpsbe1LCZPVmfTnH7ois6mU1QK+m14rQ1l2bGBq41eYeM/fS" crossorigin="anonymous"></script>
</body>
</html>