<?php

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

// Display home page. Feed with news from CNN or other source.
Route::get('/', function () {
    return view('welcome');
})->name('welcome');


// Insert a new favorite into DB.
Route::post('/favorites/store','FavoritesController@store')->name('store_favorites');


// Display user's favorites news.
Route::get('/favorites/{id}','FavoritesController@index')->name('favorites');
Route::resource('Favorites','FavoritesController');




Auth::routes();
