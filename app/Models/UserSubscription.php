<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserSubscription extends Model
{
    use HasFactory;

    protected $table = 'user_subscriptions';
    protected $primaryKey = 'SubscriptionID';
    protected $guarded = [];

    public function user()
    {
        return $this->belongsTo(User::class, 'id', 'id');
    }

    public function package()
    {
        return $this->belongsTo(Package::class, 'PackageID', 'PackageID');
    }

    public function subscriptionPlan()
    {
        return $this->belongsTo(SubscriptionPlan::class, 'PlanID', 'PlanID');
    }

    public function subscriptionHistories()
    {
        return $this->hasMany(SubscriptionHistory::class, 'SubscriptionID', 'SubscriptionID');
    }

    public function subscriptionPayments()
    {
        return $this->hasMany(SubscriptionPayment::class, 'SubscriptionID', 'SubscriptionID');
    }
}
