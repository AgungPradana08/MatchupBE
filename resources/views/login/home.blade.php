<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Match UP</title>
    <link rel="stylesheet" href="/css/login.css">
    <link rel="shortcut icon" type="image/x-icon" href="/css/img/vector.png">

</head>
<body>
    <section class="navbar" >
        <div class="navbar-left">
            <a href="/">
                <button class="logo" style="margin-left: 52%;" ></button>
            </a>
        
        </div>
    </section>
    <div class="page">
        <div class="box">
            <div class="header">
               Log In
            </div>
            <form action="/login/authenticate" method="post">
                @csrf
            
            <div class="container" >
                <div>   
                        <div class="input-box">
                            <div class="icon" style="background: url(/css/img/user.png); background-position: center; background-size: contain;" ></div>
                            <input class="normal-input" placeholder="Input Email Pengguna..." type="email" value="{{Session::get('email')}}">
                        </div>
                        <div class="costume-input-box">
                            <div class="costume-input-container">
                                <div class="icon" style="background: url(/css/img/lock.png); background-position: center; background-size: contain;" ></div>
                                <input class="costume-input" placeholder="Input Password Pengguna..." type="password">
                            </div>
                            <button style="background: url(/css/img/eye.png); background-position: center; background-size: contain;" >

                            </button>
                            
                            <button class="signup" name="submit" type="submit"  >
                                LOGIN
                            </button>
                        </div>
                </div>
            </div>
        </form>
            
            <a class="hint" href="signup.html">Sudah Punya Akun?</a>
        </div>
    </div>
    @if(session('error'))
    <script>
        // Menggunakan JavaScript untuk menampilkan pesan alert
        alert("{{ session('error') }}");
    </script>
    @endif
</body>
</html>