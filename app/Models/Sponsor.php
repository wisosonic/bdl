<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\belongsToMany;
use Illuminate\Database\Eloquent\Model;

class Sponsor extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'photo',
        'url'
    ];

    public function events(): belongsToMany
    {
        return $this->belongsToMany(Event::class)->withPivot('platinum');
    }
}
