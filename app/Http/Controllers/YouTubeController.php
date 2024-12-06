<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Http;
use App\Services\YouTubeService;
use Illuminate\Http\Request;

class YouTubeController extends Controller
{
    protected $youTubeService;

    public function __construct(YouTubeService $youTubeService)
    {
        $this->youTubeService = $youTubeService;
    }

    public function search(Request $request)
{
    $query = $request->input('query');
    $maxResults = $request->input('maxResults', 5); // Número de resultados deseado, por defecto 5
    $apiKey = config('services.youtube.api_key');
    
    $url = "https://www.googleapis.com/youtube/v3/search?part=snippet&q={$query}&type=video&maxResults={$maxResults}&key={$apiKey}";
    
    $response = Http::get($url);
    
    if ($response->successful()) {
        $results = $response->json()['items'];
        return view('youtube.search', compact('results'));
    } else {
        return back()->with('error', 'No se pudo obtener la información de YouTube');
    }
}

}
