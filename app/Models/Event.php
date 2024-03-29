<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    use HasFactory;

    public function timeslots(): BelongsToMany
    {
        return $this->BelongsToMany(Timeslot::class);
    }
}
