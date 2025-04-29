<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Model;

class Speaker extends Model
{
    use HasFactory;

    protected $table = "speakers";
    protected $fillable = [
        'professor',
        'name',
        'speciality',
        'photo'
    ];

    public function lectures(): HasMany
    {
        return $this->hasMany(Lecture::class);
    }
}
