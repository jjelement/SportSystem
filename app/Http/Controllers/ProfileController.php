<?php

namespace App\Http\Controllers;

use App\Http\Requests\UpdateProfileRequest;
use App\Models\Province;

class ProfileController extends Controller
{
    public function renderPage() {
        $profile = auth()->user();
        $provinces = Province::get();
        return view('profile', ['profile' => $profile, 'provinces' => $provinces]);
    }

    public function saveProfile(UpdateProfileRequest $request) {
        $user = auth()->user();
        $user->update($request->all());

        return redirect()->route('profile')->with('success', 'Profile Updated!');
    }
}
