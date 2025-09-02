<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;
use App\Models\KurikulumContent;
use Illuminate\Support\Facades\Cache;

class KurikulumPreview extends Component
{
    public $kurikulum;

    public function __construct()
    {
        $this->kurikulum = Cache::remember('kurikulum', 3600, function () {
            return KurikulumContent::select(['id', 'title', 'body'])->get();
        });
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.kurikulum-preview');
    }
}
