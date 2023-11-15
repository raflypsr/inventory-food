@props(['active'])

@php
$classes = ($active ?? false)
            ? 'flex items-center w-full h-14 backdrop-opacity-20 px-5 backdrop-invert'
            : 'flex items-center w-full h-14 focus:backdrop-opacity-20 px-5 focus:backdrop-invert';
@endphp

<a {{ $attributes->merge(['class' => $classes]) }}>
    {{ $slot }}
</a>



               