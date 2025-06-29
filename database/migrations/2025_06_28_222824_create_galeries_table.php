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
        Schema::create('galeries', function (Blueprint $table) {
            $table->id();
             $table->string('judul');
            $table->text('description'); // HTML panjang dari CKEditor
            $table->string('slug')->unique();
            $table->string('thumbnail')->nullable(); // path ke thumbnail

            // SEO meta
            $table->string('meta_description')->nullable();
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
        Schema::dropIfExists('galeries');
    }
};
