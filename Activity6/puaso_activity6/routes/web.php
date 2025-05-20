<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\WeatherController;
use App\Http\Controllers\RecipeController;

// Route for getting weather for multiple cities
Route::get('/weather/multiple', [WeatherController::class, 'getMultipleCitiesWeather']);

Route::get('/all-meals', [RecipeController::class, 'getAllMealTypeRecipes']);


Route::get('/', function () {
    return view('welcome');
});
