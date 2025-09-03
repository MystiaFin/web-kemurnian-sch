<?php
namespace App\Http\Controllers;
use App\Models\KurikulumContent;
use Illuminate\Http\Request;

class KurikulumController extends Controller
{
    public function index()
    {
        $kurikulum = KurikulumContent::orderBy('id', 'asc')->get();
        return response()->json($kurikulum);
    }

    public function show($id)
    {
        $data = KurikulumContent::findOrFail($id);
        
        $data->body = $this->cleanQuillJSContent($data->body);
        
        return view('kurikulum-details', compact('data'));
    }

    private function cleanQuillJSContent($content)
    {
        $content = preg_replace('#<(b|strong)>#i', '<span class="font-raleway font-bold">', $content);
        $content = preg_replace('#</(b|strong)>#i', '</span>', $content);
        
        $content = preg_replace('#<ol[^>]*data-list="bullet"[^>]*>#i', '<ul class="list-disc list-inside space-y-1 ml-4">', $content);
        
        $content = preg_replace('#<ol[^>]*>#i', '<ul class="list-disc list-inside space-y-1 ml-4">', $content);
        $content = preg_replace('#</ol>#i', '</ul>', $content);
        
        $content = preg_replace('#<li[^>]*data-list="bullet"[^>]*>(.*?)<span[^>]*class="ql-ui"[^>]*></span>(.*?)</li>#is', '<li class="">$1$2</li>', $content);
        
        $content = preg_replace('#<li[^>]*>#i', '<li class="">', $content);
        
        $content = preg_replace('#<span[^>]*class="ql-ui"[^>]*></span>#i', '', $content);
        
        $content = preg_replace('#\s+#', ' ', $content);
        $content = preg_replace('#<span[^>]*></span>#i', '', $content);
        
        return trim($content);
    }
}