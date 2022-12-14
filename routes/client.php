<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\MainClientController;
use App\Http\Controllers\Api\Auth\ClientController;
use App\Http\Controllers\Api\Auth\AccountController;
use App\Http\Controllers\Api\Order\OrderController;


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

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });


Route::prefix('client')->middleware('checkLang')->group(function () {
    Route::post('login', [ClientController::class,'login']);
    Route::post('register', [ClientController::class,'register']);
    Route::post('logout',[ClientController::class, 'logout']);

    Route::post('me', [ClientController::class,'me']);
    Route::post('refresh', [ClientController::class,'refresh']);

    Route::post('/profile/change-password',[ClientController::class,'change_password']);
    Route::post('/profile/update-profile',[ClientController::class,'update_profile']);

    Route::post('password/email',  [ClientController::class,'forget']);
    Route::post('password/code/check', [ClientController::class,'code']);
    Route::post('mail/check', [ClientController::class,'mail']);
    ///////////////nationality////////////
    Route::get('nationality', [MainClientController::class,'nationality']);
    Route::post('make/account', [AccountController::class,'make_account']);
    Route::post('has/account', [AccountController::class,'has_account']);
    Route::post('make-transaction',[MainClientController::class,'make_transaction']);
    Route::post('make-order',[OrderController::class,'make_order']);
    Route::post('cancel-order',[OrderController::class,'cancel_order']);
    Route::post('/free-places',[MainClientController::class,'free_places']);
    Route::post('/make-order/free',[MainClientController::class,'make_order_free']);
});
