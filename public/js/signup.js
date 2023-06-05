var Box1 = document.getElementById('box1');
var Box2 = document.getElementById('box2');
var names = document.getElementById("UsernameInput")
var emails = document.getElementById("email")
let LoginInputPasswords = document.getElementById("PasswordInput");

Box1.classList.add("appear")
box2.classList.add("hide")

function NextPage() {
    if (names.value.length > 0 && emails.value.length > 0 && LoginInputPasswords.value.length > 0) {
        console.log("Hello")
        box1.classList.replace("appear","hide")
        box2.classList.replace("hide","appear")
    }


}

function BackPage() {
    console.log("Hello")
    box1.classList.replace("hide","appear")
    box2.classList.replace("appear","hide")
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