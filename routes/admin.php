<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\LoginController;
use App\Http\Controllers\Admin\BanerController;
use App\Http\Controllers\Admin\CulinaryController;
use App\Http\Controllers\Admin\RestaurantController;
use App\Http\Controllers\Admin\BookingController;
use App\Http\Controllers\Admin\ExploreTourismController;
use App\Http\Controllers\Admin\TravelController;
use App\Http\Controllers\Admin\BoothController;
use App\Http\Controllers\Web\ContactController;
use App\Http\Controllers\Admin\BookRoomController;
use App\Http\Controllers\Admin\IntroduceController;
use \App\Http\Controllers\Admin\SuperAppController;
use \App\Http\Controllers\Admin\AppDescribeController;
use \App\Http\Controllers\Admin\TravelGuideController;
use \App\Http\Controllers\Admin\SearchServicesController;
use \App\Http\Controllers\Admin\BusinessContentController;
use \App\Http\Controllers\Admin\BusinessIconController;
use \App\Http\Controllers\Admin\TechnologyControllerer;
use \App\Http\Controllers\Admin\SupportController;
use \App\Http\Controllers\Admin\BannerDescriptionController;
use \App\Http\Controllers\Admin\TouristController;
use \App\Http\Controllers\Admin\IntroduceVPController;
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
Route::get('dang-nhap', [LoginController::class,'login'])->name('login');
Route::post('dologin', [LoginController::class,'dologin'])->name('doLogin');
Route::get('logout', [LoginController::class,'logout'])->name('logout');
Route::middleware('check-admin-auth')->group(function () {
    Route::get('/', [BanerController::class, 'index'])->name('index');
    Route::get('create', [BanerController::class, 'create'])->name('create');
    Route::post('store', [BanerController::class, 'store'])->name('store');
    Route::prefix('banner')->name('banner')->group(function (){
        Route::post('hide/{id}', [BanerController::class,'hide']);
        Route::post('delete/{id}', [BanerController::class, 'delete']);
        Route::get('edit/{id}', [BanerController::class, 'edit']);
        Route::post('update/{id}', [BanerController::class,'update']);
    });
    // Ẩm thực
    Route::prefix('culinary')->name('culinary.')->group(function (){
        Route::get('category', [CulinaryController::class,'category'])->name('category');
        Route::get('category-create', [CulinaryController::class, 'createCategory'])->name('category.create');
        Route::post('category-store', [CulinaryController::class,'storeCategory'])->name('category.store');
        Route::get('category-edit/{id}', [CulinaryController::class,'editCategory']);
        Route::post('category-update/{id}', [CulinaryController::class,'updateCategory']);
        Route::post('category-delete/{id}',[CulinaryController::class, 'deleteCategory']);
        Route::get('', [CulinaryController::class,'index'])->name('index');
        Route::get('create', [CulinaryController::class, 'create'])->name('create');
        Route::post('store', [CulinaryController::class,'store'])->name('store');
        Route::post('delete/{id}', [CulinaryController::class, 'delete']);
        Route::get('edit/{id}', [CulinaryController::class,'edit'])->name('edit');
        Route::post('update/{id}', [CulinaryController::class,'update'])->name('update');
        Route::prefix('specialties')->name('specialties.')->group(function (){
            Route::get('', [CulinaryController::class, 'specialties'])->name('index');
            Route::get('create', [CulinaryController::class, 'specialtiesCreate'])->name('create');
        });
        // Blog
        Route::prefix('explore_tourism')->name('explore_tourism.')->group(function (){
            Route::get('', [CulinaryController::class, 'exploreTourism'])->name('index');
            Route::get('create', [CulinaryController::class, 'exploreTourismCreate'])->name('create');
            Route::get('edit/{slug}', [CulinaryController::class, 'exploreTourismEdit'])->name('edit');
            Route::post('store', [CulinaryController::class, 'exploreTourismStore'])->name('store');
            Route::post('update/{slug}', [CulinaryController::class, 'exploreTourismUpdate'])->name('update');
        });
        // Articles
        Route::prefix('articles')->name('articles.')->group(function (){
            Route::get('', [CulinaryController::class, 'articles'])->name('index');
            Route::get('create', [CulinaryController::class, 'articlesCreate'])->name('create');
            Route::post('store', [CulinaryController::class, 'articlesStore'])->name('store');
            Route::get('edit/{slug}', [CulinaryController::class, 'articlesEdit'])->name('edit');
            Route::post('update/{id}', [CulinaryController::class, 'articlesUpdate'])->name('update');
        });
    });
    // Nhà hàng
    Route::prefix('restaurant')->name('restaurant.')->group(function (){
        Route::get('', [RestaurantController::class, 'index'])->name('index');
        Route::get('create', [RestaurantController::class, 'create'])->name('create');
        Route::post('stote', [RestaurantController::class, 'store'])->name('store');
        Route::post('delete/{id}', [RestaurantController::class, 'delete']);
        Route::get('edit/{id}', [RestaurantController::class, 'edit']);
        Route::post('update/{id}', [RestaurantController::class, 'update']);
    });
    // Booking
    Route::prefix('booking')->name('booking.')->group(function (){
        Route::prefix('category')->name('category.')->group(function (){
            Route::get('', [BookingController::class, 'category'])->name('index');
            Route::get('create', [BookingController::class, 'createCategory'])->name('create');
            Route::post('store', [BookingController::class, 'storeCategory'])->name('store');
            Route::get('edit/{slug}', [BookingController::class, 'editCategory'])->name('edit');
            Route::post('update/{slug}', [BookingController::class,'updateCategory'])->name('update');
            Route::post('delete/{id}', [BookingController::class, 'deleteCategory'])->name('delete');
        });
        Route::prefix('phong')->name('phong.')->group(function (){
            Route::get('', [BookingController::class, 'index'])->name('index');
            Route::get('create', [BookingController::class, 'createPhong'])->name('create');
            Route::post('store', [BookingController::class, 'storePhong'])->name('store');
            Route::get('edit/{id}', [BookingController::class, 'editPhong'])->name('edit');
            Route::post('update/{id}', [BookingController::class, 'updatePhong'])->name('update');
            Route::post('delete/{id}', [BookingController::class, 'deletePhong'])->name('delete');
        });
        Route::prefix('hotel')->name('hotel.')->group(function (){
            Route::get('', [BookingController::class, 'indexHotel'])->name('index');
            Route::get('create', [BookingController::class, 'createHotel'])->name('create');
            Route::post('store', [BookingController::class, 'storeHotel'])->name('store');
            Route::get('edit/{slug}', [BookingController::class, 'editHotel'])->name('edit');
            Route::post('update/{id}', [BookingController::class, 'updateHotel'])->name('update');
            Route::post('delete/{id}', [BookingController::class, 'deleteHotel'])->name('delete');
        });
        Route::prefix('articles')->name('articles.')->group(function (){
            Route::get('', [BookingController::class, 'articles'])->name('index');
            Route::get('create', [BookingController::class, 'articlesCreate'])->name('create');
            Route::post('store', [BookingController::class, 'articlesStore'])->name('store');
            Route::get('edit/{slug}', [BookingController::class, 'articlesEdit'])->name('edit');
            Route::post('update/{id}', [BookingController::class, 'articlesUpdate'])->name('update');
        });
        Route::prefix('blog')->name('blog.')->group(function (){
            Route::get('', [BookingController::class, 'blog'])->name('index');
            Route::get('create', [BookingController::class, 'blogCreate'])->name('create');
            Route::post('store', [BookingController::class, 'blogStore'])->name('store');
            Route::get('edit/{slug}', [BookingController::class, 'blogEdit'])->name('edit');
            Route::post('update/{id}', [BookingController::class, 'blogUpdate'])->name('update');
        });
        Route::prefix('convenient')->name('convenient.')->group(function (){
            Route::get('', [BookRoomController::class, 'convenient'])->name('index');
            Route::get('create', [BookRoomController::class, 'convenientCreate'])->name('create');
            Route::post('store', [BookRoomController::class, 'convenientStore'])->name('store');
            Route::get('edit/{id}', [BookRoomController::class, 'convenientEdit'])->name('edit');
            Route::post('update/{id}', [BookRoomController::class, 'convenientUpdate'])->name('update');
        });
    });
    // Khám phá du lịch
    Route::prefix('explore_tourism')->name('explore_tourism.')->group(function (){
        Route::prefix('category')->name('category.')->group(function (){
            Route::get('', [ExploreTourismController::class, 'indexCategory'])->name('index');
            Route::get('create', [ExploreTourismController::class, 'createCategory'])->name('create');
            Route::post('store', [ExploreTourismController::class, 'storeCategory'])->name('store');
            Route::get('edit/{slug}', [ExploreTourismController::class, 'editCategory'])->name('edit');
            Route::post('update/{slug}', [ExploreTourismController::class, 'updateCategory'])->name('update');
            Route::post('delete/{id}', [ExploreTourismController::class, 'deleteCategory'])->name('category');
            Route::post('display', [ExploreTourismController::class, 'displayCategory'])->name('display');
        });
        Route::prefix('posts')->name('posts.')->group(function (){
            Route::get('', [ExploreTourismController::class, 'indexPost'])->name('index');
            Route::get('create', [ExploreTourismController::class, 'createPosts'])->name('create');
            Route::post('store', [ExploreTourismController::class, 'storePosts'])->name('store');
            Route::get('edit/{slug}', [ExploreTourismController::class, 'editPosts'])->name('edit');
            Route::post('update/{slug}', [ExploreTourismController::class, 'updatePosts'])->name('update');
            Route::post('display', [ExploreTourismController::class, 'displayPosts'])->name('display');
            Route::post('delete/{id}', [ExploreTourismController::class, 'deletePosts'])->name('delete');
        });
    });
    // Du lich
    Route::prefix('travel')->name('travel.')->group(function (){
        Route::prefix('category')->name('category.')->group(function (){
            Route::get('', [TravelController::class, 'category'])->name('index');
            Route::get('create', [TravelController::class, 'categoryCreate'])->name('create');
            Route::post('store', [TravelController::class, 'categoryStore'])->name('store');
            Route::post('delete/{id}', [TravelController::class, 'categoryDelete']);
            Route::get('edit/{id}', [TravelController::class, 'categoryEdit']);
            Route::post('update/{id}', [TravelController::class,'categoryUpdate'])->name('update');
        });
        Route::prefix('articles')->name('articles.')->group(function (){
            Route::get('', [TravelController::class, 'articles'])->name('index');
            Route::get('create', [TravelController::class,'articlesCreate'])->name('create');
            Route::post('store', [TravelController::class, 'articlesStore'])->name('store');
            Route::get('edit/{slug}', [TravelController::class, 'articlesEdit'])->name('edit');
            Route::post('update/{id}', [TravelController::class, 'articlesUpdate'])->name('update');
            Route::post('display', [TravelController::class, 'display']);
            Route::post('delete/{id}', [TravelController::class, 'articlesDelete']);
        });
    });
    // Đại điểm du lịch
    Route::prefix('tourist')->name('tourist.')->group(function (){
        Route::prefix('category')->name('category.')->group(function (){
            Route::get('', [TouristController::class, 'category'])->name('index');
            Route::get('create', [TouristController::class, 'categoryCreate'])->name('create');
            Route::post('store', [TouristController::class, 'categoryStore'])->name('store');
            Route::post('delete/{id}', [TouristController::class, 'categoryDelete']);
            Route::get('edit/{id}', [TouristController::class, 'categoryEdit']);
            Route::post('update/{id}', [TouristController::class,'categoryUpdate'])->name('update');
        });
        Route::prefix('articles')->name('articles.')->group(function (){
            Route::get('', [TouristController::class, 'articles'])->name('index');
            Route::get('create', [TouristController::class,'articlesCreate'])->name('create');
            Route::post('store', [TouristController::class, 'articlesStore'])->name('store');
            Route::get('edit/{slug}', [TouristController::class, 'articlesEdit'])->name('edit');
            Route::post('update/{id}', [TouristController::class, 'articlesUpdate'])->name('update');
            Route::post('display', [TouristController::class, 'display']);
            Route::post('delete/{id}', [TouristController::class, 'articlesDelete']);
        });
    });
    // Gian hang
    Route::prefix('booth')->name('booth.')->group(function (){
        Route::get('', [BoothController::class, 'index'])->name('index');
        Route::get('create', [BoothController::class, 'create'])->name('create');
        Route::get('edit/{slug}', [BoothController::class,'edit'])->name('edit');
        Route::prefix('category')->name('category.')->group(function () {
            Route::get('', [BoothController::class, 'category'])->name('index');
            Route::get('create', [BoothController::class, 'categoryCreate'])->name('create');
            Route::post('store', [BoothController::class, 'categoryStore'])->name('store');
            Route::post('delete/{id}', [BoothController::class, 'categoryDelete']);
            Route::get('edit/{id}', [BoothController::class, 'categoryEdit']);
            Route::post('update/{id}', [BoothController::class, 'categoryUpdate'])->name('update');
        });
        Route::prefix('specialties')->name('specialties.')->group(function (){
            Route::get('', [BoothController::class, 'specialties'])->name('index');
            Route::get('create', [BoothController::class, 'specialtiesCreate'])->name('create');
            Route::post('store', [BoothController::class, 'specialtiesStore'])->name('store');
            Route::post('delete/{id}', [BoothController::class, 'specialtiesDelete']);
            Route::get('edit/{id}', [BoothController::class, 'specialtiesEdit']);
            Route::post('update/{id}', [BoothController::class, 'specialtiesUpdate'])->name('update');
        });
        Route::prefix('articles')->name('articles.')->group(function (){
            Route::get('', [BoothController::class, 'articles'])->name('index');
            Route::get('create', [BoothController::class, 'articlesCreate'])->name('create');
            Route::post('store', [BoothController::class, 'articlesStore'])->name('store');
            Route::post('delete/{id}', [BoothController::class, 'articlesDelete']);
            Route::get('edit/{id}', [BoothController::class, 'articlesEdit'])->name('edit');
            Route::post('update/{id}', [BoothController::class, 'articlesUpdate'])->name('update');
        });
    });
    //Contact
    Route::prefix('contact')->name('contact.')->group(function (){
        Route::get('', [ContactController::class, 'adminData'])->name('index');
        Route::get('success/{id}', [ContactController::class, 'success'])->name('success');
    });

    Route::prefix('book_room')->name('book_room.')->group(function (){
        Route::get('', [BookRoomController::class, 'bookRoom'])->name('index');
        Route::get('contact', [BookRoomController::class, 'bookRoomContact'])->name('contact');
        Route::post('sale/{id}', [BookRoomController::class, 'sale']);
    });
    /**
     * Xóa hình ảnh liên quan
    **/
    Route::post('multimedia/delete/{id}', [BanerController::class, 'deleteMultimedia']);

    //Giới thiệu
    Route::prefix('introduce')->name('introduce.')->group(function (){
        Route::prefix('feature')->name('feature.')->group(function (){
            Route::get('', [IntroduceController::class,'indexBanner'])->name('index');
            Route::get('create', [IntroduceController::class,'createBanner'])->name('create');
            Route::post('store', [IntroduceController::class,'storeBanner'])->name('store');
            Route::get('edit/{id}', [IntroduceController::class, 'editBanner'])->name('edit');
            Route::post('update/{id}', [IntroduceController::class, 'updateBanner'])->name('update');
            Route::post('delete/{id}', [IntroduceController::class, 'deleteBanner']);
        });

        Route::prefix('contentFeature')->name('contentFeature.')->group(function (){
            Route::get('', [IntroduceController::class,'index_feature'])->name('index');
            Route::get('create', [IntroduceController::class,'create_feature'])->name('create');
            Route::post('store', [IntroduceController::class,'store_feature'])->name('store');
            Route::get('edit/{id}', [IntroduceController::class, 'edit_feature'])->name('edit');
            Route::post('update/{id}', [IntroduceController::class, 'update_feature'])->name('update');
            Route::post('delete/{id}', [IntroduceController::class, 'delete_feature'])->name('delete');
        });

        Route::prefix('superApp')->name('superApp.')->group(function (){
            Route::get('', [SuperAppController::class,'index'])->name('index');
            Route::get('create', [SuperAppController::class,'create'])->name('create');
            Route::post('store', [SuperAppController::class,'store'])->name('store');
            Route::get('edit/{id}', [SuperAppController::class, 'edit'])->name('edit');
            Route::post('update/{id}', [SuperAppController::class, 'update'])->name('update');
            Route::post('delete/{id}', [SuperAppController::class, 'delete'])->name('delete');
        });

        Route::prefix('bannerDescription')->name('bannerDescription.')->group(function (){
            Route::get('', [BannerDescriptionController::class,'index'])->name('index');
            Route::get('create', [BannerDescriptionController::class,'create'])->name('create');
            Route::post('store', [BannerDescriptionController::class,'store'])->name('store');
            Route::get('edit/{id}', [BannerDescriptionController::class, 'edit'])->name('edit');
            Route::post('update/{id}', [BannerDescriptionController::class, 'update'])->name('update');
            Route::post('delete/{id}', [BannerDescriptionController::class, 'delete'])->name('delete');
        });

        Route::prefix('appDescription')->name('appDescription.')->group(function (){
            Route::get('', [AppDescribeController::class,'index'])->name('index');
            Route::get('create', [AppDescribeController::class,'create'])->name('create');
            Route::post('store', [AppDescribeController::class,'store'])->name('store');
            Route::get('edit/{id}', [AppDescribeController::class, 'edit'])->name('edit');
            Route::post('update/{id}', [AppDescribeController::class, 'update'])->name('update');
            Route::post('delete/{id}', [AppDescribeController::class, 'delete'])->name('delete');
        });

        Route::prefix('travelGuide')->name('travelGuide.')->group(function (){
            Route::get('', [TravelGuideController::class,'index'])->name('index');
            Route::get('create', [TravelGuideController::class,'create'])->name('create');
            Route::post('store', [TravelGuideController::class,'store'])->name('store');
            Route::get('edit/{id}', [TravelGuideController::class, 'edit'])->name('edit');
            Route::post('update/{id}', [TravelGuideController::class, 'update'])->name('update');
            Route::post('delete/{id}', [TravelGuideController::class, 'delete'])->name('delete');
        });

        Route::prefix('searchServices')->name('searchServices.')->group(function (){
            Route::get('', [SearchServicesController::class,'index'])->name('index');
            Route::get('create', [SearchServicesController::class,'create'])->name('create');
            Route::post('store', [SearchServicesController::class,'store'])->name('store');
            Route::get('edit/{id}', [SearchServicesController::class, 'edit'])->name('edit');
            Route::post('update/{id}', [SearchServicesController::class, 'update'])->name('update');
            Route::post('delete/{id}', [SearchServicesController::class, 'delete'])->name('delete');
        });

        Route::prefix('businessContent')->name('businessContent.')->group(function (){
            Route::get('', [BusinessContentController::class,'index'])->name('index');
            Route::get('create', [BusinessContentController::class,'create'])->name('create');
            Route::post('store', [BusinessContentController::class,'store'])->name('store');
            Route::get('edit/{id}', [BusinessContentController::class, 'edit'])->name('edit');
            Route::post('update/{id}', [BusinessContentController::class, 'update'])->name('update');
            Route::post('delete/{id}', [BusinessContentController::class, 'delete'])->name('delete');
        });

        Route::prefix('businessIcon')->name('businessIcon.')->group(function (){
            Route::get('', [BusinessIconController::class,'index'])->name('index');
            Route::get('create', [BusinessIconController::class,'create'])->name('create');
            Route::post('store', [BusinessIconController::class,'store'])->name('store');
            Route::get('edit/{id}', [BusinessIconController::class, 'edit'])->name('edit');
            Route::post('update/{id}', [BusinessIconController::class, 'update'])->name('update');
            Route::post('delete/{id}', [BusinessIconController::class, 'delete'])->name('delete');
        });

        Route::prefix('technology')->name('technology.')->group(function (){
            Route::get('', [TechnologyControllerer::class,'index'])->name('index');
            Route::get('create', [TechnologyControllerer::class,'create'])->name('create');
            Route::post('store', [TechnologyControllerer::class,'store'])->name('store');
            Route::get('edit/{id}', [TechnologyControllerer::class, 'edit'])->name('edit');
            Route::post('update/{id}', [TechnologyControllerer::class, 'update'])->name('update');
            Route::post('delete/{id}', [TechnologyControllerer::class, 'delete'])->name('delete');
        });

        Route::prefix('support')->name('support.')->group(function (){
            Route::get('', [SupportController::class,'index'])->name('index');
            Route::get('create', [SupportController::class,'create'])->name('create');
            Route::post('store', [SupportController::class,'store'])->name('store');
            Route::get('edit/{id}', [SupportController::class, 'edit'])->name('edit');
            Route::post('update/{id}', [SupportController::class, 'update'])->name('update');
            Route::post('delete/{id}', [SupportController::class, 'delete'])->name('delete');
        });
    });

    //Giới thiệu ve Vinh Phuc
    Route::prefix('introduce_VP')->name('introduce_VP.')->group(function (){
        Route::prefix('introduce')->name('introduce.')->group(function (){
            Route::get('', [IntroduceVPController::class,'index'])->name('index');
            Route::get('create', [IntroduceVPController::class,'create'])->name('create');
            Route::post('store', [IntroduceVPController::class,'store'])->name('store');
            Route::get('edit/{id}', [IntroduceVPController::class, 'edit'])->name('edit');
            Route::post('update/{id}', [IntroduceVPController::class, 'update'])->name('update');
            Route::post('delete/{id}', [IntroduceVPController::class, 'delete']);
        });

        Route::prefix('geographical')->name('geographical.')->group(function (){
            Route::get('', [IntroduceVPController::class,'indexLocation'])->name('index');
            Route::get('create', [IntroduceVPController::class,'createLocation'])->name('create');
            Route::post('store', [IntroduceVPController::class,'storeLocation'])->name('store');
            Route::get('edit/{id}', [IntroduceVPController::class, 'editLocation'])->name('edit');
            Route::post('update/{id}', [IntroduceVPController::class, 'updateLocation'])->name('update');
            Route::post('delete/{id}', [IntroduceVPController::class, 'deleteLocation']);
        });

        Route::prefix('tradition')->name('tradition.')->group(function (){
            Route::get('', [IntroduceVPController::class,'indexTradition'])->name('index');
            Route::get('create', [IntroduceVPController::class,'createTradition'])->name('create');
            Route::post('store', [IntroduceVPController::class,'storeTradition'])->name('store');
            Route::get('edit/{id}', [IntroduceVPController::class, 'editTradition'])->name('edit');
            Route::post('update/{id}', [IntroduceVPController::class, 'updateTradition'])->name('update');
            Route::post('delete/{id}', [IntroduceVPController::class, 'deleteTradition']);
        });
    });
});
