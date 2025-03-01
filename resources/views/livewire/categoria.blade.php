
<div class="py-5">
        @isset($nombreCategoria)
             <h2 class="pt-10 text-4xl font-extrabold text-center uppercase"> {{$nombreCategoria}}</h2>  

                       @if (count($inmuebles)>0)
    
                            <section class="py-5">
                           
                                    <x-card-inmueble :inmuebles="$inmuebles"/>
                         
                            </section>
                        @else
                            <h2 class=" p-3 text-center text-2xl" >¡no hay resultados aun! </h2 > <p class="text-center text-xl" >intenta con otra categoria o busqueda</p>
                        @endif 
    
        @endisset
</div>
    
       
      
    

