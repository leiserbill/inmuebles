( function () {
    
    const existeMapa = document.querySelector("#mapa");
    
    if (existeMapa) {
        const titulo = document.querySelector("#titulo");
        const miLat = document.querySelector("#lat");
        const miLng = document.querySelector("#lng");
       
       
        // Logical Or
        const lat = miLat.value || 18.9431234;
        const lng = miLng.value || -97.8065803;
    
           
    
            const mapa = L.map("mapa").setView([lat, lng], 13);

        let marker;
        const inputLat = document.querySelector("#lat");
        const inputLng = document.querySelector("#lng");
        const inputCalle = document.querySelector("#calle");
        const inputCalleClass = document.querySelector(".calle");

        // Utilizar Provider y Geocoder
        const geocodeService = L.esri.Geocoding.geocodeService();

        L.tileLayer("https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png", {
            attribution:
                '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors',
        }).addTo(mapa);

        // El Pin
        marker = new L.marker([lat, lng], {
            draggable: true,
            autoPan: true,
        }).addTo(mapa);

        let wireCalle = "";
        let wireLat = "";
        let wireLng = "";

        // Detectar el movimiento del pin
        marker.on("moveend", function (e) {
            marker = e.target;
            const posicion = marker.getLatLng();
            mapa.panTo(new L.LatLng(posicion.lat, posicion.lng));

            // Obtener la información de las calles al soltar el pin
            geocodeService
                .reverse()
                .latlng(posicion, 13)
                .run(function (error, resultado) {
                  

                    marker.bindPopup(resultado.address.LongLabel);

                    wireCalle = resultado?.address?.Address ?? "S/N";
                    wireLat = resultado?.latlng?.lat ?? "";
                    wireLng = resultado?.latlng?.lng ?? "";

                    // Llenar los campos
                    inputCalleClass.textContent = wireCalle;
                    inputCalle.value = wireCalle;
                    inputLat.value = wireLat;
                    inputLng.value = wireLng;

                    inputLat.dispatchEvent(new Event("input"));
                    inputLng.dispatchEvent(new Event("input"));
                    inputCalle.dispatchEvent(new Event("input"));



                });
        });
    
        
    }

})();
