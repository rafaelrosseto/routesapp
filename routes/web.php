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

Route::get('/', 'GridController@index');
Route::get('/export', 'GridController@export');

Route::get('/import', 'ImportController@index');
Route::post('/import', 'ImportController@handleImport')->name('import-handle');