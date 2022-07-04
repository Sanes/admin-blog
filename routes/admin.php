<?php

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
Route::prefix('admin')->name('admin.')->middleware('auth')->group(function () {
	Route::resource('pages', App\Http\Controllers\Admin\PageController::class);
	Route::resource('posts', App\Http\Controllers\Admin\PostController::class)->except('show');
	Route::resource('categories', App\Http\Controllers\Admin\CategoryController::class);
});