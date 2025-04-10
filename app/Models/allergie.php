<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class allergie extends Model
{
    protected $table = 'allergies';
    protected $fillable = ['user_id', 'description', 'name', 'severity', 'diagnosis_date', 'treatment', 'notes', 'type'];



    public function users()
{
    return $this->belongsToMany(User::class, 'user_allergies');
}
}
