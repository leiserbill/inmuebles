<div>
    
    @if ($showBar)
    <div class="flex absolute fixed bottom-0 left-0 items-center w-full gap-2 px-12 py-5 text-white bg-indigo-400 z-999">
        
             <div class="flex-1">
                 <p>
                     En este sitio usamos y recopilamos cookies para un correcto funcionamiento del sitio, proporcionar un acceso seguro y ofrecer contenido adaptado a tus intereses. Al continuar navegando en el sitio, nos das permiso para su utilización. Para más información, ver nuestra <x-link target="_blank" rel="noopener noreferrer" class="text-indigo-800" :href="route('politicas')"> Politica de Privacidad  </x-link> .
                 </p>
             </div>
             <div class="w-2/12">
 
                 <x-primary-button wire:click="aceptarCookie" class="ml-3 w-full justify-center">
                     {{__('aceptar')}}
                 </x-primary-button>
 
             </div>
 
       
         </div>
    @endif
    
</div>
