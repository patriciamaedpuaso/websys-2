<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Cache;

class WeatherController extends Controller
{
    public function getWeather(Request $request, $city = 'London') // Default to 'London'
    {
        $units = $request->query('units', 'metric'); // Default to metric units (Celsius)
        $apiKey = env('OPENWEATHER_API_KEY');
        
        // Cache the weather data for 10 minutes
        $cacheKey = "weather_{$city}_{$units}";
        $weatherData = Cache::remember($cacheKey, 600, function () use ($city, $apiKey, $units) {
            $response = Http::get("https://api.openweathermap.org/data/2.5/weather", [
                'q' => $city,
                'appid' => $apiKey,
                'units' => $units
            ]);
            
            if ($response->successful()) {
                return [
                    'city' => $city,
                    'temperature' => $response['main']['temp'],
                    'description' => $response['weather'][0]['description'],
                    'humidity' => $response['main']['humidity']
                ];
            }

            return null;
        });

        return $weatherData;
    }

    // New method to fetch multiple cities at once and return as JSON or HTML
    public function getMultipleCitiesWeather(Request $request)
    {
        $cities = $request->query('cities', 'london,paris,new York'); // Default cities if none provided
        $cities = explode(',', $cities); // Convert comma-separated cities to an array
        
        $weatherData = [];
        foreach ($cities as $city) {
            $weatherData[] = $this->getWeather(new Request(['units' => 'metric', 'city' => $city]), $city);
        }

        if ($request->wantsJson()) {
            return response()->json($weatherData); // Return JSON if requested
        }

        return view('weather.multi', ['weatherData' => $weatherData]); // Return HTML view otherwise
    }
}
