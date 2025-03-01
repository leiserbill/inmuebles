
(  function(){
    const existeMapa = document.querySelector('#mapa-inicio');

    if(existeMapa){
   

    const lat = 18.9431234;
    const lng = -97.8065803;
    const mapa = L.map('mapa-inicio').setView([lat, lng ], 13);

    let markers = new L.FeatureGroup().addTo(mapa)

    let propiedades = [];
    
    
    // Filtros
    const filtros = {
        categoria: '',
        precio: ''
    }

    //para obtener el valor que me ayuda a filtrar las propiedades por categoria y precio
    const categoriasSelect = document.querySelector('#categorias');
    const preciosSelect = document.querySelector('#precios');

    

    L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
        attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
    }).addTo(mapa)

    // Filtrado de Categorias y precios
    categoriasSelect.addEventListener('change', e => {
        
        filtros.categoria = +e.target.value
        filtrarPropiedades();
    })

    preciosSelect.addEventListener('change', e => {
        
        filtros.precio = +e.target.value
        filtrarPropiedades();
    })

    const obtenerPropiedades = async () => {
        try {
            const url = '/propiedades'
            const respuesta = await fetch(url)
           
            propiedades = await respuesta.json()
           
            mostrarPropiedades(propiedades)
        } catch (error) {
           
        }
    }

    // utilizo mostrarPropiedades para pasar informacion a los markers
    const mostrarPropiedades = propiedades => {
        
        // Limpiar los markers previos
        markers.clearLayers()
        
        propiedades.forEach(propiedad => {

          
            // Agregar los pines
            const marker = new L.marker([propiedad?.lat, propiedad?.lng ], {
                autoPan: true
            })
            .addTo(mapa)
            .bindPopup(`
                <p class="text-indigo-600 font-bold">${propiedad.categoria}</p>
                <h1 class="text-xl font-extrabold uppercase my-2">${propiedad?.titulo}</h1>
                
                <img src=${propiedad?.image} alt= "imagen casa" class="max-h-32 m-auto">
                <p class="text-gray-600 font-bold">${propiedad.precio}</p>
                <a href="/inmuebles/${propiedad.id}" class="bg-indigo-600 block p-2 text-center font-bold uppercase"> <span class = " text-gray-200 ">Ver Propiedad</span> </a>
                `)
                markers.addLayer(marker)
            })
    }
    
    const filtrarPropiedades = () => {

        const resultado = propiedades.filter( filtrarCategoria ).filter( filtrarPrecio )
        mostrarPropiedades(resultado)
        
    }
    
    const filtrarCategoria = propiedad => filtros.categoria ? filtros.categoria === propiedad.categoria_id : propiedad
   
    const filtrarPrecio = propiedad => filtros.precio ? filtros.precio === propiedad.precio_id : propiedad
   
    obtenerPropiedades();
    
    }

})()