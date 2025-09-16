<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('bookings', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('phone');
            $table->string('email');
            $table->integer('no_of_people');
            $table->unsignedBigInteger('room_id'); // required FK to rooms
            $table->date('check_in');
            $table->date('check_out');
            $table->text('special_request')->nullable();
            $table->enum('pickup', ['yes', 'no'])->default('no');
            $table->text('pickup_details')->nullable();
            $table->boolean('is_read')->default(false);
            $table->timestamps();

            // Foreign Key constraint
            $table->foreign('room_id')
                ->references('id')->on('rooms')
                ->onDelete('cascade');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('bookings');
    }
};
