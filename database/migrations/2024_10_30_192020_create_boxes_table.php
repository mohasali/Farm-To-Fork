<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Models\Box;
return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('boxes', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->longText('description');
            $table->enum('type',['Seasonal','Meat & Dairy','Dynamic Pricing','Locally Sourced','Cultural Recipe']);
            $table->decimal('price',6,2);
            $table->integer('stock')->default(10);
            $table->string('image_path')->nullable(); // Doesn't need to be required
            $table->timestamps();

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('boxes');
    }
};
