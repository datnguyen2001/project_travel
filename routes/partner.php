<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Partner\LoginController;
use App\Http\Controllers\Partner\BookingController;
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
Route::get('dang-nhap', [LoginController::class, 'login'])->name('login');
Route::post('dologin', [LoginController::class, 'dologin'])->name('doLogin');
Route::get('logout', [LoginController::class, 'logout'])->name('logout');
Route::middleware('check-partner-auth')->group(function (){
    Route::get('', [BookingController::class, 'index'])->name('index');
    Route::prefix('book_room')->name('book_room.')->group(function (){
        Route::get('', [BookingController::class, 'index'])->name('index');
        Route::get('contact', [BookingController::class, 'contact'])->name('contact');
        Route::post('sale/{id}', [BookingController::class, 'sale']);
    });
});
