<?php

use Illuminate\Support\Facades\Route;


Route::group(['prefix' => '/affiliate', 'as' => 'affiliate.'], function () {
    Route::get('/', fn() => 'affiliate');
});
