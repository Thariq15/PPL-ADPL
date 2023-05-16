<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rule;
use Illuminate\Support\Str;

class ProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function show()
    {
        return view('dashboard.profile.show');
    }

    public function edit()
    {
        return view('dashboard.profile.edit');
    }


    public function update(ProfileUpdateRequest $request): RedirectResponse
    {
        $user = User::find($request->id);
        $user->name = $request->firstname . " " . $request->lastname;
        $user->email = $request->email;
        $user->phone = $request->phone;
        $user->address = $request->address;
        $user->city = $request->city;
        $user->birthday = $request->birthday;
        if ($request->password) {
            $user->password = Hash::make($request->password);
        }
        if ($request->file('profiles')) {
            $file = $request->file('profiles');
            $random = Str::random(8);
            $extension = $file->getClientOriginalExtension();
            $name = $random . '.' . $extension;
            $destiny = 'assets/img/profile';
            $file->move($destiny, $name);
            $path = $destiny . "/" . $name;
            $user->profile = $path;
        }
        $user->save();
        return Redirect::route('profile.edit')->with('status', 'profile-updated');
    }
}
