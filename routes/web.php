<?php

use Illuminate\Support\Facades\Route;
// use App\Http\Controllers\UserAuthController;
// use App\Http\Controllers\ProfileController;
use App\Http\Controllers\BookController;
use App\Http\Controllers\AuthorController;
use App\Http\Controllers\GenreController;

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

Route::get('/', [BookController::class, 'index']);
Route::get('/books/{id}', [BookController::class, 'show']);
Route::get('/books/{id}/author', [BookController::class, 'showAuthorByBook']);
Route::get('/books/{id}/genre', [BookController::class, 'showGenreByBook']);

Route::get('/authors/{id}', [AuthorController::class, 'show']);
Route::get('/authors/{id}/books', [AuthorController::class, 'showBooksInfoByAuthor']);
Route::get('/authors', [AuthorController::class, 'index']);
Route::get('/authors/{id}/ref', [AuthorController::class, 'showInvitedByWhom']);

Route::get('/genre/{id}', [GenreController::class, 'show']);
Route::get('/genre/{id}/books', [GenreController::class, 'getGenresByBookId']);
