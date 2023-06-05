var biocontents = document.getElementById("biocontent")
var activitycontent = document.getElementById("accontent")

biocontents.classList.add("hide")
activitycontent.classList.add("hide")


function bio() {

    if (biocontents.classList.contains("hide")) {
        biocontents.classList.add("bio-appear")
        biocontents.classList.remove("hide")
        console.log(true)
      } else {
        biocontents.classList.add("hide")
        biocontents.classList.remove("bio-appear")
        console.log(false)
    }
}

function activity() {
    if (activitycontent.classList.contains("hide")) {
        activitycontent.classList.add("activity-appear")
        activitycontent.classList.remove("hide")
        console.log(true)
      } else {
        activitycontent.classList.add("hide")
        activitycontent.classList.remove("activity-appear")
        console.log(false)
    }
}