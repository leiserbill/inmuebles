<div>


    <div class="w-2/3
     bg-white shadow py-8 px-4 rounded mx-auto max-w-4xl my-10 md:px-10">

        <form action="/upload" id="dropzone" enctype="multipart/form-data" method="POST"
            class="dropzone border-dashed border-2   rounded-sm flex flex-wrap justify-center items-center" novalidate>
            @csrf


        </form>

        <div id="mi-dropzone" data-inmueble-id={{ $inmueble->id }} data-numero-imagenes={{ count($imagenes) }} >
           
        </div>
    </div>


    <x-primary-button id="subir-imagenes" class="ml-3 w-full justify-center">
        {{ __('SUBIR IMAGENES') }}
    </x-primary-button>

    
        <x-input-label  :value="__('SELECCIONA UNA IMAGEN PRINCIPAL')" class="text-center mt-5" />
        
    <div class="grid grid-cols-auto-fit-200 gap-3 bg-white  shadow-sm py-8 px-4 rounded-sm mx-auto max-w-4xl my-5 md:px-10 justify-center items-center">

            @foreach ($imagenes as $imagen)


                <div class="relative border p-2 rounded-md shadow-md">

                    <img src= {{ $imagen->url }} class="max-h-32  m-auto" alt= "imagen del predio" >
                    <!-- Casilla flotante (Radio Button) -->
                <input 
                type="radio" 
                wire:model="imagenSeleccionada" 
                value="{{ $imagen->id }}" 
                class="absolute top-2 left-2 w-5 h-5 text-blue-600 bg-white border-gray-300 rounded-sm focus:ring-blue-500">

                <button wire:click="$dispatch('alertaImagen', {{ $imagen->id }})"
                    class="absolute top-2 right-2 w-5 h-5 shadow-md cursor-pointer bg-red-100 text-red-800 hover:ring-blue-500">
                    X
                </button>

                </div>

            @endforeach
        </form>
    </div>
    
    <form wire:submit.prevent='seleccionarImagen'  class="space-y-3">
        
        @error('imagenSeleccionada')
            <livewire:mostrar-alerta :message='$message'/>    
        @enderror
        <x-primary-button class="ml-3 w-full justify-center">
            {{ __('GUARDAR CAMBIOS') }}
        </x-primary-button>
    </form>
    
    @push('scripts')

        @assets
            <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
        @endassets

        @script
        <script>
            // El siguiente código es el Alert utilizado
            $wire.on('alertaImagen', imagenId => {
                Swal.fire({
                    title: 'Eliminar Imagen?',
                    text: "No podra recuperar la Imagen!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Si ¡Eliminar!',
                    cancelButtonText: 'Cancelar'
                }).then((result) => {
                    if (result.isConfirmed) {

                        const data = {
                            "image" : imagenId
                        }

                       $wire.dispatch(
                        'eliminarImagen',  data
                        );
                       
                        Swal.fire(
                            '¡Se Elimino la Imagen!',
                            'Eliminado Correctamente.',
                            'success'
                        );
                    }
                    
                })
            })

            
        </script>
    @endscript
       
    @endpush


</div>
