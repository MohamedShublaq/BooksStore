<?php

use App\Http\Controllers\Website\AboutUsController;
use App\Http\Controllers\Website\Auth\ForgetPasswordController;
use App\Http\Controllers\Website\Auth\LoginController;
use App\Http\Controllers\Website\Auth\RegisterController;
use App\Http\Controllers\Website\Auth\ResetPasswordController;
use App\Http\Controllers\Website\BooksController;
use App\Http\Controllers\Website\CartController;
use App\Http\Controllers\Website\HomeController;
use App\Http\Controllers\Website\ProfileController;
use App\Http\Controllers\Website\WishlistController;
use Illuminate\Support\Facades\Route;

// **************************************HomeController************************************** //
Route::controller(HomeController::class)->group(function () {
    Route::get('/' , 'index')->name('home');
});

// **************************************BooksController************************************** //
Route::controller(BooksController::class)->group(function () {
    Route::get('/library' , 'index')->name('books');
});

// **************************************AboutUsController************************************** //
Route::controller(AboutUsController::class)->group(function () {
    Route::get('/aboutus' , 'index')->name('aboutUs');
    Route::post('/contact' , 'contact')->name('contact');
});

// **************************************CartController************************************** //
Route::controller(CartController::class)->group(function () {
    Route::get('/cart' , 'index')->name('cart');
});

// **************************************WishlistController************************************** //
Route::controller(WishlistController::class)->group(function () {
    Route::get('/wishlist' , 'index')->name('wishlist');
});

Route::middleware('guest:web')->group(function () {

    // **************************************LoginController************************************** //
    Route::controller(LoginController::class)->prefix('login')->group(function () {
        Route::get('/' , 'showLogin')->name('login');
        Route::post('/' , 'login')->name('postLogin');
    });

    // **************************************RegisterController************************************** //
    Route::controller(RegisterController::class)->prefix('register')->group(function () {
        Route::get('/' , 'showRegister')->name('register');
        Route::post('/' , 'register')->name('postRegister');
    });

    // **************************************ForgetPasswordController************************************** //
    Route::controller(ForgetPasswordController::class)->group(function(){
        Route::get('/enter/email', 'showEnterEmail')->name('showEnterEmail');
        Route::post('/send/otp', 'sendOtp')->name('sendOtp');
        Route::get('/{email}/enter/code', 'showEnterOtp')->name('showEnterOtp');
        Route::post('/check/otp', 'checkOtp')->name('checkOtp');
    });

    // **************************************ResetPasswordController************************************** //
    Route::controller(ResetPasswordController::class)->prefix('reset/password')->group(function(){
        Route::get('/{email}/{code}', 'showResetPassword')->name('showResetPassword');
        Route::post('', 'resetPassword')->name('resetPassword');
    });
});

Route::middleware('auth:web')->group(function () {

    // **************************************LoginController(logoutFunction)************************************** //
    Route::controller(LoginController::class)->group(function () {
        Route::post('logout' , 'logout')->name('logout');
    });

    // **************************************ProfileController************************************** //
    Route::controller(ProfileController::class)->prefix('profile')->group(function () {
        Route::get('' , 'index')->name('profile');
        Route::post('' , 'update')->name('updateProfile');
    });
});
