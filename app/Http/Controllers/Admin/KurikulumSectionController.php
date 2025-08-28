<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class KurikulumSectionController extends Controller
{
    public function index()
    {
        return view('admin.kurikulum-section');
    }
}
