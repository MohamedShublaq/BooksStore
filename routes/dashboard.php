<?php

use App\Http\Controllers\Dashboard\AdminController;
use App\Http\Controllers\Dashboard\Auth\LoginController;
use App\Http\Controllers\Dashboard\AuthorController;
use App\Http\Controllers\Dashboard\AuthorizationController;
use App\Http\Controllers\Dashboard\BookController;
use App\Http\Controllers\Dashboard\CategoryController;
use App\Http\Controllers\Dashboard\ContactController;
use App\Http\Controllers\Dashboard\DiscountController;
use App\Http\Controllers\Dashboard\FlashSaleController;
use App\Http\Controllers\Dashboard\HomeController;
use App\Http\Controllers\Dashboard\OrderController;
use App\Http\Controllers\Dashboard\ProfileController;
use App\Http\Controllers\Dashboard\PublisherController;
use App\Http\Controllers\Dashboard\SettingsController;
use App\Http\Controllers\Dashboard\ShippingAreaController;
use App\Http\Controllers\Dashboard\UserController;
use Illuminate\Support\Facades\Route;

Route::as('admin.')->prefix('admin')->group(function () {

    Route::middleware('guest:admin')->group(function () {

        // **************************************LoginController************************************** //
        Route::controller(LoginController::class)->prefix('login')->group(function () {
            Route::get('/' , 'showLogin')->name('login');
            Route::post('/' , 'login')->name('postLogin');
        });
    });

    Route::middleware('dashboard')->group(function () {

        // **************************************LoginController(logoutFunction)************************************** //
        Route::controller(LoginController::class)->group(function () {
            Route::post('logout' , 'logout')->name('logout');
        });

        // **************************************HomeController************************************** //
        Route::controller(HomeController::class)->prefix('dashboard')->group(function () {
            Route::get('/' , 'home')->name('home');
            Route::get('/change-language/{lang}' , 'changeLanguage');
            Route::post('/bulkDelete' , 'bulkDelete');
            Route::post('/importFile' , 'importFile')->name('importFile');
        });

        // **************************************ProfileController************************************** //
        Route::controller(ProfileController::class)->prefix('profile')->group(function () {
            Route::get('/' , 'showProfile')->name('showProfile');
            Route::post('/' , 'updateProfile')->name('updateProfile');
            Route::get('/change-password' , 'showChangePassword')->name('showChangePassword');
            Route::post('/change-password' , 'changePassword')->name('changePassword');
        });

        // **************************************AuthorizationController************************************** //
        Route::resource('authorizations' , AuthorizationController::class)->except('show');

        // **************************************AdminController************************************** //
        Route::resource('admins' , AdminController::class)->except('show');

        // **************************************UserController************************************** //
        Route::resource('users' , UserController::class)->only(['index','show','destroy']);

        // **************************************PublisherController************************************** //
        Route::resource('publishers' , PublisherController::class)->except(['show','create','edit']);

        // **************************************AuthorController************************************** //
        Route::resource('authors' , AuthorController::class)->except(['show','create','edit']);

        // **************************************ContactController************************************** //
        Route::resource('contacts' , ContactController::class)->only(['index','show','destroy']);

        // **************************************DiscountController************************************** //
        Route::resource('discounts' , DiscountController::class)->except('show');
        Route::controller(DiscountController::class)->prefix('discounts')->as('discounts.')->group(function () {
            Route::post('check-unique-code' , 'checkUniqueCode')->name('checkUniqueCode');
        });

        // **************************************FlashSaleController************************************** //
        Route::resource('flash-sales' , FlashSaleController::class)->except(['show']);

        // **************************************CategoryController************************************** //
        Route::resource('categories' , CategoryController::class)->except(['show','create','edit']);

        // **************************************ShippingAreaController************************************** //
        Route::resource('shipping-areas' , ShippingAreaController::class)->except(['show','create','edit']);

        // **************************************BookController************************************** //
        Route::resource('books' , BookController::class);

        // **************************************OrderController************************************** //
        Route::resource('orders' , OrderController::class)->only(['index','show','destroy']);

        // **************************************SettingsController************************************** //
        Route::controller(SettingsController::class)->prefix('settings')->group(function () {
            Route::get('/' , 'index')->name('settings');
            Route::post('/' , 'update')->name('updateSettings');
        });
    });
});
