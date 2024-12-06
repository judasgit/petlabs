<?php

namespace App\Http\Controllers;

use App\Services\WeatherService;
use Illuminate\Http\Request;

class WeatherController extends Controller
{
    protected $weatherService;

    public function __construct(WeatherService $weatherService)
    {
        $this->weatherService = $weatherService;
    }

    public function showWeather(Request $request)
    {
        $city = $request->input('city', 'Madrid'); // Ciudad predeterminada si no se ingresa ninguna
        $weatherData = $this->weatherService->getWeather($city);

        if (!$weatherData) {
            return back()->with('error', 'No se pudo obtener la información del clima.');
        }

        return view('weather', ['weather' => $weatherData]);
    }
}
