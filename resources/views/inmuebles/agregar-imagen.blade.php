<x-app-layout class="py-10">
    @push('styles')
        <link rel="stylesheet" href="https://unpkg.com/dropzone@5/dist/min/dropzone.min.css" type="text/css" />
    @endpush
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Administra tus Imagenes') }}
        </h2>
    </x-slot>

    <div class="">

        @if (@session()->has('mensaje'))
            <div class="uppercase border border-green-600 bg-green-100 text-green-600 font-bold p-2 my-3 text-sm">

                {{ session('mensaje') }}
            </div>
        @endif

        <livewire:subir-imagen :inmueble="$inmueble" />
        {{-- @livewire('subir-imagen', ['inmueble' => $inmueble]) --}}


        <p>{{ $inmueble->id }}</p>

    </div>


    @push('scripts')
        <script src="https://unpkg.com/dropzone@5/dist/min/dropzone.min.js"></script>
    @endpush

</x-app-layout>
