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
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table -> string ('name');
            $table -> text('description') -> nullable();
            $table -> float ('price');
            $table -> date('date caducidade') -> nullable();
            $table -> integer('quantity');
            $table -> string('image') -> nullable();
            $table -> string ('status') -> nullable();
            $table -> string ('registerby') -> nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
