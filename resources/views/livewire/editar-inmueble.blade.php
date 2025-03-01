<div>
    <form wire:submit.prevent='editarInmueble' class="space-y-3">

        <!-- Name -->
        <div>
            <x-input-label for="titulo" :value="__('TITULO DE ANUNCIO')" />
            <x-text-input 
            id="titulo" 
            class="block mt-1 w-full" 
            type="text" 
            wire:model="titulo" :value="old('titulo')"
                {{-- autocomplete="titulo"  --}} placeholder="Eje. Casa en la playa" />

            @error('titulo')
                <livewire:mostrar-alerta :message='$message' />
            @enderror
        </div>

        <!-- Email Address -->
        <div class="mt-4">
            <x-input-label for="descripcion" :value="__('DESCRIPCION')" />
            <textarea id="descripcion" class="w-full block mt-1 px-3 py-2 border border-gray-300 rounded-md placeholder-gray-400"
                cols="30" rows="5" wire:model="descripcion" autocomplete="descripcion"
                placeholder="Describe la propiedad"> 
            {{ old('descripcion') }}
        </textarea>

            @error('descripcion')
                <livewire:mostrar-alerta :message='$message' />
            @enderror
        </div>

        <div class="md:flex md:gap-4 space-y-5 md:space-y-0">
            <div class="md:w-1/2">

                <x-input-label for="categoria" :value="__('CATEGORIA')" />

                <select id="categoria" wire:model="categoria"
                    class="rounded-md shadow-xs border-gray-300 focus:border-indigo-300 focus:ring-3 focus:ring-indigo-200 focus:ring-opacity-50 w-full">

                    <option value="">- Selecione -</option>
                    @foreach ($categorias as $categoria)
                        <option value="{{ $categoria->id }}">{{ $categoria->nombre }}</option>
                    @endforeach

                </select>
                @error('categoria')
                    <livewire:mostrar-alerta :message='$message' />
                @enderror
            </div>

            <div class="md:w-1/2">
                <x-input-label for="precio" :value="__('PRECIO')" />
                <select id="precio" wire:model="precio"
                    class="rounded-md shadow-xs border-gray-300 focus:border-indigo-300 focus:ring-3 focus:ring-indigo-200 focus:ring-opacity-50 w-full">

                    <option value="">- Selecione -</option>
                    @foreach ($precios as $precio)
                        <option value="{{ $precio->id }}">{{ $precio->nombre }}</option>
                    @endforeach

                </select>
                @error('precio')
                    <livewire:mostrar-alerta :message='$message' />
                @enderror
            </div>
        </div>

        <div class="md:flex space-x-3 space-y-5 md:space-y-0 mt-2">

            <div class="md:w-1/3">
                <x-input-label for="habitaciones" :value="__('HABITACIONES')" />

                <select id="habitaciones" wire:model="habitaciones"
                    class="rounded-md shadow-xs border-gray-300 focus:border-indigo-300 focus:ring-3 focus:ring-indigo-200 focus:ring-opacity-50 w-full">

                    <option value="">- Seleccione -</option>
                    @php
                        $n = 0;
                    @endphp
                    @while ($n <= 5)
                        <option value="{{ $n }}">{{ $n }}</option>
                        @php
                            $n++;
                        @endphp
                    @endwhile
                </select>

            </div>

            <div class="md:w-1/3">
                <x-input-label for="estacionamiento" :value="__('ESTACIONAMIENTO')" />
                <select id="estacionamiento"
                    class="rounded-md shadow-xs border-gray-300 focus:border-indigo-300 focus:ring-3 focus:ring-indigo-200 focus:ring-opacity-50 w-full"
                    wire:model="estacionamiento">
                    <option value="">- Seleccione -</option>
                    @php
                        $n = 0;
                    @endphp
                    @while ($n <= 5)
                        <option value="{{ $n }}">{{ $n }}</option>
                        @php
                            $n++;
                        @endphp
                    @endwhile
                </select>

            </div>

            <div class="md:w-1/3">
                <x-input-label for="WC" :value="__('WC')" />
                <select id="WC"
                    class="rounded-md shadow-xs border-gray-300 focus:border-indigo-300 focus:ring-3 focus:ring-indigo-200 focus:ring-opacity-50 w-full"
                    wire:model="WC">

                    <option value="">- Seleccione -</option>
                    @php
                        $n = 0;
                    @endphp
                    @while ($n <= 5)
                        <option value="{{ $n }}">{{ $n }}</option>
                        @php
                            $n++;
                        @endphp
                    @endwhile
                </select>
            </div>
        </div>
        @error('habitaciones')
            <livewire:mostrar-alerta :message='$message' />
        @enderror
        @error('estacionamiento')
            <livewire:mostrar-alerta :message='$message' />
        @enderror
        @error('WC')
            <livewire:mostrar-alerta :message='$message' />
        @enderror

        <div class="border-gray-200 border-t py-5 space-y-5">
            <h3 class="text-lg leading-6 font-medium text-gray-900">Ubicación</h3>
            <p class="text-gray-600">Ubica la propiedad en el mapa</p>
            {{-- 
        ==========================================================
                        MAPA
        ========================================================== --}}

            <div wire:ignore id="mapa-edit" class="h-96 min-w-full">

            </div>


            <div wire:ignore>
                <p class="calle"></p>
            </div>


            <x-text-input id="calle" type="hidden" wire:model="calle" :value="old('calle')" />

            <x-text-input id="lat" type="hidden" wire:model="lat" :value="old('lat')" />

            <x-text-input id="lng" type="hidden" wire:model="lng" :value="old('lng')" />
            @error('lat')
                <div class="border border-red-500 bg-red-100 text-red-700 font-bold uppercase p-2 mt-2 text-xs">'Con el pin
                    hubique la propiedad en el mapa' </div>
            @enderror


        </div>

        <x-primary-button class="ml-3 w-full justify-center">
            {{ __('GUARDAR Y VER IMAGEN') }}
        </x-primary-button>

        
    </form>
    
    @push('scripts')

    
    @script    
       
        <script>

                (function() {
                

                    const existeMapa = document.querySelector("#mapa-edit");

                    if (existeMapa) {

                        const miLat = document.querySelector("#lat");
                        const miLng = document.querySelector("#lng");
                        setTimeout(() => {
                            // Logical Or
                            $wire.lat = miLat.value
                            $wire.lng = miLng.value

                        }, 3000);


                        const mapa = L.map("mapa-edit").setView([$wire.lat, $wire.lng], 13);



                        let marker;
                        const inputLat = document.querySelector("#lat");
                        const inputLng = document.querySelector("#lng");
                        const inputCalle = document.querySelector("#calle");
                        const inputCalleClass = document.querySelector(".calle");

                        // Utilizar Provider y Geocoder
                        const geocodeService = L.esri.Geocoding.geocodeService();

                        L.tileLayer("https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png", {
                            attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors',
                        }).addTo(mapa);

                        // El Pin
                        marker = new L.marker([$wire.lat, $wire.lng], {
                            draggable: true,
                            autoPan: true,
                        }).addTo(mapa);

                        let wireCalle = "";
                        let wireLat = "";
                        let wireLng = "";

                        // Detectar el movimiento del pin
                        marker.on("moveend", function(e) {
                            marker = e.target;
                            const posicion = marker.getLatLng();
                            mapa.panTo(new L.LatLng(posicion.lat, posicion.lng));

                            // Obtener la información de las calles al soltar el pin
                            geocodeService
                                .reverse()
                                .latlng(posicion, 13)
                                .run(function(error, resultado) {
                               

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
            </script>
        @endscript
    @endpush


    
</div>
