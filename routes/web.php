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

Route::get('/', 'HomeController@index')->name('admin.home');

// Route::get('/works', 'WorkController@index')->name('works.index');
// Route::post('/works', 'WorkController@index')->name('works.store');
// Route::get('/works/{work}', 'WorkController@show')->name('works.show');
// Route::get('/works/create', 'WorkController@create')->name('works.create');

Route::resource('/works', 'WorkController');