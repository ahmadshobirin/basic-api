<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get("hello", function(){
    return response()->json([
        "status"    => 200,
        "message"   => "OKE",
        "data"      => [
            "nama"  => "ahmad shobirin",
            "email" => "ahmadshobirin.dev@gmail.com",
            "bio"   => "backend developer",
        ]
    ]);
});

Route::get("users", [\App\Http\Controllers\Api\UserController::class, 'index']);
Route::get("user/{id}", [\App\Http\Controllers\Api\UserController::class, 'show']);
Route::post("user", [\App\Http\Controllers\Api\UserController::class, 'store']);
Route::put("user/{id}", [\App\Http\Controllers\Api\UserController::class, 'update']);
Route::patch("user/{id}", [\App\Http\Controllers\Api\UserController::class, 'update']);
Route::delete("user/{id}", [\App\Http\Controllers\Api\UserController::class, 'destroy']);
