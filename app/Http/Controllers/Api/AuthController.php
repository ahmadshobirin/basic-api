<?php

namespace App\Http\Controllers\Api;

use JWTAuth;
use App\Models\User;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Tymon\JWTAuth\Exceptions\JWTException;

class AuthController extends Controller
{
    public function login(Request $request)
    {
        $request->validate([
            "email"    => "email|required",
            "password" => "required|min:3"
        ]);

        $credentials = $request->only('email', 'password');

        try {
            if (!$token = JWTAuth::attempt($credentials)) {
                return response()->json([
                    "status" => 200,
                    "message" => 'invalid_credentials'
                ], 400);
            }
        } catch (JWTException $e) {
            return response()->json([
                "status" => 200,
                "message" => 'could_not_create_token'
            ], 500);
        }

        $user = JWTAuth::user();

        $response = [
            "name" => $user->name,
            "email" => $user->email,
            "token" => $token,
        ];

        return response()->json([
            "status" => 200,
            "message" => "success",
            "data" => $response,
        ], 200);
    }

    public function AuthenticatedUser()
    {
        try {
            if (!$user = JWTAuth::parseToken()->authenticate()) {
                return response()->json([
                    "status" => 404,
                    "message" => 'user_not_found'
                ], 404);
            }
        } catch (Tymon\JWTAuth\Exceptions\TokenExpiredException $e) {

            $status =  $e->getStatusCode();
            return response()->json([
                "status" => $status,
                "message" => 'token_expired'
            ], $status);
        } catch (Tymon\JWTAuth\Exceptions\TokenInvalidException $e) {

            $status =  $e->getStatusCode();
            return response()->json([
                "status" => $status,
                "message" => 'token_invalid'
            ], $status);
        } catch (Tymon\JWTAuth\Exceptions\JWTException $e) {
            $status =  $e->getStatusCode();
            return response()->json([
                "status" => $status,
                "message" => 'token_absent'
            ], $status);
        }

        return response()->json([
            "status" => 200,
            "message" => "success",
            "data" => $user,
        ], 200);
    }
}
