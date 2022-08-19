<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\AppDescribeModel;
use App\Models\BannerappModel;
use App\Models\BannerDescriptionModel;
use App\Models\BannerModel;
use App\Models\BoothModel;
use App\Models\BusinessContentModel;
use App\Models\BusinessIconModel;
use App\Models\CategoryTourismModel;
use App\Models\CategoryTouristModel;
use App\Models\CulinaryModel;
use App\Models\GeographicalLocationModel;
use App\Models\HotelModel;
use App\Models\IntroduceVPModel;
use App\Models\RestaurantCulinaryModel;
use App\Models\RestaurantModel;
use App\Models\SearchServiceModel;
use App\Models\SupperAppModel;
use App\Models\SupportModel;
use App\Models\TechnologyModelModel;
use App\Models\TitlefeatursModel;
use App\Models\TraditionPeopleModel;
use App\Models\TravelArticlesModel;
use App\Models\TravelGuideModel;
use App\Models\User;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(){
        $banner = BannerModel::where('display', 1)->orderBy('index', 'asc')->get();
        $bannerDescription= BannerDescriptionModel::where('display', 1)->orderBy('index', 'asc')->get();
        $appDescription = AppDescribeModel::where('display', 1)->orderBy('index', 'asc')->get();
        $culinary = CulinaryModel::where('is_active', 1)->orderBy('created_at', 'desc')->limit(4)->get();
        if (count($culinary)){
            foreach ($culinary as $value){
                $restaurant_culinary = RestaurantCulinaryModel::where('culinary_id', $value->id)->where('top', 1)->first();
                if (isset($restaurant_culinary)){
                    $restaurant = RestaurantModel::find($restaurant_culinary->restaurant_id);
                    if (isset($restaurant)){
                        $value->restaurant = $restaurant;
                    }else{
                        $value->restaurant = null;
                    }
                }else{
                    $value->restaurant = null;
                }
            }
        }
        $hotel = HotelModel::orderBy('created_at', 'desc')->limit(4)->get();
        $category_tourism = CategoryTourismModel::where('display', 1)->orderBy('index', 'asc')->where('type', 1)->limit(4)->get();
        if (count($category_tourism)){
            foreach ($category_tourism as $value){
                $value->travel_articles = TravelArticlesModel::where('display', 1)->where('type', 1)->where('category', $value->id)->orderBy('index', 'asc')->limit(8)->get();
            }
        }
        $category_culinary = CategoryTourismModel::where('display', 1)->orderBy('index', 'asc')->where('type', 2)->limit(4)->get();
        if (count($category_culinary)){
            foreach ($category_culinary as $value){
                $value->travel_articles = TravelArticlesModel::where('display', 1)->where('type', 1)->where('category', $value->id)->orderBy('index', 'asc')->limit(8)->get();
            }
        }
        $category_news = CategoryTourismModel::where('display', 1)->orderBy('index', 'asc')->where('type', 3)->get();
        $id_category = [];
        if (count($category_news)){
            foreach ($category_news as $value){
                array_push($id_category, $value->id);
            }
        }
        $latest_news = TravelArticlesModel::where('display', 1)->where('type', 1)->whereIn('category', array_unique($id_category))->orderBy('index', 'asc')->limit(5)->get();
        $booth = BoothModel::where('is_active', 1)->orderBy('created_at', 'desc')->limit(4)->get();
        $introduce = IntroduceVPModel::where('display', 1)->limit(1)->get();
        $geographical = GeographicalLocationModel::where('display', 1)->limit(1)->get();
        $tradition = TraditionPeopleModel::where('display', 1)->limit(1)->get();

        $is_home = true;
        $category = CategoryTouristModel::where('display', 1)->orderBy('index', 'asc')->get();
        $data['banner'] = $banner;
        $data['bannerDescription'] = $bannerDescription;
        $data['appDescription'] = $appDescription;
        $data['is_home'] = $is_home;
        $data['culinary'] = $culinary;
        $data['hotel'] = $hotel;
        $data['category_tourism'] = $category_tourism;
        $data['category_culinary'] = $category_culinary;
        $data['latest_news'] = $latest_news;
        $data['booth'] = $booth;
        $data['introduce'] = $introduce;
        $data['geographical'] = $geographical;
        $data['tradition'] = $tradition;
        $data['category'] = $category;
        if ($this->check_mobile()){
            return view('web-mobile.index',$data);
        }else{
            return view('web.index',$data);
        }
    }

    public function introduce(){
        $title_banner = (object)[
            'title' => 'Giới thiệu',
            'background' => 'images/banner/banner-introduce.png',
            'nav' => [
                (object)[
                    'title' => 'Trang chủ',
                    'link' => route('web.home'),
                    'active' => false
                ],
                (object)[
                    'title' => 'Giới thiệu',
                    'link' => route('web.introduce'),
                    'active' => true
                ]
            ]
        ];
        $bannerApp = BannerappModel::all();
        $titlefeaturs = TitlefeatursModel::where('display', 1)->orderBy('index', 'asc')->get();
        $superApp = SupperAppModel::where('display', 1)->orderBy('index', 'asc')->get();
        $bannerDescription= BannerDescriptionModel::where('display', 1)->orderBy('index', 'asc')->get();
        $appDescription = AppDescribeModel::where('display', 1)->orderBy('index', 'asc')->get();
        $travelGuide= TravelGuideModel::where('display', 1)->orderBy('index', 'asc')->get();
        $searchSevice= SearchServiceModel::where('display', 1)->orderBy('index', 'asc')->get();
        $businessContent= BusinessContentModel::where('display', 1)->orderBy('index', 'asc')->get();
        $businessIcon= BusinessIconModel::where('display', 1)->orderBy('index', 'asc')->get();
        $technology= TechnologyModelModel::where('display', 1)->orderBy('index', 'asc')->get();
        $support= SupportModel::where('display', 1)->orderBy('index', 'asc')->get();



        return $this->check_mobile()
            ? view('web-mobile.introduce.introduce',compact('title_banner','bannerApp','titlefeaturs','superApp','bannerDescription','appDescription','travelGuide','searchSevice','businessContent','businessIcon','technology','support'))
            : view('web.introduce.introduce',compact('title_banner','bannerApp','titlefeaturs','superApp','bannerDescription','appDescription','travelGuide','searchSevice','businessContent','businessIcon','technology','support'));
    }
}
