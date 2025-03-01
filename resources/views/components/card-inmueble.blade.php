@props(['inmuebles'])

<div class="px-5 grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-5 mt-14">

    @foreach ($inmuebles as $inmueble)
        <div class=" bg-gray-400 rounded-lg">

            <img class="object-cover h-72 w-full" src={{ $inmueble->image }} alt=` imagen casa`>
            <div class="p-10 space-y-5">
                <h3 class="text-2xl font-bold"> {{ $inmueble->titulo }}</h3>

                <ul class="flex list-style-type: none; p-0 max-w-xl">
                    <li class="flex w-1/3">
                        <img class="w-1/2 grow-0 shrink-0 basis-[25px] mr-4"
                            src="{{ asset('img') . '/' . 'icono_dormitorio.svg' }}" alt="">
                        <p class="w-1/2 text-gray-600 font-bold text-2xl">
                            {{ $inmueble->habitaciones }}
                        </p>
                    </li>
                    <li class="flex w-1/3">
                        <img class="w-1/2 grow-0 shrink-0 basis-[25px] mr-4"
                            src="{{ asset('img') . '/' . 'icono_estacionamiento.svg' }}" alt="">
                        <p class="w-1/2 text-gray-600 font-bold text-2xl">
                            {{ $inmueble->estacionamiento }}
                        </p>
                    </li>
                    <li class="flex w-1/3">
                        <img class="w-1/2 grow-0 shrink-0 basis-[25px] mr-4"
                            src="{{ asset('img') . '/' . 'icono_wc.svg' }}" alt="">
                        <p class="w-1/2 text-gray-600 font-bold text-2xl">
                            {{ $inmueble->WC }}
                        </p>
                    </li>
                </ul>

                
                <x-link-bottom class="flex justify-center" :href="route('inmuebles.show', ['inmueble' => $inmueble->id])">
                    Ver Propiedad
                </x-link-bottom>

            </div>
        </div>
    @endforeach
</div>
