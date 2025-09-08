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
        Schema::create('rooms', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('type')->nullable(); // Deluxe, Suite, Standard
            $table->longText('description')->nullable();
            $table->integer('capacity'); // number of people
            $table->string('beds'); // number of beds
            $table->integer('price'); // per night
            $table->string('image')->nullable();
            $table->json('facilities')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('rooms');
    }
};
