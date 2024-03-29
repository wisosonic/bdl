<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Registration;

class AdminController extends GeneralController
{
    public function index()
    {
        $all_registrations = Registration::all();

        return view($this->language . '/admin/all-registrations', [
            'all_registrations' => $all_registrations,
        ]);
    }
}
