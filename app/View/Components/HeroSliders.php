<?php
namespace App\View\Components;
use Closure;
use Illuminate\View\Component;
use App\Models\HeroBanner;

class HeroSliders extends Component
{
    public $heroBanners;
    
    public function __construct()
    {
        // Increase cache time to 30 minutes for better performance
        $this->heroBanners = cache()->remember('hero_banners', 1800, function() {
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