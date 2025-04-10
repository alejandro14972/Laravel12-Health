<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class user_allergies extends Model
{
    protected $table = 'user_allergies';
    protected $fillable = [
        'id',
        'user_id',
        'allergy_id',
    ];
}
