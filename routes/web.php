<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\CompanyController;
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
Route::middleware(['auth', 'user-access:user'])->group(function () {
  
    Route::get('/home', 'App\Http\Controllers\HomeController@index')->name('home');
    
});

/*------------------------------------------
--------------------------------------------
Admin Routes List
--------------------------------------------
--------------------------------------------*/
Route::middleware(['auth', 'user-access:admin'])->group(function () {
  
    Route::get('/admin/home', 'App\Http\Controllers\HomeController@AdminHome')->name('admin.home');
    Route::resource('companies', CompanyController::class);
});
  




Route::middleware(['auth', 'user-access:manager'])->group(function () {
  
    Route::get('/manager/home', 'App\Http\Controllers\HomeController@ManagerHome')->name('manager.home');
    
});