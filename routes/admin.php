<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\PostController;
use App\Http\Controllers\Admin\GalleryController;


Route::prefix('admin')->name('admin.')->middleware('auth')->group(function () {
	Route::controller(CategoryController::class)->prefix('categories')->name('categories.')->group(function () {
		Route::get('/', 'index')->name('index');
		Route::post('store', 'store')->name('store');
		Route::get('create', 'create')->name('create');
		Route::get('{category}/edit', 'edit')->name('edit');
		Route::put('{category}update', 'update')->name('update');
		Route::delete('{category}', 'destroy')->name('destroy');
	});

	Route::controller(PostController::class)->prefix('posts')->name('posts.')->group(function () {
		Route::get('/', 'index')->name('index');
		Route::post('store', 'store')->name('store');
		Route::get('create', 'create')->name('create');
		Route::get('{post}/edit', 'edit')->name('edit');
		Route::put('{post}update', 'update')->name('update');
		Route::delete('{post}', 'destroy')->name('destroy');
	});

	Route::controller(GalleryController::class)->prefix('galleries')->name('galleries.')->group(function () {
		Route::get('{galleries}', 'show')->name('show');
		Route::post('store', 'store')->name('store');
	});
	Route::resource('pages', App\Http\Controllers\Admin\PageController::class);
});