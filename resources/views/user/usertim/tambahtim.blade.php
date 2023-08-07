<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Match UP</title>
    <link rel="stylesheet" href="/css/Tambahtim.css">
    <link rel="shortcut icon" type="image/x-icon" href="/css/img/vector.png">

</head>
<body>

    <div class="navbar">
        <a href="/usertim/home"></a>
        <p>Tambah Tim </p>
        <a style="visibility: hidden;" ></a>
    </div>

    <form action="/usertim/tambahtim/store" method="POST" enctype="multipart/form-data" class="content" >
        @csrf
        <div class="image-container">
            <div class="image-box" id="image-box" >
                <img class="img-preview"  alt="">  
                <div class="edit-image">
                    <label for="image">
                      <img class="image-box-1" style="border-radius: 100%" height="35px" src="/css/img/add-image.jpg">
                    </label>
                  
                    <input  style="display: none" type="file" id="image" name="image" onchange="previewImage()">
                  </div>
            </div>
        </div>
        <div class="form1">
            <div class="header">
                Title
            </div>
            <div class="input1">
            </div>
            <div id="wrapper0" class="form1-wrapper-mabar">
                <div class="input1">
                    <p>Nama Tim</p>
                    <input oninput="InputChange()" name="nama_tim" id="TitleInput" maxlength="30" type="text" placeholder="Input nama tim (maksimal 30)" required >
                </div>
                <div class="input2">
                    <p>Olahraga</p>
                    <select oninput="InputChange()" id="OlahragaSelect" name="olahraga" class="title2" type="text" placeholder="TWO" required>
                        <option value="" >Pilih Olahraga...</option>
                        <option value="12">Sepak Bola</option>
                        <option value="12">Futsal</option>
                        <option value="6">Ping Pong</option>
                        <option value="6">Badminton</option>
                        <option value="12">Voli</option>
                    </select>
                </div>
                <div class="input3-des">
                    <p>Deskrispi</p>
                    <input name="deskripsi" id="DesInput" maxlength="255" type="text" placeholder="Input deskripsi tim (maksimal 255)" required>
                </div>
            </div>
        </div>
        
        <div class="form3">
            <div class="header">
                Aksebilitas
            </div>
            <div id="wrapper2" class="form3-wrapper">
                <div class="input2">
                    <p>Max-member</p>
                    <input oninput="InputChange()" id="MaxInput" name="max_member" type="number" placeholder="max-member..." required>
                </div>
                <div class="input4">
                    <p>Tingkatan-umur</p>
                    <select oninput="InputChange()" id="TingkatanInput" class="ac-title2" type="text" placeholder="TWO" name="tingkatan" required>
                        <option value="">Pilih Tingkatan...</option>
                        <option value="7-10">6-12 Tahun</option>
                        <option value="12-15">12-15 Tahun</option>
                        <option value="15-18">15-18 Tahun</option>
                        <option value="18-21">18-21 Tahun</option>
                        <option value="21+">21+ Tahun</option>
                    </select>
                </div>
            </div>
        </div>
        <div class="form4">
            <div class="header">
                Informasi
            </div>
            <div id="wrapper3" class="form4-wrapper">
                <div class="input1">
                    <p>Nomor Telpon</p>
                    <input name="nomor_telepon" onchange="NumberInput()" type="number" maxlength="12" placeholder="Input nomor telpon..." required>
                </div>
                <div class="input2">
                    <p>Instagram</p>
                    <input name="instagram" type="text" placeholder="Input Tag instagram..." >
                </div>
                <div class="input3">
                    <p>whatapps</p>
                    <input name="whatsapp" type="number" maxlength="12" placeholder="Masukkan nomor whatapps...">
                </div>
                <div class="input4">
                    <p>Facebook</p>
                    <input name="facebook" type="text" placeholder="Input nama Facebook..." >
                </div>
            </div>
        </div>
        <button class="add" type="submit" name="submit" onclick="RemoveSave()" value="save">TAMBAH</button >
        <div class="white-space">

        </div>
    </form>
    <script src="/js/mapslist.js"></script>
    <script src="/js/tambah.js"></script>
    <script src="/js/tambahtim.js"></script>
</body>
</html>
