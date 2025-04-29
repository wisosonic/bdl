<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\hasMany;
use Illuminate\Database\Eloquent\Relations\hasManyThrough;
use Illuminate\Database\Eloquent\Relations\belongsToMany;
use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'edition',
        'city',
        'registering',
        'date',
        'venue',
        'cover',
        'subtitle',
    ];

    public function timeslots(): hasMany
    {
        return $this->hasMany(Timeslot::class);
    }

    public function lectures(): hasManyThrough
    {
        return $this->hasManyThrough(Lecture::class, Timeslot::class);
    }

    public function speakers()
    {
        $all_lectures = $this->lectures()->get();
        $speakers = collect();
        foreach ($all_lectures as $lecture) {
            if ($lecture->speaker) {
                $speakers->push($lecture->speaker);
            }
        }
        return $speakers;
    }

    public function sponsors(): belongsToMany
    {
        return $this->belongsToMany(Sponsor::class)->withPivot('platinum');
    }

    public function users(): belongsToMany
    {
        return $this->belongsToMany(User::class)->withPivot([
            'lunch', 'presence', 'certificate'
        ]);
    }

    public function registrations(): hasMany
    {
        return $this->hasMany(Registration::class);
    }
}
