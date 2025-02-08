<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Discount extends Model
{
    use HasFactory;

    protected $table = 'discounts';
    protected $primaryKey = 'DiscountID';
    protected $guarded = [];

    public function user()
    {
        return $this->belongsTo(User::class, 'id', 'id');
    }

    public function subscriptionPlan()
    {
        return $this->belongsTo(SubscriptionPlan::class, 'PlanID', 'PlanID');
    }
}
