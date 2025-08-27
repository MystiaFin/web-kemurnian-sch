<div class="relative w-full h-[480px] overflow-hidden" style="background-color: #641609;" id="hero-carousel">
    @if($heroBanners->count() > 0)
        <!-- Image Container -->
        <div class="flex w-full h-full transition-transform duration-500 ease-in-out" id="carousel-track">
            @foreach($heroBanners as $banner)
                <div class="flex-shrink-0 w-full h-full flex items-center justify-center">
                    <img 
                        src="{{ $banner->image_urls }}" 
                        alt="Hero Banner {{ $loop->iteration }}"
                        class="h-full object-contain"
                        loading="{{ $loop->first ? 'eager' : 'lazy' }}"
                        decoding="async"
                        @if(!$loop->first) style="visibility: hidden;" @endif
                    >
                </div>
            @endforeach
            <!-- Duplicate first slide for seamless loop -->
            @if($heroBanners->count() > 1)
                <div class="flex-shrink-0 w-full h-full flex items-center justify-center">
                    <img 
                        src="{{ $heroBanners->first()->image_urls }}" 
                        alt="Hero Banner"
                        class="h-full object-contain"
                        loading="lazy"
                        decoding="async"
                        style="visibility: hidden;"
                    >
                </div>
            @endif
        </div>

        <!-- Indicators -->
        @if($heroBanners->count() > 1)
            <div class="absolute bottom-6 left-1/2 transform -translate-x-1/2 flex space-x-3">
                @foreach($heroBanners as $index => $banner)
                    <button 
                        class="w-3 h-3 rounded-full transition-colors duration-300 hover:scale-110 transform {{ $loop->first ? 'bg-red-500' : 'bg-white bg-opacity-60' }}"
                        onclick="goToSlide({{ $index }})"
                        id="indicator-{{ $index }}"
                        aria-label="Go to slide {{ $loop->iteration }}"
                    ></button>
                @endforeach
            </div>
        @endif
    @else
        <!-- No banners state -->
        <div class="flex items-center justify-center h-full">
            <div class="text-center text-white">
                <div class="w-16 h-16 mx-auto mb-4 bg-white bg-opacity-20 rounded-full flex items-center justify-center">
                    <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                    </svg>
                </div>
                <p class="text-lg font-medium">No hero banners available</p>
                <p class="text-sm opacity-75 mt-2">Add some images to see them here</p>
            </div>
        </div>
    @endif
</div>

@if($heroBanners->count() > 0)
<script>
document.addEventListener('DOMContentLoaded', function() {
    const totalSlides = {{ $heroBanners->count() }};
    
    if (totalSlides === 0) return;
    
    let currentSlide = 0;
    let timer = null;
    const track = document.getElementById('carousel-track');
    
    // Lazy load images as they become visible
    function loadImage(index) {
        const img = track.children[index]?.querySelector('img');
        if (img && img.style.visibility === 'hidden') {
            img.style.visibility = 'visible';
        }
    }
    
    function updateCarousel() {
        track.style.transform = `translateX(-${currentSlide * 100}%)`;
        // Load current and next image
        loadImage(currentSlide);
        loadImage((currentSlide + 1) % totalSlides);
    }
    
    function updateIndicators() {
        @if($heroBanners->count() > 1)
        for (let i = 0; i < totalSlides; i++) {
            const indicator = document.getElementById(`indicator-${i}`);
            if (indicator) {
                indicator.className = i === currentSlide 
                    ? 'w-3 h-3 rounded-full transition-colors duration-300 hover:scale-110 transform bg-red-500'
                    : 'w-3 h-3 rounded-full transition-colors duration-300 hover:scale-110 transform bg-white bg-opacity-60';
            }
        }
        @endif
    }
    
    function nextSlide() {
        if (totalSlides <= 1) return;
        
        currentSlide++;
        updateCarousel();
        
        // Reset to first slide after transition if there's duplicate
        if (currentSlide === totalSlides) {
            setTimeout(() => {
                track.style.transition = 'none';
                currentSlide = 0;
                updateCarousel();
                updateIndicators();
                setTimeout(() => {
                    track.style.transition = 'transform 0.5s ease-in-out';
                }, 50);
            }, 500);
        } else {
            updateIndicators();
        }
    }
    
    function goToSlide(slideIndex) {
        if (timer) clearInterval(timer);
        
        track.style.transition = 'transform 0.5s ease-in-out';
        currentSlide = slideIndex;
        updateCarousel();
        updateIndicators();
        
        startTimer();
    }
    
    function startTimer() {
        if (timer) clearInterval(timer);
        if (totalSlides > 1) {
            timer = setInterval(nextSlide, 5000);
        }
    }
    
    function stopTimer() {
        if (timer) clearInterval(timer);
    }
    
    // Global functions
    window.goToSlide = goToSlide;
    
    // Pause on tab switch
    document.addEventListener('visibilitychange', () => {
        document.hidden ? stopTimer() : startTimer();
    });
    
    
    // Initialize
    loadImage(0); // Load first image immediately
    if (totalSlides > 1) {
        startTimer();
    }
});
</script>
@endif

<style>
#hero-carousel::-webkit-scrollbar { 
    display: none; 
}

#carousel-track { 
    will-change: transform; 
}

@foreach($heroBanners->take(2) as $banner)
    <link rel="preload" as="image" href="{{ $banner->image_urls }}" />
@endforeach
</style>