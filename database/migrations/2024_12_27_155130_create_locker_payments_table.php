<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;


return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('locker_payments', function (Blueprint $table) {
            $table->id('PaymentID');
            $table->foreignId('id')->constrained('users', 'id');
            $table->foreignId('LockerID')->constrained('lockers', 'LockerID');
            $table->date('PaymentDate')->default(DB::raw('CURRENT_DATE'));
            $table->decimal('Amount', 10, 2);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('locker_payments');
    }
};
