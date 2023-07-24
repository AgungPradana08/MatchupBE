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
</head>
<body>otifica
    <div id="notification" class="alert position-absolute notification justify-content-between mt-sm-4 mt-2 {{ session('ntion') === 'Slot tim penuh' || session('notification') === 'Anda berhasil bergabung' ? 'appear' : 'd-none' }}"  role="alert">
        <p class="d-inline-block p-0 m-0 " >{{ session('notification') }}</p>
        <button type="button" class="btn-close btn-close-white" onclick="closenotification()" aria-label="Close"></button>
    </div>
    <nav class="navbar navbar-expand-lg p-0 position-fixed bg-white" style="width: 100vw; z-index: 100;">
        <div class="container bg-ms-primary ">
          <a class="navbar-brand" href="/tim/home"><img src="/css/img/back button.png" style="height: 5vh;" alt=""></a>
          <span>TITLE</span>
          <button class="report" style="background:  url(/css/img/report.png); background-size: contain;" ></button>
        </div>
    </nav>
    <div class="container content">
        <div class="row">
            <div class="col-12 col-lg-6">
                <div class="title">
                    <img class="userlogo rounded-circle" src="{{asset ('storage/' . $tim->image)}}" >
                    <div class="ms-0 ms-sm-4 mt-3 mt-sm-0 " >
                        <h1>{{$tim->title}}</h1>
                        <div style="display: flex; align-items: center;" class="title-content">
                            <div class="sportlogo me-2" style="background: url(/css/img/futsal.jpg); background-size: contain; "></div>
                            <span class="me-2">{{$tim->olahraga}}</span>
                            <span>| {{$tim->lokasi}}</span>
                        </div>
                    </div>
                </div>
                <hr>
                <div class="description">
                    <h4>Deskripsi Mabar</h4>
                    <span class="des">{{$tim->deskripsi}}</span>
                </div>
                <hr>
                <div class="left3">
                    <div style="display: flex; justify-content: space-between;" >
                        <h4>Member Tim</h4>
                        <h4>1/12</h4>
                    </div>
                    <div class="maps">
                        <div class="box">
                            <div class="box-logo">
                            </div>
                            <span style="margin-left: 5%;" >
                                <p class="username-label m-0" style="font-family: opensans-bold;" >USERNAME</p>
                                <p class="lore-label m-0 mt-2">Lore</p>
                            </span>
                        </div>
                    </div>
                </div>
                <section class="white-space d-none d-lg-block" ></section> 
                <hr class="d-block d-lg-none">
                    <div class="access-phone d-flex flex-column d-lg-none">
                        <h4>Biaya Pendaftaran</h4>
                        <h1>Rp. {{$tim->harga_tiket}} <span class="text-muted" >/tim</span> </h1>
                        <div class="two">{{$tim->tingkatan}}</div>
                    </div>
                    <hr class="d-block d-lg-none">
                    <div class="box-content d-block d-lg-none">
                        <table>
                            <tr>
                                <td>
                                    <div class="icon mx-auto"   ></div>
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
                        <h4>Biaya Pendaftaran</h4>
                        <h1>Rp. {{$tim->harga_tiket}} <span class="text-muted" >/orang </span> </h1>
                        <div class="two">{{$tim->tingkatan}}</div>
                    </div>
                    <div class="box-content ">
                        <table>
                            <tr>
                                <td>
                                    <div class="icon mx-auto"   ></div>
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
                    <button>Bergabung Sekarang</button>
                </div>
            </div>
        </div>
    </div>
    <div class="container fixed-bottom bg-white d-block d-lg-none">
        <div class="row phone-button">
            <a class="col-12 href="">Bergabung Sekarang</a>
        </div>
    </div>
    <script src="/js/notification.js"></script>
    <section class="white-space" ></section>

</body>
</html>