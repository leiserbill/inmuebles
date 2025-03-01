<div class="hidden w-full px-5 py-5 bg-indigo-700 md:block ">
    <div class="container flex justify-between items-center mx-auto text-gray-400">

        


        <form wire:submit = 'buscarCategoria'>

            <div class="flex" x-data="{id: 0, categoriaSeleccionada: @entangle('categoriaSeleccionada')}"
                >
                
                @foreach ($categorias as $categoria)
                <button x-on:click="[id = {{$categoria->id}}, categoriaSeleccionada = {{$categoria}}]" class="inline-flex items-center px-2 mx-1 py-2  border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest cursor-pointer hover:bg-indigo-600 transition ease-in-out duration-150  " :class="{'bg-indigo-700 active:bg-indigo-900 outline-hidden ring-2 ring-indigo-500 ring-offset-2': parseInt(id) === {{$categoria->id}}}">
                    {{$categoria->nombre}}
                </button>
                @endforeach

            </div>

        </form>


        <form wire:submit = "terminoBusqueda" class="flex items-center ">
            
            <div class="flex items-center gap-1 relative">
                <label class="border-r-indigo-500 absolute inset-y-0 top-2 right-1  text-sm font-bold r-0 uppercase " for="termino" 
                   ><svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                    <path stroke-linecap="round" stroke-linejoin="round" d="m21 21-5.197-5.197m0 0A7.5 7.5 0 1 0 5.196 5.196a7.5 7.5 0 0 0 10.607 10.607Z" />
                  </svg></label>
                <x-text-input 
                id="termino" 
                class="p-2 text-sm rounded-lg shadow" 
                type="text" 
                wire:model="termino" 
                :value="old('termino')"
              
                {{-- autocomplete="titulo"  --}}
                placeholder="Buscar Propiedades" />
    
                @error('termino')
                     <livewire:mostrar-alerta :message='$message'/>                           
                @enderror
            </div>
                <x-primary-button class="ml-3 w-full justify-center hover:bg-indigo-800 cursor-pointer">
                    {{ __('Buscar') }}
                </x-primary-button>
        </form>
    </div>
</div>