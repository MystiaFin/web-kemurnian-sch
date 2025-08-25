<?php
namespace App\View\Components;

use Closure;
use Illuminate\View\Component;
use Illuminate\Support\Facades\Http;
use App\Models\HeroBanner;

class HeroSliders extends Component
{
    public $heroBanners;

    public function __construct()
    {
        $this->heroBanners = HeroBanner::all();
    }

    public function render()
    {
        return view('components.hero-sliders');
    }
}