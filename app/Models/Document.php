<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Document extends Model
{
    protected $fillable = [
        'patient_id',
        'date',
        'description',
    ];

    public function patient()
    {
        return $this->belongsTo(Patient::class);
    }
}
