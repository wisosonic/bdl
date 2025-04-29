<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;

use App\Models\Team;
use App\Models\Member;
use App\Models\Registration;

class HomeController extends GeneralController
{
    public function index()
    {
        $all_team = Team::all();
        $all_members_count = Member::count();
        $all_registrations_count = Registration::count();

        return view($this->language . '/pages/home', [
            'team' => $all_team, 
            'members_count' => $all_members_count,
            'registrations_count' => $all_registrations_count,
        ]);
    }

    public function members()
    {
        $all_members = Member::all();

        return view($this->language . '/pages/members', [
            'members' => $all_members
        ]);
    }
}
