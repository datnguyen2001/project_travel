<?php

use App\Http\Controllers\Web\CulinaryController;
use App\Http\Controllers\Web\DetailBookingController;
use App\Http\Controllers\Web\HomeController;
use App\Http\Controllers\Web\ContactController;
use App\Http\Controllers\Web\NewsController;
use App\Http\Controllers\Web\TravellingController;
use App\Http\Controllers\Web\BookingController;
use App\Http\Controllers\Web\ExploreStallController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Web\SubscribesController;
use \App\Http\Controllers\Web\TourController;
use \App\Http\Controllers\Web\TouringController;

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

Route::prefix('')->name('web.')->group(function () {
    Route::get('', [HomeController::class, 'index'])->name('home');

    Route::get('gioi-thieu', [HomeController::class, 'introduce'])->name('introduce');

    Route::get('lien-he', [ContactController::class, 'index'])->name('contact');

    Route::get('du-lich', [TravellingController::class, 'travelling'])->name('travelling');
    Route::post('slide-travel', [TravellingController::class, 'getImgRoom']);
    Route::get('du-lich/danh-muc/{id}', [TravellingController::class, 'category'])->name('travelling.category');

    Route::get('dia-diem-du-lich', [TourController::class, 'tour'])->name('tour');
    Route::post('slide-tour', [TourController::class, 'getImgRoom']);
    Route::get('dia-diem-du-lich/danh-muc/{id}', [TourController::class, 'category'])->name('tour.category');

    Route::get('am-thuc', [CulinaryController::class, 'index'])->name('culinary');
    Route::get('am-thuc/{id}', [CulinaryController::class, 'detailCulinary'])->name('culinary.detail');
    Route::post('slide', [CulinaryController::class, 'getImgRoom']);
    Route::get('am-thuc/category/{id}', [CulinaryController::class, 'category'])->name('culinary.category');

    Route::get('tin-tuc', [NewsController::class, 'index'])->name('news');
    Route::get('tin-tuc/{slug}', [NewsController::class, 'detailNew'])->name('news.detail');
    Route::post('slide-news', [NewsController::class, 'getImgRoom']);
    Route::post('tin-tuc/tin-noi-bat', [NewsController::class, 'featuredNews']);
    Route::post('tin-tuc/kham-pha-du-lich', [NewsController::class, 'exploreTourism']);
    Route::post('tin-tuc/kham-pha-am-thuc', [NewsController::class, 'exploreCulinary']);

    Route::prefix('booking')->name('booking.')->group(function (){
        Route::get('', [BookingController::class, 'index'])->name('index');
        Route::get('{slug}', [DetailBookingController::class, 'detailBooking'])->name('detail');
        Route::get('category/{slug}', [BookingController::class,'category']);
        Route::post('slide', [BookingController::class, 'getImgRoom']);
        Route::post('show-utilities', [BookingController::class, 'showUtilities']);
        Route::post('show-room', [BookingController::class, 'showRoom']);
        Route::post('book-room/{id}', [BookingController::class, 'bookRoom'])->name('room');
        Route::post('show-hotel', [BookingController::class, 'showHotel']);
        Route::post('book-hotel/{id}',[BookingController::class, 'bookHotel'])->name('hotel');
    });

    Route::prefix('touring')->name('touring.')->group(function (){
        Route::get('', [TouringController::class, 'index'])->name('index');
        Route::get('{slug}', [TouringController::class, 'detailTouring'])->name('detail');
        Route::get('category/{slug}', [TouringController::class,'category']);
        Route::post('slide', [TouringController::class, 'getImgRoom']);
        Route::post('book-hotel/{id}',[TouringController::class, 'bookHotel'])->name('hotel');
    });

    Route::get('review/{slug}', [NewsController::class, 'review'])->name('articles.detail');

    Route::get('kham-pha-gian-hang', [ExploreStallController::class, 'explore'])->name('explore-stall');
    Route::get('kham-pha-gian-hang/{slug}', [ExploreStallController::class, 'detailStall'])->name('explore-stall.detail');
    Route::post('slide-mon-an', [ExploreStallController::class, 'getImgRoom']);
    Route::get('kham-pha-gian-hang/danh-muc/{id}', [ExploreStallController::class, 'category'])->name('explore-stall.category');
    Route::post('contact/store', [ContactController::class, 'store'])->name('contact.store');


    //Màn 1
    Route::get('tin-tuc-1/{slug}',[NewsController::class, 'detail1'])->name('news.detail1');
    //Màn 2
    Route::get('tin-tuc-2/{slug}',[NewsController::class, 'detail2'])->name('news.detail2');
    //Màn 3
    Route::get('chi-tiet-bai-viet-kinh-nghiem-du-lich', [NewsController::class, 'detailNewsTravelExperience']);
    //Màn 4
    Route::get('chi-tiet-bai-viet-am-thuc', [NewsController::class, 'detailNewsCulinary']);

    Route::get('gioi-thieu-ve-vinh-phuc', [NewsController::class, 'introduce'])->name('news.introduce');
    Route::get('vi-tri-dia-ly', [NewsController::class, 'geographicalLocation'])->name('news.geographical-location');
    Route::get('truyen-thong-va-con-nguoi', [NewsController::class, 'traditionAndPeople'])->name('news.tradition');
    Route::post('subscribes', [SubscribesController::class, 'subscribes'])->name('subscribes');
});

Route::get('test',[\App\Http\Controllers\Web\TestController::class,'test'])->name('test');
