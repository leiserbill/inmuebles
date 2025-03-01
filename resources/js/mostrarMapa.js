(function() {
    const existeMapa = document.querySelector("#mapa-show");
    
    if (existeMapa) {
        const miLat = document.querySelector("#lat");
        const miLng = document.querySelector("#lng");
    const lat = miLat.textContent
    const lng = miLng.textContent

    const titulo = document.querySelector('#titulo').textContent
    const mapa = L.map('mapa-show').setView([lat, lng], 16)

    L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
        attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
    }).addTo(mapa);

    // Agregar el pin
    L.marker([lat, lng])
        .addTo(mapa)
        .bindPopup(titulo)
    
    }
})()