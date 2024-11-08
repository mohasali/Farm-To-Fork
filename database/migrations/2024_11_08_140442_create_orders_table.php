<?php

use App\Models\Box;
use App\Models\Order;
use App\Models\User;
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
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(User::class,'user_id')->constrained()->cascadeOnDelete();
            $table->string('payment_intent');
            $table->float('total');
            $table->string('name');
            $table->string('address');
            $table->string('city');
            $table->string('postcode');
            $table->string('country');
            $table->timestamps();
        });
        Schema::create('item_order', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(Order::class,'order_id')->constrained()->cascadeOnDelete();
            $table->foreignIdFor(Box::class,'box_id')->constrained()->cascadeOnDelete();
            $table->unique(['order_id', 'box_id']);
            $table->integer('quantity');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('orders');
        Schema::dropIfExists('item_order');

    }
};
