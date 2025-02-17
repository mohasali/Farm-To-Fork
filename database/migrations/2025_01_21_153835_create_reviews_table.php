<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Models\User;
use App\Models\Box;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('reviews', function (Blueprint $table) {
            $table->id();
            $table->decimal("star_rating", 1,1);
            $table->string("title");
            $table->string("description")->nullable();
            $table->timestamp("review_date");
            $table->integer("upvotes");
            $table->foreignIdFor(User::class, "user_id");
            $table->foreignIdFor(Box::class, "box_id");
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('reviews');
    }
};
