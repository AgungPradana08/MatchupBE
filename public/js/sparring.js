var today = new Date().getFullYear()+'-'+("0"+(new Date().getMonth()+1)).slice(-2)+'-'+("0"+new Date().getDate()).slice(-2)
let drop = [false,false,false,false];
let title,olahraga,deskripsi,lokasi,minmember,maxmember,akses,tingkatan,tanggal,harga,lamapertandingan,pukul,deskripsitambahan
let seepassword = true;
let seelogin = true;

let savevar = [title,olahraga,deskripsi,lokasi,minmember,maxmember,akses,tingkatan,tanggal,harga,lamapertandingan,pukul,deskripsitambahan]
let savekey = [  "tambahinput","olahragaselect","deskripsitextarea","lokasiinput", "mininput","maxinput","aksesselect","tingkatanselect","tanggaldate","hargainput","lamadate",              "pukulinput","tambahandeskripsiinput"]
let elementid = ["TitleInput", "OlahragaSelect","DesInput",         "locationtext","MinInput","MaxInput","AksesInput","TingkatanInput",  "datepick",   "HargaInput","LamaPertandinganSelect","TimeSelect","TambahanDeskripsi"]


function VersusSparring() {
    document.getElementById("teambackground1").classList.add("background-animation");
    document.getElementById("teambackground2").classList.add("background-animation");
    document.getElementById("awayteam").classList.add("away-animation");
    document.getElementById("hometeam").classList.add("home-animation");
}

function DetailSparring() {
    setTimeout(() => {
        document.getElementById("teambackground1").classList.remove("background-animation");
        document.getElementById("teambackground2").classList.remove("background-animation");
        document.getElementById("awayteam").classList.remove("away-animation");
        document.getElementById("hometeam").classList.remove("home-animation");
    }, 600);
}


if ("matchup.usertambah" in localStorage) { 

    for (let index = 0; index < savevar.length; index++) {
        
        savevar[index] = localStorage.getItem("matchup." + savekey[index])
        document.getElementById(elementid[index]).value = savevar[index];
    }

    // title = localStorage.getItem("matchup.tambahinput");
    // olahraga = localStorage.getItem("matchup.olahragaselect");
    // deskripsi = localStorage.getItem("matchup.deskripsitextarea");
    // lokasi = localStorage.getItem("matchup.lokasiinput");
    // minmember = localStorage.getItem("matchup.mininput");
    // maxmember = localStorage.getItem("matchup.maxinput");
    // akses = localStorage.getItem("matchup.aksesselect");
    // tingkatan = localStorage.getItem("matchup.tingkatanselect");
    
    // document.getElementById("OlahragaSelect").value = olahraga;
    // document.getElementById("DesInput").value = deskripsi;
    // document.getElementById("locationtext").value = lokasi
    // document.getElementById("MinInput").value = minmember;
    // document.getElementById("MaxInput").value = maxmember
    // document.getElementById("AksesInput").value = akses;
    // document.getElementById("TingkatanInput").value = tingkatan

} else {

    localStorage.setItem("matchup.usertambah", " ");

    for (let index = 0; index < savevar.length; index++) {
        
        localStorage.setItem("matchup." + savekey[index], " ");

        document.getElementById(elementid[index]).value = " ";
    }

}
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

    imgPreview.style.display = 'block';

    const oFReader = new FileReader();
    oFReader.readAsDataURL(image.files[0]);

    oFReader.onload = function(oFREvent) {
        imgPreview.src = oFREvent.target.result;
    }
}

document.getElementById("datepick").min = today.toString();

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

function passwordsee() {

    let PasswordInput = document.getElementById("PasswordInput");

    if (seepassword == false) {
        PasswordInput.type = "text";
        seepassword = true;
    } else {
        PasswordInput.type = "password";
        seepassword = false;
    }
    console.log(seepassword);
}


function passwordsee1() {

    let LoginInputPassword = document.getElementById("PasswordLog");

    if (seelogin == false) {
        LoginInputPassword.type = "text";
        seelogin = true;
    } else {
        LoginInputPassword.type = "password";
        seelogin = false;
    }
    console.log(seelogin);
}



function locationcheck() {  
    let locationinput = document.getElementById("locationtext");
    let framelocation = document.getElementById("frame-location");
    let inputvalue = locationinput.value.toString();

    if (inputvalue.toLowerCase() == "berlian") {
        framelocation.src = "https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3961.9330589963215!2d110.82925937464667!3d-6.778002093218944!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e70db3f65bcd8ef%3A0xf406838f209d8561!2sBerlian%20Sport%20Centre!5e0!3m2!1sen!2sid!4v1684936334143!5m2!1sen!2sid";
    }  
    
    if (inputvalue.toLowerCase() == "markas") {
        framelocation.src = "https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3961.716447912291!2d110.85877227464694!3d-6.8043075931931325!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e70c525fd6001b1%3A0xe28fff5d78f8ce5f!2sMarkass%20Sport%20Center!5e0!3m2!1sen!2sid!4v1684936417939!5m2!1sen!2sid";
    } 

}

function locationinput() {
    let locationinput = document.getElementById("locationtext");
    let framelocation = document.getElementById("frame-location");
    let inputvalue = locationinput.value.toString();

    framelocation.setAttribute("style","transition: 0.5s ease;")


    if (inputvalue.toLowerCase() == "berlian") {
        framelocation.src = "https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3961.9330589963215!2d110.82925937464667!3d-6.778002093218944!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e70db3f65bcd8ef%3A0xf406838f209d8561!2sBerlian%20Sport%20Centre!5e0!3m2!1sen!2sid!4v1684936334143!5m2!1sen!2sid";
    }  
    
    if (inputvalue.toLowerCase() == "markas") {
        framelocation.src = "https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3961.716447912291!2d110.85877227464694!3d-6.8043075931931325!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e70c525fd6001b1%3A0xe28fff5d78f8ce5f!2sMarkass%20Sport%20Center!5e0!3m2!1sen!2sid!4v1684936417939!5m2!1sen!2sid";
    } 

    localStorage.setItem("matchup.lokasiinput", document.getElementById("locationtext").value); 

}

function InputChange() {

    for (let index = 0; index < savevar.length; index++) {
        localStorage.setItem("matchup." + savekey[index], document.getElementById(elementid[index]).value);
    }

    
    // localStorage.setItem("matchup.olahragaselect", document.getElementById("OlahragaSelect").value);
    // localStorage.setItem("matchup.deskripsitextarea", document.getElementById("DesInput").value); 
    // localStorage.setItem("matchup.mininput", document.getElementById("MinInput").value);
    // localStorage.setItem("matchup.maxinput", document.getElementById("MaxInput").value); 

}


function RemoveSave() {
    localStorage.removeItem("matchup.usertambah")
}

locationcheck(); 