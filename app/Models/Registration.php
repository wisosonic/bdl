<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\belongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Registration extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'phone',
        'lda_id',
        'location',
        'email',
        'attending',
        'presence',
        'doctor',
        'university',
        'event_id'
    ];

    public function event(): belongsTo
    {
        return $this->belongsTo(Event::class);
    }
}
