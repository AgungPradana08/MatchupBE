<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <link rel="stylesheet" href="/css/contact.css">
</head>
<body>
    <nav class="navbar navbar-expand-lg p-0 position-fixed bg-white " style="width: 100vw; z-index: 100;">
        <div class="container bg-ms-primary ">
          <a class="navbar-brand" href="#"><img src="/css/img/logo.png" style="height: 6vh;" alt=""></a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse p-2"  id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
              <li class="nav-item mx-0 mx-lg-2">
                <a class="nav-link text-start text-lg-center " aria-current="page" href="/"><span>Home</span></a>
              </li>
              <li class="nav-item mx-0 mx-lg-2">
                <a class="nav-link text-start text-lg-center " aria-current="page" href="/about"><span>Tentang</span></a>
              </li>
              <li class="nav-item mx-0 mx-lg-2">
                <a class="nav-link text-start text-lg-center active" aria-current="page" href="/contact"><span>Kontak</span></a>
              </li>
              
            </ul>
            <div>
                <a class="btn d-block d-lg-inline-block pt-1 pb-1 mb-2 mb-lg-0 text-start text-lg-center signup" href="/register" type="submit">Sign Up</a>
                <a class="btn d-block d-lg-inline-block pt-1 pb-1 login text-start text-lg-center" type="submit" href="/login" >Log In</a>
            </div>
          </div>
        </div>
    </nav>
    <div class="container ">
        <div class="row contact">
            <div class="col-6  d-none d-lg-flex justify-content-center align-items-center">
                <div class="img" ></div>
            </div>
            <div class="col-12 col-lg-6 contact-content">
                <h1>CONTACT</h1>
                <div class="wrapper ">
                    <input style="grid-area: input1;" placeholder="Masukkan Email..." type="text" value="">
                    <input style="grid-area: input2;" placeholder="Masukkan Nama Pengguna..." type="text" value="">
                    <textarea style="grid-area: input3;" placeholder="Masukkan Saran atau Kritik..." name="" id="" cols="30" rows="10"></textarea>
                    <button style="grid-area: button; resize: none;" >Kirim Pesan</button>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js" integrity="sha384-fbbOQedDUMZZ5KreZpsbe1LCZPVmfTnH7ois6mU1QK+m14rQ1l2bGBq41eYeM/fS" crossorigin="anonymous"></script>
</body>
</html>