<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Cache;
use App\Models\KurikulumContent;
use App\Models\HeroBanner;

class PrewarmCache extends Command
{
    protected $signature = 'cache:prewarm';
    protected $description = 'Pre-warm cache for multiple models and external data sources';

    public function handle()
    {
        $itemsToCache = [
            'kurikulum' => function() {
                return KurikulumContent::select(['id', 'title', 'body'])->get();
            },
            'hero_banners' => function() {
                return HeroBanner::select(['id', 'image_urls'])->latest()->take(5)->get();
            },
            // Add more items here in the future:
            // 'another_model' => fn() => AnotherModel::all(),
        ];

        foreach ($itemsToCache as $key => $callback) {
            Cache::remember($key, 3600, $callback); // 1-hour cache
            $this->info("Cached: {$key}");
        }

        $this->info('All caches pre-warmed successfully.');
    }
}
