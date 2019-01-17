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

Auth::routes();

Route::get('/', function () {
    return view('welcome');
});

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/sessions/{id?}', 'SessionController@get')->name('sessions');

Route::get('/sessions/{id}/seats', 'SessionController@seats')->name('sessions.seats');

Route::post('/ticket', 'TicketController@buy')->name('ticket');
