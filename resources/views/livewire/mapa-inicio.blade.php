<div>

    @if (!$categoriaSeleccionada && !$termino)

        <h1 class="pt-5 text-4xl font-extrabold text-center">Ubicación en el Mapa</h1>
        <div class="container">
            <!-- Filtros -->
            {{-- para mostrar los select de categoria y precio  --}}
            <div class="flex flex-col items-center gap-4 py-10 md:flex-row">
                <h2 class="text-sm font-bold text-gray-800 uppercase">Filtrar Propiedades:</h2>
                <div class="flex items-center w-full gap-2 md:w-auto">
                    <x-input-label for="categorias" :value="__('CATEGORIAS')" />
                    <select id="categorias"
                        class="flex-1 w-full px-3 py-2 text-gray-700 bg-white border border-gray-300 rounded-md shadow-sm"
                        onchange="">
                        <option value="">- Selecione -</option>
                        @foreach ($categorias as $categoria)
                            <option value="{{ $categoria->id }}">{{ $categoria->nombre }}</option>
                        @endforeach

                    </select>

                </div>


                <div class="flex items-center w-full gap-2 md:w-auto">
                    <x-input-label for="precios" :value="__('PRECIOS')" />
                    <select id="precios"
                        class="flex-1 w-full px-3 py-2 text-gray-700 bg-white border border-gray-300 rounded-md shadow-sm">
                        <option value="">- Selecione -</option>
                        @foreach ($precios as $precio)
                            <option value="{{ $precio->id }}">{{ $precio->nombre }}</option>
                        @endforeach

                    </select>

                </div>

            </div>

            <div id="mapa-inicio" class="h-[600px]  m-auto"></div>

            {{-- ====================================================================
                            para mostrar la galeria de propiedades
            ====================================================================   --}}
                        

            @if ($terrenos->count())

                <section class="py-5">
                    <h2 class="pt-10 text-4xl font-extrabold text-center"> TERRENOS EN VENTA</h2>
            
                            <x-card-inmueble :inmuebles="$terrenos"/>
                
                </section>
            
            @endif

            @if ($lotes->count())

                <section class="py-5">
                    <h2 class="pt-10 text-4xl font-extrabold text-center"> LOTES EN VENTA</h2>
            
                            <x-card-inmueble :inmuebles="$lotes"/>
                
                </section>
            
            @endif


            @if ($casas->count())

                <section class="py-5">
                    <h2 class="pt-10 text-4xl font-extrabold text-center"> CASAS EN VENTA</h2>
            
                            <x-card-inmueble :inmuebles="$casas"/>
                
                </section>
                
            @endif

            @if ($departamentos->count())

                <section class="py-5">
                    <h2 class="pt-10 text-4xl font-extrabold text-center"> DEPARTAMENTOS EN VENTA</h2>
            
                            <x-card-inmueble :inmuebles="$departamentos"/>
                
                </section>
            
            @endif
        
            @if ($bodegas->count())

                <section class="py-5">
                    <h2 class="pt-10 text-4xl font-extrabold text-center"> BODEGAS EN VENTA</h2>
            
                            <x-card-inmueble :inmuebles="$bodegas"/>
                
                </section>
            
            @endif

        </div>    

        
    @endif


    <livewire:categoria>

</div>