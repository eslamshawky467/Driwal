<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\Driver\CarController;
use App\Http\Controllers\Api\Auth\ClientController;
use App\Http\Controllers\Api\Driver\DriverController;
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
Route::post('register', [DriverAuthController::class,'register']);
    Route::post('me', [DriverAuthController::class,'me']);
    Route::post('refresh', [DriverAuthController::class,'refresh']);

    Route::post('/profile/change-password',[DriverAuthController::class,'change_password']);
    Route::post('/profile/update-profile',[DriverAuthController::class,'update_profile']);

    Route::post('password/email',  [DriverAuthController::class,'forget']);
    Route::post('password/code/check', [DriverAuthController::class,'code']);


    Route::group(['middleware'=>['checkLang','auth:driver']],function(){
        Route::post('/make-account',[DriverController::class,'make_account']);
        Route::post('/has-account',[DriverController::class,'has_account']);
        Route::post('/make-transaction',[DriverController::class,'make_transaction']);
        Route::post('/is-active',[DriverController::class,'is_active']);
        Route::post('/get-location',[DriverController::class,'get_location']);
        Route::post('/accept-order',[DriverController::class,'accept_order']);
        Route::post('/cancel-order',[DriverController::class,'cancel_order']);
        Route::post('/finish-order',[DriverController::class,'finish_order']);
        Route::post('/finish-order/cash',[DriverController::class,'finish_order_cash']);
        Route::post('/trips',[DriverController::class,'number_trips']);

    });
    Route::get('cars', [CarController::class,'get_cars'])->middleware('checkLang');
});
