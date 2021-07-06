<?php

use App\Gallery;
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
// Ruta de Inicio
Route::get('/', 'InicioController@index')->name('inicio.index');

// Rutas Del Dashboard
Route::get('/dashboards', 'DashboardController@index')->name('dashboard.index');

// Rutas de anuncios
Route::get('/anuncios/create', 'AnuncioController@create')->name('anuncios.create');
Route::get('/anuncios', 'AnuncioController@index')->name('anuncios.index');
Route::get('/anuncios/{anuncio}/edit', 'AnuncioController@edit')->name('anuncios.edit');
Route::put('/anuncios/{anuncio}', 'AnuncioController@update')->name('anuncios.update');
Route::post('/anuncios', 'AnuncioController@store')->name('anuncios.store');
Route::get('/anuncios/{anuncio}', 'AnuncioController@show')->name('anuncios.show');
Route::delete('/anuncios/{anuncio}', 'AnuncioController@destroy')->name('anuncios.destroy');
//Route::resource('anuncios', AnuncioController::class);


Auth::routes(['verify' => true]); /*Activando la verificación de correo*/

Route::get('login/{driver}', 'Auth\LoginController@redirectToProvider');
Route::get('login/{driver}/callback', 'Auth\LoginController@handleProviderCallback');

// Ruta Para subir imágenes
/*Route::post('/anuncios/imagen', 'AnuncioController@imagen')->name('anuncios.imagen');
Route::post('/anuncios/borrarimagen', 'AnuncioController@borrarimagen')->name('anuncios.borrar');*/

Route::get('/home', 'HomeController@index')->name('home');

// Buscador de Recetas
Route::get('/buscar', 'AnuncioController@search')->name('buscar.show');


// Pruebas para subir imagenes con dropzone
Route::get('/gallery/create', 'GalleryController@create')->name('gallery.create');
Route::post('/sendMessage', 'GalleryController@store')->name('gallery.store');
Route::get('/gallery', 'GalleryController@index')->name('gallery.index');
//Route::post('/storedata', 'GalleryController@storeData')->name('form.data');
//Route::post('/storeimages', 'GalleryController@storeImages')->name('store.image');

Route::get('/posts/create', 'PostsController@create')->name('posts.create');
Route::post('/posts/create', 'PostsController@store')->name('posts.store');
Route::get('/posts', 'PostsController@index')->name('posts.index');

// Rutas para formulario de contacto
Route::get('/contacts/create', 'ContactController@create')->name('contacts.create');
Route::post('/contacts', 'ContactController@store')->name('contacts.store');