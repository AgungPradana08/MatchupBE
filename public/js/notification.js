var notification = document.getElementById("notification")

if (notification.classList.contains('appear')) {
    setTimeout(() => {
        closenotification()
    }, 5000);
}

function closenotification() {
    if (notification.classList.contains('appear')) {
        notification.classList.replace('appear','hide')
        setTimeout(() => {
            notification.classList.remove('hide')
            notification.style.display = "none"
        }, 300);
    }
    console.log("Notif Mati")
}