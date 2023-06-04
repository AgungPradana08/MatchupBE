let namasparring,lokasisparring,olahragasparring

let savevar = [namasparring,lokasisparring,olahragasparring]
let savekey = [  "namainput","lokasiselect","olahragaselect"]
let elementid = ["sparringname", "sparringlocation","sparringsport" ]


if ("matchup.usertambah" in localStorage) { 

    for (let index = 0; index < savevar.length; index++) {
        console.log(index)
        
        savevar[index] = localStorage.getItem("matchup." + savekey[index])
        document.getElementById(elementid[index]).value = savevar[index];
    }


} else {

    localStorage.setItem("matchup.usertambah", " ");

    for (let index = 0; index < savevar.length; index++) {
        
        localStorage.setItem("matchup." + savekey[index], " ");

        document.getElementById(elementid[index]).value = " ";
    }

}
function InputChange() {

    for (let index = 0; index < savevar.length; index++) {
        localStorage.setItem("matchup." + savekey[index], document.getElementById(elementid[index]).value);
    }

    
    

}

for (let index = 0; index < maps.length; index++) {
    var locationInput = document.getElementById("location_list")
    var newElement = document.createElement("option")

    newElement.value = maps[index].lokasi
    newElement.innerHTML = maps[index].detaillokasi

    locationInput.appendChild(newElement);
    
}