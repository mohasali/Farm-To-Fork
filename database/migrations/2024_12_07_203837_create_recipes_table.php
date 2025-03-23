<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('recipes', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->enum('tag',['Vegetarian','Quick & Easy','Seasonal', 'Keto', 'Indian', 'Italian', 'Chinese', 'Mexican', 'American', 
            'French', 'Japanese', 'Thai', 'Mediterranean', 'Middle Eastern', 'British', 'German', 'Greek', 'Spanish', 'Caribbean', 'Moroccan', 
            'South American', 'African', 'Other', 'Egg-free', 'Nut-free', 'Gluten-free', 'Dairy-free', 'Vegan', 'Low-fat', 'Low-sugar', 
            'Low-salt', 'Low-calorie', 'High-protein', 'High-fiber', 'Low-carb', 'Low-GI', 'Fat-free', 'Low-sugar', 'Low-salt', 'Low-calorie',
             'High-protein', 'High-fiber', 'Low-carb', 'Low-GI', 'Fat-free']);
            $table->integer('cooking_time');
            $table->decimal('rating');
            $table->integer('serving');
            $table->longText('description');
            $table->string('imagePath');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('recipes');
    }
};
