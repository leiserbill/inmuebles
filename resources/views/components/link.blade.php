@php
    $classes ="text-sm text-gray-500 hover:text-gray-900 rounded-md focus:outline-hidden focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500"
@endphp

<a {{ $attributes->merge(['class' => $classes]) }}>
    {{$slot}}
</a>