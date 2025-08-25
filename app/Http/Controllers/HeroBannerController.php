<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use App\Models\HeroBanner;

class HeroBannerController extends Controller
{
    private $supabaseUrl;
    private $supabaseKey;
    private $bucketName;

    public function __construct()
    {
        $this->supabaseUrl = env('SUPABASE_URL');
        $this->supabaseKey = env('SUPABASE_ANON_KEY');
        $this->bucketName = env('SUPABASE_BUCKET_NAME', 'hero-banners');
    }

    // List all hero banners
    public function index()
    {
        $heroBanners = HeroBanner::all();
        return response()->json(HeroBanner::all());
    }

    // Upload a new hero banner
    public function store(Request $request)
    {
        $request->validate([
            'image' => 'required|image|mimes:jpeg,png,jpg,webp|max:2048',
        ]);

        try {
            $imageUrl = $this->uploadToSupabase($request->file('image'));

            $heroBanner = HeroBanner::create([
                'image_urls' => $imageUrl,
            ]);

            return response()->json([
                'success' => true,
                'data' => $heroBanner,
                'message' => 'Hero banner uploaded successfully'
            ], 201);

        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Failed to upload image: ' . $e->getMessage()
            ], 500);
        }
    }

    // Delete a hero banner
    public function destroy(string $id)
    {
        try {
            $heroBanner = HeroBanner::findOrFail($id);
            $this->deleteFromSupabase($heroBanner->image_urls);
            $heroBanner->delete();

            return response()->json([
                'success' => true,
                'message' => 'Hero banner deleted successfully'
            ]);

        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Failed to delete image: ' . $e->getMessage()
            ], 500);
        }
    }

    // Upload file to Supabase storage
    private function uploadToSupabase($file)
    {
        $fileName = time() . '_' . $file->getClientOriginalName();
        $filePath = $this->bucketName . '/' . $fileName;

        $response = Http::withHeaders([
            'Authorization' => 'Bearer ' . $this->supabaseKey,
            'Content-Type' => $file->getMimeType(),
        ])->withBody($file->getContent(), $file->getMimeType())
          ->put($this->supabaseUrl . '/storage/v1/object/' . $filePath);

        if ($response->successful()) {
            return $this->supabaseUrl . '/storage/v1/object/public/' . $filePath;
        }

        throw new \Exception('Failed to upload to Supabase: ' . $response->body());
    }

    // Delete file from Supabase storage
    private function deleteFromSupabase($imageUrl)
    {
        $filePath = str_replace($this->supabaseUrl . '/storage/v1/object/public/', '', $imageUrl);

        $response = Http::withHeaders([
            'Authorization' => 'Bearer ' . $this->supabaseKey,
        ])->delete($this->supabaseUrl . '/storage/v1/object/' . $filePath);

        if (!$response->successful()) {
            throw new \Exception('Failed to delete from Supabase: ' . $response->body());
        }
    }
}