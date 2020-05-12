<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
})->name('home');

Route::post('/login', 'Auth\LoginController@login')->name('login');

Route::prefix('/a/{link}')->group(function () {
    Route::get('/', 'LinkController@index')->name('link')->middleware('check.link');
    Route::get('/newLink', 'LinkController@new')->name('link.new')->middleware('check.link');
    Route::get('/deactivated', 'LinkController@deactivated')->name('link.deactivated')->middleware('check.link');
    Route::get('/game', 'GameController@index')->name('game')->middleware('check.link');
    Route::get('/history', 'GameController@history')->name('game.history')->middleware('check.link');
});

Route::prefix('admin')->name('admin.')->group(function () {
    Route::resource('users', 'Admin\UserController');
});
