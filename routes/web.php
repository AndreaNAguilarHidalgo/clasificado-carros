<?php

use App\Gallery;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AnuncioController;
use App\Http\Controllers\GalleryController;

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
Route::delete('/anuncios/{anuncio}', 'AnuncioController@destroy')->name('anuncios.destroy');
//Route::resource('anuncios', AnuncioController::class);

Route::view('/welcome', 'welcome');

Auth::routes(['verify' => true]); /*Activando la verificación de correo*/

Route::get('login/{driver}', 'Auth\LoginController@redirectToProvider');
Route::get('login/{driver}/callback', 'Auth\LoginController@handleProviderCallback');

// Ruta Para subir imágenes
Route::post('/anuncios/imagen', 'AnuncioController@imagen')->name('anuncios.imagen');
Route::post('/anuncios/borrarimagen', 'AnuncioController@borrarimagen')->name('anuncios.borrar');

Route::get('/home', 'HomeController@index')->name('home');


// Pruebas para subir imagenes con dropzone
Route::get('gallery', 'GalleryController@index')->name('gallery.index');
Route::post('gallery', 'GalleryController@store')->name('gallery.store');