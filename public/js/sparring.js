var today = new Date().getFullYear()+'-'+("0"+(new Date().getMonth()+1)).slice(-2)+'-'+("0"+new Date().getDate()).slice(-2)
let drop = [false,false,false,false];
let title,olahraga,deskripsi,lokasi,minmember,maxmember,akses,tingkatan,tanggal,harga,lamapertandingan,pukul,deskripsitambahan
let seelogin = true;

// let savevar = [title          ,olahraga,       deskripsi,          lokasi        ,minmember,  maxmember, akses,        tingkatan,       tanggal,harga,  lamapertandingan,                         pukul,        deskripsitambahan]
// let savekey = [  "titleinput","olahragaselect","deskripsitextarea","lokasiinput", "mininput","maxinput","aksesselect","tingkatanselect","tanggaldate","hargainput",     "lamadate",               "pukulinput","tambahandeskripsiinput"]
// let elementid = ["TitleInput", "OlahragaSelect","DesInput",         "locationtext","MinInput","MaxInput","AksesInput","TingkatanInput",  "datepick",   "HargaInput",     "LamaPertandinganSelect","TimeSelect","TambahanDeskripsi"     ]

document.getElementById("datepick").min = today.toString();
console.log(today)


// mapsviews()

function locationview() {
    var targetScrollRight = (element.scrollWidth * 1);
    element.scrollRight = targetScrollRight;
}

setInterval(() => {
    let membermax = document.getElementById("MaxInput")
    let membermaxint = parseInt(membermax.value)

    if (membermaxint < 0) {
    membermax.value = 0
  }

  if(membermaxint > 12) {
    membermax.value = 12
  }
}, 0);

// console.log(savevar)
// console.log(savekey)
// console.log(elementid)




// if ("matchup.usertambah" in localStorage) { 

//     for (let index = 0; index < savevar.length; index++) {
//         console.log(index)
        
//         savevar[index] = localStorage.getItem("matchup." + savekey[index])
//         document.getElementById(elementid[index]).value = savevar[index];
//     }


// } else {

//     localStorage.setItem("matchup.usertambah", " ");

//     for (let index = 0; index < savevar.length; index++) {
        

//         localStorage.setItem("matchup." + savekey[index], " ");

//         document.getElementById(elementid[index]).value = " ";
//         console.log(index)
//     }

// }



// function RemoveSave() {
//     localStorage.removeItem("matchup.usertambah")
// }

// function handleBeforeUnload(event) {
//     localStorage.removeItem("matchup.usertambah"); // Panggil fungsi Removesave di sini
//   }
  
//   // Daftarkan peristiwa "beforeunload"
//   window.addEventListener("beforeunload", handleBeforeUnload);


//     localStorage.setItem("matchup.olahragaselect", " ");

//     localStorage.setItem("matchup.deskripsitextarea", " ");
//     localStorage.setItem("matchup.lokasiinput", " ");
//     localStorage.setItem("matchup.mininput", " ");
//     localStorage.setItem("matchup.maxinput", " ");
//     localStorage.setItem("matchup.aksesselect", " ");
//     localStorage.setItem("matchup.tingakatanselect", " ");

//     document.getElementById("TitleInput").value = " ";
//     document.getElementById("OlahragaSelect").value = " ";
//     document.getElementById("DesInput").value = " ";
//     document.getElementById("locationtext").value = " ";
//     document.getElementById("MinInput").value = " ";
//     document.getElementById("MaxInput").value = " ";
//     document.getElementById("AksesInput").value = " ";
//     document.getElementById("TingkatanInput").value = " ";
// }



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



function dropdown(index) {

    if (drop[index] == false) {
        document.getElementById("wrapper" + index).setAttribute("style","height: 0vh; opacity: 0%; transition: 0.5s ease; padding: 0%");
        document.getElementById("drop" + index).setAttribute("style","transform: rotate(90deg); transition: 0.3s ease;");
        drop[index] = true;
    } else {

        if (index == 2) {
            document.getElementById("wrapper" + index).setAttribute("style","height: 17vh; opacity: 100%; transition: 0.5s ease; padding:4%");
            document.getElementById("drop" + index).setAttribute("style","transform: rotate(90deg); transition: 0.3s ease;");
            drop[index] = false;
        } else if(index == 1) {
            document.getElementById("wrapper" + index).setAttribute("style","height: 80vh; opacity: 100%; transition: 0.5s ease;");
            document.getElementById("drop" + index).setAttribute("style","transform: rotate(90deg); transition: 0.3s ease;");
            drop[index] = false;
        } else {
            document.getElementById("wrapper" + index).setAttribute("style","height: 60vh; opacity: 100%; transition: 0.5s ease; padding: 4%");
            document.getElementById("drop" + index).setAttribute("style","transform: rotate(90deg); transition: 0.3s ease;");
            drop[index] = false;
        }
    }
}

// function mapsviews() {
//     console.log("read");
//     var locationInput = document.getElementById("locationtext");
//    for var frame = document.getElementById("frame-location");
  
//      (let index = 0; index < maps.length; index++) {
//       if (locationInput.value === maps[index].lokasi) {
//         frame.src = maps[index].embed;
//         break; // Menghentikan iterasi setelah menemukan kecocoka
//     }
//   }


// for (let index = 0; index < maps.length; index++) {
//     var locationInput = document.getElementById("location_list")
//     var newElement = document.createElement("option")

//     newElement.value = maps[index].lokasi
//     newElement.innerHTML = maps[index].detaillokasi

//     locationInput.appendChild(newElement);
    
// }

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


function passwordsee1() {

    let passwordeye = document.getElementById("passwordicon")

    let LoginInputPassword = document.getElementById("PasswordLog");

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



// function locationcheck() {  
//     let locationinput = document.getElementById("locationtext");
//     let framelocation = document.getElementById("frame-location");
//     let inputvalue = locationinput.value.toString();

//     if (inputvalue.toLowerCase() == "berlian") {
//         framelocation.src = "https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3961.9330589963215!2d110.82925937464667!3d-6.778002093218944!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e70db3f65bcd8ef%3A0xf406838f209d8561!2sBerlian%20Sport%20Centre!5e0!3m2!1sen!2sid!4v1684936334143!5m2!1sen!2sid";
//     }  
    
//     if (inputvalue.toLowerCase() == "markas") {
//         framelocation.src = "https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3961.716447912291!2d110.85877227464694!3d-6.8043075931931325!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e70c525fd6001b1%3A0xe28fff5d78f8ce5f!2sMarkass%20Sport%20Center!5e0!3m2!1sen!2sid!4v1684936417939!5m2!1sen!2sid";
//     } 

// }

// function locationinput() {
//     let locationinput = document.getElementById("locationtext");
//     let framelocation = document.getElementById("frame-location");
//     let inputvalue = locationinput.value.toString();

//     framelocation.setAttribute("style","transition: 0.5s ease;")


//     if (inputvalue.toLowerCase() == "berlian") {
//         framelocation.src = "https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3961.9330589963215!2d110.82925937464667!3d-6.778002093218944!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e70db3f65bcd8ef%3A0xf406838f209d8561!2sBerlian%20Sport%20Centre!5e0!3m2!1sen!2sid!4v1684936334143!5m2!1sen!2sid";
//     }  
    
//     if (inputvalue.toLowerCase() == "markas") {
//         framelocation.src = "https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3961.716447912291!2d110.85877227464694!3d-6.8043075931931325!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e70c525fd6001b1%3A0xe28fff5d78f8ce5f!2sMarkass%20Sport%20Center!5e0!3m2!1sen!2sid!4v1684936417939!5m2!1sen!2sid";
//     } 

//     localStorage.setItem("matchup.lokasiinput", document.getElementById("locationtext").value); 

// }

// function InputChange() {

//     for (let index = 0; index < savevar.length; index++) {
//         localStorage.setItem("matchup." + savekey[index], document.getElementById(elementid[index]).value);
//     }

// }





// window.addEventListener("unload", function(event) {
//     localStorage.removeItem("matchup.usertambah")
//   });

// locationcheck(); 