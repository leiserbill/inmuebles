import Dropzone from "dropzone";
import { useCrudClaud } from "./useCrudClaud";
import Compressor from "compressorjs";


Dropzone.autoDiscover = false;

const drop = document.querySelector("#dropzone");

if (drop) {
    const dropzoneElement = document.getElementById('mi-dropzone');
    const { uploadFileSinFirmar } = useCrudClaud();

    const comprimirImagen = (archivo) => {
        return new Promise((resolve, reject) => {
            new Compressor(archivo, {
                quality: 0.8,
                maxHeight: 720,
                
                success(result) {
                    resolve(result);
                },
                error(err) {
                    reject(err);
                },
            });
        });
    };


    const dropzone = new Dropzone("#dropzone", {
        dictDefaultMessage: "Sube aquí tu imagen",
        acceptedFiles: ".png,.jpg,.jpeg,.gif",
        addRemoveLinks: true,
        dictRemoveFile: "Borrar Archivo",
        maxFiles: 6,
        uploadMultiple: false,
        maxFilesize: 2,
        parallelUploads: 1,
        autoProcessQueue: false,
        dictMaxFilesExceeded: "El límite es 5 archivos",
        
    });

 

    const procesarImagenes = async () => {
        const archivos = dropzone.files;
        let inmuebleId = dropzoneElement.dataset.inmuebleId
        const numImagenes = dropzoneElement.dataset.numeroImagenes
        const datosImagenes = [];
        const imagenesTotal = Number(archivos.length) + Number(numImagenes)

        if(imagenesTotal>=6 ){

            Swal.fire({
                title: 'El máximo es de seis imágenes',
                text: `¡En total tendria ${imagenesTotal} imágenes, No puede subir más de seis !`,
                icon: 'warning',
                confirmButtonColor: '#d33',
                confirmButtonText: 'Aceptar'
            });
            return
        }

        for (const archivo of archivos) {
            try {
                const comprimida = await comprimirImagen(archivo);
                const respuesta = await uploadFileSinFirmar(comprimida);
              
                // Enviar datos a Livewire
                    datosImagenes.push({
                        url: respuesta.secure_url,
                        imagen: respuesta.display_name,
                        inmueble_id: inmuebleId
                    } )
         
                } catch (error) {
                    console.error("Error procesando la imagen:", error);
                }
            }

        Livewire.dispatch("guardarImagen",  { imagenes: datosImagenes });
     
    };

    const botonSubir = document.getElementById("subir-imagenes");
    if (botonSubir) {
        botonSubir.addEventListener("click", procesarImagenes);
    }

    Livewire.on("imagenGuardada", () => {
        alert("Imagen guardada correctamente en la base de datos.");
    });
    
    
    
}
