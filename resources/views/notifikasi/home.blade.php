<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <link rel="stylesheet" href="/css/notificationpage.css">
    <title>Document</title>
</head>
<body>
    <nav class="navbar navbar-expand-lg p-0 position-fixed bg-white " style="width: 100vw; z-index: 100;">
        <div class="container bottom-border bg-ms-primary " style="height: 8vh" >
          <a class="navbar-brand m-0 p-0" href="/sparring/home"><img src="\css\img\back button.png" style="height: 28px;" alt=""></a>
          <h5 class="p-0 m-0" style="font-family: opensans-bold" >NOTIFIKASI </h5>
          <button data-bs-toggle="modal" data-bs-target="#report" class="report" style="background: url(/css/img/report.png); visibility: hidden;" style="height: 28px;" ></button>
        </div>
    </nav>
    <div class="container wrapper" >
        @foreach ($notifikasi as $notifikasi)
        @if ($notifikasi->user_id === Auth::user()->id)
        <a href="{{ $notifikasi->url }}" class="box p-2 d-flex align-items-center justify-content-between" style="text-decoration: none; color: black;" >
            <div class="d-flex" >
                <div class="ms-2" >
                    <p class="p-0 m-0" >{{$notifikasi->message}}</p>
                </div>
            </div>
            <form action="/notifikasi/{{$notifikasi->id}}" method="post">
                @csrf
                @method('delete')
            <button type="submit" class="btn-close " onclick="closenotification()" aria-label="Close"></button>
            </form>
        </a>
        @endif
        @endforeach
    </div>
    <section class="no-data" >
        @if($notifikasi->count() > 0)
        <section class="white-space" ></section>   
        @else
        <div class="flag-icon" ></div>
        <p style="opacity: 50%;">Untuk saat ini belum ada Notifikasi.</p>
    @endif
    </section>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js" integrity="sha384-fbbOQedDUMZZ5KreZpsbe1LCZPVmfTnH7ois6mU1QK+m14rQ1l2bGBq41eYeM/fS" crossorigin="anonymous"></script>
</body>
</html>