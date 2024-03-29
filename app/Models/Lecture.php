<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Model;

class Lecture extends Model
{
    use HasFactory;

    public function speaker(): BelongsTo
    {
        return $this->belongsTo(Speaker::class);
    }

    public function timeslot(): HasOne
    {
        return $this->hasOne(Timeslot::class);
    }
}
