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
        Schema::create('subscription_payments', function (Blueprint $table) {
            $table->id('PaymentID');
            $table->foreignId('id')->constrained('users', 'id');
            $table->foreignId('SubscriptionID')->constrained('user_subscriptions', 'SubscriptionID');
            $table->date('PaymentDate')->default(DB::raw('CURRENT_DATE'));
            $table->decimal('Amount', 10, 2);
            $table->enum('PaymentMethod', ['Cash', 'Credit Card', 'Bank Transfer', 'Online Payment'])->default('Cash');
            $table->string('TransactionReference', 255)->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('subscription_payments');
    }
};
