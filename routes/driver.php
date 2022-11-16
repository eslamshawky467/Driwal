<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\Auth\DriverAuthController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::prefix('driver')->controller(ClientController::class)->group(function () {
    Route::post('login', [DriverAuthController::class,'login']);
    Route::post('logout',[DriverAuthController::class, 'logout']);

    Route::post('me', [DriverAuthController::class,'me']);
    Route::post('refresh', [DriverAuthController::class,'refresh']);

    Route::post('/profile/change-password',[DriverAuthController::class,'change_password']);
    Route::post('/profile/update-profile',[DriverAuthController::class,'update_profile']);

    Route::post('password/email',  [DriverAuthController::class,'forget']);
    Route::post('password/code/check', [DriverAuthController::class,'code']);
});
