<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\KurikulumContent;

class KurikulumSectionController extends Controller
{
    public function index()
    {
        $kurikulum = KurikulumContent::latest()->get();
        return view('admin.kurikulum-section', compact('kurikulum'));
    }
}
