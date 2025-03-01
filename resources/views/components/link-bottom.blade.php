@php
   $classes="rounded-sm py-2 px-10 bg-indigo-600 hover:bg-indigo-700 text-sm font-bold text-center text-white uppercase my-5 inline-block w-full sm:w-auto"
@endphp

<a {{ $attributes->merge(['class' => $classes]) }}>
    {{$slot}}
</a>