<x-appublic>

    
        <livewire:show-inmueble :inmueble="$inmueble"/>
 

        @push('scripts')
        <script src="https://unpkg.com/leaflet@1.8.0/dist/leaflet.js"></script>
        @endpush

</x-appublic>