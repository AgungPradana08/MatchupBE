var biocontents = document.getElementById("biocontent")
var activitycontent = document.getElementById("accontent")

biocontents.classList.add("hide")
activitycontent.classList.add("hide")


function bio() {

    if (biocontents.classList.contains("hide")) {
        biocontents.classList.add("bio-appear")
        biocontents.classList.remove("hide")
        document.getElementById("next-bio").setAttribute("style"," transform: rotate(90deg); ")
        console.log(true)
      } else {
        biocontents.classList.add("hide")
        biocontents.classList.remove("bio-appear")
        document.getElementById("next-bio").setAttribute("style"," transform: rotate(0deg); ")
        console.log(false)
    }
}

function activity() {
    if (activitycontent.classList.contains("hide")) {
        activitycontent.classList.add("activity-appear")
        activitycontent.classList.remove("hide")
        document.getElementById("acnext").setAttribute("style"," transform: rotate(90deg); ")
        console.log(true)
      } else {
        activitycontent.classList.add("hide")
        activitycontent.classList.remove("activity-appear")
        document.getElementById("acnext").setAttribute("style"," transform: rotate(0deg); ")
        console.log(false)
    }
}