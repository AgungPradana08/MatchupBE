<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <link rel="shortcut icon" type="image/x-icon" href="/css/img/vector.png">
    
    <link rel="stylesheet" href="/css/signup.css">
</head>
<body>
    <nav class="navbar navbar-expand-lg p-0 position-fixed" style="width: 100vw; z-index: 100;">
        <div class="container bg-ms-primary ">
          <a class="navbar-brand" href="/"><div></div></a>
        </div>
    </nav>
    <form action="/register/store" method="POST" enctype="multipart/form-data">
        @csrf
    <div  class="container login-container">
        <div id="box1" class="box">
            <div class="upper">
                <h5>Sign Up</h5>
                <div class="input-box">
                    <div class="icon" style="background: url(/css/img/user.png); background-position: center; background-size: contain; background-repeat: no-repeat; "></div>
                    <input id="UsernameInput" type="text" name="name" placeholder="Masukkan Username...">
                </div>
                <div class="input-box">
                    <div class="icon" style="background: url(/css/img/mail.png); background-position: center; background-size: contain;background-repeat: no-repeat; "  ></div>
                    <input id="email" type="email" name="email" type="text" placeholder="Masukkan Email...">
                </div>
                <div class="input-box">
                    <div class="icon" style="background: url(/css/img/password.png); background-position: center; background-size: contain;background-repeat: no-repeat; "  ></div>
                    <input id="PasswordInput" name="password" type="password" placeholder="Masukkan Password...">
                    <div class="icon-eye" style="background: url(/css/img/eye.png); background-position: center; background-size: contain;background-repeat: no-repeat; "  onclick="passwordsee()"></div>
                </div>
                <input class="d-none" type="text">
            </div>
            <div class="footer">
                <div id="error1" class="alert alert-warning  p-0 m-0 d-flex align-items-center justify-content-center" role="alert">
                    This is a warning alert—check it out!
                  </div>
                <div onclick="validatepage1()" class="next-button " >SELANJUTNYA</div>
                <a style="text-align: center;" href="/login">Sudah Punya Akun?, klik disini</a>
            </div>
        </div>
        <div id="box2" class="box">
            <div class="upper2">
                <h5>Selamat Datang</h5>
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
                <div class="input-box">
                    <div class="icon" style="background: url(/css/img/user.png); background-position: center; background-size: contain; background-repeat: no-repeat; "></div>
                    <input type="text" name="username" placeholder="Masukkan Nama...">
                </div> 
            </div>
            <div class="footer2">
                <div></div>
                <button type="submit" value="save" >BUAT AKUN</button>
            </div>
        </div>
    </div>
</form>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js" integrity="sha384-fbbOQedDUMZZ5KreZpsbe1LCZPVmfTnH7ois6mU1QK+m14rQ1l2bGBq41eYeM/fS" crossorigin="anonymous"></script>
    <script src="/js/signup.js"></script>
</body>
</html>