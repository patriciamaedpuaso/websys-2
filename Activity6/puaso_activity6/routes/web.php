<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\WeatherController;

// Route for getting weather for multiple cities
Route::get('/weather/multiple', [WeatherController::class, 'getMultipleCitiesWeather']);


Route::get('/', function () {
    return view('welcome');
});
