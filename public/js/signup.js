var Box1 = document.getElementById('box1');
var Box2 = document.getElementById('box2');
var names = document.getElementById("UsernameInput")
var emails = document.getElementById("email")
var alert1 = document.getElementById("error1")
var alert2 = document.getElementById("error2")

let LoginInputPasswords = document.getElementById("PasswordInput");

Box1.style.display = "flex"
Box2.style.display = "none"

alert1.style.visibility = "hidden"
alert2.style.visibility = "hidden"


function validatepage1() {

    let tolowercase = document.getElementById("UsernameInput").value.toLowerCase()
    let nameinput = document.getElementById("UsernameInput").value

    if (nameinput.length > 0) {
        if (nameinput == tolowercase && !nameinput.includes(" ")) {
            validate2()
        } else {
            alert1.style.visibility = "visible"
            alert1.innerHTML = "! Username Harus Lowercase Tanpa Spasi !"
        }
    } else {
        alert1.style.visibility = "visible"
        alert1.innerHTML = "! Username Kosong !"
    }
}

function validate2() {

    var inputElement = document.getElementById('email');

    var inputText = inputElement.value;

    if (emails.value.length > 0) {
        if (inputText.includes('@gmail.com')) {
            validate3()
          } else {
            alert1.style.visibility = "visible"
            alert1.innerHTML = "! Email Invalid !"
        }
    } else {
        alert1.style.visibility = "visible"
        alert1.innerHTML = "! Email Kosong !"
    }
}

function validate3() {
    if (LoginInputPasswords.value.length > 0) {
        if (LoginInputPasswords.value.length > 5 ) {
            NextPage()
        } else {
            alert1.style.visibility = "visible"
            alert1.innerHTML = "! Password Minimun 6 digit !"
        }
    } else {
        alert1.style.visibility = "visible"
        alert1.innerHTML = "! Password Kosong !"
    }
}

function NextPage() {
    if (names.value.length > 0 && emails.value.length > 0 && LoginInputPasswords.value.length > 0) {
        Box1.style.display = "none"
        Box2.style.display = "flex"
    }


}

function BackPage() {
    console.log("Hello")
    Box1.style.display = "flex"
    Box2.style.display = "none"
}

function passwordsee() {
        let passwordeye = document.getElementById("passwordicon")
        let LoginInputPassword = document.getElementById("PasswordInput");
    
        if (LoginInputPassword.classList.contains("active")) {
            LoginInputPassword.classList.remove("active");
            LoginInputPassword.type = "password";
            passwordeye.style.background = "url(/css/img/eye.png)" 
          } else {
            LoginInputPassword.classList.add("active");
            LoginInputPassword.type = "text";
            passwordeye.style.background = "url(/css/img/eye-disable.png)" 
        }
    passwordeye.style.backgroundPosition = "center"
    passwordeye.style.backgroundSize = "contain"
    passwordeye.style.backgroundRepeat = "no-repeat"
}

function previewImage() {
  const image = document.querySelector('#image');
  const imgPreview = document.querySelector('.img-preview');
  const imgbox = document.getElementById('image-box');


  // Periksa apakah ada file yang dipilih
  if (image.files && image.files[0]) {
    imgPreview.style.display = 'block';

    const oFReader = new FileReader();
    oFReader.readAsDataURL(image.files[0]);

    oFReader.onload = function(oFREvent) {
      imgPreview.src = oFREvent.target.result;
    };
    imgbox.style.background = "white"
    
  } else {
    // Jika tidak ada file yang dipilih, tampilkan gambar "ppblank.png" sebagai default
    imgPreview.style.display = 'block';
    imgPreview.src = '/css/img/add-image-real.png';
  }
}



setInterval(() => {

    var buttonreal = document.getElementById("buttonreal")
    var buttonfake = document.getElementById("buttonfake")
    var image = document.getElementById("image")
    var usernameinput = document.getElementById("usernameinput")

    if (image.value.length > 0 && usernameinput.value.length > 0) {
        buttonreal.style.display = "flex"
        buttonfake.style.display = "none"
    } else {
        buttonreal.style.display = "none"
        buttonfake.style.display = "flex"
    }
}, 0);


function validateuser() {
    var image = document.getElementById("image")
    var usernameinput = document.getElementById("usernameinput")

    if (image.value.length > 0) {
        if (usernameinput.value.length == 0) {
            alert2.style.visibility = "visible"
            alert2.innerHTML = "! Masukkan Nama Pengguna !"
        }
    } else {
        alert2.style.visibility = "visible"
        alert2.innerHTML = "! Masukkan Profile Image !"
    }

}

