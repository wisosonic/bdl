<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Team extends Model
{
    use HasFactory;

    protected $table = "team";
    protected $fillable = [
        'name',
        'professor',
        'position',
        'phone',
        'photo',
        'x',
        'facebook',
        'instagram',
        'linkedin'
    ];
}
