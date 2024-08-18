<?php

use App\Http\Controllers\PostController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

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

// Home route
Route::get('/', function () {
    return view('welcome');
});

// Authentication routes
Auth::routes();

// Home route after login
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// Admin routes (full access)
Route::middleware(['auth', 'role:Admin'])->prefix('admin')->group(function () {
    Route::resource('posts', PostController::class)->names([
        'index' => 'admin.posts.index',
        'create' => 'admin.posts.create',
        'store' => 'admin.posts.store',
        'show' => 'admin.posts.show',
        'edit' => 'admin.posts.edit',
        'update' => 'admin.posts.update',
        'destroy' => 'admin.posts.destroy',
    ]);
});

// Editor routes (create, edit, update, but not delete)
Route::middleware(['auth', 'role:Editor'])->prefix('editor')->group(function () {
    Route::resource('posts', PostController::class)->only(['index', 'create', 'edit', 'update','store'])->names([
        'index' => 'editor.posts.index',
        'create' => 'editor.posts.create',
        'store' => 'editor.posts.store',
        'edit' => 'editor.posts.edit',
        'update' => 'editor.posts.update',
    ]);
});

// Viewer routes (view only)
Route::middleware(['auth', 'role:Viewer'])->group(function () {
    Route::resource('posts', PostController::class)->only(['index', 'show'])->names([
        'index' => 'posts.index',
        'show' => 'posts.show',
    ]);
});
