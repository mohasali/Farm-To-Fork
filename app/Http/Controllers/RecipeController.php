<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Recipe;

class RecipeController extends Controller
{
    public function recipes() {
        // Get paginated recipes
        $recipes = Recipe::paginate(8);
        return view('recipes.recipes', compact('recipes'));
    }

    // Recipe by ID
    public function show($recipeID){
        // Find recipe ID else error message
        $recipe = Recipe::findOrFail($recipeID);
        return view('recipes.show', compact('recipe'));
    }
}
