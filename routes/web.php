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
Route::resource('clients', 'App\Http\Controllers\ClientController');

Route::resource('clients', 'ClientController')->except(['edit', 'update']);
Route::get('/clients/create_client', 'ClientController@create_client')->name('clients.create_client');
Route::get('/clients/createFromRental/{what_blade}/{what_unit}', 'ClientController@createFromRental')->name('clients.createFromRental');
Route::get('/clients/{id}/edit', 'ClientController@edit');

Route::get('/clients/cc/{id}', 'DocController@cc');
Route::get('/clients/{id}', 'ClientController@show');
Route::put('/clients/{id}/edit', 'ClientController@update');

Route::post('/clients/{id}/edit', [\App\Http\Controllers\ClientController::class, "update"])
    ->name('client.edit.process')
    ->whereNumber('id')
    ->middleware('auth');

// Rutas para el controlador de clientes
Route::resource('clients', ClientController::class);


// COMMENTS ----------------------------------
Route::get('/comments/{id}', [CommentController::class, 'show'])->name('comments.show');
Route::get('/comments/{id}/edit', [CommentController::class, 'edit'])->name('comments.edit');
Route::put('/comments/{id}', [CommentController::class, 'update'])->name('comments.update');

Route::delete('/comments/{id}', [CommentController::class, 'destroy'])->name('comments.destroy');



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


// COTIS -----------------------------------------------------------------------------------------

Route::get('/cotis/create', 'App\Http\Controllers\CotiController@create')->name('cotis.create');
Route::post('/cotis/store', 'App\Http\Controllers\CotiController@store')->name('cotis.store');
Route::get('/cotis/show/{id}', 'App\Http\Controllers\CotiController@show');
Route::get('/cotis/downloadPDF/{id}', 'App\Http\Controllers\CotiController@downloadPDF')->name('cotis.downloadPDF');
Route::get('/cotis/showPDF/{id}', 'App\Http\Controllers\CotiController@showPDF')->name('cotis.showPDF');
Route::get('/cotis/edit/{id}', 'App\Http\Controllers\CotiController@edit')->name('cotis.edit');
Route::put('/cotis/update/{id}', 'App\Http\Controllers\CotiController@update');
Route::put('/cotis/rejection_update/{id}', 'App\Http\Controllers\CotiController@rejection_update');
Route::put('/cotis/acceptance_update/{id}', 'App\Http\Controllers\CotiController@acceptance_update');
Route::get('/openCotis', 'App\Http\Controllers\CotiController@open_index')->name('cotis.open_index');
Route::get('/closedCotis', 'App\Http\Controllers\CotiController@closed_index')->name('cotis.closed_index');