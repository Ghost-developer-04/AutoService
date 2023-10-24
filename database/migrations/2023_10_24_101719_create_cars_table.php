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
        Schema::create('cars', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('car_brand_id')->index();
            $table->foreign('car_brand_id')->references('id')->on('car_brands')->cascadeOnDelete();
            $table->unsignedBigInteger('car_serie_id')->index();
            $table->foreign('car_serie_id')->references('id')->on('car_series')->cascadeOnDelete();
            $table->unsignedBigInteger('client_id')->index();
            $table->foreign('client_id')->references('id')->on('clients')->cascadeOnDelete();
            $table->unsignedBigInteger('detail_id')->index()->nullable();
            $table->foreign('detail_id')->references('id')->on('details')->cascadeOnDelete();
            $table->unsignedBigInteger('worker_id')->index();
            $table->foreign('worker_id')->references('id')->on('workers')->cascadeOnDelete();
            $table->string('name');
            $table->string('slug')->unique();
            $table->date('arrival_date');
            $table->date('ready_date')->nullable();
            $table->date('departure_date')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cars');
    }
};
