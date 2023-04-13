<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\CompanyController;
use App\Http\Controllers\UserController;
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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();



  
/*------------------------------------------
--------------------------------------------
Client Routes List
--------------------------------------------
--------------------------------------------*/
Route::middleware(['auth', 'user-access:customer'])->group(function () {
  
    Route::get('/home', 'App\Http\Controllers\HomeController@index')->name('home');
    
});

/*------------------------------------------
--------------------------------------------
Admin Routes List
--------------------------------------------
--------------------------------------------*/
Route::middleware(['auth', 'user-access:admin'])->group(function () {

    Route::get('/admin/home', 'App\Http\Controllers\HomeController@AdminHome')->name('admin.home');
    Route::resource('/Admin/Company', CompanyController::class);
    Route::resource('/Admin/Users', UserController::class);
    Route::get('Admin/logout', function (){ auth()->logout();Session()->flush();return Redirect::to('/');})->name('admin.logout'); 

});
  
/*------------------------------------------
--------------------------------------------
Manager Routes List
--------------------------------------------
--------------------------------------------*/
Route::middleware(['auth', 'user-access:manager'])->group(function () {
  
    Route::get('/manager/home', 'App\Http\Controllers\HomeController@ManagerHome')->name('manager.home');
    
});