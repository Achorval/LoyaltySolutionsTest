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

Auth::routes();

Route::get('/reports', 'CitizenController@index')->name('home');

Route::get('/citizen/create', 'CitizenController@citizen')->name('citizen');

Route::get('/citizen/state/{id}', 'CitizenController@fetchLgas')->name('fetchLgas');

Route::get('/citizen/lga/{id}', 'CitizenController@fetchWards')->name('fetchWards');

Route::post('/citizen/create', [App\Http\Controllers\CitizenController::class, 'createCitizen'])->name('createCitizen');

