<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;

class YouTubeService
{
    protected $apiKey;
    protected $baseUrl;

    public function __construct()
    {
        $this->apiKey = config('services.youtube.api_key');
        $this->baseUrl = 'https://www.googleapis.com/youtube/v3/';
    }

    public function searchVideos($keywords, $maxResults = 5)
    {
        $response = Http::get("{$this->baseUrl}search", [
            'part' => 'snippet',
            'q' => $keywords,
            'type' => 'video',
            'maxResults' => $maxResults,
            'key' => $this->apiKey,
        ]);

        if ($response->successful()) {
            return $response->json();
        }

        return null;
    }
}
