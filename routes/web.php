<?php

use Illuminate\Support\Facades\Route;

/* Public/Auth Routes */
Route::view('/', 'landing')->name('landing');

Route::middleware('guest')->group(function () {

    Route::view('/login', 'auth.login')->name('login');

    Route::view('/forgot-password', 'auth.forgot-password')
        ->name('password.request');

    Route::view('/verify-password', 'auth.verify-password')
        ->name('password.verify');

    Route::view('/reset-password', 'auth.reset-password')
        ->name('password.reset');

    Route::view('/sign-up', 'auth.choose-account')
        ->name('signup.choose');

    Route::view('/sign-up/retailer', 'auth.signup-retailer')
        ->name('signup.retailer');

    Route::view('/sign-up/warehouse', 'auth.signup-warehouse')
        ->name('signup.warehouse');

    Route::view('/sign-up/supplier', 'auth.signup-supplier')
        ->name('signup.supplier');

    Route::view('/sign-up/verify', 'auth.verify')
        ->name('signup.verify');

    Route::view('/sign-up/retailer/details', 'auth.retailer-details')
        ->name('signup.retailer.details');

    Route::view('/sign-up/warehouse/details', 'auth.warehouse-details')
        ->name('signup.warehouse.details');

    Route::view('/sign-up/supplier/details', 'auth.supplier-details')
        ->name('signup.supplier.details');
});

/* Retailer Routes (Authenticated) */
Route::prefix('retailer')
    ->name('retailer.')
    ->middleware(['']) 
    ->group(function () {

        Route::view('/dashboard', 'retailer.r-dashboard')
            ->name('dashboard');

        Route::view('/pos', 'retailer.r-pos')
            ->name('pos');

        Route::view('/orders', 'retailer.r-order')
            ->name('orders');

        Route::view('/messages', 'retailer.r-messages')
            ->name('messages');

        Route::view('/purchase-orders', 'retailer.r-purchaseorders')
            ->name('purchaseorders');

        Route::view('/transaction-history', 'retailer.r-transactionhistory')
            ->name('transactionhistory');

        Route::view('/settings', 'retailer.r-settings')
            ->name('settings');
    });