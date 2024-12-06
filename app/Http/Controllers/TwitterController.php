<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class TwitterController extends Controller
{
    public function searchUser(Request $request)
    {
        $user = $request->input('hashtag');
        $data = null;
        $error_message = null;

        if ($user) {
            $bearer_token = env('TWITTER_BEARER_TOKEN');
            $response = Http::withHeaders([
                'Authorization' => 'Bearer ' . $bearer_token,
            ])->get("https://api.x.com/2/users/by/username/{$user}");

            if ($response->successful()) {
                $data = $response->json('data');
            } else {
                $error_message = "No se encontró el usuario o hubo un error con la API.";
            }
        }

        return view('twitter.search', compact('data', 'error_message', 'user'));
        
    }
}
