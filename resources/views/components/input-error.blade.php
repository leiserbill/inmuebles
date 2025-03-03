@props(['messages'])

@if ($messages)
    <ul {{ $attributes->merge(['class' => 'text-sm bg-red-100 border-l-4 border-red-600 font-bold p-2 text-red-600 space-y-1']) }}>
        @foreach ((array) $messages as $message)
            <li>{{ $message }}</li>
        @endforeach
    </ul>
@endif
