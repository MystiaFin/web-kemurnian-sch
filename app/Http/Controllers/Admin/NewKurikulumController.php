<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\KurikulumContent;

class NewKurikulumController extends Controller
{
    public function index()
    {
        return view('admin.new-kurikulum');
    }

    public function store(Request $request) {
        $request->validate([
            'title' => 'required',
            'body' => 'required',
        ]);

        $content = KurikulumContent::create([
            'title' => $request->title,
            'body' => $request->body
        ]);

        return redirect()
            ->route('admin.kurikulum-section')
            ->with('success', 'Content saved successfully');
    }
}
