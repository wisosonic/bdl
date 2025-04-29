<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;
use Hash;

class ProfileController extends GeneralController
{
    /**
     * Display the user's profile form.
     */
    public function index(Request $request): View
    {
        $user = Auth::user();
        if ($user) {
            return view('profile.myprofile', [
                'user' => $user,
            ]);
        } else {
            return redirect("/");
        }
    }

    public function settings(Request $request): view
    {
        $user = Auth::user();
        if ($user) {
            return view('profile.settings', [
                'user' => $user,
            ]);
        } else {
            return redirect("/");
        }
    }

    public function events(Request $request): view
    {
        $user = Auth::user();
        if ($user) {
            return view('profile.events', [
                'user' => $user,
                'myevents' => $user->events()->withPivot(["presence"])->get(),
            ]);
        } else {
            return redirect("/");
        }
    }

    public function certificates(Request $request): view
    {
        $user = Auth::user();
        if ($user) {
            return view('profile.certificates', [
                'user' => $user,
                'myevents' => $user->events()->withPivot(["certificate"])->get(),
            ]);
        } else {
            return redirect("/");
        }
    }

    /**
     * Update the user's profile information.
     */
    public function updateProfile(Request $request): RedirectResponse
    {
        $user = Auth::user();
        $inputs = $request->all();
        if ($user) {
            $user->name = $inputs["name"];
            $user->email = $inputs["email"];
            $user->phone = $inputs["phone"];
            $user->doctor = $inputs["doctor"];
            $user->location = $inputs["location"];
            $user->lda_id = $inputs["lda_id"];
            $user->save();
            return Redirect::route('profile.myprofile')->with('success', 'profile-updated');
        }
        return Redirect::route('profile.myprofile')->with('error', 'user-not-found');
    }

    public function updateSettings(Request $request): RedirectResponse
    {
        $user = Auth::user();
        $inputs = $request->all();
        $hashedPassword = $user->password;
        if (Hash::check($inputs["current_password"], $hashedPassword)) {
            if($inputs["new_password"] == $inputs["confirm_password"]) {
                $user->password = Hash::make($inputs["new_password"]);
                return Redirect::route('profile.myprofile')->with('success', 'settings-updated');
            } else {
                return Redirect::route('profile.myprofile')->with('error', 'wrong-confirm-password');
            }
        } else {
            return Redirect::route('profile.myprofile')->with('error', 'wrong-current-password');
        }
    }
}
