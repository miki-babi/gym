<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LockerPayment extends Model
{
    use HasFactory;

    protected $table = 'locker_payments';
    protected $primaryKey = 'PaymentID';
    protected $guarded = [];

    public function user()
    {
        return $this->belongsTo(User::class, 'id', 'id');
    }

    public function locker()
    {
        return $this->belongsTo(Locker::class, 'LockerID', 'LockerID');
    }
}
