<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TestController;
use App\Http\Controllers\Admin\MapController;
use App\Http\Controllers\Admin\FileController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\BannerController;
use App\Http\Controllers\Admin\DriverController;
use App\Http\Controllers\Admin\CarTypeController;
use App\Http\Controllers\Admin\CompanyController;
use App\Http\Controllers\Admin\PackageController;
use App\Http\Controllers\Admin\RequestController;
use App\Http\Controllers\Admin\CarModelController;
use App\Http\Controllers\Admin\SettingsController;
use App\Http\Controllers\Admin\AdvertisementController;
use App\Http\Controllers\Admin\ClientAccountController;
use App\Http\Controllers\Admin\DriversAccountsController;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;


// define('PAGINATION',25);

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
//     return view('auth.login');
// });


Route::group(
    [
        'prefix' => LaravelLocalization::setLocale(),
        'middleware' => [ 'localeSessionRedirect', 'localizationRedirect', 'localeViewPath']
    ], function(){

        Route::get('/', [\App\Http\Controllers\HomeController::class, 'index'])->name('home')->middleware('guest');
        Route::group(['namespace' => 'Auth','middleware'=>'guest'], function () {
            Route::get('/login/{type}', [LoginController::class, 'log'])->name('login.show');
            Route::get('/login', 'LoginController@logs')->name('logs');
            Route::post('/login', 'LoginController@login')->name('login');
            Route::get('/logout/{type}', 'LoginController@logout')->name('logout')->withoutMiddleware('guest');
        });
        Route::group(
            [
                'middleware' => ['auth']
            ],
            function () {
                // // index page
                Route::get('/dashboard', 'HomeController@dashboard')->name('dashboard');

                Route::group(['namespace' => 'Admin'], function(){
                    Route::get('/profile',[AdminController::class,'profile'])->name('admin.profile');
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
                Route::get('/dashboard/destory/{id}', [AdminController::class, 'destory'])->name('admins.destroy');
                // search data
                Route::get('search/admin/', [AdminController::class, 'search'])->name('search.admin');
                // bulk_delete
                Route::delete('dashboard/bulk_delete', [AdminController::class, 'bulk_delete'])->name('admin.bulk_delete');

                Route::resource('clints', 'CleintController');
                Route::get('clint/block/{id}', [\App\Http\Controllers\Admin\CleintController::class, 'destroy'])->name('clint.block');
                Route::post('clints/block', [\App\Http\Controllers\Admin\CleintController::class, 'bulk_Delete'])->name('All_Delete');

                // Companies Routes
                Route::resource('Companies', 'CompanyController');
                Route::post('Companies/deleteAll', [CompanyController::class, 'delete_All'])->name('Companies.delete_All');

                // Driver Routes
                Route::resource('driver', 'DriverController');
                Route::post('driver/deleteAll', [DriverController::class, 'delete_All'])->name('driver.delete_All');

                Route::get('driver/active/{id}', [DriverController::class, 'active'])->name('driver.active');
                Route::get('driver/inactive/{id}', [DriverController::class, 'inactive'])->name('driver.inactive');
                Route::get('driver/show/{id}', [DriverController::class, 'show'])->name('driver.show');


                Route::resource('packages', 'PackageController');
                Route::get('package/delete/{id}',[\App\Http\Controllers\Admin\PackageController::class,'destroy'])->name('packages.destroy');
                Route::delete('package/delete',[\App\Http\Controllers\Admin\PackageController::class,'bulkdelete'])->name('packages.bulkdelete');
                Route::get('package/search',[\App\Http\Controllers\Admin\PackageController::class,'search'])->name('packages.search');


                Route::resource('zones', ZoneController::class);
                Route::get('zone/delete/{id}',[\App\Http\Controllers\Admin\ZoneController::class,'destroy'])->name('zones.destroy');
                Route::delete('zone/delete',[\App\Http\Controllers\Admin\ZoneController::class,'bulkdelete'])->name('zones.bulkdelete');

                Route::get('/file/delete/{id}',[FileController::class,'delete'])->name('file.delete');


                Route::resource('driversaccounts', 'DriversAccountsController');
                Route::get('driveraccount/delete/{id}',[\App\Http\Controllers\Admin\DriversAccountsController::class,'destroy'])->name('driversaccounts.destroy');
                Route::delete('driveraccount/delete',[\App\Http\Controllers\Admin\DriversAccountsController::class,'bulkdelete'])->name('driversaccounts.bulkdelete');
                Route::get('driveraccount/show/{id}', [\App\Http\Controllers\Admin\DriversAccountsController::class, 'show_attachments'])->name('driveraccount.show');
                Route::get('driveraccount/approve/{id}', [\App\Http\Controllers\Admin\DriversAccountsController::class, 'approve'])->name('driveraccount.approve');
                Route::get('driveraccount/cancel/{id}', [\App\Http\Controllers\Admin\DriversAccountsController::class, 'cancel'])->name('driveraccount.cancel');

                // Banner Routes
                //  Route::get('banners/index', [BannerController::class, 'index'])->name('banner.index');
                //  Route::get('banners/create', [BannerController::class, 'create'])->name('banner.create');
                //  Route::post('banners/store', [BannerController::class, 'store'])->name('banner.store');
                //  Route::get('banners/destroy/{id}', [BannerController::class, 'destroy'])->name('banner.destroy');
                Route::resource('banner', 'BannerController');
                Route::get('driver/delete/{id}', [BannerController::class, 'delete'])->name('banner.delete');

              // Setting Routes
                Route::group(['prefix'=>'settings'],function(){
                    Route::get('about-us',[SettingsController::class,'about_us'])->name('about_us');
                    Route::post('about-us/store',[SettingsController::class,'about_us_store'])->name('about_us_store');
                    Route::get('contact-us',[SettingsController::class,'contact_us_index'])->name('contact_us.index');
                    Route::get('contact-us/create',[SettingsController::class,'contact_us_create'])->name('contact_us.create');
                    Route::post('contact-us/store',[SettingsController::class,'contact_us_store'])->name('contact_us.store');
                    Route::get('contact-us/update/{id}',[SettingsController::class,'contact_us_update'])->name('contact_us.update');
                    Route::post('about-us/edit',[SettingsController::class,'about_us_edit'])->name('contact_us.edit');
                    Route::get('/delete/{id}',[SettingsController::class,'destroy'])->name('settings.destroy');
                    Route::post('/delete', [SettingsController::class, "bulkdelete"])->name('settings.delete');
                    Route::get('qa',[SettingsController::class,'qa_index'])->name('qa.index');
                    Route::get('qa/create',[SettingsController::class,'qa_create'])->name('qa.create');
                    Route::post('qa/store',[SettingsController::class,'qa_store'])->name('qa.store');
   Route::get('req/showMap/{id}', [RequestController::class,'showMap'])->name('requests.showMap');
   Route::get('qa/update/{id}',[SettingsController::class,'qa_update'])->name('qa.update');
   Route::get('map/index', [MapController::class, 'index'])->name('map.index');
   ///////  ad.create
   Route::get('ad/index', [AdvertisementController::class, 'index'])->name('ad.index');
   Route::get('ad/create', [AdvertisementController::class, 'create'])->name('ad.create');
   Route::get('ad/show/{id}', [AdvertisementController::class,'show_iamge'])->name('ad.show');
   Route::post('ad/store', [AdvertisementController::class, 'store'])->name('ad.store');
   Route::get('ad/file/delete/{id}', [AdvertisementController::class, 'fileDelete'])->name('file.delete');
   Route::get('ad/delete/{id}', [AdvertisementController::class, 'adDelete'])->name('ad.delete');
    ////////////// requesrs
    Route::resource('requests', 'RequestController');
    Route::get('req/show/{id}', [RequestController::class,'show_iamge'])->name('requests.showImage');
    Route::get('req/file/delete/{id}', [RequestController::class, 'fileDelete'])->name('request.file.delete');
    Route::get('req/approved/{id}', [RequestController::class,'appvoved'])->name('requests.approved');
    Route::get('req/delete/{id}', [RequestController::class,'delete'])->name('requests.delete');
    Route::get('req/cancel/{id}', [RequestController::class,'cancel'])->name('requests.cancel');
    Route::get('req/showMap/{id}', [RequestController::class,'showMap'])->name('requests.showMap');
    Route::get('req/showlocation/{id}', [RequestController::class,'showLocation'])->name('requests.showLocation');
    Route::post('requests/delete',[RequestController::class,'bulkdelete'])->name('requests.bulkdelete');

             ////////////// requesrs
    Route::post('qa/edit',[SettingsController::class,'qa_edit'])->name('qa.edit');
                });

                Route::resource('requestion', 'RequestController');

                Route::resource('client_accounts', 'ClientAccountController');
                Route::get('approve/account/{id}',[ClientAccountController::class,'approve'])->name('client_accounts.approve');
                Route::get('delete/account/{id}',[ClientAccountController::class,'delete'])->name('client_accounts.delete');
                Route::get('deleteFile/account/{id}',[ClientAccountController::class,'deletefile'])->name('client_accounts.deletefile');
                Route::put('update/account/{id}',[ClientAccountController::class,'update'])->name('client_accounts.update');
 ////////////// car_types

 Route::resource('car_type', 'CarTypeController');
 Route::put('update/car_type/{id}',[CarTypeController::class,'update'])->name('car_type.update');
 Route::post('delete/car_type/{id}',[CarTypeController::class,'delete'])->name('car_type.delete');

  ////////////// car_models

  Route::resource('car_model', 'CarModelController');
  Route::put('update/car_model/{id}',[CarModelController::class,'update'])->name('car_model.update');
  Route::post('delete/car_model/{id}',[CarModelController::class,'delete'])->name('car_model.delete');
                });
            });
        });



        Route::post('/create', [TestController::class, 'create'])->name('create');
        Route::get('/index', [TestController::class, 'index']);
        Route::get('/created', [TestController::class, 'created']);
        Route::get('/edited', [TestController::class, 'edited']);
        Route::put('/edit', [TestController::class, 'edit'])->name('edit');
        Route::get('/show_location/{id}', [TestController::class, 'show_location'])->name('driver.show_location');
        