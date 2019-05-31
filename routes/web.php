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


// Insert a new favorite into DB. Can't access the route without being logged if not logged redirect to login page
Route::post('/favorites/store','FavoritesController@store')->name('store_favorites')->middleware('auth');


// Display user's favorites news. Can't access the route without being logged if not logged redirect to login page
Route::get('/favorites/{id}','FavoritesController@index')->name('favorites')->middleware('auth');
Route::resource('Favorites','FavoritesController');




Auth::routes();
