<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Match up</title>
    <link rel="stylesheet" href="/css/userdetailnew.css">
</head>
<body>
    <section class="navbar" >
        <div class="navbar-left">
            <a class="logo" href="/sparring/home">
        
            </a>
            <!-- <div style="margin-left: 7%;" class="logo">

            </div> -->
            <a class="home" href="#" >Profil</a>
            <a class="tentang" href="/usersparring/home">Sparring</a>
            <a class="mabar" href="/usermabar/home" >Mabar</a>
            <a class="kontak" href="/usertim/home" >Tim</a>
            <a class="kontak"href="/logout">Logout</a>
        </div>
    </section>
    <div class="content">
<<<<<<< HEAD
        <div class="content-upper">
                <div class="add-image">
                    <div class="image-box">
                        <!-- <button class="edit-image">
                        </button> -->
                    </div>
                    <div class="setting">

                    </div>
                </div>
            <div class="usertitle">
                <h3>{{ Auth::user()->name}}</h3>
                <div class="social">
                    <a class="instagram" href="#">
                        <img src="/css/img/instagram.jpg" height="25px" alt="">
                    </a>
                    <a class="whatapps" href="#">
                        <img src="/css/img/whatapps.jpg" height="25px" alt="">
                    </a>
                    <a class="facebook" href="#">
                        <img src="/css/img/facebook.jpg" height="25px" alt="">
                    </a>
=======
        <div class="background"></div>
        <div class="profile">
            <div class="image-box" >
                <img class="img-preview"  alt="">  
                <div class="edit-image">
                    <label for="image">
                      <img class="image-box-1" style="border-radius: 100%" height="35px" src="/css/img/add-image.jpg">
                    </label>
                  
                    <input  style="display: none" type="file" id="image" name="image" onchange="previewImage()">
>>>>>>> c63c912971bba0a09c970f2ccb7313813bcb825d
                </div>
            </div>
            <span class="username" >Username</span>
            <span class="name" >Name</span>
            <hr>
            <span class="deskripsi" >Deskripsi</span>
            <div class="social">
                <div class="instagram">

                </div>
                <div class="facebook">

                </div>
                <div class="whatapps">

                </div>
            </div>
            <hr>
            <div class="bio">
                <div class="opening">
                    Bio Data
                    <button id="next-bio" class="icon-small" onclick="bio()" >

                    </button>
                </div>
                <div id="biocontent"  style="padding: 2%" >
                    <table >
                        <tr>
                            <td class="bio1" >
                                <div class="center" >
                                    <div class="icon"></div>
                                </div>
                            </td>
                            <td>
                                Gender
                            </td>
                            <td>
                                L/P
                            </td>
                        </tr>
                        <tr>
                            <td class="bio1">
                                <div class="center" >
                                    <div class="icon"></div>
                                </div>
                            </td>
                            <td>
                                Usia
                            </td>
                            <td>
                                Tahun
                            </td>
                        </tr>
                        <tr>
                            <td class="bio1">
                                <div class="center" >
                                    <div class="icon"></div>
                                </div>
                            </td>
                            <td>
                                Berat Badan
                            </td>
                            <td>
                                Kg
                            </td>
                        </tr>
                        <tr>
                            <td class="bio1">
                                <div class="center" >
                                    <div class="icon"></div>
                                </div>
                            </td>
                            <td>
                                Tinggi Badan
                            </td>
                            <td>
                                CM
                            </td>
                        </tr>
                    </table>
                </div>
                {{-- <div class="bio-wrapper">
                    <div class="bio-row">
                        <div class="icon"></div>
                        <span>gender</span>
                        <span>L/P</span>
                    </div>
                    <div class="bio-row">
                        <div class="icon"></div>
                        <span>gender</span>
                        <span>L/P</span>
                    </div>
                    <div class="bio-row">
                        <div class="icon"></div>
                        <span>gender</span>
                        <span>L/P</span>
                    </div>
                    <div class="bio-row">
                        <div class="icon"></div>
                        <span>gender</span>
                        <span>L/P</span>
                    </div>
                </div> --}}
                {{-- <div class="bio-wrapper">
                    <span>
                        <div class="icon"></div>
                        gender
                    </span>
                    <span>
                        L/P
                    </span>
                    <span>
                        <div class="icon"></div>
                        Usia
                    </span>
                    <span>
                        Tahun
                    </span>
                    <span>
                        <div class="icon"></div>
                        Berat Badan
                    </span>
                    <span>
                        kg
                    </span>
                    <span>
                        <div class="icon"></div>
                        Tinggi Dadan
                    </span>
                    <span>
                        Cm
                    </span>

                </div> --}}
            </div>
            <div class="activity">
                <div class="opening">
                    About me
                    <button id="acnext" class="icon-small" onclick="activity()" >

                    </button>
                </div>
                <div id="accontent" class="activity-wrapper">
                    <span>
                        Tim Favorit
                    </span>
                    <span>
                        <div class="icon-big"></div>
                    </span>
                    <span>
                        <a href="">Info Lengkap</a>
                    </span>
                    <span>

                        Olahraga
                    </span>
                    <span>
                        <div class="icon-big"></div>
                    </span>
                    <span>
                        <a href="">Info Lengkap</a>
                    </span>
                    <span>

                        Status
                    </span>
                    <span>
                        Aktif
                    </span>
                    <span>
                        <a href="">Info Lengkap</a>
                    </span>
                </div>
        </div>
        <div class="white-space"></div>
    </div>
    <script src="/js/profile.js" ></script>
    <section class="white-space" ></section>
</body>
</html>