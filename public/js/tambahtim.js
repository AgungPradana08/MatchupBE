let drop = [false,false,false,false];

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

    if (MemberInt < 0) {
        MemberValue.value = 0
      }
    
      if(MemberInt > MaxMember) {
        MemberValue.value = MaxMember
      }

    console.log(MaxMember)
    console.log(MemberValue)

}

function NumberInput() {
    
}