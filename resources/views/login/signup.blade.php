<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="/css/logins.css">
</head>
<body>
    <div class="container">
        <div class="navbar">
            <a href="/">
                <button class="goback" >

                </button>
            </a>
        </div>
        <form style="margin: auto;" action="/register/store" method="post">
            @csrf
            <div class="big-box">
                <div class="title">
                    <h1>SIGN UP</h1>
                    <p>buat akun baru untuk permainan mu</p>
                </div>
                <div class="divider"></div>
                <div class="form">
                    <div class="icon" style="background: url(/css/img/user.png); background-position: center; background-size: contain; background-repeat: no-repeat; " >
    
                    </div>
                    <input  type="text" name="name" placeholder="Masukkan Username..." required >
                </div>
                <div class="form">
                    <div class="icon" style="background: url(/css/img/mail.png); background-position: center; background-size: contain; background-repeat: no-repeat; " >
    
                    </div>
                    <input  type="email" name="email" placeholder="Masukkan Email..." required >
                </div>
                <div class="form-eye">
                    <div class="icon" style="background: url(/css/img/password.png); background-position: center; background-size: contain;background-repeat: no-repeat; " >
    
                    </div>
                    <input id="PasswordInput" name="password" type="password" placeholder="Masukkan Password..." required >
                    <a onclick="passwordsee()" ></a>
                </div>
                <div class="divider"></div>
                <a class="signup" name="submit" type="submit">
                    <button>
                        SIGN UP
                    </button>
                </a>
                <a class="log" href="/login">Sudah Punya Akun?</a>
                <script src="/js/sparring.js"></script>
            </div>
        </form>
    </div>
</body>
</html>