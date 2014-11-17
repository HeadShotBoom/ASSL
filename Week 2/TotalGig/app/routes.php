<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

Route::model('gig', 'Gig');

Route::get('/', 'GigController@index');
Route::get('/create', 'GigController@create');
Route::get('/edit/{gig}', 'GigController@edit');
Route::get('/delete/{gig}', 'GigController@delete');
Route::get('/view/{gig}', 'GigController@viewgig');
Route::get('/register', 'HomeController@register');
Route::get('/login', 'HomeController@login');
Route::get('/logout', 'HomeController@logout');
Route::get('/calendar', 'GigController@calendar');
Route::get('/calendar/{month}/{year}', 'GigController@calendarmod');
Route::get('/print/{gig}/pdf', 'PrintController@printgig');

Route::post('/create', 'GigController@handleCreate');
Route::post('/edit', 'GigController@handleEdit');
Route::post('/delete', 'GigController@handleDelete');
Route::post('/register', 'HomeController@handleRegister');
Route::post('/login', 'HomeController@handleLogin');