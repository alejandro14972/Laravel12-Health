<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Doctor extends Model
{

    protected $table = 'doctors';

    protected $fillable = [
        'user_id',
        'speciality_id'
    ];

    public function speciality(){
        return $this->belongsTo(Speciality::class);
    }
}
