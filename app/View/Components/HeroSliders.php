<?php
namespace App\View\Components;

use Closure;
use Illuminate\View\Component;
use App\Models\HeroBanner;
use Illuminate\Support\Facades\Cache;

class HeroSliders extends Component
{
    public $heroBanners;

    public function __construct()
    {
        // Cache the hero banners for 1 hour (3600 seconds)
        $this->heroBanners = Cache::remember('hero_banners', 3600, function () {
            return HeroBanner::select(['id', 'image_urls'])
                ->latest()
                ->take(5)
                ->get();
        });
    }

    public function render()
    {
        return view('components.hero-sliders');
    }
}
