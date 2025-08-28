<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\HeroBanner;

class HeroSectionController extends Controller
{
    public function index()
    {
        $heroBanners = HeroBanner::latest()->get();
        return view('admin.hero-section', compact('heroBanners'));
    }
}
