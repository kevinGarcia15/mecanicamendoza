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
Route::get('/usuarios', 'userManagmentController@index')->name('userManagment')->middleware('auth','master');
Route::patch('/usuarios/{user}', 'userManagmentController@update')->name('user.update')->middleware('auth','master');

/*Client Routes*/
Route::resource('client', 'ClientController')->middleware('auth','master','admin');
Route::get('clientexist', 'ClientController@show')->name('clientexist.show')->middleware('auth','admin');
Route::get('clientexistWhitName', 'ClientController@clienteExistWithName')->middleware('auth','admin');
/*Car Line route*/
Route::get('line', 'CarLineController@show')->name('carLine.show')->middleware('auth');
Route::post('line', 'CarLineController@store')->name('carLine.store')->middleware('auth');

/*vehicle route*/
Route::get('vehicle', 'VehicleController@show')->name('vehicle.show')->middleware('auth');
Route::get('vehicle/search', 'VehicleController@search')->name('vehicle.search')->middleware('auth','admin');
Route::get('vehicle/history', 'VehicleController@index')->name('vehicle.history')->middleware('auth','admin');
Route::get('vehicle/history/{vehicle}', 'VehicleController@vehicleHistory')->name('vehicle.ShowHistory')->middleware('auth','admin');

/*Work to do Routes*/
Route::resource('worktodo', 'WorkToDoController')->middleware('auth');
/*worksheet route*/
Route::resource('worksheet', 'WorksheetController')->middleware('auth');
Route::get('worksheet/download/{worksheet}', 'WorksheetController@download')->name('worksheet.download')->middleware('auth');
/*replacement Routes*/
Route::resource('replacement', 'ReplacementController')->middleware('auth');
/*Mechanical Route*/
Route::resource('mechanical', 'MechanicalController')->middleware('auth');
/*Brand routes*/
Route::resource('brand', 'BrandController')->middleware('auth');
/*Color routes*/
Route::resource('color', 'ColorController')->middleware('auth');
/*balance customer*/
Route::resource('balance', 'BalanceCustomerController')->middleware('auth','admin');
Route::post('balance/payment', 'BalanceCustomerController@payment')->name('balance.payment')->middleware('auth','admin');
