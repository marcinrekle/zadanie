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

Route::prefix('mail')->group(function() {
    Route::get('/', 'MailController@index');
});

Route::group(['prefix' => 'mail','middleware' => ['auth', 'verified','blocked']], function() {
    Route::resource('/', 'MailController',['names' => 'mail']);
});
