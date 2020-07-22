<?php

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
    return view('home');
})->middleware('auth');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

/*user managment routes*/
Route::get('/usuarios', 'userManagmentController@index')->name('userManagment')->middleware('auth');
Route::patch('/usuarios/{user}', 'userManagmentController@update')->name('user.update')->middleware('auth');

/*Client Routes*/
Route::resource('client', 'ClientController')->middleware('auth');
Route::get('clientexist', 'ClientController@show')->name('clientexist.show')->middleware('auth');
/*Car model route*/
Route::get('model', 'CarModelController@show')->name('carModel.show')->middleware('auth');
/*vehicle route*/
Route::get('vehicle', 'VehicleController@show')->name('vehicle.show')->middleware('auth');
/*Work to do Routes*/
Route::resource('worktodo', 'WorkToDoController')->middleware('auth');
/*worksheet route*/
Route::resource('worksheet', 'WorksheetController')->middleware('auth');
