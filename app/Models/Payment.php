<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    protected $fillable = [
        'patient_id',
        'amount',
        'description',
        'paid_at'
    ];

    public function patient()
    {
        return $this->belongsTo(Patient::class);
    }
}
