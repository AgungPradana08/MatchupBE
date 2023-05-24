var today = new Date().getFullYear()+'-'+("0"+(new Date().getMonth()+1)).slice(-2)+'-'+("0"+new Date().getDate()).slice(-2)
let drop = [false,false,false,false];


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

// document.getElementById("datepick").min = today.toString();

function dropdown(index) {

    console.log(drop,);

    if (drop[index] == false) {
        document.getElementById("wrapper" + index).setAttribute("style","height: 0vh; opacity: 0%; transition: 0.5s ease; padding: 0%");
        document.getElementById("drop" + index).setAttribute("style","transform: rotate(90deg); transition: 0.3s ease;");
        drop[index] = true;
    } else {

        if (index == 2) {
            document.getElementById("wrapper" + index).setAttribute("style","height: 17vh; opacity: 100%; transition: 0.5s ease; padding:4%");
            document.getElementById("drop" + index).setAttribute("style","transform: rotate(90deg); transition: 0.3s ease;");
            drop[index] = false;
        } else {
            document.getElementById("wrapper" + index).setAttribute("style","height: 60vh; opacity: 100%; transition: 0.5s ease; padding: 4%");
            document.getElementById("drop" + index).setAttribute("style","transform: rotate(90deg); transition: 0.3s ease;");
            drop[index] = false;
        }



        // if (index == 3) {

            
        // } else {

        // }
    }



}

// function dropdown2() {

//     if (drop2 == false) {
//         document.getElementById("wrapper2").setAttribute("style","height: 0vh; opacity: 0%; transition: 0.5s ease; padding: 0%");
//         document.getElementById("drop2").setAttribute("style","transform: rotate(90deg); transition: 0.3s ease;");
//         drop2 = true;
//     } else {
//         document.getElementById("wrapper2").setAttribute("style","height: 60vh; opacity: 100%; transition: 0.5s ease; padding:4%");
//         document.getElementById("drop2").setAttribute("style","transform: rotate(0deg); transition: 0.3s ease;");
//         drop2 = false;
//     }

// }

// function dropdown3() {

//     if (drop3 == false) {
        // document.getElementById("wrapper3").setAttribute("style","height: 0vh; opacity: 0%; transition: 0.5s ease; padding: 0%");
        // document.getElementById("drop3").setAttribute("style","transform: rotate(90deg); transition: 0.3s ease;");
        // drop3 = true;
//     } else {
//         document.getElementById("wrapper3").setAttribute("style","height: 17vh; opacity: 100%; transition: 0.5s ease; padding:4%");
//         document.getElementById("drop3").setAttribute("style","transform: rotate(0deg); transition: 0.3s ease;");
//         drop3 = false;
//     }

// }

// function dropdown4() {

//     if (drop4 == false) {
//         document.getElementById("wrapper3").setAttribute("style","height: 0vh; opacity: 0%; transition: 0.5s ease; padding: 0%");
//         document.getElementById("drop3").setAttribute("style","transform: rotate(90deg); transition: 0.3s ease;");
//         drop4 = true;
//     } else {
//         document.getElementById("wrapper3").setAttribute("style","height: 17vh; opacity: 100%; transition: 0.5s ease; padding:4%");
//         document.getElementById("drop3").setAttribute("style","transform: rotate(0deg); transition: 0.3s ease;");
//         drop4 = false;
//     }

// }
