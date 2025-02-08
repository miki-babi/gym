<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SubscriptionHistory extends Model
{
    use HasFactory;

    protected $table = 'subscription_histories';
    protected $primaryKey = 'HistoryID';
    protected $guarded = [];

    public function userSubscription()
    {
        return $this->belongsTo(UserSubscription::class, 'SubscriptionID', 'SubscriptionID');
    }
}
