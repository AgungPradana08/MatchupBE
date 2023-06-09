<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Match up</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <link rel="stylesheet" href="/css/userteam.css">
</head>
<body>
    <nav class="navbar navbar-expand-sm p-0 position-fixed bg-white " style="width: 100vw; z-index: 100;">
        <div class="container bg-ms-primary ">
          <a class="navbar-brand" href="#"><img src="/css/img/back button.png" style="height: 5vh;" alt=""></a>
          <div class="collapse navbar-collapse"  id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
              <li class="nav-item mx-0 mx-lg-2">
                <a class="nav-link text-start text-lg-center " aria-current="page" href="/userprofile/home"><span>Profile</span></a>
              </li>
              <li class="nav-item mx-0 mx-lg-2">
                <a class="nav-link text-start text-lg-center " aria-current="page" href="/usersparring/home"><span>Sparring</span></a>
              </li>
              <li class="nav-item mx-0 mx-lg-2">
                <a class="nav-link text-start text-lg-center" aria-current="page"href="/usermabar/home"><span>Mabar</span></a>
              </li>
              <li class="nav-item mx-0 mx-lg-2">
                <a class="nav-link text-start text-lg-center active" aria-current="page" href="/usertim/home"><span>Tim</span></a>
              </li>
            </ul>
          </div>
        </div>
    </nav>
    <div class="container"></div>
        <section class="container sparring-search " >
            <form action="/mabar/search" class="wrapper" method="get">
                <div style="grid-area: search1;" >
                    <div class="icon icon-name" ></div>
                    <input id="sparringname" type="search" name="search" style="font-size: 13px" type="text" placeholder="masukkan nama">
                </div>
                <div style="grid-area: search2;">
                    <div class="icon icon-location"></div>
                    <input class="Searchmap" placeholder="Masukkan nama lokasi..." style="font-size: 13px" id="sparringlocation" name="lokasi" type="search" autocomplete="off" list="location_list" type="text" 			onchange="InputChange()" >
                    <datalist id="location_list" >
                        
                    </datalist>
                </div>
                <div style="grid-area: search3;">
                    <div class="icon icon-sport"></div>
                    <select class="searchsport" name="olahraga" style="font-size: 13px" id="sparringsport" onchange="InputChange()" >
                        <option value="">Pilih Cabang Olahraga...</option>
                        <option value="Futsal">Futsal</option>
                        <option value="Sepak Bola">Sepak Bola</option>
                        <option value="Badminton">Badminton</option>
                        <option value="Ping Pong">Ping Pong</option>
                        <option value="Renang">Renang</option>
                    </select>
                </div>
                <button style="grid-area: button;">CARI</button>
            </form>
        </section>          
    </div>
    <div class="container">
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
                    <div class="box-logo  rounded-circle">
    
                    </div>
                    <div style=" width: 60%;" class="letter-container" >
                        <p style="font-size: 12px;" >Futsal</p>
                        <p style="font-size: 20px; font-family: opensans-bold; margin-top: 3%;" >TITLE</p>
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
                    <div style="width: 100%; display: flex; justify-content: center; align-items: center;" >
                        <p class="p-0 m-0 me-1" >
                         Slot Tersedia
                        </p>
                        <div style="color: #FE6B00; font-family: opensans-bold" class="slot-access">
                         0/12
                         </div>
                     </div>
                </div>
               </button>
            </a>
        </div>
        </section> 
        
    </div>
    <div class="container fixed-bottom bottom-nav  d-block d-sm-none ">
        <div class="row">
            <a href="/userprofile/home" class="col-3">
                <div class="bottom-nav-icon" style="background: url(/css/img/userwhite.png); background-size: contain;" ></div>
                <p class="m-0">Profile</p>
            </a>
            <a href="/usersparring/home" class="col-3">
                <div class="bottom-nav-icon" style="background: url(/css/img/bn-sparring.png); background-size: contain;"></div>
                <p class="m-0">Sparring</p>
            </a>
            <a href="/usermabar/home" class="col-3">
                <div class="bottom-nav-icon" style="background: url(/css/img/bn-mabar.png); background-size: contain;"></div>
                <p class="m-0">Mabar</p>
            </a>
            <a href="/usertim/home" class="col-3">
                <div class="bottom-nav-icon" style="background: url(/css/img/bn-tim.png); background-size: contain;"></div>
                <p class="m-0">Tim</p>
            </a>    
        </div>
    </div>
    <section class="white-space" ></section>
    <a href="tambahsparring.html" class="add-sparring" >+</a> 
    <script src="/js/mapslist.js"></script>
    <script src="/js/searchhome.js"></script>
</body>
</html>