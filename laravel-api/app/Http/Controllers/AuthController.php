<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;

class AuthController extends Controller
{
    // Login function
    public function login(Request $request)
    {
        // Validate request inputs
        $fields = $request->validate([
            'email' => 'required|string|email|exists:users',
            'password' => 'required|string',
        ]);

        // Attempt to find the user by email
        $user = User::where('email', $request->email)->first();

        // Check if user exists and the password is correct
        if (!$user || !Hash::check($request->password, $user->password)) {
            throw ValidationException::withMessages([
                'email' => ['The provided credentials are incorrect.'],
            ]);
        }

        // Return a token upon successful login
        return response()->json([
            'token' => $user->createToken('login-token')->plainTextToken,
        ]);
    }

    // Register function
    public function register(Request $request)
    {
        // Validate request inputs
        $fields = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6|confirmed',
        ]);

        // Create a new user
        $user = User::create($fields);
        $token = $user->createToken('register-token ' .$request->name);

        // Return a token upon successful registration
        return response()->json([
            'token' => $token->plainTextToken,
            'user' => $user,
        ]);
    }

    // Logout function
    public function logout(Request $request)
    {
        // Revoke the token that was used to authenticate the current request
        $request->user()->currentAccessToken()->delete();

        return response()->json(['message' => 'Logged out successfully']);
    }
}
