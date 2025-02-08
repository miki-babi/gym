<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Locker extends Model
{
    use HasFactory;

    protected $table = 'lockers';
    protected $primaryKey = 'LockerID';
    protected $guarded = [];

    public function lockerAssignments()
    {
        return $this->hasMany(LockerAssignment::class, 'LockerID', 'LockerID');
    }

    public function lockerPayments()
    {
        return $this->hasMany(LockerPayment::class, 'LockerID', 'LockerID');
    }
}
