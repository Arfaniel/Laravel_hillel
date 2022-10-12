<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminCategoryController;
use App\Http\Controllers\AdminTagController;
use App\Http\Controllers\AdminPostController;
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
Route::get('/author/{user}',[\App\Http\Controllers\AuthorController::class, 'author']);
Route::get('/category/{category}',[\App\Http\Controllers\CategoryController::class, 'category']);
Route::get('/tag/{tag}',[\App\Http\Controllers\TagController::class, 'tag']);
Route::get('/author/{author}/category/{category}',[\App\Http\Controllers\AuthorController::class, 'authorsCategory']);
Route::get('/author/{author}/category/{category}/tag/{tag}',[\App\Http\Controllers\AuthorController::class, 'authorsCategoryTag']);

Route::get('/admin/category/index',[AdminCategoryController::class, 'index'])->name('admin.category');
Route::get('/admin/category/create',[AdminCategoryController::class, 'create'])->name('admin.category.create');
Route::post('/admin/category/store',[AdminCategoryController::class, 'store'])->name('admin.category.store');
Route::get('/admin/category/{id}/edit',[AdminCategoryController::class, 'edit'])->name('admin.category.edit');
Route::post('/admin/category/update',[AdminCategoryController::class, 'update'])->name('admin.category.update');
Route::get('/admin/category/{id}/delete',[AdminCategoryController::class, 'destroy'])->name('admin.category.destroy');

Route::get('/admin/tag/index',[AdminTagController::class, 'index'])->name('admin.tag');
Route::get('/admin/tag/create',[AdminTagController::class, 'create'])->name('admin.tag.create');
Route::post('/admin/tag/store',[AdminTagController::class, 'store'])->name('admin.tag.store');
Route::get('/admin/tag/{id}/edit',[AdminTagController::class, 'edit'])->name('admin.tag.edit');
Route::post('/admin/tag/update',[AdminTagController::class, 'update'])->name('admin.tag.update');
Route::get('/admin/tag/{id}/delete',[AdminTagController::class, 'destroy'])->name('admin.tag.destroy');


Route::get('/admin/post/index',[AdminPostController::class, 'index'])->name('admin.post');
Route::get('/admin/post/create',[AdminPostController::class, 'create'])->name('admin.post.create');
Route::post('/admin/post/store',[AdminPostController::class, 'store'])->name('admin.post.store');
Route::get('/admin/post/{id}/edit',[AdminPostController::class, 'edit'])->name('admin.post.edit');
Route::post('/admin/post/update',[AdminPostController::class, 'update'])->name('admin.post.update');
Route::get('/admin/post/{id}/delete',[AdminPostController::class, 'destroy'])->name('admin.post.destroy');
