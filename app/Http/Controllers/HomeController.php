<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;

use App\Models\Speaker;
use App\Models\Timeslot;
use App\Models\Sponsor;

class HomeController extends GeneralController
{
    
    public function index() {
        $all_speakers = Speaker::all();
        $all_timeslots = Timeslot::all()->groupBy("day");
        $platinum_sponsors = Sponsor::where("platinum", 1)->get();
        $gold_sponsors = Sponsor::where("platinum", 2)->get();
        $regular_sponsors = Sponsor::where("platinum", ">", 2)->get()->sortBy("platinum");

        return view($this->language . '/base', [
            'all_speakers' => $all_speakers,
            'all_timeslots' => $all_timeslots,
            'platinum_sponsors' => $platinum_sponsors,
            'gold_sponsors' => $gold_sponsors,
            'regular_sponsors' => $regular_sponsors,
        ]);
    }
}
