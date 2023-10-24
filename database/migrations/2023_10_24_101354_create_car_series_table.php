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
        Schema::create('car_series', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('car_brand_id')->index();
            $table->foreign('car_brand_id')->references('id')->on('car_brands')->cascadeOnDelete();
            $table->string('name');
            $table->string('slug')->unique();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('car_series');
    }
};
