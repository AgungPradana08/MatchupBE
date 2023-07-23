<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <link rel="stylesheet" href="/css/home.css">
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
            <a class="nav-link text-start text-lg-center active" aria-current="page" href="/"><span>Home</span></a>
          </li>
          <li class="nav-item mx-0 mx-lg-2">
            <a class="nav-link text-start text-lg-center " aria-current="page" href="/about"><span>Tentang</span></a>
          </li>
          <li class="nav-item mx-0 mx-lg-2">
            <a class="nav-link text-start text-lg-center " aria-current="page" href="/contact">Kontak</a>
          </li>
          
        </ul>
        <div>
            <a class="btn d-block d-lg-inline-block pt-1 pb-1 mb-2 mb-lg-0 text-start text-lg-center signup" href="/register" type="submit">Sign Up</a>
            <a class="btn d-block d-lg-inline-block pt-1 pb-1 login text-start text-lg-center" type="submit" href="/login" >Log In</a>
        </div>
      </div>
    </div>
</nav>
    <section class="hero">
        <div class="container">
            <div class="row vh-100">
                <div class="col-12 col-lg-6 col-left">
                    <p class="text-muted d-none d-lg-block">Selamat Datang</p>
                    <h1>MATCH UP</h1>
                    <p>platform website untuk mabar dan berkompetisi dalam bidang olahraga. website ini membuat berkompetisi menjadi lebih mudah dan penyenangkan. ayo mulai bertanding dari sekarang.</p>
                    <button class="btn d-flex justify-content-between align-items-center nextbutton"  >
                        Pelajari Lebih Lanjut
                        <svg xmlns="http://www.w3.org/2000/svg"  width="25" height="25" fill="currentColor" class="bi bi-arrow-right  d-none d-lg-block" viewBox="0 0 16 16">
                          <path fill-rule="evenodd" d="M1 8a.5.5 0 0 1 .5-.5h11.793l-3.147-3.146a.5.5 0 0 1 .708-.708l4 4a.5.5 0 0 1 0 .708l-4 4a.5.5 0 0 1-.708-.708L13.293 8.5H1.5A.5.5 0 0 1 1 8z"/>
                        </svg>
                    </button>
                </div>
                <div class="col-6 col-right d-none d-lg-flex ">
                    <img class="object-fit-cover" src="/css/img/sepakbola.png" alt="">
                </div>
            </div>
        </div>
    </section>
    <div class="container offer-container">
        <div class="row ">
          <div class="col d-flex justify-content-center text-uppercase"   >
            <span class="offertitle" >Penawaran Kami</span>
          </div>
        </div>
        <div class="row rowoffer">
          <div class="col-lg-3   ">
            <img src="/css/img/kompetisi_aman.png" alt="">
            <h4>Pertandingan aman</h4>
            <p>setiap kompetisi di pantau oleh admin. setelah pertaandingan selesai, setiap tim harus melapor kepada admin</p>
          </div>
          <div class="col-lg-3 ">
            <img src="/css/img/olahraga.png" alt="">
            <h4>Banyak Olahraga</h4>
            <p>kami menyediakan banyak cabang olahraga untuk media kompetisi, dengan ini pengguna bisa berkompetisi di bidang yang ia kuasai</p>
          </div>
          <div class="col-lg-3 ">
            <img src="/css/img/hadiah_pertandingan.png" alt="">
            <h4>Kompetisi Berhadiah</h4>
            <p>kita akan memberikan mendali kepada pemenang pertandingan, dengan ini pengguna akan bersemangat dalam berlatih olahraga dan berkompetisi</p>
          </div>
        </div>
      </div>
      <section class="container ">
        <div class="row offer1-container px-1">
          <div class="col-lg-6 col-12 d-lg-flex align-items-center justify-content-center upper-offer1">
            <img class="offer1-img" src="/css/img/jadijuara.png" alt="">
          </div>
          <div class="col-lg-6 col-12 offer1-description" >
            <h1 class="text-center text-lg-start"  style="font-family: opensans-bold;">JADI JUARA</h1>
            <div>
            <h3 class="text-center text-lg-start">berkompetisi untuk menduduki peringkat satu</h3>
            <p class="text-center text-lg-start">setiap mendali yang kalian peroleh dari kemenangan akan medorong kalian
              kapada tingkatan leader board, dapatkan kesempatan di rekrut oleh tim  profesional.</p>
          </div>  
          </div>
        </div>
      </section>
      <section class="container ">
        <div class="row offer2-container d-flex flex-row-reverse">
          <div class="col-lg-6 col-12  d-flex align-items-center justify-content-center">
            <img src="/css/img/kompetitif.png" alt="">
          </div>
          <div class="col-lg-6 col-12 offer2-description px-1">
            <h1 class="text-center text-lg-end"  style="font-family: opensans-bold;">KOMPETITIF</h1>
            <div>
            <h3 class="text-center text-lg-end">menjadi lebih baik dari sebelumnya</h3>
            <p class="text-center text-lg-end">website ini sangat menjunjung tinggi sportifitas dan kejujuran player,dengan ini player bisa menjadi lebih konfiden dan semangat dalam berolahraga</p>
          </div>  
            </div>
        </div>
      </section>
      <div class="loginofferpage">
      <div class="container login-offer">
        <div class="row">
          <div class="col-4 d-none d-lg-block login-offer-img">
            
          </div>  
          <div class="col-lg-6 col-12 login-offer-content">
            <h1>Ayo mulai berkolaborasi dan berkompetisi</h1>
            <p>berteman dengan ratusan user dan bertanding di lapangan sekarang dengan Match Up</p>
            <div class="div" style="width: 100%;">
              <button>Sign Up</button>
              <button class="login-button"">Log In</button>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="container ">
      <div class="row about-footer">
        <div class="col-lg-3 col-sm-3 footer-title">
          <div class="footer-icon"></div>
          <h4>PT Match Up Indonesia</h4>
          <h6>Jl Besito Raya No.25 Kudus</h6>
        </div>
        <div class="col-lg-2 col-sm-3">
          <ul class="list-unstyled" >
            <li>Perusahana</li>
            <a style="display: block;" href="">Tentang</a>
            <a style="display: block;" href="">Kebijakan dan Privasi</a>
            <a  style="display: block;"href="">Syarat dan ketentuan</a>
          </ul>
        </div>
        <div class="col-lg-2 col-sm-3">
          <ul class="list-unstyled">
            <li>Ekosistem</li>
            <a style="display: block;" href="">Sparring</a>
            <a style="display: block;" href="">Main Bareng</a>
            <a style="display: block;" href="">kompetisi</a>
            <a style="display: block;" href="">Direktori Tim</a>
          </ul>
        </div>
        <div class="col-lg-2 col-sm-3">
          <ul class="list-unstyled">
            <li>hubungi Kita</li>
            <a style="display: block;" href="">Kontak</a>
          </ul>
        </div>
      </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js" integrity="sha384-fbbOQedDUMZZ5KreZpsbe1LCZPVmfTnH7ois6mU1QK+m14rQ1l2bGBq41eYeM/fS" crossorigin="anonymous"></script>
</body>
</html>