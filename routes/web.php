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
// CLIENTS
Route::prefix('clients')->name('clients.')->group(function () {
    Route::resource('/', 'App\Http\Controllers\ClientController');
    
    Route::get('create_client', 'App\Http\Controllers\ClientController@create_client')->name('create_client');
    Route::get('createFromRental/{what_blade}/{what_unit}', 'App\Http\Controllers\ClientController@createFromRental')->name('createFromRental');
    Route::get('cc/{id}', 'App\Http\Controllers\DocController@cc')->name('cc');
});

// La ruta individual para 'show' ya está incluida en el resource, así que podemos omitir esta línea adicional.

// CONTACTS --------------------------------------------------------------------------------------


// CONTACTS
Route::prefix('contacts')->name('contacts.')->group(function () {
    Route::resource('/', 'App\Http\Controllers\ContactController');

    Route::get('create_client_contact/{id}', 'App\Http\Controllers\ContactController@create_client_contact')->name('create_client_contact');
});

// La ruta 'edit' y 'update' ya están incluidas en el resource, por lo que no es necesario definirlas de nuevo.


// ADDRESSES ---------------------------------------------------------------------------------
Route::resource('addresses', 'App\Http\Controllers\AddressController');
Route::get('/addresses/create_client_address/{id}', 'App\Http\Controllers\AddressController@create_client_address');
Route::get('/addresses/from_rental/create_client_address', 'App\Http\Controllers\AddressController@create_client_address_from_rental');
Route::put('/addresses/{id}/edit', 'App\Http\Controllers\AddressController@edit');
Route::get('/get-counties-and-cities', 'AddressController@getCountiesAndCities');
Route::get('/get-counties/{provinceId}', 'AddressController@getCountiesByProvince');

// --------------------------------------------------------------------------------


Route::resource('comments', CommentController::class);