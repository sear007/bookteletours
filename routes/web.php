<?php

use App\Http\Controllers\AjaxController;
use App\Http\Controllers\Auth\DashboardController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\ReservationController;
use App\Http\Controllers\BranchController;
use App\Http\Controllers\SiteController;
use App\Http\Controllers\TourismController;
use App\Http\Controllers\ToursController;
use App\Http\Controllers\WelcomeController;
use Illuminate\Support\Facades\Route;

Route::get('/', [WelcomeController::class, 'index'])->name('home');
Route::view('/about', 'about')->name('about');
Route::view('/contact', 'contact')->name('contact');
Route::view('/policy', 'pages.policy')->name('policy');
Route::view('/termsofservice', 'pages.term')->name('termsofservice');

Route::get('/hotels', [BranchController::class, 'index'])
    ->name('hotel.index');
Route::get('/hotel/{hotel_id}/{hotel_name}', [BranchController::class, 'show'])
    ->name('hotel.show');
Route::get('/hotel/{hotel_id}/{hotel_name}/{room_id}/{room_name}', [BranchController::class, 'room'])
    ->name('hotel.show.room');

Route::prefix('checkout')->middleware('auth')->group(function() {
    Route::get('/', [ReservationController::class, 'index'])
        ->name('checkout.index');
    Route::post('/', [ReservationController::class, 'checkout'])
        ->name('checkout.store');
    Route::post('/payment/status', [ReservationController::class, 'checkoutStatus'])
        ->name('checkout.status');
    Route::get('checkout/payment/pdf/{tran_id}', [ReservationController::class, 'getPdf'])
        ->name('checkout.invoicePdf');
    Route::get('/room/{id}', [ReservationController::class, 'roomDetail']);
    Route::get('/payment/{tran_id}', [ReservationController::class, 'roomReservation']);
    Route::post('/payment/receipt/{tran_id}', [ReservationController::class, 'sendReceipt']);
});

Route::get('/sites', [SiteController::class, 'index'])->name('site.index');
Route::get('/site/{site_id}/{site_name}', [SiteController::class, 'show'])->name('site.show');

Route::get('/tours', [ToursController::class, 'index'])->name('tour.index');
Route::get('/tour/{tourId}', [ToursController::class, 'show'])->name('tour.show');
Route::get('/tour/tourType/{tourTypeId}', [ToursController::class, 'showTourType'])->name('tour.showTourType');
Route::get('/tour/tourType/checkout/{tourTypeId}', [ToursController::class, 'showCheckout'])->name('tour.showCheckout');
Route::post('/tour/tourType/checkout/{tourTypeId}', [ToursController::class, 'postCheckout'])->name('tour.postCheckout');
Route::get('/tour/tourType/payment/{tranId}/{status}', [ToursController::class, 'showPayment'])->name('tour.showPayment');
Route::get('/tour/tourType/invoice/{tranId}', [ToursController::class, 'getPaymentPdf'])->name('tour.getPaymentPdf');

Route::prefix('tourism')->group(function(){
    Route::get('/', [TourismController::class, 'index'])->name('tourism');
});

Route::prefix('auth')->group(function(){
    Route::get('/', [LoginController::class, 'handleRedirectAuth'])
        ->name('redirect');
    Route::get('/google/callback', [LoginController::class, 'googleCallback']);
    Route::get('/facebook/callback', [LoginController::class, 'facebookCallback']);
    Route::get('/telegram/callback', [LoginController::class, 'telegramCallback']);
    Route::get('/login', [LoginController::class, 'showLogin'])
        ->name('login');
});

Route::prefix('user')->middleware('auth')->group(function(){
    Route::get('/dashboard', [DashboardController::class, 'index'])
        ->name('dashboard');
    Route::get('/profile', [DashboardController::class, 'index'])
        ->name('profile');
    Route::get('/logout', [DashboardController::class, 'logout'])
        ->name('logout');
    Route::post('/reservation', [ReservationController::class, 'store'])
        ->name('reservation');
    Route::get('/me', [DashboardController::class, 'getuser']);
});

// Route::get('search', );

Route::prefix('ajax')->group(function(){
    Route::get('provinces', [AjaxController::class, 'getProvinces']);
});