<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get("hello",[\App\Http\Controllers\HelloController::class, 'message']);

Route::get("users", [\App\Http\Controllers\Api\UserController::class, 'index']);
Route::get("user/{id}", [\App\Http\Controllers\Api\UserController::class, 'show']);
Route::post("user", [\App\Http\Controllers\Api\UserController::class, 'store']);
Route::put("user/{id}", [\App\Http\Controllers\Api\UserController::class, 'update']);
Route::patch("user/{id}", [\App\Http\Controllers\Api\UserController::class, 'update']);
Route::delete("user/{id}", [\App\Http\Controllers\Api\UserController::class, 'destroy']);

Route::post("auth/login", [\App\Http\Controllers\Api\AuthController::class, 'login'])->name('login');

Route::group(["middleware" => "jwt.verify"], function(){
    Route::get("auth/profile", [\App\Http\Controllers\Api\AuthController::class, 'AuthenticatedUser']);
});
