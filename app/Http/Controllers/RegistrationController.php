<?php

namespace App\Http\Controllers;

use Illuminate\Validation\Rule;
use App\Models\Registration;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class RegistrationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
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
        $all_data = $request->all();

        $condition1 = Registration::where("lda_id", $all_data["lda_id"])->where("event_id", $all_data["event_id"])->get() ;
        $condition2 = Registration::where("phone", $all_data["phone"])->where("event_id", $all_data["event_id"])->get() ;

        if ($all_data["lda_id"] != "" && $condition1->count() > 0) {
            return response()->json([
                'success' => false,
                'error' => "You are already registered for this event"
            ]);
        }
        if ($all_data["phone"] != "" && $condition2->count() > 0) {
            return response()->json([
                'success' => false,
                'error' => "You are already registered for this event"
            ]);
        }

        try {
            $registration = new Registration;
            $registration->name = $all_data["name"];
            $registration->phone = $all_data["phone"];
            $registration->lda_id = $all_data["lda_id"];
            $registration->location = $all_data["location"];
            $registration->email = $all_data["email"];
            $registration->attending = $all_data["attending"];
            $registration->doctor = $all_data["doctor"];
            $registration->university = $all_data["university"];
            $registration->event_id = $all_data["event_id"];
            $registration->save();
            return response()->json([
                'success' => true
            ]);
        } catch (\Throwable $th) {
            return response()->json([
                'success' => false,
                'error' => $th
            ]);
        }

    }

    /**
     * Display the specified resource.
     */
    public function show(Registration $registration)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Registration $registration)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Registration $registration)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Registration $registration)
    {
        //
    }
}
