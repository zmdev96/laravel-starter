<?php

use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return view('frontend.welcome');
})->name('ee');


Route::get('/home', function () {
    return 'home';
})->middleware(['auth:web', 'verified:verification.notice'])->name('home');

Route::get('/gg', function () {
    return 'home';
})->middleware(['auth:web', 'password.confirm']);


Route::fallback(fn() => abort(404));
