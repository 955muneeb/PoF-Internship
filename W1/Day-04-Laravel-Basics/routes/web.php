<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return "Home Page";
});

Route::get('/about', function () {
    return "About Page";
});

Route::get('/contact', function () {
    return "Contact Page";
});

Route::get('/profile', function () {
    return "Welcome Muneeb";
});
