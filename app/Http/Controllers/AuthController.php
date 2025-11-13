<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AuthController extends Controller
{
   public function showLoginForm(Request $request)
{
    // Validate input
    $request->validate([
        'email' => 'required|email',
        'password' => 'required'
    ]);

    // Check user
    $user = \App\Models\User::where('email', $request->email)->first();

    if (!$user || !\Hash::check($request->password, $user->password)) {
        return back()->with('error', 'Invalid email or password');
    }

    // Login user
    \Auth::login($user);

    // Redirect based on role
    if ($user->role == 'admin') {
        return redirect()->route('admin.dashboard');
    }
    elseif ($user->role == 'teacher') {
        return redirect()->route('teacher.dashboard');
    }
    elseif ($user->role == 'student') {
        return redirect()->route('student.dashboard');
    }

    return back()->with('error', 'Role not assigned');
}


}
