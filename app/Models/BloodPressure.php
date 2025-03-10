<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BloodPressure extends Model
{

    protected $table = 'blood_pressures';
    protected $fillable = [
        'user_id',
        'systolic',
        'diastolic',
        'pulse',
        'date',
        'toma',
        'time',
        'notes',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
