DetectMap();


function DetectMap() {
    var Target = document.getElementById("locationTarget")
    var detail = document.getElementById("detaillokasi")
    var mapsview = document.getElementById("MapDisplay")

      
        for (let index = 0; index < maps.length; index++) {
          if (Target.innerHTML.toString() === maps[index].lokasi) {
            detail.innerHTML = maps[index].detaillokasi
            mapsview.src = maps[index].embed
            break; // Menghentikan iterasi setelah menemukan kecocokan
            }
        console.log(Target.innerHTML.toString())
        }
}