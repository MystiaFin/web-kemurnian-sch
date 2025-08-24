<?php
namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;
use Illuminate\Support\Facades\Http;

class HeroSliders extends Component
{
    public $data;

    public function __construct()
    {
        try {
            $response = Http::get('http://localhost:8000/api/hero-banners');
            $this->data = $response->successful() ? $response->json() : [];
        } catch (\Exception $e) {
            $this->data = [];
        }
    }

    public function render(): View|Closure|string
    {
        return view('components.hero-sliders', ['data' => $this->data]);
    }
}