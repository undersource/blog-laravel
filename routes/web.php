<?php

use App\Http\Controllers\IndexController;
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\LoginController;
use Illuminate\Support\Facades\Route;


Route::get('/login', [LoginController::class, 'login_form'])->name('login');
Route::post('/login/auth', [LoginController::class, 'authenticate'])->name('auth');
Route::get('/logout', [LoginController::class, 'logout'])->middleware('auth')->name('logout');

Route::get('/', [IndexController::class, 'index'])->name('index');
Route::get('/article/{slug}', [ArticleController::class, 'show'])->name('show_article');

Route::get('/add', [ArticleController::class, 'add_form'])->middleware('auth')->name('add_form');
Route::post('/add/article', [ArticleController::class, 'add'])->middleware('auth')->name('add_article');
Route::get('/del/article/{slug}', [ArticleController::class, 'del'])->middleware('auth')->name('del_article');