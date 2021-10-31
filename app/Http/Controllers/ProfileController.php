<?php

namespace App\Http\Controllers;

use App\Http\Requests\UpdateProfileRequest;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function edit()
    {
        $user = auth()->user()->load('info');

        return view('pages.edit_profile', compact('user'));
    }

    public function update(UpdateProfileRequest $request)
    {
        $request->update(auth()->user());

        return response()->json([
            'message' => "Successfully updated your profile!",
        ], 200);
    }
}
