<?php

namespace App\Http\Controllers;

use App\Models\HeroBanner;

class HeroBannerController extends Controller
{

    // List all hero banners
    public function index()
    {
        $heroBanners = HeroBanner::all();
        return response()->json(HeroBanner::all());
    }

}