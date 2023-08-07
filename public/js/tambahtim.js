// let drop = [false,false,false,false];

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
        } else if (index == 3) {
            document.getElementById("wrapper" + index).setAttribute("style","height: 30vh; opacity: 100%; transition: 0.5s ease;");
            document.getElementById("drop" + index).setAttribute("style","transform: rotate(90deg); transition: 0.3s ease;");
            drop[index] = false;
        } {
            document.getElementById("wrapper" + index).setAttribute("style","height: 60vh; opacity: 100%; transition: 0.5s ease; padding: 4%");
            document.getElementById("drop" + index).setAttribute("style","transform: rotate(90deg); transition: 0.3s ease;");
            drop[index] = false;
        }
    }
}

function InputChange() {
    let InputMember = document.getElementById("OlahragaSelect").value
    let MemberValue = document.getElementById("MaxInput")
    let MaxMember = parseInt(InputMember)
    let MemberInt = parseInt(MemberValue.value)

    let olahragaSelect = document.getElementById("OlahragaSelect");
  
    // Mendapatkan opsi yang dipilih dari elemen <select>
    let selectedOption = olahragaSelect.options[olahragaSelect.selectedIndex];
    
    // Mendapatkan isi/teks dari opsi yang dipilih
    let selectedText = selectedOption.text;

    MemberValue.value = InputMember

    if (MemberInt < 0) {
        MemberValue.value = 0
      }
    
      if(MemberInt > MaxMember) {
        MemberValue.value = MaxMember
      }

    console.log(MaxMember)
    console.log(MemberValue)

    document.getElementById("OlahragaInput").value = selectedText

}

function limitPhoneLength(inputElement) {
    let value = inputElement.value;
    let maxLength = 13
    console.log(maxLength)
    if (value.length > maxLength) {
      inputElement.value = value.slice(0, maxLength); // Mengambil karakter pertama hingga maxLength
    }
}

function limitNumberLength(inputElement) {
    let value = inputElement.value;
    let maxLength = 13
    console.log(maxLength)
    if (value.length > maxLength) {
      inputElement.value = value.slice(0, maxLength); // Mengambil karakter pertama hingga maxLength
    }
}

