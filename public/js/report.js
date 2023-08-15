//pengguna User
var UserReport1 = document.getElementById("report1");
var UserReport1check = UserReport1.checked;
var UserReport1value = UserReport1.value;
var UserReport1Point = 0

var UserReport2 = document.getElementById("report2");
var UserReport2check = UserReport2.checked;
var UserReport2value = UserReport2.value;
var UserReport2Point = 0


var UserReport3 = document.getElementById("report3");
var UserReport3check = UserReport3.checked;
var UserReport3value = UserReport3.value;
var UserReport3Point = 0


var UserReport4 = document.getElementById("report4");
var UserReport4check = UserReport4.checked;
var UserReport4value = UserReport4.value;
var UserReport4Point = 0

//Tim User

var TimReport1 = document.getElementById("timuser1");
var TimReport1check = TimReport1.checked;
var TimReport1value = TimReport1.value;
var TimReport1Point = 0

var TimReport2 = document.getElementById("timuser2");
var TimReport2check = TimReport2.checked;
var TimReport2value = TimReport2.value;
var TimReport2Point = 0


var TimReport3 = document.getElementById("timuser3");
var TimReport3check = TimReport3.checked;
var TimReport3value = TimReport3.value;
var TimReport3Point = 0


var TimReport4 = document.getElementById("timuser4");
var TimReport4check = TimReport4.checked;
var TimReport4value = TimReport4.value;
var TimReport4Point = 0


var ReportPoin;
var ReportTim;

function CheckboxTim() {

    if (TimReport1.checked == true) {
        TimReport1Point = TimReport1value
    } else {
        var TimReport1Point = 0
    }

    if (TimReport2.checked == true) {
        TimReport2Point = TimReport2value
    } else {
        var TimReport2Point = 0
    }

    if (TimReport3.checked == true) {
        TimReport3Point = TimReport3value
    } else {
        var TimReport3Point = 0
    }

    if (TimReport4.checked == true) {
        TimReport4Point = TimReport4value
    } else {
        var TimReport4Point = 0
    }

 
    var ReportTim = parseInt(TimReport1Point) + parseInt(TimReport2Point) + parseInt(TimReport3Point) + parseInt(TimReport4Point);
    document.getElementById("ReportTimPoin").value = ReportTim
    console.log(ReportTim)
}

function CheckboxCheck() {

    if (UserReport1.checked == true) {
        UserReport1Point = UserReport1value
    } else {
        var UserReport1Point = 0
    }

    if (UserReport2.checked == true) {
        UserReport2Point = UserReport2value
    } else {
        var UserReport2Point = 0
    }

    if (UserReport3.checked == true) {
        UserReport3Point = UserReport3value
    } else {
        var UserReport3Point = 0
    }

    if (UserReport4.checked == true) {
        UserReport4Point = UserReport4value
    } else {
        var UserReport4Point = 0
    }

 
    var ReportPoin = parseInt(UserReport1Point) + parseInt(UserReport2Point) + parseInt(UserReport3Point) + parseInt(UserReport4Point);
    document.getElementById("reportuserpoint").value = ReportPoin
    console.log(ReportPoin)
}


