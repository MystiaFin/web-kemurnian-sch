<?php

namespace App\Http\Controllers;

use App\Models\KurikulumContent;
use Illuminate\Http\Request;

class KurikulumController extends Controller
{
    public function index() {
        $kurikulum = KurikulumContent::all();
        return response()->json($kurikulum);
    }
}
