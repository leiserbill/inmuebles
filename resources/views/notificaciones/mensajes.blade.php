<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xs sm:rounded-lg">
                <div class="p-6 text-gray-900">

                    <h2 class="text-2xl font-extrabold text-center my-10"> </h2>
                    <a href="{{route('inmuebles.index')}}"
                        class="rounded-sm py-2 px-10 bg-indigo-600 hover:bg-indigo-700 text-sm font-bold text-center text-white uppercase my-5 inline-block w-full sm:w-auto">
                        Volver</a>

                    <div class="mx-auto max-w-4xl bg-white shadow-sm">
                        @if ($mensajes->count())
                            <ul>
                                @foreach ($mensajes as $mensaje)
                                    <li class="p-5 border border-gray-200 lg:flex lg:justify-between lg:items-center">
                                        <p class="font-normal text-gray-800">
                                            Nombre:<span class="font-bold">{{ $mensaje->user->name }}</span>
                                        </p>
                                        <p class="font-normal text-gray-800">
                                            Email:<span class="font-bold">{{ $mensaje->user->email }}</span>
                                        </p>
                                        <p class="font-normal text-gray-800">
                                            Mensaje:<span class="font-bold">{{ $mensaje->mensaje }}</span>
                                        </p>
                                        <p class="font-normal text-gray-800">
                                            Enviado:<span class="font-bold">{{$mensaje->created_at->diffForHumans()}}</span>
                                        </p>

                                    </li>
                                @endforeach
                            </ul>
                        @else
                            <p class="text-center text-gray-600 p-5">No Hay Mensajes</p>
                        @endif


                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
