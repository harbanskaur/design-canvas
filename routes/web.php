<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ViewController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\VerifyController;
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

Route::get('/',[ViewController::class,'index'])->middleware('check.login');
Route::get('/login',[ViewController::class,'login'])->name('login');
Route::get('/signup',[ViewController::class,'signup'])->name('signup');

Route::post('/signup-form',[VerifyController::class,'signupForm'])->name('signup-form');
Route::post('/login-form',[VerifyController::class,'loginForm'])->name('login-form');
Route::get('/logout',[VerifyController::class,'logout'])->name('logout');
// Route::get('/categories',[ViewController::class,'categories'])->name('category');
// Route::get('/showcategory/{id}',[ViewController::class,'showcategory'])->name('category');
Route::post('/blog',[BlogController::class,'addblog'])->name('addblog');
Route::post('/show',[BlogController::class,'show'])->name('show');

Route::post('/contact',[ContactController::class,'contact'])->name('contact');

Route::get('/category/{id}',[ViewController::class,'category'])->name('category');
// Route::get('/blog',[ViewController::class,'blog'])->name('blog');

// routes/web.php


Route::post('/submit-comment', [BlogController::class, 'submitComment'])->name('comment');
// Route::get('/view-comments/{blogId}', [BlogController::class, 'viewComments'])->name('viewcomments');
