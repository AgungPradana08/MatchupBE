<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <link rel="stylesheet" href="/css/logins.css">
</head>
<body>
    <nav class="navbar navbar-expand-lg p-0 position-fixed" style="width: 100vw; z-index: 100;">
        <div class="container bg-ms-primary ">
            <a class="navbar-brand" href="/"><div></div></a>
        </div>
    </nav>
    <form style="margin: auto;" action="/login/store" method="post">
    @csrf
    <div class="container login-container">
        <div class="box">
            <div class="upper">
                <h5>LOGIN</h5>
                <div class="input-box">
                    <div class="icon" style="background: url(/css/img/mail.png); background-position: center; background-size: contain; background-repeat: no-repeat; "></div>
                    <input type="email" name="email" placeholder="Masukkan Email..." required>
                </div>
                <div class="input-box">
                    <div class="icon" style="background: url(/css/img/password.png); background-position: center; background-size: contain; background-repeat: no-repeat; " ></div>
                    <input id="PasswordLog" name="password" type="password"  placeholder="Masukkan Password...">
                    <div class="icon-eye" onclick="passwordsee1()"  style="background: url(/css/img/eye.png); background-position: center; background-size: contain; background-repeat: no-repeat; " ></div>
                </div>
                <input class="d-none" type="text">
            </div>
            <div class="footer">
                <button name="submit" type="submit" >LOG IN</button>
                <a style="text-align: center;" href="/login">tidak punya akun?, klik disini</a>
            </div>
        </div>
    </div>
</form>
    <script src="/js/sparring.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js" integrity="sha384-fbbOQedDUMZZ5KreZpsbe1LCZPVmfTnH7ois6mU1QK+m14rQ1l2bGBq41eYeM/fS" crossorigin="anonymous"></script>
</body>
</html>