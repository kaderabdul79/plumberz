<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    //
    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if (Auth::attempt($request->only('email', 'password'))) {
            $user = Auth::user();
            $token = $user->createToken('app-token')->plainTextToken;

            return response()->json(['token' => $token, 'user' => $user], 200);
        }

        return response()->json(['message' => 'Invalid credentials'], 401);
    }
    
    // logout
    public function logout(Request $request)
    {
        $user = $request->user();

        // delete user's tokens
        $user->tokens()->delete();

        return response()->json(['message' => 'Successfully logged out'], 200);
    }
}
