<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SubscriptionPayment extends Model
{
    use HasFactory;

    protected $table = 'subscription_payments';
    protected $primaryKey = 'PaymentID';
    protected $guarded = [];

    public function user()
    {
        return $this->belongsTo(User::class, 'id', 'id');
    }

    public function userSubscription()
    {
        return $this->belongsTo(UserSubscription::class, 'SubscriptionID', 'SubscriptionID');
    }
}
