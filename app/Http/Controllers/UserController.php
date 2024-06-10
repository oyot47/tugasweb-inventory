<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use App\Models\User; // Import model User
use App\Models\Role; // Import model Role

class UserController extends Controller
{
    public function assignRole(Request $request, $userId)
    {
        $user = User::find($userId);
        if (!$user) {
            return response()->json(['message' => 'User not found'], 404);
        }

        $role = Role::find($request->input('role_id'));
        if (!$role) {
            return response()->json(['message' => 'Role not found'], 404);
        }

        $user->roles()->sync([$role->id]);
        return response()->json(['message' => 'Role assigned successfully']);
    }
    public function register(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
        ]);

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role' => 'user', // Mengatur role secara otomatis menjadi 'user'
        ]);

        // Sesuaikan redirect path sesuai kebutuhan Anda
        return view('auth.login')->with('success', 'Akun berhasil dibuat!');

    }
    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials, $request->filled('remember'))) {
            $request->session()->regenerate();

            // Check role after successful login
            $user = Auth::user();
            if ($user->role === 'user') {
                // Redirect user to user dashboard
                return view('user.dashboard');
            } else {
                // Redirect other roles to their respective dashboards
                return redirect()->route('dashboard.admin');
            }
        }

        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ]);
    }
}
