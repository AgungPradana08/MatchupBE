<!DOCTYPE html>
<html>
<head>
    <title>Verifikasi Email</title>
</head>
<body>
    <div style="text-align: center;">
        <h2>Verifikasi Email Anda</h2>
        <p>Silakan cek email anda untuk memverifikasi</p>
        <p>jika belum dapat email verifikasi silahkan pencet tombol di bawah ini!!!</p>
        <form method="POST" action="{{ route('verification.resend') }}">
            @csrf
            <button type="submit">
                Kirim Ulang
            </button>
        </form>
    </div>
</body>
</html>
