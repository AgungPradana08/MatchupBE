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
            <a style="background: url(/css/img/back\ button.png); background-position: center; background-repeat: no-repeat; " class="logo" href="/sparring/home">
        
            </a>
            <!-- <div style="margin-left: 7%;" class="logo">

            </div> -->
            <a class="home" href="/userprofile/home" >Profil</a>
            <a class="tentang" href="/usersparring/home">Sparring</a>
            <a class="mabar" href="/usermabar/home"  >Mabar</a>
            <a class="kontak" href="#" style="color: #FE6B00; " >Tim</a>
        </div>
    </section>
    <div class="container">
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
            
    </div>
</body>
</html>