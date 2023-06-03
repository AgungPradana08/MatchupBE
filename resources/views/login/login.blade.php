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
        <form action="/register/store" method="post">
            @csrf
        <div  class="container">

            <div class="big-box">
                <div class="title">
                    login
                </div>
                <div class="form">
                    <div class="icon" style="background: url(/css/img/mail.png); background-position: center; background-size: contain; background-repeat: no-repeat; " >
    
                    </div>
                    <input  type="email" name="email" placeholder="Masukkan Email..." >
                </div>
                <div class="form-eye">
                    <div class="icon" style="background: url(/css/img/password.png); background-position: center; background-size: contain;background-repeat: no-repeat; " >
    
                    </div>
                    <input id="PasswordInput" name="password" type="password" placeholder="Masukkan Password..." >
                    <div class="eye" onclick="passwordsee()" >
                    </div>
                </div>
                <div class="form">

                </div>
                <div style="display: flex; align-items:flex-end;" >
                    <div class="signup" onclick="NextPage()" >
                        Selanjutnya
                    </div>
                </div>
                <a class="log" href="/register">Sudah Punya Akun?</a>
            </div>
        </div>
    </form>
    <script src="/js/sparring.js"></script>
    <script>
        var element = document.getElementById('Box');

        function NextPage() {
            var targetScrollLeft = (element.scrollWidth * 1);
        element.scrollLeft = targetScrollLeft;
        }

        function CancelPage() {
            var targetScrollRight = (element.scrollWidth * 1);
            element.scrollRight = targetScrollRight;
        }

    </script>
</body>
</html>