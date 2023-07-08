var Box1 = document.getElementById('box1');
var Box2 = document.getElementById('box2');
var names = document.getElementById("UsernameInput")
var emails = document.getElementById("email")
let LoginInputPasswords = document.getElementById("PasswordInput");

Box1.style.display = "flex"
Box2.style.display = "none"


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
        let LoginInputPassword = document.getElementById("PasswordInput");
    
        if (LoginInputPassword.classList.contains("active")) {
            LoginInputPassword.classList.remove("active");
            LoginInputPassword.type = "password";
          } else {
            LoginInputPassword.classList.add("active");
            LoginInputPassword.type = "text";
        }
}

function previewImage() {
    const image = document.querySelector('#image');
    const imgPreview = document.querySelector('.img-preview');

    imgPreview.style.display = 'block';

    const oFReader = new FileReader();
    oFReader.readAsDataURL(image.files[0]);

    oFReader.onload = function(oFREvent) {
        imgPreview.src = oFREvent.target.result;
    }
}