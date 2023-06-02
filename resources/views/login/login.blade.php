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
        <form style="margin: auto;" action="/login/store" method="post">
            @csrf
            <div class="big-box">
                <div class="title">
                    <h1>LOG IN</h1>
                    <p>mulai pertanding dan menjadi juara</p>
                </div>
                <div class="divider"></div>
                <div class="form">
                    <div class="icon" style="background: url(/css/img/mail.png); background-position: center; background-size: contain; background-repeat: no-repeat; " >
    
                    </div>
                    <input  type="email" name="email" placeholder="Masukkan Email..." required >
                </div>
                <div class="form-eye">
                    <div class="icon" style="background: url(/css/img/password.png); background-position: center; background-size: contain;background-repeat: no-repeat; " >
    
                    </div>
                    <input id="PasswordLog" name="password" type="password" placeholder="Masukkan Password..." required >
                    <a onclick="passwordsee1()" >
                        <div class="eye" >
                        </div>
                    </a>
                </div>
                <div class="form-eye">
                    
                </div>
                <div class="divider"></div>
                <a class="signup" name="submit" type="submit">
                    <button>
                        LOG IN
                    </button>
                </a>
                <a class="log" href="/register">Tidak Punya Akun?</a>
            </div>
        </form>
    </div>
    <script src="/js/sparring.js"></script>
</body>
</html>