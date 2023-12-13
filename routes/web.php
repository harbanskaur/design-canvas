<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ViewController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\VerifyController;
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
// Route::post('/categories',[VerifyController::class,'categories'])->name('categories');
// Route::get('/category/{id}',[ViewController::class,'category'])->name('category');
Route::post('/blog',[BlogController::class,'addblog'])->name('addblog');
Route::post('/show',[BlogController::class,'show'])->name('show');
Route::get('/category',[ViewController::class,'category'])->name('categories');
// Route::get('/blog',[ViewController::class,'blog'])->name('blog');

