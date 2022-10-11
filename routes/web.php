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

Route::get('/',[\App\Http\Controllers\PostController::class, 'index']);
Route::get('/author/{user}',[\App\Http\Controllers\UserController::class, 'author']);
Route::get('/category/{category}',[\App\Http\Controllers\CategoryController::class, 'category']);
Route::get('/tag/{tag}',[\App\Http\Controllers\TagController::class, 'tag']);
Route::get('/author/{author}/category/{category}',[\App\Http\Controllers\UserController::class, 'authorsCategory']);
Route::get('/author/{author}/category/{category}/tag/{tag}',[\App\Http\Controllers\UserController::class, 'authorsCategoryTag']);

Route::get('/category/index',[\App\Http\Controllers\CategoryController::class, 'index']);

