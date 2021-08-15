<?php

use App\Http\Controllers\FrontendController;
use App\Http\Controllers\PostController;
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
Route::get('/', [FrontendController::class, 'index'])->name('homepage');

Route::get('about-us', [FrontendController::class, 'aboutUs'])->name('about');

Route::get('contact-us', [FrontendController::class, 'contactUS'] )->name('contact');

Route::get('blog/{category}/{id}/{title}/{discription}', [FrontendController::class, 'blog'])->name('blog');

//BASIC CRUD ROUTE
// Route::get('post', [PostController::class, 'index'])->name('post.index');
// Route::get('post/create', [PostController::class, 'create'])->name('post.create');
// Route::post('post', [PostController::class, 'store'])->name('post.store');
// Route::get('post/{id}', [PostController::class, 'show'])->name('post.show');
// Route::get('post/{id}/edit', [PostController::class, 'edit'])->name('post.edit');
// Route::put('post/{id}/', [PostController::class, 'update'])->name('post.update');
// Route::delete('post/{id}', [PostController::class, 'destroy'])->name('post.destory');


//RESOURCE ROUTE

Route::resource('post', PostController::class);
