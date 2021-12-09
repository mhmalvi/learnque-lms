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
        if (auth('admin')->check()) {
            $user = auth('admin')->user()->load('info');
        } else {
            $user = auth()->user()->load('info');
        }

        $user = new UserResource($user);

        return view('pages.edit_profile', compact('user'));
    }

    public function update(UpdateProfileRequest $request)
    {
        $user = auth('admin')->check() ? auth('admin')->user() : auth()->user();
        $request->update($user);

        return response()->json([
            'message' => "Successfully updated your profile!",
        ], 200);
    }

    public function avatarUpdate(UpdateAvatarRequest $request)
    {
        try {
            $user = auth('admin')->check() ? auth('admin')->user() : auth()->user();
            $request->update($user);

            return response()->json([
                'message' => "Successfully updated your avatar",
                'avatar' => auth()->user()->avatar_url,
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
            $user = auth('admin')->check() ? auth('admin')->user() : auth()->user();
            $request->delete($user);

            return response()->json([
                'message' => "Successfully deleted your avatar!",
                'avatar' => auth()->user()->avatar_url,
            ], 202);
        } catch (\Throwable $e) {
            return response()->json([
                'message' => $e->getMessage()
            ], 500);
        }
    }
}
