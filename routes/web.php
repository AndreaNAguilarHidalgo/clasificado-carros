<?php

use App\Http\Controllers\AnuncioController;
use Illuminate\Support\Facades\Auth;
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

Route::get('/', 'DashboardController@index')->name('dashboard.index');

// Rutas de anuncios
Route::get('/anuncios/create', 'AnuncioController@create')->name('anuncios.create');
Route::get('/anuncios', 'AnuncioController@index')->name('anuncios.index');
Route::get('/anuncios/{anuncio}/edit', 'AnuncioController@edit')->name('anuncios.edit');
Route::put('/anuncios/{anuncio}', 'AnuncioController@update')->name('anuncios.update');
Route::post('/anuncios', 'AnuncioController@store')->name('anuncios.store');
Route::get('/anuncios/{anuncio}', 'AnuncioController@show')->name('anuncios.show');

Route::view('/welcome', 'welcome');

Auth::routes(['verify' => true]); /*Activando la verificación de correo*/

Route::get('login/{driver}', 'Auth\LoginController@redirectToProvider');
Route::get('login/{driver}/callback', 'Auth\LoginController@handleProviderCallback');

Route::get('/home', 'HomeController@index')->name('home');
