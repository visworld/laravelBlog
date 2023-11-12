<?php

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

// Route::get('/', function () {
//     return view('welcome');
// });

Auth::routes();

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/post/create', [App\Http\Controllers\PostController::class, 'create'])->name('post.create');
Route::POST('/post/save', [App\Http\Controllers\PostController::class, 'save'])->name('post.save');
Route::get('/post/edit/{id}', [App\Http\Controllers\PostController::class, 'edit'])->name('post.edit');
Route::PATCH('/post/update/{id}', [App\Http\Controllers\PostController::class, 'update'])->name('post.update');
Route::delete('/post/delete/{id}', [App\Http\Controllers\PostController::class, 'delete'])->name('post.delete');
