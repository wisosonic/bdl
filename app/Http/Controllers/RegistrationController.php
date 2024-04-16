<?php

namespace App\Http\Controllers;

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

        $v = $request->validate([
            'lda_id' => $request->lda_id != null ? 'unique:registrations': '',
            'phone' => $request->lda_id == null ? 'unique:registrations': '',
        ]);

        try {
            $registration = new Registration;
            $registration->name = $all_data["name"];
            $registration->phone = $all_data["phone"];
            $registration->lda_id = $all_data["lda_id"];
            $registration->location = $all_data["location"];
            $registration->email = $all_data["email"];
            $registration->attending = 0;
            $registration->doctor = $all_data["doctor"];
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
