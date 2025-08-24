@php
    $mainHeight = 'h-16';
    $hamburgerLineClasses = 'w-5 h-[3px] bg-white';
@endphp
<nav class="bg-gray-primary fixed top-0 z-50 m-0 {{ $mainHeight }} w-full p-0">
    <div class="flex h-full flex-row items-center justify-between">
        <!-- Hamburger Menu Button (Left) -->
        <button class="bg-btn-primary flex {{ $mainHeight }} w-16 flex-col items-center justify-center space-y-1 cursor-pointer">
            <div class="{{ $hamburgerLineClasses }}"></div>
            <div class="{{ $hamburgerLineClasses }}"></div>
            <div class="{{ $hamburgerLineClasses }}"></div>
        </button>

        <div class="absolute left-1/2 -translate-x-1/2 transform">
            <img src="{{ Vite::asset('resources/images/nav_logo.webp') }}" alt="Logo" class="{{ $mainHeight }} object-contain">
        </div>

        <!-- Empty space to balance the layout (Right) -->
        <div class="w-10"></div>
    </div>
</nav>
