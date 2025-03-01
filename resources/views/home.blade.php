<x-appublic>
                

    {{-- ====================================================================
                    para mostrar el mapa 
    ====================================================================   --}}
                   
                    
                    <livewire:mapa-inicio>

     
    @push('scripts')
        
    <script src="https://unpkg.com/leaflet@1.8.0/dist/leaflet.js"></script>
    @endpush

</x-appublic>