<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class ProfileController extends Controller
{
    // show user info
    public function show()
    {
        $user = Auth::user();
        return response()->json($user);
    }

    // update user info
    public function update(Request $request)
    {
        $user = Auth::user();
        $data = $request->validate([
            'full_name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,'.$user->id,
            'phone_number' => 'nullable|string',
        ]);

        $user->update($data);
        return response()->json([
            'message' => 'Profile updated successfully',
            'user' => $user
        ]);
    }

    // update password
    public function updatePassword(Request $request)
    {
        $request->validate([
            'current_password' => 'required',
            'password' => 'required|min:8|confirmed',
        ]);

        $user = Auth::user();

        if (!Hash::check($request->current_password, $user->password)) {
            return response()->json([
                'message' => 'Current password is incorrect'
            ], 422);
        }

        $user->update([
            'password' => Hash::make($request->password)
        ]);

        return response()->json([
            'message' => 'Password updated successfully'
        ]);
    }

    public function uploadAvatar(Request $request)
    {
        $request->validate([
            'picture' => 'required|image|max:2048',
        ]);

        $user = Auth::user();

        // Delete old avatar if exists
        if ($user->picture && Storage::disk('public')->exists($user->picture)) {
            Storage::disk('public')->delete($user->picture);
        }

        // Store new avatar
        $path = $request->file('picture')->store('avatars', 'public');

        $user->update([
            'picture' => $path
        ]);

        return response()->json([
            'message' => 'Avatar uploaded successfully',
            'picture' => $path
        ]);
    }
}
