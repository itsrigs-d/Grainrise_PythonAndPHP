<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::view('/', 'landing')->name('landing');

Route::middleware('guest')->get('/login', function () {
    return view('auth.login');
})->name('login');

Route::middleware('guest')->get('/forgot-password', function () {
    return view('auth.forgot-password');
})->name('password.request');

Route::middleware('guest')->get('/verify-password', function () {
    return view('auth.verify-password');
})->name('password.verify');

Route::middleware('guest')->get('/reset-password', function () {
    return view('auth.reset-password');
})->name('password.reset');

Route::middleware('guest')->get('/sign-up', function () {
    return view('auth.choose-account');
})->name('signup.choose');

Route::middleware('guest')->get('/sign-up/retailer', function () {
    return view('auth.signup-retailer');
})->name('signup.retailer');

Route::middleware('guest')->get('/sign-up/warehouse', function () {
    return view('auth.signup-warehouse');
})->name('signup.warehouse');

Route::middleware('guest')->get('/sign-up/supplier', function () {
    return view('auth.signup-supplier');
})->name('signup.supplier');

Route::middleware('guest')->get('/sign-up/verify', function () {
    return view('auth.verify');
})->name('signup.verify');

Route::middleware('guest')->get('/sign-up/retailer/details', function () {
    return view('auth.retailer-details');
})->name('signup.retailer.details');

Route::middleware('guest')->get('/sign-up/warehouse/details', function () {
    return view('auth.warehouse-details');
})->name('signup.warehouse.details');

Route::middleware('guest')->get('/sign-up/supplier/details', function () {
    return view('auth.supplier-details');
})->name('signup.supplier.details');