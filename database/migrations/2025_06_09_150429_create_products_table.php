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
    $table->unsignedBigInteger('product_subcategory_id');
    $table->string('name');
    $table->text('description')->nullable();
    $table->string('slug')->unique();
    $table->string('price_start')->nullable();
    $table->string('masa_berlaku')->nullable();
    $table->string('thumbnail')->nullable();
    $table->json('images')->nullable(); // untuk menyimpan array multiple image
    $table->text('meta_description')->nullable();
    $table->string('meta_keywords')->nullable();
    $table->string('meta_og_title')->nullable();
    $table->text('meta_og_description')->nullable();
    $table->string('meta_og_type')->nullable();
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
