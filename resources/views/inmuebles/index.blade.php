<x-app-layout class="py-10">
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Mis Propiedades') }}
        </h2>
    </x-slot>
    

            
    <div class="py-10">
        @if (auth()->user()->roll === 3)
            {{-- <h1 class="text-4xl my-10 font-extrabold text-center">Bienes <span class="font-normal">Raices</span> </h1> --}}
            @if(@session()->has('mensaje'))
            
            <div class="uppercase border border-green-600 bg-green-100 text-green-600 font-bold p-2 my-3 text-sm">

                {{ session('mensaje') }}
            </div>
            @endif
        
        <x-link-bottom :href="route('inmuebles.create')">
            Publicar Propiedad 
        </x-link-bottom>

        <livewire:mostrar-inmuebles/>


    </div >
        @else
        <div class="max-w-fit text-center m-auto">
            <h1 class="text-2xl font-bold">Contactanos y publica tu propiedad</h1>
                <p class="text-sm">Asta ahora puedes contactar a los propietarios de los inmuebles </p>
                <p class="text-sm">¿Te gustaria publicar tu(s) propiedad(es)?, envianos un mensaje </p>
                <p class="text-sm">Captura los datos de tu propiedad en breve estaremos en contacto</p>
                
                <livewire:nuevo-vendedor/>


        </div>

        @endif
        
</x-app-layout>
