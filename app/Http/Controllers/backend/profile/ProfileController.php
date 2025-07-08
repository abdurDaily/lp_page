<?php

namespace App\Http\Controllers\backend\profile;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class ProfileController extends Controller
{
    // PROFILE INDEX
    public function index()
    {
        $userData = Auth::user();
        return view('backend.profileSetting.profile', compact('userData'));
    }

    // USER PASSWORD UPDATE
    public function updatePassword(Request $request)
    {
        $request->validate([
            'old_password' => 'required',
            'new_password' => 'required|string|min:8|confirmed',
        ]);

        // it will not work on run time 
        /** @var \App\Models\User $user */
        $user = Auth::user();


        if (!Hash::check($request->old_password, $user->password)) {
            return back()->withErrors(['old_password' => 'Old password does not match']);
        }

        $user->password = Hash::make($request->new_password);
        $user->save();

        Auth::logout();
        return redirect()->route('login')->with('success', 'Password updated successfully. Please login again.');
    }

    public function profileImageUpload(Request $request)
    {
        $request->validate([
            'profile_img' => 'required|image|mimes:jpeg,png,jpg,gif,webp',
        ]);

        if ($request->hasFile('profile_img')) {
            $user = auth()->user();

            // 1. Delete old image file if exists
            if ($user->profile_image) {
                // Extract the relative path from full URL
                $oldImagePath = str_replace(url('/'), '', $user->profile_image);

                $oldImageFullPath = public_path($oldImagePath);

                if (file_exists($oldImageFullPath)) {
                    unlink($oldImageFullPath);  // Delete the old file
                }
            }

            // 2. Save new image
            $file = $request->file('profile_img');
            $filename = time() . '_' . $file->getClientOriginalName();

            $destinationPath = public_path('uploads/users');
            if (!file_exists($destinationPath)) {
                mkdir($destinationPath, 0775, true);
            }

            $file->move($destinationPath, $filename);

            // 3. Save FULL URL to database
            $imageUrl = url('uploads/users/' . $filename);

            $user->profile_image = $imageUrl;
            $user->save();

            return response()->json([
                'status' => 'success',
                'file' => $filename,
                'url' => $imageUrl,
            ]);
        }

        return response()->json([
            'status' => 'error',
            'message' => 'No file uploaded',
        ], 400);
    }

    //** USER INFO  */
    public function profileInfo(Request $request){
        $userInfo = auth::user();
        
        $userInfo->name = $request->name;
        $userInfo->email = $request->email;
        $userInfo->save();

        
        return response()->json([
            'status' => 'success',
            'message' => 'user information updated!',
        ], 200);
    }
}
