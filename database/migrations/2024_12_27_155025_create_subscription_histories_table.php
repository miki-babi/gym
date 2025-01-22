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
        Schema::create('subscription_histories', function (Blueprint $table) {
            $table->id('HistoryID');
            $table->foreignId('SubscriptionID')->constrained('user_subscriptions', 'SubscriptionID');
            $table->enum('OldStatus', ['Active', 'Inactive', 'On Hold']);
            $table->enum('NewStatus', ['Active', 'Inactive', 'On Hold']);
            $table->timestamp('ChangeDate')->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->text('Details');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('subscription_histories');
    }
};
