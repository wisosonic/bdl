<?php

namespace App\Http\Controllers;

use App\Models\Registration;
use Illuminate\Http\Request;

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
        
        $registration = new Registration;
        $registration->name = $all_data["name"];
        $registration->phone = $all_data["phone"];
        $registration->lda_id = $all_data["lda_id"];
        $registration->location = $all_data["location"];
        $registration->email = $all_data["email"];
        $registration->attending = $all_data["attending"];
        $registration->save();
 
        return response()->json([
            'email' => $all_data["name"]
        ]);

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
