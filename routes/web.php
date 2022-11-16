<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Auth\LoginController;
use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('auth.login');
});  

Route::group(
    [
        'prefix' => LaravelLocalization::setLocale(),
        'middleware' => [ 'localeSessionRedirect', 'localizationRedirect', 'localeViewPath' ]
    ], function(){ 

        Route::get('/', [\App\Http\Controllers\HomeController::class, 'index'])->name('home');
        Route::group(['namespace' => 'Auth'], function () {
            Route::get('/login/{type}', [LoginController::class, 'log'])->name('login.show');
            Route::get('/login', 'LoginController@logs')->name('logs');
            Route::post('/login', 'LoginController@login')->name('login');
            Route::get('/logout/{type}', 'LoginController@logout')->name('logout');
        });
        Route::group(
            [
                'middleware' => ['auth']
            ], 
            function () {
            // // index page
            Route::get('/dashboard', 'HomeController@dashboard')->name('dashboard');

            // Routes Admin
            Route::get('/dashboard/index', [AdminController::class, 'index'])->name('admins.index');
            // create page
            Route::get('/dashboard/create', [AdminController::class, 'create'])->name('admins.create');
            // store data
            Route::post('/dashboard/store', [AdminController::class, 'store'])->name('admins.store');
            // edit data
            Route::get('/dashboard/edit/{id}', [AdminController::class, 'edit'])->name('admins.edit');
            // update data
            Route::patch('/dashboard/update', [AdminController::class, 'update'])->name('admins.update');
            // dealte data
            Route::get('/dashboard/destory/{id}', [AdminController::class, 'destory'])->name('admins.destory');
            // search data
            Route::get('search/admin/', [AdminController::class, 'search'])->name('search.admin');
        });    

        /* 
        routes:
        admin.bulk_delete
        editsearch
        deletesearch

        variables:
        $admins as $admin

        </div><!-- end of tile -->
                {!! $admins->appends(\Request::except('page'))->render() !!}
        </div><!-- end of col -->        */
});

