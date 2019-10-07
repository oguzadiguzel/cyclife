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

Route::get('/', function () {
    return view('template.home.index');
})->middleware('auth');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home')->middleware('auth');



Route::prefix('notes')->middleware('auth')->name('notes.')->group(function () {
    Route::get('/', 'NoteController@index')->name('index');
    Route::get('/new', 'NoteController@create')->name('create');
    Route::post('/', 'NoteController@store')->name('store');
    Route::delete('/{note}', 'NoteController@destroy')->name('delete');
    Route::get('/{note}/edit' ,'NoteController@edit')->name('edit');
    Route::post('/{note}', 'NoteController@update')->name('update');
    Route::get('/{note}', 'NoteController@show')->name('show');
});

Route::prefix('tasks')->middleware('auth')->name('tasks.')->group(function () {
    Route::get('/', 'TaskController@index')->name('index');
    Route::get('/new', 'TaskController@create')->name('create');
    Route::post('/', 'TaskController@store')->name('store');
    Route::delete('/{task}', 'TaskController@destroy')->name('delete');
    Route::get('/{task}/edit' ,'TaskController@edit')->name('edit');
    Route::post('/{task}', 'TaskController@update')->name('update');
    Route::get('/{task}', 'TaskController@show')->name('show');
});

Route::prefix('movies')->middleware('auth')->name('movies.')->group(function () {
    Route::get('/', 'MovieController@index')->name('index');
    Route::get('/search', 'MovieController@search')->name('search');
    Route::get('/new/{id}', 'MovieController@create')->name('create');
    Route::post('/', 'MovieController@store')->name('store');
    Route::delete('/{movie}', 'MovieController@destroy')->name('delete');
    Route::get('/{movie}/edit' ,'MovieController@edit')->name('edit');
    Route::post('/{movie}', 'MovieController@update')->name('update');
    Route::get('/{movie}', 'MovieController@show')->name('show');
});