<?php
Route::get('/', function () {
    return view('welcome');
})->name('home');


Route::get('/{id}', 'RedirectController@redirect')->where(['id' => '[0-9a-zA-Z]{6}']);
