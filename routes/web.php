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
    return view('welcome');
});

Auth::routes(['register' => false]);

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/get_shipment', 'HomeController@getShipment')->name('get_shipment');

Route::group(['middleware' => 'auth:web'], function () {
    Route::get('/dashboard', 'HomeController@dashboard')->name('admin.dashboard');
    Route::get('/couriers', 'CourierController@index')->name('admin.couriers');
    Route::get('/add-courier', 'CourierController@create')->name('admin.create.couriers');
    Route::post('/add-courier', 'CourierController@store')->name('admin.store.couriers');
    Route::get('/edit-courier/{id}', 'CourierController@edit')->name('admin.edit.couriers');
    Route::post('/update-courier/{id}', 'CourierController@update')->name('admin.update.couriers');
    Route::get('/delete-courier/{id}', 'CourierController@delete')->name('admin.delete.couriers');

//  products

    Route::get('/products', 'ProductController@index')->name('admin.products');
    Route::get('/add-product', 'ProductController@create')->name('admin.create.products');
    Route::post('/add-product', 'ProductController@store')->name('admin.store.products');
    Route::get('/edit-product/{id}', 'ProductController@edit')->name('admin.edit.products');
    Route::post('/update-product/{id}', 'ProductController@update')->name('admin.update.products');
    Route::get('/delete-product/{id}', 'ProductController@delete')->name('admin.delete.products');

//  shipment  shipments

    Route::get('/shipments', 'ShipmentController@index')->name('admin.shipments');
    Route::get('/add-shipment', 'ShipmentController@create')->name('admin.create.shipments');
    Route::post('/add-shipment', 'ShipmentController@store')->name('admin.store.shipments');
    Route::get('/edit-shipment/{id}', 'ShipmentController@edit')->name('admin.edit.shipments');
    Route::post('/update-shipment/{id}', 'ShipmentController@update')->name('admin.update.shipments');
    Route::get('/delete-shipment/{id}', 'ShipmentController@delete')->name('admin.delete.shipments');
});


