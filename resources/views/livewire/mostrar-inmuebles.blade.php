<div>

    {{-- if(count($inmuebles) > 0) --}}
    <div class="bg-transparent shadow-sm rounded-lg mb-5 ">
        @forelse($inmuebles as $inmueble)
            <ul class="bg-white mb-1 rounded-lg divide-y divide-gray-200 border border-1">


                <li>
                    <div
                        class="p-6 w-full flex flex-col sm:flex-row sm:items-center sm:justify-between space-y-8 md:space-y-0 gap-4">


                        <a class="sm:w-1/4 md:w-1/6" href="{{ route('inmuebles.agregar-imagen', $inmueble->id) }}">
                            <img class="w-full block" src="{{ $inmueble->image}}" alt=` agrega o cambia la imagen
                                {{ $inmueble->titulo }}`>

                        </a>


                        <div class="sm:w-2/4 md:w-3/6 lg:w-4/6 space-y-3">
                            
                            <a href="{{route('inmuebles.show', ['inmueble' => $inmueble->id])}}" class="block text-2xl font-extrabold text-indigo-600 truncate">
                                {{ $inmueble->titulo }}</a>
                            <p class="text-sm text-black font-bold">
                                {{ $inmueble->categoria->nombre }}
                            </p>
                            <p class="text-sm text-gray-500 font-bold flex items-center ">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20"
                                    fill="currentColor">
                                    <path
                                        d="M8.433 7.418c.155-.103.346-.196.567-.267v1.698a2.305 2.305 0 01-.567-.267C8.07 8.34 8 8.114 8 8c0-.114.07-.34.433-.582zM11 12.849v-1.698c.22.071.412.164.567.267.364.243.433.468.433.582 0 .114-.07.34-.433.582a2.305 2.305 0 01-.567.267z">
                                    </path>
                                    <path fill-rule="evenodd"
                                        d="M10 18a8 8 0 100-16 8 8 0 000 16zm1-13a1 1 0 10-2 0v.092a4.535 4.535 0 00-1.676.662C6.602 6.234 6 7.009 6 8c0 .99.602 1.765 1.324 2.246.48.32 1.054.545 1.676.662v1.941c-.391-.127-.68-.317-.843-.504a1 1 0 10-1.51 1.31c.562.649 1.413 1.076 2.353 1.253V15a1 1 0 102 0v-.092a4.535 4.535 0 001.676-.662C13.398 13.766 14 12.991 14 12c0-.99-.602-1.765-1.324-2.246A4.535 4.535 0 0011 9.092V7.151c.391.127.68.317.843.504a1 1 0 101.511-1.31c-.563-.649-1.413-1.076-2.354-1.253V5z"
                                        clip-rule="evenodd"></path>
                                </svg>
                                {{ $inmueble->precio->nombre }}

                            </p>
                            <a href="{{route('notificaciones.mensajes', $inmueble->id)}}" class="text-sm text-gray-600">{{ $inmueble->getMensajesCount() }}
                                Mensajes </a>

                        </div>
                        <div class="sm:w-1/4 md:w-2/6 lg:w-1/6 flex flex-col 2xl:flex-row gap-2 ">
                            <button type="button" data-propiedad-id={{ $inmueble->id }}
                                class= "cambiar-estado w-full px-2 py-2 md:py-1 text-xs leading-5 font-semibold rounded-sm cursor-pointer {{ $inmueble->publicado ? 'bg-green-100 text-green-800' : 'bg-yellow-100 text-yellow-800' }}">
                                {{ $inmueble->publicado ? 'Publicado' : 'No Publicado' }}
                            </button>

                            <a href="{{ route('inmuebles.edit', $inmueble->id) }}"
                                class="text-center px-2 py-2 md:py-1 text-xs leading-5 font-semibold rounded-sm cursor-pointer bg-indigo-100 text-indigo-800">
                                Editar
                            </a>

                            <button wire:click="$dispatch('mostrarAlerta', {{ $inmueble->id }})"
                                class="text-center px-2 py-2 md:py-1 text-xs leading-5 font-semibold rounded-sm cursor-pointer bg-red-100 text-red-800">
                                Eliminar
                            </button>

                        </div>
                    </div>
                </li>
            </ul>
            {{-- @endforeach --}}
        @empty
            <p class="p-3 text-center text-sm text-gray-600">No Hay Propiedades</p>
        @endforelse



        @push('scripts')

            @assets
                <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
            @endassets

            @script
                <script>
                    // El siguiente código es el Alert utilizado

                    $wire.on('mostrarAlerta', inmuebleId => {
                        Swal.fire({
                            title: 'Eliminar Publicació?',
                            text: "No podra recuperar la Publicación!",
                            icon: 'warning',
                            showCancelButton: true,
                            confirmButtonColor: '#3085d6',
                            cancelButtonColor: '#d33',
                            confirmButtonText: 'Si ¡Eliminar!',
                            cancelButtonText: 'Cancelar'
                        }).then((result) => {
                            if (result.isConfirmed) {

                                const data = {
                                    "inmueble" : inmuebleId
                                }

                               $wire.dispatch(
                                'eliminarInmueble',  data
                                );
                               
                                Swal.fire(
                                    '¡Se Elimino la Publicación!',
                                    'Elliminado Correctamente.',
                                    'success'
                                );
                            }
                        })
                    })
                </script>
            @endscript
        @endpush


    </div>
    
    {{-- ===========================================
            Agregando la paginacion
    =========================================== --}}
    <div class="text-wite py-10 container mx-auto">
        {{ $inmuebles->links() }}
    </div>