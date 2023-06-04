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
        <div class="background"></div>
        <div class="profile">
            <div class="image-box" >
                <img class="img-preview"  alt="">  
                <div class="edit-image">
                    <label for="image">
                      <img class="image-box-1" style="border-radius: 100%" height="35px" src="/css/img/add-image.jpg">
                    </label>
                  
                    <input  style="display: none" type="file" id="image" name="image" onchange="previewImage()">
                </div>
            </div>
            <span class="username" >Username</span>
            <span class="name" >Name</span>
            <hr>
            <span class="deskripsi" >Deskripsi</span>
            <div class="social">
                <div class="box">

                </div>
                <div class="box">

                </div>
                <div class="box">

                </div>
            </div>
            <hr>
            <div class="bio">
                <div class="opening">
                    Bio Data
                    <button class="icon-small" >

                    </button>
                </div>
                <div style="padding: 2%" >
                    <table>
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
                    <button class="icon-small" >

                    </button>
                </div>
                <div class="activity-wrapper">
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
    {{-- <section class="white-space" ></section> --}}
</body>
</html>