<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ClientController;

use App\Http\Controllers\ContactController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\AysController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use Illuminate\Support\Facades\Auth;

Route::get('/admin-panel', [UserController::class, 'adminPanel'])->middleware('superadmin')->name('admin.panel');



Route::get('/', [AysController::class, 'index']);
Route::get('/home', [AysController::class, 'home'])->name('home');

// Authentication Routes...
Route::get('login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('login', [LoginController::class, 'login']);
Route::post('logout', [LoginController::class, 'logout'])->name('logout');
Route::get('/user/{id}', [UserController::class, 'show'])->name('user.show');
Route::get('/users/{user}/edit', [UserController::class, 'edit'])->name('users.edit');

// Registration Routes...
Route::get('register', [RegisterController::class, 'showRegistrationForm'])->middleware('superadmin');
Route::post('register', [RegisterController::class, 'adminRegister'])->middleware('superadmin')->name('register');
Route::put('/user/{id}', [UserController::class, 'update'])->name('user.update');


//CLIENTS
Route::resource('clients', 'App\Http\Controllers\ClientController')->except(['edit', 'update']);
Route::get('/clients/create_client', 'App\Http\Controllers\ClientController@create_client')->name('clients.create_client');
Route::get('/clients/createFromRental/{what_blade}/{what_unit}', 'App\Http\Controllers\ClientController@createFromRental')->name('clients.createFromRental');
Route::get('/clients/{id}/edit', 'App\Http\Controllers\ClientController@edit')->name('clients.edit');


Route::get('/clients/cc/{id}', 'App\Http\Controllers\DocController@cc')->name('clients.cc');
//Route::get('/clients/{id}', 'App\Http\Controllers\ClientController@show')->name('clients.show');


// CONTACTS --------------------------------------------------------------------------------------

Route::resource('contacts', 'App\Http\Controllers\ContactController');
Route::get('/contacts/create_client_contact/{id}', 'App\Http\Controllers\ContactController@create_client_contact');

Route::get('/contacts/from_rental/create_client_contact', 'App\Http\Controllers\ContactController@create_client_contact_from_rental');
Route::get('/contacts/from_quote/create_client_contact', 'App\Http\Controllers\ContactController@create_client_contact_from_quote');
Route::get('/contacts/from_reQuote/create_client_contact', 'App\Http\Controllers\ContactController@create_client_contact_from_quote');
Route::get('/contacts/from_rent_to_rent/create_client_contact', 'App\Http\Controllers\ContactController@create_client_contact_from_r2r');
Route::get('/contacts/{id}/edit', 'App\Http\Controllers\ContactController@edit');
Route::put('/contacts/{id}/edit', 'App\Http\Controllers\ContactController@update');
Route::resource('contacts', 'App\Http\Controllers\ContactController')->only([
    'edit', 'update'
]);

// ADDRESSES ---------------------------------------------------------------------------------
Route::resource('addresses', 'App\Http\Controllers\AddressController');
Route::get('/addresses/create_client_address/{id}', 'App\Http\Controllers\AddressController@create_client_address');
Route::get('/addresses/from_rental/create_client_address', 'App\Http\Controllers\AddressController@create_client_address_from_rental');
Route::put('/addresses/{id}/edit', 'App\Http\Controllers\AddressController@edit');
Route::get('/get-counties-and-cities', 'AddressController@getCountiesAndCities');
Route::get('/get-counties/{provinceId}', 'AddressController@getCountiesByProvince');

// --------------------------------------------------------------------------------


Route::resource('comments', CommentController::class);