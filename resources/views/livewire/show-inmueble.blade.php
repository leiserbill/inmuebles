<div>
    @if (!$categoriaSeleccionada && !$termino)

    <div
        class="relative min-h-screen flex flex-col items-center justify-center selection:bg-[#FF2D20] selection:text-white">
        <div class="relative w-full ">





            <h1 id="titulo" class="text-4xl my-10 font-extrabold text-center"> {{ $inmueble->titulo }}</h1>

            <x-link href="{{route('livewire.categoria', $inmueble->categoria->id)}}"
                class=" pl-10 text-indigo-600 text-xl">
                Categoria: <span class="font-normal">{{ $inmueble->categoria->nombre }}</span>
            </x-link>


            @if (@session()->has('mensaje'))
                <div class="uppercase border border-green-600 bg-green-100 text-green-600 font-bold p-2 my-3 text-sm">

                    {{ session('mensaje') }}
                </div>
            @endif
            <div class="container m-auto mt-5 md:flex md:gap-4 md:items-start">
                {{-- =====================================================================
                1.- LA IMAGEN Y DESCRIPCION
                ===================================================================== --}}
                <div class="bg-gray-400 md:w-2/3 bg-white shadow-sm rounded-lg">
                    <img class="object-cover h-4/5 w-full" src="{{ $inmueble->image }}" alt="imagen Inmueble">

                    <div class="px-5 py-10 space-y-5 h-1/5">
                        <p> {{ $inmueble->descripcion }} </p>
                        <h2 class="text-2xl leading-6 font-bold text-gray-900">Informacion Propiedad</h2>
                        <div class="grid gap-3 grid-cols-1 md:grid-cols-2">
                            <p class="flex items-center text-gray-600 font-bold text-xs">
                                <img class="flex grow-0 shrink-0 basis-[30px] mr-4"
                                    src="{{ asset('img') . '/' . 'icono_dormitorio.svg' }}" alt="imagen Inmueble">Habitaciones
                                <span class="text-gray-800 ml-3 block text-lg">{{ $inmueble->habitaciones }}</span>
                            </p>
                            <p class="flex items-center text-gray-600 font-bold text-xs">
                                <img class="flex  grow-0 shrink-0 basis-[30px] mr-4"
                                    src="{{ asset('img') . '/' . 'icono_estacionamiento.svg' }}" alt="">Estacionamiento
                                <span class="text-gray-800 ml-3 block text-lg">{{ $inmueble->estacionamiento }}</span>
                            </p>

                            <p class="flex items-center text-gray-600 font-bold text-xs">
                                <img class="flex grow-0 shrink-0 basis-[30px] mr-4"
                                    src="{{ asset('img') . '/' . 'icono_wc.svg' }}" alt="">WC
                                <span class="text-gray-800 ml-3 block text-lg">{{ $inmueble->WC }}</span>
                            </p>

                            <p class="flex items-center text-gray-600 font-bold text-xs">Precio
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20"
                                    fill="currentColor">
                                    <path
                                        d="M8.433 7.418c.155-.103.346-.196.567-.267v1.698a2.305 2.305 0 01-.567-.267C8.07 8.34 8 8.114 8 8c0-.114.07-.34.433-.582zM11 12.849v-1.698c.22.071.412.164.567.267.364.243.433.468.433.582 0 .114-.07.34-.433.582a2.305 2.305 0 01-.567.267z">
                                    </path>
                                    <path fill-rule="evenodd"
                                        d="M10 18a8 8 0 100-16 8 8 0 000 16zm1-13a1 1 0 10-2 0v.092a4.535 4.535 0 00-1.676.662C6.602 6.234 6 7.009 6 8c0 .99.602 1.765 1.324 2.246.48.32 1.054.545 1.676.662v1.941c-.391-.127-.68-.317-.843-.504a1 1 0 10-1.51 1.31c.562.649 1.413 1.076 2.353 1.253V15a1 1 0 102 0v-.092a4.535 4.535 0 001.676-.662C13.398 13.766 14 12.991 14 12c0-.99-.602-1.765-1.324-2.246A4.535 4.535 0 0011 9.092V7.151c.391.127.68.317.843.504a1 1 0 101.511-1.31c-.563-.649-1.413-1.076-2.354-1.253V5z"
                                        clip-rule="evenodd"></path>
                                </svg>
                                <span class="text-gray-800 ml-3 block text-lg">{{ $inmueble->precio->nombre }}</span>
                            </p>
                        </div>
                    </div>

                </div>
                {{-- =====================================================================
                2.- EL MAPA
                ===================================================================== --}}
                <aside class="md:w-1/3 bg-white shadow-sm rounded-lg">
                    <h3 class="text-center py-10 leading-6 text-2xl font-bold text-gray-900"> Ubicación</h3>

                   

                    <div class="h-96" id="mapa-show">
                        <p id="lat" class="hidden">{{ $inmueble->lat }}</p>
                        <p id="lng" class="hidden">{{ $inmueble->lng }}</p>
                    </div>

                    <p class="text-gray-600 font-bold text-xs p-5">Dirección
                        <span>
                            {{ $inmueble->calle }}
                        </span>
                    </p>

                    @auth
                        <livewire:enviar-mensaje :inmueble="$inmueble" />
                    @else
                        <div class="flex flex-col items-center justify-center gap-2 pb-5">
                            <p class="text-center text-2xl">Si deseas contactar al vendedor</p>
                            <a class="text-indigo-600 text-xl" href="{{ route('register') }}">debes crear una
                                cuenta</a>
                        </div>

                    @endauth
                </aside>
            </div>
           
                <div
                    class="grid grid-cols-auto-fit-300 gap-3 bg-white  shadow-sm py-8 px-4 rounded-sm mx-auto max-w-7xl my-5 md:px-10 justify-center items-center">


                    @foreach ($inmueble->images as $imagen)
                    <div class="border p-2 rounded-md shadow-md">
                        <img src={{ $imagen->url }} class="max-h-64 m-auto" alt="Imagen Inmueble" srcset="">
                    </div>
                    @endforeach
                </div>
            

        </div>
    </div>
        @endif

        

        <livewire:categoria>
    </div>