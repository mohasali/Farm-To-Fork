<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Recipe;

class RecipeController extends Controller
{
    private function getTags(){
        $csvPath = database_path('data/Recipe-data.csv');
        $file = fopen($csvPath, 'r');
        fgetcsv($file); // Skip header
        
        $tags = [];
        while (($row = fgetcsv($file)) !== false) {
            $rowTags = trim($row[1], "[]' ");
            $rowTags = explode(",", $rowTags);
            $rowTags = array_map(function($tag) {
                return trim($tag, "' ");
            }, $rowTags);
            $tags = array_merge($tags, $rowTags);
        }
        fclose($file);
        
        $uniqueTags = array_unique(array_filter($tags));
        sort($uniqueTags);

        // Return tags
        return array_slice($uniqueTags, 0); // , 5
    }

    public function index(Request $request)
{
    $tags = $this->getTags();
    $title = 'Recipes';

    $selectedTag = $request->tag ? strtolower($request->tag) : null;

    $query = Recipe::query();
    // If tag selected, filter recipes by that tag
    if ($selectedTag) {
        $query->whereRaw('LOWER(tag) LIKE ?', ['%' . $selectedTag . '%']);
    }

    $recipes = $query->paginate(8);

    return view('recipes.recipes', [
        'title' => $title,
        'tags' => $tags,
        'recipes' => $recipes,
    ]);
}


    public function show($recipeID){
        // Find recipe ID else error message
        $recipe = Recipe::findOrFail($recipeID);
        return view('recipes.show', compact('recipe'));
    }
}
