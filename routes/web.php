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


Route::get('/', 'MainController@main');
Route::get('/film','MainController@film')->name('film');
Route::get('/actors','MainController@actors')->name('actors');
/*Route::get('/form_film','MainController@form_film');*/
Route::get('/director', 'MainController@director')->name('director');
Route::get('/genre', 'MainController@genre')->name('genre');

Route::get('/actors/delete/{id}','MainController@deleteActor');
Route::get('/film/delete/{id}','MainController@deleteFilm');
Route::get('/director/delete/{id}','MainController@deleteDirector');
Route::get('/genre/delete/{id}','MainController@deleteGenre');

Route::post('/film/check','MainController@film_check');
Route::post('/actors/check','MainController@actors_check');
Route::post('/director/check','MainController@director_check');
Route::post('/genre/check','MainController@genre_check');


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
