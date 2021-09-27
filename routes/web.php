<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\AuthorController;
use App\Http\Controllers\BookController;

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

/*
|--------------------------------------------------------------------------
| Author Routes
|--------------------------------------------------------------------------
*/
Route::get('/author', [AuthorController::class, 'index']);
Route::get('/author/create', [AuthorController::class, 'create']);
Route::post('/author/store', [AuthorController::class, 'store']);
Route::get('/author/edit/{id}', [AuthorController::class, 'edit']);
Route::post('/author/update/{id}', [AuthorController::class, 'update']);
Route::get('/author/delete/{id}', [AuthorController::class, 'destroy']);

/*
|--------------------------------------------------------------------------
| Book Routes
|--------------------------------------------------------------------------
*/
Route::get('/book', [BookController::class, 'index']);
Route::get('/book/create', [BookController::class, 'store']);
Route::post('/book/store', [BookController::class, 'store']);
Route::get('/book/edit/{id}', [BookController::class, 'store']);
Route::post('/book/update/{id}', [BookController::class, 'store']);
Route::get('/book/delete/{id}', [BookController::class, 'destroy']);
