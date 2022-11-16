<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// // });

Route::get('/', [\App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::group(['namespace' => 'Auth'], function () {
    // Route::get('/register/{type}', [RegisterController::class, 'reg'])->middleware('guest')->name('reg');
    // Route::get('/register', 'RegisterController@regs')->name('regs');
    // Route::post('/register', 'RegisterController@signup')->name('register');

    Route::get('forget-password', [ForgotPasswordController::class, 'showForgetPasswordForm'])->name('forget.password.get');
    Route::post('forget-password', [ForgotPasswordController::class, 'submitForgetPasswordForm'])->name('forget.password.post');
    Route::get('reset-password/{token}', [ForgotPasswordController::class, 'showResetPasswordForm'])->name('reset.password.get');
    Route::post('reset-password', [ForgotPasswordController::class, 'submitResetPasswordForm'])->name('reset.password.post');
    Route::get('/login/{type}', [LoginController::class, 'log'])->name('login.show');
    Route::get('/login', 'LoginController@logs')->name('logs');
    Route::post('/login', 'LoginController@login')->name('login');
    Route::get('/logout/{type}', 'LoginController@logout')->name('logout');
});
// Route::group(
//     [
//         'prefix' => LaravelLocalization::setLocale(),
//         'middleware' => ['localeSessionRedirect', 'localizationRedirect', 'localeViewPath', 'auth']
//     ], function () {
//     Route::get('/dashboard', 'HomeController@dashboard')->name('dashboard');
//     };
