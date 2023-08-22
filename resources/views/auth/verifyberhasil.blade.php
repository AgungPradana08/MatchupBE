<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <link rel="stylesheet" href="/css/verify.css">
    <title>Document</title>
</head>
<body>
    <div class="container-fluid vw-100 vh-100 background-display d-flex justify-content-center align-items-center">
        <div class="box bg-white p-3 d-flex flex-column align-items-center justify-content-evenly">
            <div class="d-flex flex-column align-items-center" >
                <div class="row d-flex justify-content-evenly align-items-center" style="width: 90%; height: 12vh" >
                    <img class="user-usergood" width="50px" src="/css/img/usergood.png" >

                </div>
                <h3 class="fw-bold mt-3" >Email Anda Telah Terverifikasi</h3>
            </div>
            <div class="w-50 d-flex flex-column align-items-center" >
                <a class="btn w-75 text-white" href="/sparring/home" style="background: #FE6B00" type="submit">
                    Menuju ke Dashboard
                </a>
            </div>
            
        </div>
        {{-- @if (auth()->check() && auth()->user()->hasVerifiedEmail())
            <p>Anda sudah memverifikasi alamat email Anda.</p>
            <p><a href="{{ route('sparring.home') }}">Lanjut ke Dashboard</a></p>
        @else
            <p>Belum memverifikasi alamat email?</p>
            <p><a href="{{ route('verification.notice') }}">Kembali ke Halaman Verifikasi</a></p>
        @endif --}}
    </div>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js" integrity="sha384-fbbOQedDUMZZ5KreZpsbe1LCZPVmfTnH7ois6mU1QK+m14rQ1l2bGBq41eYeM/fS" crossorigin="anonymous"></script>
</body>
</html>