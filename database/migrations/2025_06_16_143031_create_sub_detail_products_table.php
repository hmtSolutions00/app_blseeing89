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
        Schema::create('sub_detail_products', function (Blueprint $table) {
            Schema::create('sub_detail_products', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('detail_product_id');
            $table->text('content');
            $table->timestamps();

            // Mendefinisikan foreign key ke tabel detail_products
            // onDelete('cascade') berarti jika sebuah detail dihapus, semua sub-detailnya ikut terhapus.
            $table->foreign('detail_product_id')->references('id')->on('detail_products')->onDelete('cascade');
        });
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sub_detail_products');
    }
};
