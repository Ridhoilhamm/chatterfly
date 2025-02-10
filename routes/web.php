<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('users.footer');
});
Route::get('/user', function () {
    return view('users.test');
});
