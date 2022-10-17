<?php

use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\PanelController;
use App\Http\Controllers\Admin\PostController;
use App\Http\Controllers\Admin\TagController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\PageController;
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

Route::get('/', [\App\Http\Controllers\PostController::class, 'index'])->name('main');
Route::get('/author/{user}', [\App\Http\Controllers\AuthorController::class, 'author']);
Route::get('/category/{category}', [\App\Http\Controllers\CategoryController::class, 'category']);
Route::get('/tag/{tag}', [\App\Http\Controllers\TagController::class, 'tag']);
Route::get('/author/{author}/category/{category}', [\App\Http\Controllers\AuthorController::class, 'authorsCategory']);
Route::get('/author/{author}/category/{category}/tag/{tag}', [\App\Http\Controllers\AuthorController::class, 'authorsCategoryTag']);

Route::middleware(['guest'])->group(function () {
    Route::get('/auth/login', [AuthController::class, 'login'])->name('auth.login');
    Route::post('/auth/login', [AuthController::class, 'handleLogin'])->name('auth.handle.login');
});

Route::get('/auth/logout', [AuthController::class, 'logout'])->name('auth.logout');

Route::middleware(['auth'])->group(function () {
    Route::get('/admin/panel', [PanelController::class, 'index'])->name('admin.panel');
    Route::get('/admin/category/index', [CategoryController::class, 'index'])->name('admin.category');
    Route::get('/admin/category/create', [CategoryController::class, 'create'])->name('admin.category.create');
    Route::post('/admin/category/store', [CategoryController::class, 'store'])->name('admin.category.store');
    Route::get('/admin/category/{id}/edit', [CategoryController::class, 'edit'])->name('admin.category.edit');
    Route::post('/admin/category/update', [CategoryController::class, 'update'])->name('admin.category.update');
    Route::get('/admin/category/{id}/delete', [CategoryController::class, 'destroy'])->name('admin.category.destroy');

    Route::get('/admin/tag/index', [TagController::class, 'index'])->name('admin.tag');
    Route::get('/admin/tag/create', [TagController::class, 'create'])->name('admin.tag.create');
    Route::post('/admin/tag/store', [TagController::class, 'store'])->name('admin.tag.store');
    Route::get('/admin/tag/{id}/edit', [TagController::class, 'edit'])->name('admin.tag.edit');
    Route::post('/admin/tag/update', [TagController::class, 'update'])->name('admin.tag.update');
    Route::get('/admin/tag/{id}/delete', [TagController::class, 'destroy'])->name('admin.tag.destroy');

    Route::get('/admin/post/index', [PostController::class, 'index'])->name('admin.post');
    Route::get('/admin/post/create', [PostController::class, 'create'])->name('admin.post.create');
    Route::post('/admin/post/store', [PostController::class, 'store'])->name('admin.post.store');
    Route::get('/admin/post/{id}/edit', [PostController::class, 'edit'])->name('admin.post.edit');
    Route::post('/admin/post/update', [PostController::class, 'update'])->name('admin.post.update');
    Route::get('/admin/post/{id}/delete', [PostController::class, 'destroy'])->name('admin.post.destroy');
});

Route::get('/page', [PageController::class, 'index'])->name('page');
Route::get('/page/{id}', [PageController::class, 'show'])->name('page.show');
Route::post('/page/comment/{id}', [PageController::class, 'addComment'])->name('page.add.comment');
