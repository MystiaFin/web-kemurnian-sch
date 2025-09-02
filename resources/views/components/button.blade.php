@props([
    'href' => '#', 
    'text' => 'READ ON'
])

@php
$buttonPrimary = 'w-40 my-12 p-3 py-5 bg-btn-primary text-white font-bold tracking-widest rounded-full cursor-pointer shadow-xl hover:bg-btn-hover ease-out transition-colors duration-200 inline-block text-center';
@endphp

<a href="{{ $href }}" {{ $attributes->merge(['class' => $buttonPrimary]) }}>
    {{ $text }}
</a>