<?php

use App\Http\Controllers\FrontendController;
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

Route::get('about-us',[FrontendController::class, 'aboutUs'])->name('about');

Route::get('contact-us', [FrontendController::class, 'contactUS'] )->name('contact');



Route::get('blog/{category}/{id}',function($category, $id){
    return $category.'/'.$id;

});
