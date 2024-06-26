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
        Schema::create('detailorders', function (Blueprint $table) {
            $table->id();
            $table -> bigInteger('order_id') -> unsigned();
            $table -> bigInteger('product_id') -> unsigned();
            $table -> integer ('quantity');
            $table -> decimal ('subtotal', 8,2);
            $table -> string ('registerby') -> nullable();
            $table -> foreign('product_id')-> references('id')->on('products');
            $table -> foreign('order_id')-> references('id')->on('orders');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('detailorders');
    }
};
