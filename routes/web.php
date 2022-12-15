<?php

use App\Http\Controllers\AdminMovieController;
use App\Http\Controllers\AdminQuoteController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\LanguageChangeController;
use App\Http\Controllers\MovieController;
use App\Http\Controllers\QuoteController;
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

Route::get('/', [QuoteController::class, 'index'])->name('home');

Route::get('change-locale/{locale}', [LanguageChangeController::class, 'change'])->name('locale');

Route::get('/movie/{movie:slug}', [MovieController::class, 'show'])->name('movie.quotes');
Route::view('login', 'login')->name('login.page')->middleware('guest');

Route::group(['controller'=>AuthController::class], function () {
	Route::post('login', 'login')->name('login')->middleware('guest');
	Route::post('logout', 'logout')->name('logout')->middleware('auth');
});

Route::group(['controller' => AdminMovieController::class], function () {
	Route::get('admin/movie/index', 'index')->name('admin.movie.index')->middleware('auth');
	Route::view('admin/movie/create', 'admin.movie.create')->name('admin.movie.create')->middleware('auth');
	Route::get('admin/movie/{movie:slug}/edit', 'edit')->name('admin.movie.edit')->middleware('auth');
	Route::post('admin/movie', 'store')->name('admin.movie.store')->middleware('auth');
	Route::patch('admin/movie/{movie:slug}', 'update')->name('admin.movie.update')->middleware('auth');
	Route::delete('admin/movie/{movie:slug}', 'destroy')->name('admin.movie.delete')->middleware('auth');
});

Route::group(['controller' => AdminQuoteController::class], function () {
	Route::get('admin/quote/index', 'index')->name('admin.quote.index')->middleware('auth');
	Route::get('admin/quote/create', 'create')->name('admin.quote.create')->middleware('auth');
	Route::get('admin/quote/{movie:slug}/show', 'show')->name('admin.quote.show')->middleware('auth');
	Route::get('admin/quote/{quote:id}/edit', 'edit')->name('admin.quote.edit')->middleware('auth');
	Route::post('admin/quote', 'store')->name('admin.quote.store')->middleware('auth');
	Route::patch('admin/quote/{quote:id}', 'update')->name('admin.quote.update')->middleware('auth');
	Route::delete('admin/quote/{quote:id}', 'destroy')->name('admin.quote.delete')->middleware('auth');
});