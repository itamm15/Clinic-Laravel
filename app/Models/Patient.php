<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Patient extends Model
{
    protected $fillable = [
        'first_name',
        'last_name',
        'phone',
        'date_of_birth',
        'user_id'
    ];

    public function user() {
        return $this->belongsTo(User::class);
    }
}
