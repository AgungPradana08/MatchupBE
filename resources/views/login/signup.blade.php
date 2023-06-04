<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="/css/signup.css">
</head>
<body>
        <div class="navbar">
            <a href="/">
                <button class="goback" >

                </button>
            </a>
        </div>
    <form action="/register/store" method="POST" enctype="multipart/form-data">
            @csrf
        <div  class="container"  >
            <div class="big-box" id="box1">
                <div class="title">
                    SIGN UP
                </div>
                <div class="form">
                    <div class="icon" style="background: url(/css/img/user.png); background-position: center; background-size: contain; background-repeat: no-repeat; " >
    
                    </div>
                    <input id="UsernameInput" type="text" name="name" placeholder="Masukkan username...">
                    {{-- <input id="inputnama" type="text" name="name" placeholder="Masukkan Username..." required > --}}
                </div>
                <div class="form">
                    <div class="icon" style="background: url(/css/img/mail.png); background-position: center; background-size: contain; background-repeat: no-repeat; " >
    
                    </div>
                    <input id="email" type="email" name="email" placeholder="Masukkan Email..." required >
                </div>
                <div class="form-eye">
                    <div class="icon" style="background: url(/css/img/password.png); background-position: center; background-size: contain;background-repeat: no-repeat; " >
    
                    </div>
                    <input id="PasswordInput" name="password" type="password" placeholder="Masukkan Password..." required >
                    <div class="eye" onclick="passwordsee()" >
                    </div>
                </div>
                <div style="display: flex; align-items:flex-end;" >
                    {{-- <button type="submit" value="save">signup</button> --}}
                    <div class="signup" onclick="NextPage()" >
                        Selanjutnya
                    </div>
                </div>
                <a class="log" href="/login">Sudah Punya Akun?</a>
                
            </div>
    
            <div class="big-box2" id="box2" >
                <div class="title">
                    Selamat Datang
                </div>
                <div class="image-container">
                    <div class="image-box" >
                        <img class="img-preview"  alt="">  
                        <div class="edit-image">
                            <label for="image">
                            <img class="image-box-1" style="border-radius: 100%" height="35px" src="/css/img/add-image.jpg">
                            </label>
                            <input oninput="InputChange()"  style="display: none" type="file" id="image" name="image" onchange="previewImage()">
                        </div>
                    </div>
                </div>
                <div class="form">
                    <div class="icon" style="background: url(/css/img/user.png); background-position: center; background-size: contain; background-repeat: no-repeat; " >
    
                    </div>
                    <input  type="text" name="username" placeholder="Masukkan Nama..." >
                </div>
                <div style="display: flex; align-items:flex-end;">
                    <button type="submit" value="save">signup</button>
                    <a class="signup" type="submit" >
                        Buat Akun
                    </a>
                </div>
                <a class="log" onclick="BackPage()" >Kembali Ke Laman Sebelumnya</a>
            </div>
        </div>
    </form>
    <script src="/js/signup.js"></script>
</body>
</html>