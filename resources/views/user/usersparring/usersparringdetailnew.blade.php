<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <link rel="stylesheet" href="/css/detailsparringnewnew.css">
</head>
<body>
    <nav class="navbar navbar-expand-lg p-0 position-fixed bg-white" style="width: 100vw; z-index: 100;">
        <div class="container bg-ms-primary ">
          <a class="navbar-brand" href="/sparring/home"><img src="\css\img\back button.png" style="height: 5vh;" alt=""></a>
          <span>Detail Sparring</span>
          <button class="report" style="background: url(/css/img/report.png); background-size: contain;" ></button>
        </div>
    </nav>
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
                        <h1>Rp. 750,000 <span class="text-muted" >/tim</span> </h1>
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
                <div class="box1 d-none d-lg-flex ">
                    <div class="access">
                        <h4>Biaya Pendaftaran</h4>
                        <h1>Rp. 750,000 <span class="text-muted" >/tim</span> </h1>
                        <div class="access-badge" >
                            <div class="two">{{$usersparring->tingkatan}} Tahun</div>
                        </div>
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
                    <button>Ambil Sparring</button>
                </div>
                <div class="box2 d-none d-lg-block">
                    <h5>Deskripsi Tambahan</h5>
                    <span>{{$usersparring->deskripsi_tambahan}}</span>
                </div>
            </div>
        </div>
    </div>
    <div class="container fixed-bottom bg-white d-block d-lg-none">
        <div class="row phone-button">
            <a class="col-12 href="">Ambil Sparring</a>
        </div>
    </div>
    
    <script src="/js/mapslist.js"></script>
    <script src="/js/detailsparring.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js" integrity="sha384-fbbOQedDUMZZ5KreZpsbe1LCZPVmfTnH7ois6mU1QK+m14rQ1l2bGBq41eYeM/fS" crossorigin="anonymous"></script>
</body>
</html>