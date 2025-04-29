<?php

namespace App\Http\Controllers;

use App\Models\ModelsEvent;
use Illuminate\Http\Request;

use App\Models\Event;
use App\Models\Speaker;
use App\Models\Timeslot;
use App\Models\Sponsor;
use App\Models\Registration;

class EventController extends GeneralController
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request, $event_id)
    {
        $event = Event::find($event_id);
        
        $all_speakers = $event->speakers();
        $all_timeslots = $event->timeslots()->get()->groupBy("day");
        $platinum_sponsors = $event->sponsors()->where("platinum", 1)->get();
        $gold_sponsors = $event->sponsors()->where("platinum", 2)->get();
        $regular_sponsors = $event->sponsors()->where("platinum", ">", 2)->get()->sortBy("platinum");

        $object = [
            'event' => $event,
            'all_speakers' => $all_speakers,
            'all_timeslots' => $all_timeslots,
            'platinum_sponsors' => $platinum_sponsors,
            'gold_sponsors' => $gold_sponsors,
            'regular_sponsors' => $regular_sponsors,
        ];
        
        return view($this->language . '/events/event', $object);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(ModelsEvent $modelsEvent)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(ModelsEvent $modelsEvent)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, ModelsEvent $modelsEvent)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(ModelsEvent $modelsEvent)
    {
        //
    }
}
