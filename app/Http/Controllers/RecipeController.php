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

    public function index(Request $request){
        $tags = $this->getTags();
        $title = 'Recipes';
        
        $selectedTag = $request->tag ? strtolower($request->tag) : null;

        // Get the CSV file path
        $csvPath = database_path('data/Recipe-data.csv');
        $file = fopen($csvPath, 'r');
        $header = fgetcsv($file);
        
        $recipes = [];
        while (($row = fgetcsv($file)) !== false) {
            // Get tags
            $rowTags = array_map(function($tag) {
                return strtolower(trim($tag, "[]' "));
            }, explode("'], ['", trim($row[1], "[]'")));
            
            // Check if selected tag is in the row tags
            if (!$selectedTag || in_array($selectedTag, $rowTags)) {
                $recipe = new Recipe();
                $recipe->id = count($recipes) + 1;
                $recipe->title = $row[0];
                $recipe->tags = $rowTags;
                $recipe->cooking_time = $row[2];
                $recipe->rating = $row[3];
                $recipe->serving = $row[4];
                $recipe->description = $row[5];
                $recipe->ingredients = $row[6];
                $recipe->steps = $row[7];
                $recipe->imagePath = $row[8] ?? null;
                
                $recipes[] = $recipe;
            }
        }
        fclose($file);
        
        $recipesCollection = collect($recipes);
        $paginatedRecipes = new \Illuminate\Pagination\LengthAwarePaginator(
            $recipesCollection->forPage(request('page', 1), 8),
            $recipesCollection->count(),
            8,
            request('page', 1),
            ['path' => request()->url(), 'query' => request()->query()]
        );
        
        return view('recipes.recipes', ['title' => $title, 'tags' => $tags, 'recipes' => $paginatedRecipes]);
    }

    public function show($recipeID){
        // Find recipe ID else error message
        $recipe = Recipe::findOrFail($recipeID);
        return view('recipes.show', compact('recipe'));
    }
}
