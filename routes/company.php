<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\Auth\ClientController;
use App\Http\Controllers\Api\Auth\CompanyAuthController;
use App\Http\Controllers\Api\Company\PackageController;
use App\Http\Controllers\Api\Company\RequestController;


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


Route::prefix('company')->controller(CompanyAuthController::class)->group(function () {
    Route::post('login', [CompanyAuthController::class,'login']);
    Route::post('logout',[CompanyAuthController::class, 'logout']);

    Route::post('me', [CompanyAuthController::class,'me']);
    Route::post('refresh', [CompanyAuthController::class,'refresh']);

    Route::post('/profile/change-password',[CompanyAuthController::class,'change_password']);
    Route::post('/profile/update-profile',[CompanyAuthController::class,'update_profile']);

    Route::post('password/email',  [CompanyAuthController::class,'forget']);
    Route::post('password/code/check', [CompanyAuthController::class,'code']);

    ///////////////////packages////////////
    Route::get('packages', [PackageController::class,'allPackages']);
    //////////////////////////////////////


    /////////////////request////////////////
    Route::post('create/request', [RequestController::class,'createRequest']);
    // Route::get('create/request', [RequestController::class,'createRequest']);
    Route::post('ckeckStatus/request', [RequestController::class,'ckeckStatus']);

    Route::post('has/account', [RequestController::class,'has_account']);

});
