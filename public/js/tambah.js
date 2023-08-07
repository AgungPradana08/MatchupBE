function previewImage() {
  const image = document.querySelector('#image');
  const imgPreview = document.querySelector('.img-preview');
  const imgbox = document.getElementById('image-box');


  imgPreview.style.display = 'block';
  imgbox.style.background = "white"


  const oFReader = new FileReader();
  oFReader.readAsDataURL(image.files[0]);

  oFReader.onload = function(oFREvent) {
      imgPreview.src = oFREvent.target.result;
  }
}


function mapsList(index) {
  var locationInput = document.getElementById("locationtext");
  locationInput.value = maps[index].lokasi
  locationdisplay()
}


function locationdisplay() {
    console.log("read");
    var locationInput = document.getElementById("locationtext");
    var frame = document.getElementById("frame-location");
  
    for (let index = 0; index < maps.length; index++) {
      if (locationInput.value === maps[index].lokasi) {
        frame.src = maps[index].embed;
        mapsindex = index
        Price()
        break; // Menghentikan iterasi setelah menemukan kecocokan
      }
    }
  }

  // var mapsindex;

  function Price(i) {
    var priceselect = document.getElementById("LamaPertandinganSelect");
    var priceinput = document.getElementById("HargaInput")
    var hargatiket = maps[mapsindex].harga
    priceinput.value = priceselect.value * hargatiket
    console.log(priceselect.value * hargatiket)
  }


// for (let index = 0; index < maps.length; index++) {
//     var locationInput = document.getElementById("location_list")
//     var newElement = document.createElement("option")

//     newElement.value = maps[index].lokasi
//     newElement.innerHTML = maps[index].detaillokasi

//     locationInput.appendChild(newElement);
    
// }

// Fungsi untuk membatasi panjang angka pada elemen input
function NumberInput(inputElement, maxLength) {
  let value = inputElement.value;
  if (value.length > maxLength) {
    inputElement.value = value.slice(0, maxLength); // Mengambil karakter pertama hingga maxLength
  }
}

// Dapatkan elemen input
const myNumberInput = document.getElementById("myNumberInput");

// Tambahkan event listener untuk membatasi panjang input saat menginputkan angka
myNumberInput.addEventListener("input", function () {
  const maxLength = 5; // Ganti dengan panjang maksimum yang Anda inginkan
  limitNumberLength(this, maxLength);
});


