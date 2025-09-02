<?php
$paragraph = 'font-merriweather font-[100] leading-loose tracking-wider text-center';
?>
<section class="flex justify-center">
    <div class="w-full px-4">
        <div class="flex flex-wrap justify-center gap-6">
            @foreach ($kurikulum as $item)
            <div class="flex justify-center items-center flex-col text-center max-w-lg flex-shrink-0 p-4">
                <div class="flex justify-center mb-4">
                    <img src="{{ Vite::asset('resources/images/icon-book.svg') }}" alt="Logo" class="w-12">
                </div>
                <h2 class="font-bold mb-2 text-xl">{{ $item->title }}</h2>
                
                @php
                    // Strip HTML tags for counting words
                    $text = strip_tags($item->body);
                    $words = explode(' ', $text);
                    $snippet = implode(' ', array_slice($words, 0, 25));
                    
                    if (count($words) > 25) {
                        $snippet .= '...';
                    }
                @endphp
                <p class="font-merriweather {{ $paragraph }}">{{ $snippet }}</p>
                <x-button href="{{ route('kurikulum.show', $item->id) }}" text="READ ON"/>
            </div>
            @endforeach
        </div>
    </div>
</section>