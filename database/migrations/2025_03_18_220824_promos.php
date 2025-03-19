<?php

use App\Models\User;
use Carbon\Carbon;
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
        Schema::create('promo_codes', function (Blueprint $table) {
            $table->id();
            $table->string("code")->unique();
            $table->float('value');
            $table->integer("count")->default(1);
            $table->foreignIdFor(User::class,"user_id")->constrained()->cascadeOnDelete()->nullable();
            $table->string('title');
            $table->string('description');
            $table->timestamps();
        });
        Schema::create('rewards', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(User::class,"user_id")->constrained()->cascadeOnDelete();;
            $table->string("stamps")->max(6)->default(0);
            $table->integer("points")->default(0);
            $table->date('last_stamp')->default(Carbon::yesterday());
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('promo_codes');
        Schema::dropIfExists('rewards');
    }
};
