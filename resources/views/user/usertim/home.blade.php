<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Match up</title>
    <link rel="stylesheet" href="/css/userteam.css">
</head>
<body>
    <section class="navbar" >
        <div class="navbar-left">
            <a class="logo" href="/sparring/home">
        
            </a>
            <!-- <div style="margin-left: 7%;" class="logo">

            </div> -->
            <a class="home" href="/userprofile/home" >Profil</a>
            <a class="tentang" href="/usersparring/home">Sparring</a>
            <a class="mabar" href="/usermabar/home" >Mabar</a>
            <a class="kontak" href="/usertim/home" style="color: #FE6B00;"  >Tim</a>
        </div>
    </section>
    <div class="container">
        <section class="sparring-search" >
            <div class="input-box">
                <!-- <img class="icon-box" src="css/img/search.png" alt=""> -->
                <div style="background: url(/css/img/search.png); background-position: center; background-size: contain;" class="icon-box">
                </div>
                <form action="/sparring/search" method="GET">
                    <input class="searchname" id="sparringname" type="search" name="search" onchange="InputChange()" placeholder="Cari Nama Sparring...">
                    </div>
                    <div class="input-box">
                        <div style="background: url(/css/img/location.png); background-position: center; background-size: contain;" class="icon-box">
                        </div>
                        <input class="Searchmap" placeholder="Masukkan nama lokasi..." id="sparringlocation" name="lokasi" type="search" autocomplete="off" list="location_list" type="text" onchange="InputChange()" >
                        <datalist id="location_list" >
                            {{-- <option value="Markas">Markas Sport Center, Jalan Jendral Sudirman, Rendeng, Kudus Regency, Central Java</option>
                            <option value="Berlian">Berlian Sport Centre, Jalan Lingkar Utara Kudus, Ledok, Karangmalang, Kabupaten Kudus, Jawa Tengah</option> --}}
                        </datalist>
                    </div>
                    <div class="input-box">
                        <div style="background: url(/css/img/keyword.png); background-position: center; background-size: contain;" class="icon-box">
                        </div>
                        <select class="searchsport" name="olahraga"  id="sparringsport" onchange="InputChange()" >
                            <option value="">Pilih Cabang Olahraga...</option>
                            <option value="Futsal">Futsal</option>
                            <option value="Sepak Bola">Sepak Bola</option>
                            <option value="Badminton">Badminton</option>
                            <option value="Ping Pong">Ping Pong</option>
                            <option value="Renang">Renang</option>
                        </select>
                    </div>
                    <button class="search" type="submit">
                        Cari
                    </button>
                </form>
        </section>
        <section class="box-wrapper">
            <div class="box" >
            <a href="timdetail.html" >
               <button class="box-outer" style="width: 100%; height: 100%;" >
                <div class="box-top">
                    <div class="edit-data">
                        <a class="see-button" href="timdetail.html">
                        </a>
                        <a class="edit-button" href="ubahtim.html"></a>
                    </div>
                    <div class="box-logo">
    
                    </div>
                    <div style="margin-left: 5%; width: 60%;" >
                        <p style="font-size: 0.8vw;" >Futsal</p>
                        <p style="font-size: 1.5vw; font-family: opensans-bold; margin-top: 3%;" >TITLE</p>
                        <div class="access">
                            Terbuka
                        </div>
                        <div class="age">
                            15-17
                        </div>
                    </div>
                </div>
                <div class="box-bottom">    
                    <span style="height: 40vh;" >deskripsi</span>
                    <hr>
                    <div style="width: 100%; display: flex; justify-content: space-between; align-items: center;" >
                        <p>
                         Slot Tersedia
                        </p>
                        <div style="color: #FE6B00;" class="slot-access">
                         0/12
                         </div>
                     </div>
                </div>
               </button>
            </a>
        </div>
        </section> 
        <section class="white-space" ></section>
        <a href="tambahsparring.html" class="add-sparring" >+</a> 
        <script src="/js/mapslist.js"></script>
        <script src="/js/searchhome.js"></script>
            
    </div>
</body>
</html>