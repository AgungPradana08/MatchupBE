<!DOCTYPE html>
<html>
<head>
    <title>Verifikasi Email</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <link rel="stylesheet" href="/css/verify.css">
</head>
<body>
    {{-- <div style="text-align: center;">
        <h2>Verifikasi Email Anda</h2>
        <p>Silakan cek email anda untuk memverifikasi</p>
        <p>jika belum dapat email verifikasi silahkan pencet tombol di bawah ini!!!</p>
        <form method="POST" action="{{ route('verification.resend') }}">
            @csrf
            <button type="submit">
                Kirim Ulang
            </button>
        </form>
    </div> --}}
    {{-- @if (auth()->check() && auth()->user()->hasVerifiedEmail())
    <p>Anda sudah memverifikasi alamat email Anda.</p>
    <p><a href="{{ route('sparring.home') }}">Lanjut ke Dashboard</a></p>
@else
    <p>Belum memverifikasi alamat email?</p>
    <p><a href="{{ route('verification.notice') }}">Kembali ke Halaman Verifikasi</a></p>
@endif --}}
    <div class="container-fluid vw-100 vh-100 background-display d-flex justify-content-center align-items-center">
        <div class="box bg-white p-3 d-flex flex-column align-items-center justify-content-evenly">
            <div class="d-flex flex-column align-items-center" >
                <div class="row d-flex justify-content-evenly align-items-center" style="width: 90%; height: 12vh" >
                    <img class="mail-img" src="/css/img/logo.png" >
                    <img class="connect h-100" src="/css/img/connect.gif" style="width: 42%" >
                    <img class="user-img" src="/css/img/user.png" >

                </div>
                <h3 class="fw-bold mt-3" >Verifikasi Email Anda</h3>
            </div>
            <div class="w-50" >
                <p class="text-center" >Silakan cek email anda untuk memverifikasi</p>
                <p class="text-center" >jika belum dapat email verifikasi silahkan pencet tombol di bawah ini</p>
                <form method="POST" class="d-flex justify-content-center" action="{{ route('verification.resend') }}">
                    @csrf
                    <button class="btn w-50 text-white" style="background: #FE6B00" type="submit">
                        Kirim Ulang
                    </button>
                </form>
            </div>
        </div>
        @if (auth()->check() && auth()->user()->hasVerifiedEmail())
            <p>Anda sudah memverifikasi alamat email Anda.</p>
            <p><a href="{{ route('sparring.home') }}">Lanjut ke Dashboard</a></p>
        @else
            <p>Belum memverifikasi alamat email?</p>
            <p><a href="{{ route('verification.notice') }}">Kembali ke Halaman Verifikasi</a></p>
        @endif
    </div>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js" integrity="sha384-fbbOQedDUMZZ5KreZpsbe1LCZPVmfTnH7ois6mU1QK+m14rQ1l2bGBq41eYeM/fS" crossorigin="anonymous"></script>
</body>
</html>
