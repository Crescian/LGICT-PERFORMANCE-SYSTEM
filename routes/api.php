<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\SSOController;

Route::post('/login', [AuthController::class, 'login']);

/*
|--------------------------------------------------------------------------
| SSO VERIFY (NO AUTH, NO CSRF, PURE API)
|--------------------------------------------------------------------------
*/
Route::post('/verify-sso', [SSOController::class, 'verifySSO']);

/*
|--------------------------------------------------------------------------
| AUTHENTICATED API (Sanctum)
|--------------------------------------------------------------------------
*/
Route::middleware('auth:sanctum')->group(function () {
    Route::post('/logout', [AuthController::class, 'logout']);

    Route::get('/me', function (Illuminate\Http\Request $request) {
        return $request->user();
    });
});