<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LockerAssignment extends Model
{
    use HasFactory;

    protected $table = 'locker_assignments';
    protected $primaryKey = 'AssignmentID';
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
