var Box1 = document.getElementById('box1');
var Box2 = document.getElementById('box2');

Box1.classList.add("appear")
box2.classList.add("hide")

function NextPage() {
    console.log("Hello")
    box1.classList.replace("appear","hide")
    box2.classList.replace("hide","appear")
}

function BackPage() {
    console.log("Hello")
    box1.classList.replace("hide","appear")
    box2.classList.replace("appear","hide")
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