<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Cache;

class RecipeController extends Controller
{
    protected $apiKey;

    public function __construct()
    {
        $this->apiKey = env('SPOONACULAR_API_KEY');
    }

    public function getAllMealTypeRecipes(Request $request)
    {
        $mealTypes = [
            'main course', 'side dish', 'dessert', 'appetizer', 'salad',
            'bread', 'breakfast', 'soup', 'beverage', 'sauce',
            'marinade', 'fingerfood', 'snack', 'drink'
        ];

        $results = [];

        foreach ($mealTypes as $type) {
            $cacheKey = 'recipes_' . str_replace(' ', '_', strtolower($type));

            $recipes = Cache::remember($cacheKey, 600, function () use ($type) {
                $response = Http::get('https://api.spoonacular.com/recipes/complexSearch', [
                    'apiKey' => $this->apiKey,
                    'type' => $type,
                    'number' => 5,
                    'addRecipeInformation' => true
                ]);

                return $response->successful() ? $response->json()['results'] : [];
            });

            $results[$type] = $recipes;
        }

        if ($request->wantsJson()) {
            return response()->json($results);
        }

        return view('recipes.all-meals', ['recipes' => $results]);
    }


}
