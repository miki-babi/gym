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
        Schema::create('locker_assignments', function (Blueprint $table) {
            $table->id('AssignmentID');
            $table->foreignId('id')->constrained('users', 'id');
            $table->foreignId('LockerID')->constrained('lockers', 'LockerID');
            $table->date('StartDate');
            $table->date('EndDate')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('locker_assignments');
    }
};
