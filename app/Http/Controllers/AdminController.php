<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Event;
use App\Models\Registration;

class AdminController extends GeneralController
{
    public function index(Request $request, $event_id)
    {
        $event = Event::find($event_id);
        $all_registrations = $event->registrations()->get();

        return view($this->language . '/admin/pages/registrations', [
            'event' => $event,
            'all_registrations' => $all_registrations,
        ]);
    }

    public function editRegistration(Request $request, $event_id, $registration_id)
    {
        $event = Event::find($event_id);
        $registration = Registration::find($registration_id);
        if ($registration) {
            return view($this->language . '/admin/pages/editRegistration', [
                'event' => $event,
                'registration' => $registration,
            ]);
        } else {
            return null; 
        }
    }

    public function updateRegistration(Request $request, $event_id, $registration_id)
    {
        $all_data = $request->request->all();
        $registration = Registration::find($registration_id);
        if ($registration) {
            // $v = $request->validate([
            //     'lda_id' => 'sometimes|unique:registrations,lda_id,' . $registration_id,
            // ]);
            $registration->name = $all_data["name"];
            $registration->phone = $all_data["phone"];
            $registration->lda_id = $all_data["lda_id"];
            $registration->location = $all_data["location"];
            $registration->email = $all_data["email"];
            $registration->attending = $all_data["attending"];
            $registration->presence = $all_data["presence"];
            $registration->doctor = $all_data["doctor"];
            $registration->save();
            return $registration;
        } else {
            return null; 
        }
    }

    public function deleteRegistration(Request $request, $event_id)
    {
        $all_data = $request->request->all();
        $id = $all_data["id"];
        $registration = Registration::find($id);
        if ($registration) {
            $registration->delete();
            return true;
        } else {
            return null; 
        }
    }

    public function attendance(Request $request, $event_id)
    {
        $event = Event::find($event_id);
        return view($this->language . '/admin/pages/attendance', ["event"=>$event]);
    }

    public function postAttendance(Request $request, $event_id)
    {
        $event = Event::find($event_id);

        $all_data = $request->all();
        $registration = $event->registrations()->where("lda_id", $all_data["lda_id"])->first();
        if ($registration) {
            $registration->presence = 1;
            $registration->save();
            return response()->json([
                'confirmed' => true,
                'registration' => $registration
            ]);
        } else {
            return response()->json([
                'confirmed' => false
            ]);
        }
    }
}
