<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\ContactController;

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
//     return view('front.pages.example');
// });
Route::view('/','front.pages.home')->name('home');

Route::get('/article/{any}',[BlogController::class,'readPost'])->name('read_post');
Route::get('/home',[BlogController::class,'home'])->name('home');
Route::get('/about',[BlogController::class,'aboutMe'])->name('about_me');
Route::get('/contact',[BlogController::class,'contact'])->name('contact');
Route::post('/contact', [ContactController::class, 'submitContactForm'])->name('contact.submit');
Route::get('/category/{any}',[BlogController::class,'categoryPosts'])->name('category_posts');
Route::get('/search',[BlogController::class,'searchBlog'])->name('search_posts');


