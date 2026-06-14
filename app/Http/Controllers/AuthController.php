<?php

namespace App\Http\Controllers;



use App\Models\User;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

use App\Domains\Users\Requests\LoginRequest;
use App\Domains\Users\Requests\RegisterRequest;

class AuthController extends Controller
{
    public function register(
        RegisterRequest $request
    ) {

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make(
                $request->password
            ),
        ]);

        $token = $user
            ->createToken('mobile')
            ->plainTextToken;

        return compact(
            'user',
            'token'
        );
    }

    public function login(
        LoginRequest $request
    ) {

        if (
            !Auth::attempt(
                $request->validated()
            )
        ) {

            return response()->json([
                'message' => 'Invalid credentials'
            ], 401);
        }

        $user = Auth::user();

        $token = $user
            ->createToken('mobile')
            ->plainTextToken;

        return compact(
            'user',
            'token'
        );
    }

    public function logout()
    {
        auth()
            ->user()
            ->currentAccessToken()
            ->delete();

        return response()->json([
            'success' => true
        ]);
    }
}