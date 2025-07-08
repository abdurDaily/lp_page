<?php
namespace App\Http\Controllers\backend\permission;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Spatie\Permission\Models\Permission;

class PermissionController extends Controller
{
    public function index()
    {
        $users = User::all();
        $permissions = Permission::all();
        return view('backend.permission.assignPermission', compact('users', 'permissions'));
    }

    public function assignPermission(Request $request)
    {
        $hasAnyPermission = false;

        // Check if 'users' exists and is an array
        if (is_array($request->users)) {
            foreach ($request->users as $userId => $perms) {
                $user = User::find($userId);
                if ($user) {
                    // Sync permissions (empty array will remove all)
                    $user->syncPermissions($perms ?? []);
                }

                if (!empty($perms)) {
                    $hasAnyPermission = true;
                }
            }
        }

        if (!$hasAnyPermission) {
            return back()->with('error', 'You must assign at least one permission to any user.');
        }

        return back()->with('success', 'Permissions updated successfully!');
    }
}
