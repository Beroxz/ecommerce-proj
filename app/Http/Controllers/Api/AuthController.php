<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\UserResource;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => 'required',
            'remember' => 'boolean'
        ]);
        $remember = $credentials['remember'] ?? false;
        unset($credentials['remember']);
        if (!Auth::attempt($credentials, $remember)) {
            return response([
                'message' => 'Email or password is incorrect'
            ], 422);
        }

        /** @var \App\Models\User $user */
        $user = Auth::user();
        if (!in_array($user->role, [1, 2])) {
            Auth::logout();
            return response([
                'message' => 'You do not have permission to login'
            ], 403);
        }

        if (!$user->email_verified_at) {
            Auth::logout();
            return response([
                'message' => 'Your email address is not verified'
            ], 403);
        }

        $token = $user->createToken('main')->plainTextToken;
        
        if ($user->role == 1) {
            return response([
                'user' => new UserResource($user),
                'token' => $token,
                'message' => 'Welcome Admin'
            ]);
        } elseif ($user->role == 2) {
            return response([
                'user' => new UserResource($user),
                'token' => $token,
                'message' => 'Welcome Seller'
            ]);
        }
    }

    public function logout()
    {
        /** @var \App\Models\User $user */
        $user = Auth::user();
        $user->currentAccessToken()->delete();

        return response('', 204);
    }

    public function getUser(Request $request)
    {
        return new UserResource($request->user());
    }
}
