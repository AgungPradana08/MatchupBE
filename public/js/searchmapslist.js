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
    const container = document.getElementById("location_list");

    data.forEach(function(item) {
        const option = document.createElement("option");
        option.textContent = item.detail_lokasi; // Set nilai opsi ke detail_lokasi
        option.value= item.title_lokasi; // Set teks opsi ke title_lokasi
        container.appendChild(option);
    });
}

getapi(api_url);

function formatCurrency(input) {
    // Menghapus semua karakter kecuali angka
    var value = input.value.replace(/\D/g, '');

    // Memisahkan nilai menjadi setiap 3 digit dengan titik
    value = value.replace(/\B(?=(\d{3})+(?!\d))/g, '.');

    // Menampilkan nilai yang sudah diformat kembali di input
    input.value = value;
}

