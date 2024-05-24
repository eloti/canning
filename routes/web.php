<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AysController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\UserController;

Route::get('/', [AysController::class, 'index']);
Route::get('/home', [AysController::class, 'home'])->name('home');
Auth::routes(['verify' => 'true']);
Route::get('/user/{user}', [UserController::class, 'show'])->name('users.show');
Route::get('/user/{user}/edit', [UserController::class, 'edit'])->name('users.edit');
Route::put('/user/{user}', [UserController::class, 'update'])->name('users.update');

//CLIENTS
Route::resource('clients', 'ClientController');
Route::get('/clients/create_client', 'ClientController@create_client');
Route::get('/clients/createFromRental/{what_blade}/{what_unit}', 'ClientController@createFromRental')->name('clients.createFromRental');
Route::put('/clients/{id}/edit', 'ClientController@edit');
Route::get('/clients/cc/{id}', 'DocController@cc');
Route::get('/clients/{id}', 'ClientController@show');
Route::put('/clients/{id}', 'ClientController@update')->name('clients.update');

// Rutas para el controlador de clientes
Route::resource('clients', ClientController::class);

// CONTACTS --------------------------------------------------------------------------------------

Route::resource('contacts', 'App\Http\Controllers\ContactController');
Route::get('/contacts/create_client_contact/{id}', 'App\Http\Controllers\ContactController@create_client_contact');

Route::get('/contacts/from_rental/create_client_contact', 'App\Http\Controllers\ContactController@create_client_contact_from_rental');
Route::get('/contacts/from_quote/create_client_contact', 'App\Http\Controllers\ContactController@create_client_contact_from_quote');
Route::get('/contacts/from_reQuote/create_client_contact', 'App\Http\Controllers\ContactController@create_client_contact_from_quote');
Route::get('/contacts/from_rent_to_rent/create_client_contact', 'App\Http\Controllers\ContactController@create_client_contact_from_r2r');
Route::put('/contacts/{id}/edit', 'App\Http\Controllers\ContactController@edit');

// ADDRESSES ---------------------------------------------------------------------------------
Route::resource('addresses', 'App\Http\Controllers\AddressController');
Route::get('/addresses/create_client_address/{id}', 'App\Http\Controllers\AddressController@create_client_address');
Route::get('/addresses/from_rental/create_client_address', 'App\Http\Controllers\AddressController@create_client_address_from_rental');
Route::put('/addresses/{id}/edit', 'App\Http\Controllers\AddressController@edit');
Route::get('/get-counties-and-cities', 'AddressController@getCountiesAndCities');
Route::get('/get-counties/{provinceId}', 'AddressController@getCountiesByProvince');

// --------------------------------------------------------------------------------
Route::resource('comments', 'CommentController');
