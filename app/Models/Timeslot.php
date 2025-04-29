<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\hasOne;
use Illuminate\Database\Eloquent\Model;

class Timeslot extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'quote',
        'start',
        'end',
        'day',
        'type',
        'event_id'
    ];

    public function lecture(): hasOne
    {
        return $this->hasOne(Lecture::class);
    }

    // public function event(): BelongsTo
    // {
    //     return $this->BelongsTo(Event::class);
    // }
}
