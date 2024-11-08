<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class PasswordResetByNameController extends Controller
{
    // Show the reset form
    public function showResetForm() 
    {
        return view('auth.reset_name');
    }

    // Handle the reset password request
    public function resetPassword(Request $request)
    {
        // Validate the input data
        $request->validate([
            'first_name' => 'required|string',
            'last_name' => 'required|string',
            'password' => 'required|string|confirmed|min:8',
        ]);

        // Find user by first name, middle name, and last name
        $user = User::where('first_name', $request->first_name)
                    ->where('last_name', $request->last_name)
                    ->first();

        // If user is not found, return an error
        if (!$user) {
            return back()->withErrors(['name' => 'User not found with the provided name details.']);
        }

        // Update the user's password
        $user->password = Hash::make($request->password);
        $user->save();

        // Redirect to login page with success message
        return redirect()->route('login')->with('status', 'Password has been reset successfully.');
    }
}
