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

use App\Post;
use App\User;

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

Route::get('home2', function () {
    return view('home2');
});
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');


Route::get('eloquent', function () {
    $posts = Post::all();
    foreach ($posts as $post)
    {
        echo "$post->id $post->title <br>";
    }
});

Route::get('post', function () {
    $posts = Post::all();
    foreach ($posts as $post)
    {
        echo "
        $post->id
        <strong>{$post->user->get_name}</strong>
        $post->get_title <br>";
    }
});

Route::get('users', function () {
    $users = User::all();
    foreach ($users as $user)
    {
        echo "
        $user->id
        <strong>{$user->get_name}</strong>
        {$user->posts->count()} posts<br>";
    }
});

Route::get('collections', function () {
    $users = User::all();
    dd($users->load('posts'));
});

Route::get('serialization', function () {
    $users = User::all();
    // dd($users->toArray());
    dd($users->toJson());
});