<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SessionBooking extends Model
{
    use HasFactory;

    // Specify the table name if it doesn't follow Laravel's naming convention
    protected $table = 'session_bookings';

    // Specify the primary key if it's not 'id'
    protected $primaryKey = 'BookingID';

    // Allow all attributes to be mass assignable
    protected $guarded = [];

    // Define relationships if necessary
    public function session()
    {
        return $this->belongsTo(TrainingSession::class, 'SessionID');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'UserID');
    }
}
