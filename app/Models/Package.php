<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Package extends Model
{
    use HasFactory;

    protected $table = 'packages';
    protected $primaryKey = 'PackageID';
    protected $guarded = [];

    public function subscriptionPlans()
    {
        return $this->hasMany(SubscriptionPlan::class, 'PackageID', 'PackageID');
    }

    public function userSubscriptions()
    {
        return $this->hasMany(UserSubscription::class, 'PackageID', 'PackageID');
    }
}
