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
        Schema::create('session_attendance', function (Blueprint $table) {
            $table->id('AttendanceID');
            $table->foreignId('SessionID')->constrained('training_sessions', 'SessionID');
            $table->foreignId('UserID')->constrained('users', 'id'); // Client attending
            $table->enum('Status', ['Present', 'Absent'])->default('Present');
            $table->timestamps();
        });
        
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('session_attendance');
    }
};
