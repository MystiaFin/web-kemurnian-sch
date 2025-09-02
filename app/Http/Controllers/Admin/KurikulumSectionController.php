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
     public function edit($id)
    {
        try {
            $kurikulum = KurikulumContent::findOrFail($id);
            return view('admin.edit-kurikulum', compact('kurikulum'));
        } catch (\Exception $e) {
            return redirect()
                ->route('admin.kurikulum-section')
                ->with('error', 'Kurikulum not found');
        }
    }

    // Update specific kurikulum
    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'body' => 'required',
        ]);

        try {
            $kurikulum = KurikulumContent::findOrFail($id);
            
            $kurikulum->update([
                'title' => $request->title,
                'body' => $request->body,
            ]);

            return redirect()
                ->route('admin.kurikulum-section')
                ->with('success', 'Kurikulum updated successfully');

        } catch (\Exception $e) {
            return redirect()
                ->back()
                ->with('error', 'Failed to update kurikulum: ' . $e->getMessage())
                ->withInput();
        }
    }

    // Delete specific kurikulum
    public function destroy($id)
    {
        try {
            $kurikulum = KurikulumContent::findOrFail($id);
            $kurikulum->delete();

            return redirect()
                ->route('admin.kurikulum-section')
                ->with('success', 'Kurikulum deleted successfully');

        } catch (\Exception $e) {
            return redirect()
                ->back()
                ->with('error', 'Failed to delete kurikulum: ' . $e->getMessage());
        }
    }
}
