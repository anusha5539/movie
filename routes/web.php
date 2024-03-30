<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\HomeController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/about_us', [HomeController::class, 'aboutus']);
// recommend url
Route::get('/recommend', [HomeController::class, 'recommend']);


Route::get('/movies', [HomeController::class, 'movies']);

Route::post('/preference', [HomeController::class, 'preference']);

Route::get('/edit_movies/{id}', [HomeController::class, 'edit_movies']);
Route::post('/update_movie/{id}', [HomeController::class, 'update_movies']);

Route::get('/delete_movies/{id}', [HomeController::class, 'delete_movies']);


Route::post('/import', [HomeController::class, 'import']);


// comment
Route::post('/add_comment', [HomeController::class, 'comment']);
Route::post('/add_reply', [HomeController::class, 'reply']);


Route::get('/list', [HomeController::class, 'list']);
