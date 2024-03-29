<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ContactUsController extends Controller
{
    public function sendMessage(Request $request)
    {
        $all_data = $request->all();
        dd($all_data);
    }
}
