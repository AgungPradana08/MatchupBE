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


function locationinput() {
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

  var mapsindex;

  function Price(i) {
    var priceselect = document.getElementById("LamaPertandinganSelect");
    var priceinput = document.getElementById("HargaInput")
    var hargatiket = maps[mapsindex].harga
    priceinput.value = priceselect.value * hargatiket
    console.log(priceselect.value * hargatiket)
  }


for (let index = 0; index < maps.length; index++) {
    var locationInput = document.getElementById("location_list")
    var newElement = document.createElement("option")

    newElement.value = maps[index].lokasi
    newElement.innerHTML = maps[index].detaillokasi

    locationInput.appendChild(newElement);
    
}


