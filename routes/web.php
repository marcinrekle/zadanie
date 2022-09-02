<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Carbon;

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
    return view('welcome');
});


Route::group(['middleware' => ['auth', 'verified','blocked']], function(){    
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
    Route::get('/blocked', function() {
        return auth()->user()->blocked ? view('blocked') : redirect('/');
    })->name('blocked');
    // Route::get('/dashboard', function() {
    //     return Inertia::render('Dashboard');
    // })->name('dashboard');
    // Route::get('/blocked', function() {
    //     return Inertia::render('Blocked');
    // })->name('blocked');
    // Route::get('/mail', function() {
    //     return Inertia::location('/mail');
    // })->name('mail');
    // Route::get('/content', function() {
    //     return Inertia::location('/content');
    // })->name('content');
});

require __DIR__.'/auth.php';
