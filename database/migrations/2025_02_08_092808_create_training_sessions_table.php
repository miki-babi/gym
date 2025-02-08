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
        Schema::create('training_sessions', function (Blueprint $table) {
            $table->id('SessionID');
            $table->foreignId('TrainerID')->constrained('users', 'id'); // Link to trainer (user with Role='Trainer')
            $table->string('Title', 100);
            $table->enum('Type', ['One-on-One', 'Group', 'Virtual'])->default('One-on-One');
            $table->dateTime('StartTime');
            $table->dateTime('EndTime');
            $table->integer('MaxParticipants')->nullable(); // Null for one-on-one, set limit for group sessions
            $table->text('Description')->nullable();
            $table->enum('Status', ['Scheduled', 'Completed', 'Cancelled'])->default('Scheduled');
            $table->timestamps();
        });
        
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('training_sessions');
    }
};
