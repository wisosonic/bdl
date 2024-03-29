<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Model;

class Timeslot extends Model
{
    use HasFactory;

    public function lecture(): BelongsTo
    {
        return $this->belongsTo(Lecture::class);
    }

    public function events(): BelongsToMany
    {
        return $this->BelongsToMany(Event::class);
    }
}
