<x-app-layout>

    @push('styles')
        <link rel="stylesheet" href="https://unpkg.com/leaflet@1.8.0/dist/leaflet.css">
    @endpush

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Editar la Propiedad') }}
        </h2>
    </x-slot>

    <div class="items-center justify-center ">

        <div class="md:w-3/4 lg:w-3/5  mx-auto container py-10 px-10 bg-white rounded-lg shadow-xl mt-10 md: mt-0">
            <h1 class="text-2xl font-bold text-center my-10">
                Editar Inmueble: {{ $inmueble->titulo }}
            </h1>
            <h3 class="text-lg text-center pb-2 leading-6 font-medium text-gray-900">Información General</h3>
            <livewire:editar-inmueble :inmueble="$inmueble" />

        </div>

    </div>


    @push('scripts')


        <script src="https://unpkg.com/leaflet@1.8.0/dist/leaflet.js"></script>
        <script src="https://unpkg.com/esri-leaflet@3.0.8/dist/esri-leaflet.js"></script>
        <script src="https://unpkg.com/esri-leaflet-geocoder@2.2.13/dist/esri-leaflet-geocoder.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/leaflet-geosearch/2.7.0/bundle.min.js"></script>


        @stack('scripts')
 

    @endpush



</x-app-layout>
