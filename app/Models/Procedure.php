<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Procedure extends Model
{
    protected $fillable = [
        'doctor_id',
        'description',
    ];

    public function doctor()
    {
        return $this->belongsTo(Doctor::class);
    }
}
