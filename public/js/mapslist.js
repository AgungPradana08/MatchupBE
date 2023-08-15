var maps = [
    {
        lokasi: "Markas Sport Center Kudus",
        detaillokasi: "Markas Sport Center, Jalan Jendral Sudirman, Rendeng, Kudus Regency, Central Java",
        embed: "https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3961.716447912291!2d110.85877227464694!3d-6.8043075931931325!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e70c525fd6001b1%3A0xe28fff5d78f8ce5f!2sMarkass%20Sport%20Center!5e0!3m2!1sen!2sid!4v1684936417939!5m2!1sen!2sid", 
        harga:  95000 
    },
    {
        lokasi: "Berlian Sport Center Kudus",
        detaillokasi: "Berlian Sport Centre, Jalan Lingkar Utara Kudus, Ledok, Karangmalang, Kabupaten Kudus, Jawa Tengah",
        embed: "https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3961.9330589963215!2d110.82925937464667!3d-6.778002093218944!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e70db3f65bcd8ef%3A0xf406838f209d8561!2sBerlian%20Sport%20Centre!5e0!3m2!1sen!2sid!4v1684936334143!5m2!1sen!2sid",
        harga: 75000
    },
    {
        lokasi: "Lapangan Besito",
        detaillokasi: "Lapangan Besito, Besito Kulon, Besito, Kudus Regency, Central Java",
        embed: "https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3962.123707192925!2d110.83998217464647!3d-6.754765193241778!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e70dba7f7bcc9f1%3A0x94c01874f3a7ff7b!2sLapangan%20Besito!5e0!3m2!1sen!2sid!4v1685858640965!5m2!1sen!2sid",
        harga: 0
    },
    
];

const api_url = "http://127.0.0.1:8000/api/getdatalocation";

async function getapi(url) {
    try {
        const response = await fetch(url);
        if (!response.ok) {
            throw new Error(`HTTP error! Status: ${response.status}`);
        }

        const data = await response.json();
        Callapi(data.data);
        console.log(data)
    } catch (error) {
        console.error('Error fetching data:', error);
    }
}

function Callapi(data) {
    const container = document.getElementById("table_data");

    data.forEach(function(item) {
        const mapBox = document.createElement("button");
        mapBox.className = "maps-box p-3 b-0";
        mapBox.dataset.filter = "markas";
        mapBox.setAttribute("onclick", "mapsList(" + item.id + ")");
        mapBox.dataset.bsDismiss = "modal";
        mapBox.innerHTML = '<h6 id="mapslocation' + item.id + '" class="fw-bold">' + item.title_lokasi + '</h6>';
        mapBox.innerHTML += '<p id="mapsdetail' + item.id + '" class="p-0 m-0" style="font-size: 10px;">' + item.detail_lokasi + '</p>';
        mapBox.innerHTML += '<p id="mapsurl' + item.id + '" class="p-0 m-0 d-none">' + item.embed_google_map + '</p>';
        container.appendChild(mapBox);
    });
}

function mapsList(index) {
    var locationInput = document.getElementById("locationtext");
    var frame = document.getElementById("frame-location");
    var detailinput = document.getElementById("locationtext_detail")
    var detail_url = document.getElementById("frame_url")

    var mapslocation = document.getElementById("mapslocation" + index);
    var mapsdetail = document.getElementById("mapsdetail" + index);
    var mapsurls = document.getElementById("mapsurl" + index);
    
    detail_url.value = mapsurls.innerHTML;
    detailinput.value = mapsdetail.innerHTML;
    locationInput.value = mapslocation.innerHTML;
    frame.src = mapsurls.innerHTML;

    locationdisplay();
}

function searchLocation() {
    // Ambil nilai dari input teks
    var searchText = document.getElementById("searchinput").value.toLowerCase();
    
    // Ambil semua elemen lokasi
    var locations = document.getElementsByClassName("maps-box");
    
    // Loop melalui elemen-elemen lokasi
    for (var i = 0; i < locations.length; i++) {
        var locationName = locations[i].querySelector("h6").textContent.toLowerCase();
        
        // Periksa apakah nama lokasi cocok dengan input teks
        if (locationName.includes(searchText)) {
            locations[i].style.display = "block"; // Tampilkan elemen
        } else {
            locations[i].style.display = "none"; // Sembunyikan elemen
        }
    }
}









function locationdisplay() {
    console.log("Hello")




    Price();
}

getapi(api_url);


// JavaScript (jQuery)
// $(document).ready(function() {
//     // Mengambil data dari API saat halaman dimuat
//     $.ajax({
//         url: '/getdatalocation', // Ganti URL ini dengan URL endpoint API Anda
//         method: 'GET',
//         success: function(response) {
//             // Respons sukses, data diterima dari API
//             var maps = response.datalokasi; // Misalkan respons API berisi data lokasi dalam array "datalokasi"

//             // Mengganti konten pada mapsList dengan data dari API
//             var mapsListContainer = $('#table_data');
//             mapsListContainer.empty(); // Hapus konten yang ada sebelumnya

//             // Loop melalui data maps dan tambahkan ke dalam mapsListContainer
//             $.each(maps, function(index, map) {
//                 var mapBox = $('<button class="maps-box p-3 b-0" data-filter="markas" onclick="mapsList(' + index + ')" data-bs-dismiss="modal">');
//                 mapBox.append('<h6 class="fw-bold">' + map.lokasi + '</h6>');
//                 mapBox.append('<p>' + map.detaillokasi + '</p>');
//                 mapsListContainer.append(mapBox);
//             });
//         },
//         error: function(error) {
//             // Respons gagal, tangani kesalahan di sini
//             console.log('Terjadi kesalahan saat memuat data dari API.');
//         }
//     });
// });








