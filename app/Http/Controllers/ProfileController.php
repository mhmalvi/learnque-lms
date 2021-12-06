<?php

namespace App\Http\Controllers;

use App\Http\Requests\DeleteAvatarRequest;
use App\Http\Requests\UpdateAvatarRequest;
use App\Http\Requests\UpdateProfileRequest;
use App\Http\Resources\UserResource;

class ProfileController extends Controller
{
    public function edit()
    {
        $user = auth()->user()->load('info');

        $user = new UserResource($user);

        return view('pages.edit_profile', compact('user'));
    }

    public function update(UpdateProfileRequest $request)
    {
        $request->update(auth()->user());

        return response()->json([
            'message' => "Successfully updated your profile!",
        ], 200);
    }

    public function avatarUpdate(UpdateAvatarRequest $request)
    {
        try {
            $new_image_name = $request->update();

            return response()->json([
                'message' => "Successfully updated your avatar",
                'avatar' => $new_image_name,
            ], 201);
        } catch (\Throwable $e) {
            return response()->json([
                'message' => $e->getMessage(),
            ], 500);
        }
    }

    public function avatarDelete(DeleteAvatarRequest $request)
    {
        try {
            $request->delete();

            return response()->json([
                'message' => "Successfully deleted your avatar!",
            ], 202);
        } catch (\Throwable $e) {
            return response()->json([
                'message' => $e->getMessage()
            ], 500);
        }
    }
}
