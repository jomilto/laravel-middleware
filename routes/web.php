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
    return view('post');
})
// ->middleware('auth')
;

Route::view('vista','welcome',['app'=>'hola']);

Route::resource('users','UserController')->middleware('auth');

Route::resource('pages','PageController'); 
//se crean 7 rutas de CRUD con:
// php artisan make:controller PageController --resource --model=Page
// crea controlador con las rutas, y el modelo

Route::post('post','PostController@store')->name('post.store');

Route::get('home', function () {
    return view('home');
});