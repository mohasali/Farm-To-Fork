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
            $table->float('total');
            $table->string('name');
            $table->string('address');
            $table->string('city');
            $table->string('postcode');
            $table->string('country');
            $table->enum('status',['Pending','Processing','Shipped','Out For Delivery','Delivered','Completed','Canceled','Returned'])->default('Pending');
            $table->timestamps();
        });
        Schema::create('item_orders', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(Order::class,'order_id')->constrained()->cascadeOnDelete();
            $table->foreignIdFor(Box::class,'box_id')->constrained()->cascadeOnDelete();
            $table->unique(['order_id', 'box_id']);
            $table->integer('quantity');
            $table->boolean('returned')->default(false);
            $table->timestamps();
        });

        Schema::create('refunds', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(Order::class,'order_id')->constrained()->cascadeOnDelete();
            $table->string("reason");
            $table->enum("return",['payment','replacement']);
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
