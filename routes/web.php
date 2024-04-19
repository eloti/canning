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
//Route::get('/clients', [ClientController::class, 'index'])->name('clients.index');
//Route::get('/clients/{client}', [ClientController::class, 'show'])->name('clients.show');
//Route::get('/clients/create', [ClientController::class, 'create'])->name('clients.create'); // Ruta para mostrar el formulario de creación de clientes


Route::resource('clients', 'ClientController')->middleware('aandf');
Route::get('/clients/create_client', 'ClientController@create_client')->middleware('aandf');
Route::get('/clients/createFromRental/{what_blade}/{what_unit}', 'ClientController@createFromRental')->name('clients.createFromRental')->middleware('aandf');
Route::put('/clients/{id}/edit', 'ClientController@edit')->middleware('aandf');
Route::get('/clients/cc/{id}', 'DocController@cc')->middleware('aandf');
Route::get('/clients/{id}', 'ClientController@show');
Route::put('/clients/{id}', 'ClientController@update')->name('clients.update');

// Rutas para el controlador de clientes
Route::resource('clients', ClientController::class);


// CONTACTS --------------------------------------------------------------------------------------

Route::resource('contacts', 'App\Http\Controllers\ContactController')->middleware('aandf');
Route::get('/contacts/create_client_contact/{id}', 'App\Http\Controllers\ContactController@create_client_contact')->middleware('aandf');

Route::get('/contacts/from_rental/create_client_contact', 'App\Http\Controllers\ContactController@create_client_contact_from_rental')->middleware('aandf');
Route::get('/contacts/from_quote/create_client_contact', 'App\Http\Controllers\ContactController@create_client_contact_from_quote')->middleware('aandf');
Route::get('/contacts/from_reQuote/create_client_contact', 'App\Http\Controllers\ContactController@create_client_contact_from_quote')->middleware('aandf');
Route::get('/contacts/from_rent_to_rent/create_client_contact', 'App\Http\Controllers\ContactController@create_client_contact_from_r2r')->middleware('aandf');
Route::put('/contacts/{id}/edit', 'App\Http\Controllers\ContactController@edit')->middleware('aandf');

// ADDRESSES ---------------------------------------------------------------------------------
Route::resource('addresses', 'App\Http\Controllers\AddressController')->middleware('aandf');
Route::get('/addresses/create_client_address/{id}', 'App\Http\Controllers\AddressController@create_client_address')->middleware('aandf');
Route::get('/addresses/from_rental/create_client_address', 'App\Http\Controllers\AddressController@create_client_address_from_rental')->middleware('aandf');
Route::put('/addresses/{id}/edit', 'App\Http\Controllers\AddressController@edit')->middleware('aandf');
Route::get('/get-counties-and-cities', 'AddressController@getCountiesAndCities');
Route::get('/get-counties/{provinceId}', 'AddressController@getCountiesByProvince');
// --------------------------------------------------------------------------------
Route::resource('comments', 'CommentController')->middleware('aandf');