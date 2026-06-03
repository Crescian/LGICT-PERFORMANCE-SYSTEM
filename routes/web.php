<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Web\AuthController;
use App\Http\Controllers\SSOController;

/*
|--------------------------------------------------------------------------
| ROOT
|--------------------------------------------------------------------------
*/
Route::get('/', fn() => view('landing'))->name('home');

/*
|--------------------------------------------------------------------------
| GUEST
|--------------------------------------------------------------------------
*/
Route::middleware('guest')->group(function () {
    Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
    Route::post('/login', [AuthController::class, 'login']);
});

/*
|--------------------------------------------------------------------------
| AUTHENTICATED (User Management)
|--------------------------------------------------------------------------
*/
Route::middleware('auth')->group(function () {

    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

    // Dashboard
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    /*
    |--------------------------------------------------------------------------
    | SSO TRIGGER (IMPORTANT FIX HERE)
    |--------------------------------------------------------------------------
    */
    Route::get('/go-to-ticketing', [SSOController::class, 'redirectToTicketing'])
        ->name('go-to-ticketing');

    Route::get('/sso-login', [SSOController::class, 'handleSSO'])
        ->name('sso.login');

});

/*
|--------------------------------------------------------------------------
| TICKETING DASHBOARD (TEMP PLACE - STILL USER SYSTEM)
|--------------------------------------------------------------------------
*/
Route::middleware('auth')->group(function () {
    Route::get('/employee/dashboard', function () {
        return view('dashboard');
    })->name('employee.tickets.index');
});