<?php

use App\Models\Box;
use App\Models\Tag;
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
        Schema::create('tags', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->timestamps();
        });
        Schema::create('box_tag', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(Box::class,'box_id')->constrained()->cascadeOnDelete();
            $table->foreignIdFor(Tag::class,'tag_id')->constrained()->cascadeOnDelete();
            $table->unique(['box_id', 'tag_id']);
            $table->timestamps();
        });
        
        /*
        Future Use Case

        Schema::create('recipe_tag', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(Recipe::class,'recipe_id')->constrained()->cascadeOnDelete();
            $table->foreignIdFor(Tag::class,'tag_id')->constrained()->cascadeOnDelete();
            $table->unique(['recipe_id', 'tag_id']);
            $table->timestamps();
        });*/
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tags');
        Schema::dropIfExists('box_tag');

    }
};
