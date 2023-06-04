function VersusSparring() {
    document.getElementById("teambackground1").classList.add("background-animation");
    document.getElementById("teambackground2").classList.add("background-animation");
    document.getElementById("awayteam").classList.add("away-animation");
    document.getElementById("hometeam").classList.add("home-animation");
    document.getElementById("versus-bookmark").setAttribute("style","width: 10vw; transition: 0.3s ease;")
    document.getElementById("detail-bookmark").setAttribute("style","width: 8vw; transition: 0.3s ease;")
    console.log("Pressed")
}

function detailSparring() {
    document.getElementById("versus-bookmark").setAttribute("style","width: 8vw; transition: 0.3s ease;")
    document.getElementById("detail-bookmark").setAttribute("style","width: 10vw; transition: 0.3s ease;")
    setTimeout(() => {
        document.getElementById("teambackground1").classList.remove("background-animation");
        document.getElementById("teambackground2").classList.remove("background-animation");
        document.getElementById("awayteam").classList.remove("away-animation");
        document.getElementById("hometeam").classList.remove("home-animation");

    }, 600);
}