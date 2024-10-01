<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\CompanyController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\ReservationController;
use App\Http\Controllers\DiscountController;
use App\Http\Controllers\VehiculeController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\RatingController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\LangController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Livewire\SearchBody;
use App\Http\Controllers\UpdatePasswordController;
use App\Http\Controllers\FilterHomeController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/







Route::group(['middleware'=>'LanguageManager'],function(){

Route::get('lang/home', [LangController::class, 'index']);

Route::get('/change-language/{lang}', [LangController::class, 'change'])->name('changeLang');

Route::get('/home', function () {
    return view('front-end.home');
});

Route::get('/loginIn', function () {
    return view('front-end.login');
})->name('loginIn');

Route::get('/Register_', function () {
    return view('front-end.register');
});

Route::get('/terms', function () {
    return view('front-end.terms');
});

    

    Route::post('/FilterType', [FilterHomeController::class, 'filterType'])->name('filter.type');
    Route::post('/FilterBody', [FilterHomeController::class, 'filterBody'])->name('filter.body');
    Route::post('/FilterSeats', [FilterHomeController::class, 'filterSeats'])->name('filter.seats');
    Route::post('/FilterEngine', [FilterHomeController::class, 'filterEngine'])->name('filter.engine');
    Route::post('/FilterPrice', [FilterHomeController::class, 'filterPrice'])->name('filter.price');

    Route::get('search-results', 'App\Http\Controllers\VehiculeController@search')->name('search-results');
    Route::get('checkbox', 'App\Http\Controllers\VehiculeController@checkbox')->name('checkbox');

    Route::view('/views/front-end/CarSingle', 'front-end.CarSingle');
    Route::get('/Vehicule/{id}', 'App\Http\Controllers\VehiculeController@show2')->name('vehicules.show2');
    Route::get('/carsList', 'App\Http\Controllers\VehiculeController@indexFrontEnd')->name('vehicules.indexFrontEnd');
    Route::get('contact-us', [ContactController::class, 'index']);
    Route::post('contact-us', [ContactController::class, 'store'])->name('contactUs.store');
    Route::post('/NewAccount', 'App\Http\Controllers\UserController@store')->name('newAccount');
    
    Route::get('/', function () {
    return view('front-end.home');});
    Auth::routes();



    Route::get('/Pending', function (){ auth()->logout();Session()->flush();return view('front-end.pendingAcount');})->name('pendingAccount');

    Route::get('/Blocked', function (){ auth()->logout();Session()->flush();return view('front-end.BlockedAcount');})->name('blockedAccount');
    














  
/*------------------------------------------
--------------------------------------------
Client Routes List
--------------------------------------------
--------------------------------------------*/

Route::middleware(['auth', 'user-access:customer'])->group(function () {
  
    Route::get('/Customer/home', 'App\Http\Controllers\HomeController@index')->name('customer.home');
    
    Route::post('/Customer/update-password', [UpdatePasswordController::class, 'update'])->name('password.update');

    Route::resource('Customer/Reservations', ReservationController::class)->names([
        'index' => 'reservations.index',
        'create' => 'reservations.create',
        'store' => 'reservations.store',
        'show' => 'reservations.show',
        'edit' => 'reservations.edit',
        'update' => 'reservations.update',
        'destroy' => 'reservations.destroy',
    ]);
    Route::resource('Customer/Vehicules', VehiculeController::class)->names([
        'index' => 'vehicules.index',
        'create' => 'vehicules.create',
        'store' => 'vehicules.store',
        'show' => 'vehicules.show',
        'edit' => 'vehicules.edit',
        'update' => 'vehicules.update',
        'destroy' => 'vehicules.destroy',
    ]);
    Route::resource('Customer/Ratings', RatingController::class)->names([
        'index' => 'ratings.index',
        'create' => 'ratings.create',
        'store' => 'ratings.store',
        'show' => 'ratings.show',
        'edit' => 'ratings.edit',
        'update' => 'ratings.update',
        'destroy' => 'ratings.destroy',
    ]);
    Route::resource('Customer/Users', UserController::class)->names([
        'index' => 'users.index',
        'create' => 'users.create',
        'store' => 'users.store',
        'show' => 'users.show',
        'edit' => 'users.edit',
        'update' => 'users.update',
        'destroy' => 'users.destroy',
    ]);

    Route::resource('Customer/Payments', PaymentController::class)->names([
        'index' => 'payments.index',
    ]);
    
    Route::POST('/Customer/Filter', 'App\Http\Controllers\VehiculeController@filter')->name('customer.filter');
    Route::Post('/Customer/FilterPrice','App\Http\Controllers\VehiculeController@filterPrice')->name('customer.filterPrice');
    Route::get('/Customer/filterBrands/{id}', 'App\Http\Controllers\VehiculeController@filterBrands')->name('customer.filterBrands');
    Route::POST('/Customer/Renting/{id}', 'App\Http\Controllers\VehiculeController@renting')->name('customer.renting');
    Route::get('Customer/logout', function (){ auth()->logout();Session()->flush();return Redirect::to('/home');})->name('customer.logout'); 
});

/*------------------------------------------
--------------------------------------------
Admin Routes List
--------------------------------------------
--------------------------------------------*/
Route::middleware(['auth', 'user-access:admin'])->group(function () {
    
    




    Route::get('/admin/home', 'App\Http\Controllers\HomeController@AdminHome')->name('admin.home');
    
    Route::post('/Admin/update-password', [UpdatePasswordController::class, 'update'])->name('admin.password.update');

    Route::resource('/Admin/Company', CompanyController::class);
    Route::resource('/Admin/Category', CategoryController::class);
    Route::resource('/Admin/Users', UserController::class);
    Route::resource('/Admin/Reservations', ReservationController::class);
    Route::resource('/Admin/Payments', PaymentController::class);
    Route::resource('/Admin/Discounts', DiscountController::class);
    Route::resource('/Admin/Vehicules', VehiculeController::class);
    Route::resource('/Admin/Ratings', RatingController::class);
    Route::get('/Admin/SearchBody', SearchBody::class);
    
    //Route::get('/search', 'SearchController@search')->name('search');
    Route::POST('/Admin/Filter', 'App\Http\Controllers\VehiculeController@filter')->name('admin.filter');
    Route::Post('/Admin/FilterPrice', 'App\Http\Controllers\VehiculeController@filterPrice')->name('admin.filterPrice');
    Route::get('/Admin/filterBrands/{id}', 'App\Http\Controllers\VehiculeController@filterBrands')->name('admin.filterBrands');

    Route::POST('/Admin/Renting/{id}', 'App\Http\Controllers\VehiculeController@renting')->name('admin.renting');

    Route::GET('/Admin/Confirmed_/{id}', 'App\Http\Controllers\UserController@Confirmed')->name('admin.confirmed');
    Route::GET('/Admin/Blocked/{id}', 'App\Http\Controllers\UserController@Blocked')->name('admin.blocked');
    Route::GET('/Admin/Disactivate/{id}', 'App\Http\Controllers\DiscountController@Disactivate')->name('admin.disactivate');

    Route::GET('/Admin/Confirmed/{id}', 'App\Http\Controllers\ReservationController@Confirmed')->name('reservation.confirmed');
    Route::GET('/Admin/onRent/{id}', 'App\Http\Controllers\ReservationController@onRent')->name('admin.onRent');
    Route::GET('/Admin/Completed/{id}', 'App\Http\Controllers\ReservationController@Completed')->name('admin.completed');
    Route::GET('/Admin/Cancelled/{id}', 'App\Http\Controllers\ReservationController@Cancelled')->name('admin.cancelled');


    Route::get('Admin/logout', function (){ auth()->logout();Session()->flush();return Redirect::to('/home');})->name('admin.logout'); 
    //Route::get('/Admin/Search/{name}', 'App\Http\Controllers\UserController@search')->name('admin.search');
    //Route::get('/search/', 'PostsController@search')->name('search');


});
  
/*------------------------------------------
--------------------------------------------
Manager Routes List
--------------------------------------------
--------------------------------------------*/
Route::middleware(['auth', 'user-access:manager'])->group(function () {
  
    Route::get('/Manager/home', 'App\Http\Controllers\HomeController@ManagerHome')->name('manager.home');
    
    Route::post('/Manager/update-password', [UpdatePasswordController::class, 'update'])->name('manager.password.update');



    Route::resource('Manager/Discounts', DiscountController::class)->names([
        'index' => 'manager.discounts.index',
        'create' => 'manager.discounts.create',
        'store' => 'manager.discounts.store',
        'show' => 'manager.discounts.show',
        'edit' => 'manager.discounts.edit',
        'update' => 'manager.discounts.update',
        'destroy' => 'manager.discounts.destroy',
    ]);
    Route::resource('Manager/Company', CompanyController::class)->names([
        'index' => 'manager.company.index',
        'create' => 'manager.company.create',
        'store' => 'manager.company.store',
        'show' => 'manager.company.show',
        'edit' => 'manager.company.edit',
        'update' => 'manager.company.update',
        'destroy' => 'manager.company.destroy',
    ]);

    Route::resource('Manager/Category', CategoryController::class)->names([
        'index' => 'manager.category.index',
        'create' => 'manager.category.create',
        'store' => 'manager.category.store',
        'show' => 'manager.category.show',
        'edit' => 'manager.category.edit',
        'update' => 'manager.category.update',
        'destroy' => 'manager.category.destroy',
    ]);
    Route::resource('Manager/Reservations', ReservationController::class)->names([
        'index' => 'manager.reservations.index',
        'create' => 'manager.reservations.create',
        'store' => 'manager.reservations.store',
        'show' => 'manager.reservations.show',
        'edit' => 'manager.reservations.edit',
        'update' => 'manager.reservations.update',
        'destroy' => 'manager.reservations.destroy',
    ]);
    Route::resource('Manager/Vehicules', VehiculeController::class)->names([
        'index' => 'manager.vehicules.index',
        'create' => 'manager.vehicules.create',
        'store' => 'manager.vehicules.store',
        'show' => 'manager.vehicules.show',
        'edit' => 'manager.vehicules.edit',
        'update' => 'manager.vehicules.update',
        'destroy' => 'manager.vehicules.destroy',
    ]);
    Route::resource('Manager/Ratings', RatingController::class)->names([
        'index' => 'manager.ratings.index',
        'create' => 'manager.ratings.create',
        'store' => 'manager.ratings.store',
        'show' => 'manager.ratings.show',
        'edit' => 'manager.ratings.edit',
        'update' => 'manager.ratings.update',
        'destroy' => 'manager.ratings.destroy',
    ]);
    Route::resource('Manager/Users', UserController::class)->names([
        'index' => 'manager.users.index',
        'create' => 'manager.users.create',
        'store' => 'manager.users.store',
        'show' => 'manager.users.show',
        'edit' => 'manager.users.edit',
        'update' => 'manager.users.update',
        'destroy' => 'manager.users.destroy',
    ]);

    Route::resource('Manager/Payments', PaymentController::class)->names([
        'index' => 'manager.payments.index',
    ]);
    
    Route::POST('/Manager/Filter', 'App\Http\Controllers\VehiculeController@filter')->name('manager.filter');
    Route::Post('/Manager/FilterPrice','App\Http\Controllers\VehiculeController@filterPrice')->name('manager.filterPrice');
    Route::GET('/Manager/Confirmed_/{id}', 'App\Http\Controllers\UserController@Confirmed')->name('manager.confirmed');
    Route::GET('/Manager/Blocked/{id}', 'App\Http\Controllers\UserController@Blocked')->name('manager.blocked');
    Route::GET('/Manager/Disactivate/{id}', 'App\Http\Controllers\DiscountController@Disactivate')->name('manager.disactivate');
    Route::get('/Manager/filterBrands/{id}', 'App\Http\Controllers\VehiculeController@filterBrands')->name('manager.filterBrands');
    Route::POST('/Manager/Renting/{id}', 'App\Http\Controllers\VehiculeController@renting')->name('manager.renting');
    

    Route::GET('/Manager/Confirmed/{id}', 'App\Http\Controllers\ReservationController@Confirmed')->name('manager.reservation.confirmed');
    Route::GET('/Manager/onRent/{id}', 'App\Http\Controllers\ReservationController@onRent')->name('manager.onRent');
    Route::GET('/Manager/Completed/{id}', 'App\Http\Controllers\ReservationController@Completed')->name('manager.completed');
    Route::GET('/Manager/Cancelled/{id}', 'App\Http\Controllers\ReservationController@Cancelled')->name('manager.cancelled');

    Route::get('Manager/logout', function (){ auth()->logout();Session()->flush();return Redirect::to('/home');})->name('manager.logout'); 
});

});
