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
        Schema::create('details', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('detail_shop_id')->index();
            $table->foreign('detail_shop_id')->references('id')->on('detail_shops')->cascadeOnDelete();
            $table->unsignedBigInteger('detail_category_id')->index();
            $table->foreign('detail_category_id')->references('id')->on('detail_categories')->cascadeOnDelete();
            $table->unsignedBigInteger('detail_brand_id')->index();
            $table->foreign('detail_brand_id')->references('id')->on('detail_brands')->cascadeOnDelete();
            $table->string('name');
            $table->string('slug')->unique();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('details');
    }
};
