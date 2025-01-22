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
        Schema::create('user_subscriptions', function (Blueprint $table) {
            $table->id('SubscriptionID');
            $table->foreignId('id')->constrained('users', 'id');
            $table->foreignId('PackageID')->constrained('packages', 'PackageID');
            $table->foreignId('PlanID')->constrained('subscription_plans', 'PlanID');
            $table->enum('Status', ['Active', 'Inactive', 'On Hold'])->default('Active');
            $table->date('StartDate');
            $table->date('EndDate');
            $table->date('HoldStartDate')->nullable();
            $table->date('HoldEndDate')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('user_subscriptions');
    }
};
