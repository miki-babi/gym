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
        Schema::create('session_bookings', function (Blueprint $table) {
            $table->id('BookingID');
            $table->foreignId('SessionID')->constrained('training_sessions', 'SessionID');
            $table->foreignId('UserID')->constrained('users', 'id'); // Client booking the session
            $table->enum('Status', ['Booked', 'Cancelled', 'Completed'])->default('Booked');
            $table->timestamps();
        });
        
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('session_bookings');
    }
};
