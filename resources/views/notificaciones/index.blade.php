<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Notificaciones') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xs sm:rounded-lg">
                <div class="p-6 text-gray-900 ">
                    
                    @forelse ($notificaciones as $notificacion)
                        <div class="p-5 border border-gray-200 lg:flex lg:justify-between lg:items-center">
                            <div>
                                <p> Tienes un nuevo mensaje de contacto en:
                                    <span class="font-bold">{{ $notificacion->data['titulo_inmueble']}}</span>
    
                                </p>
                                <p> Hace:
                                    <span class="font-bold">{{ $notificacion->created_at->diffForHumans()}}</span>
    
                                </p>
                            </div>
                            <div class="mt-5 lg:mt-0">
                                <p class="text-xl font-black mb-5">{{$notificacion->data['id_inmueble']}}</p>

                                <a class="bg-indigo-600 p-3 text-sm uppercase font-bold text-white rounded-lg" href="{{ route('notificaciones.mensajes', $notificacion->data['id_inmueble']) }}">ver Mensajes</a> 
                            </div>
                                
                        </div>
                    @empty
                        <p class="text-center text-gray-600" >No hay Notificaciones Nuevas</p>
                    @endforelse

                </div>
            </div>
        </div>
    </div>
</x-app-layout>
