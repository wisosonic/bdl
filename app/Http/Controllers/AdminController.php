<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Registration;

class AdminController extends GeneralController
{
    public function index()
    {
        $all_registrations = Registration::all();

        return view($this->language . '/admin/registrations', [
            'all_registrations' => $all_registrations,
        ]);
    }

    public function editRegistration(Request $request, $id)
    {
        $registration = Registration::find($id);
        if ($registration) {
            return view($this->language . '/admin/editRegistration', [
                'registration' => $registration,
            ]);
        } else {
            return null; 
        }
    }

    public function updateRegistration(Request $request, $id)
    {
        $all_data = $request->request->all();
        $registration = Registration::find($id);
        if ($registration) {
            $v = $request->validate([
                'lda_id' => 'sometimes|unique:registrations,lda_id,' . $id,
            ]);
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

    public function deleteRegistration(Request $request)
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
}
