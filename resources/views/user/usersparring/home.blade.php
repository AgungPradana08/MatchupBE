<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Match Up</title>
    <link rel="stylesheet" href="/css/user-sparring.css">
</head>
<body>
    <section class="navbar" >
        <div class="navbar-left">
            <a class="logo" href="/sparring/home">
        
            </a>
            <!-- <div style="margin-left: 7%;" class="logo">

            </div> -->
            <a class="home" href="/userprofile/home" >Profil</a>
            <a class="tentang" href="#"style="color: #FE6B00; ">Sparring</a>
            <a class="mabar" href="/usermabar/home" >Mabar</a>
            <a class="kontak" href="/usertim/home" >Tim</a>
        </div>
    </section>
    <section class="sparring-search" >
        <div class="input-box">
            <!-- <img class="icon-box" src="css/img/search.png" alt=""> -->
            <div style="background: url(/css/img/search.png); background-position: center; background-size: contain;" class="icon-box">
            </div>
            <input type="text" placeholder="Cari Nama Sparring..." >
        </div>
        <div class="input-box">
            <div style="background: url(/css/img/location.png); background-position: center; background-size: contain;" class="icon-box">
            </div>
            <select name="" id="" >
                <option value="" disabled selected hidden>Pilih Lokasi Olahraga</option>
                <option value="">ITEM 1</option>
                <option value="">ITEM 1</option>
                <option value="">ITEM 1</option>
            </select>
        </div>
        <div class="input-box">
            <div style="background: url(/css/img/keyword.png); background-position: center; background-size: contain;" class="icon-box">
            </div>
            <select name="" id="" >
                <option value="" disabled selected hidden>Pilih Cabang Olahraga...</option>
                <option value="">ITEM 1</option>
                <option value="">ITEM 1</option>
                <option value="">ITEM 1</option>
            </select>
        </div>
        <button class="search" >
            Cari
        </button>
    </section>
    <section class="box-wrapper">
        @foreach ($usersparring as $usersparring)
            <div class="box" href="Sparringdetail.html" >
                <a href="Sparringdetail.html">
                <button class="box-outer" style="width: 100%; height: 100%;" >
                    <div class="box-top">
                        <div class="edit-data">
                            <a class="see-button" href="/usersparring/{{$usersparring->id}}/usersparringdetail" >
                            </a>
                            <a class="edit-button" href="/usersparring/{{$usersparring->id}}/usersparringedit"></a>
                        </div>
                        <img class="box-logo" src="{{asset('storage/'. $usersparring->image)}}" alt="">
                        <div style="margin-left: 5%; width: 60%;" >
                            <p style="font-size: 0.8vw;" >Sparring | {{$usersparring->olahraga}}</p>
                            <p style="font-size: 1.5vw; font-family: opensans-bold; margin-top: 3%;" >{{$usersparring->title}}</p>
                            <div class="access">
                                {{$usersparring->aksebilitas}}
                            </div>
                            <div class="age">
                                {{$usersparring->tingkatan}}
                            </div>
                        </div>
                    </div>
                    <div class="box-bottom">
                        <div class="line">
                            
                            <div style="background: url(/css/img/calender.png); background-position: center; background-size: contain;" class="bottom-icon">

                            </div>
                            {{$usersparring->tanggal_pertandingan}}
                        </div>
                        <div class="line">
                            
                            <div style="background: url(/css/img/target.png); background-position: center; background-size: contain;" class="bottom-icon">

                            </div>
                            {{$usersparring->lokasi}}
                        </div>
                        <div class="line">
                            <div style="background: url(/css/img/price.png); background-position: center; background-size: contain;" class="bottom-icon">

                            </div>
                            {{$usersparring->harga_tiket}}
                        </div>
                    </div>

                </button>
                </a>
            </div>
        @endforeach
    </section> 
    <section class="white-space" ></section>   
    <a href="/usersparring/usersparringtambah" class="add-sparring" >+</a>
</body>
</html>