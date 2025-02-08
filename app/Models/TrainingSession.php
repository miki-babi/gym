<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TrainingSession extends Model
{
    use HasFactory;

    // Specify the table name if it doesn't follow Laravel's naming convention
    protected $table = 'training_sessions';

    // Specify the primary key if it's not 'id'
    protected $primaryKey = 'SessionID';

    // Allow all attributes to be mass assignable
    protected $guarded = [];

    // Define relationships if necessary
    public function trainer()
    {
        return $this->belongsTo(User::class, 'TrainerID');
    }

    public function attendances()
    {
        return $this->hasMany(SessionAttendance::class, 'SessionID');
    }
}
