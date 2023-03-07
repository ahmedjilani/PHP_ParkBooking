<?php

use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\BookingController;
use App\Http\Controllers\ContactController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/',[AuthenticatedSessionController::class, 'create'])
->name('login');
Route::group(['middleware' => 'auth'], function () {
    Route::get('/home', function () {
        return view('dashboard');
    })->name('home');
    Route::get('/faq', function () {
        return view('faq');
    })->name('faq');
Route::resource('contact',ContactController::class);
Route::resource('booking',BookingController::class)->except(['create']);
Route::get('booking-create/{park_name}',[BookingController::class,'create'])->name('booking-create');
Route::get('booking-getcount',[BookingController::class,'getCount'])->name('booking-getcount');
Route::get('booking-mybooking',[BookingController::class,'myBooking'])->name('booking-mybooking');

});

require __DIR__.'/auth.php';
