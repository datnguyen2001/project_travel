<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\ArticlesReviewModel;
use App\Models\CategoryCulinaryModel;
use App\Models\CulinaryModel;
use App\Models\MultimediaFilesModel;
use App\Models\RestaurantCulinaryModel;
use App\Models\RestaurantModel;
use Illuminate\Http\Request;

class CulinaryController extends Controller
{
    public function index()
    {
        $category_id = null;
        $category = CategoryCulinaryModel::where('display', 1)->orderBy('index', 'asc')->get();
        $culinary_specialties = CulinaryModel::where('type', 1)->where('is_active', 1)->limit(8)->get();
        $culinary = CulinaryModel::where('type', 2)->where('is_active', 1)->limit(8)->get();
        $data_culinary = CulinaryModel::where('is_active', 1)->orderBy('created_at', 'desc')->paginate(24);
        $articles_review = ArticlesReviewModel::where('category', 3)->where('display', 1)->orderBy('created_at', 'desc')->limit(6)->get();
        $title_banner = (object)[
            'title' => 'Khám phá ẩm thực',
            'background' => 'images/banner/am-thuc.png',
            'nav' => [
                (object)[
                    'title' => 'Trang chủ',
                    'link' => route('web.home'),
                    'active' => false
                ],
                (object)[
                    'title' => 'Khám phá ẩm thực',
                    'link' => route('web.culinary'),
                    'active' => true
                ]
            ]
        ];
        return $this->check_mobile()
            ? view('web-mobile.culinary_discovery.index',compact('title_banner', 'category_id', 'category', 'culinary', 'culinary_specialties', 'data_culinary', 'articles_review'))
            : view('web.culinary_discovery.index', compact('title_banner', 'category_id', 'category', 'culinary', 'culinary_specialties', 'data_culinary', 'articles_review'));
    }

    public function category ($id)
    {
        $category_culinary = CategoryCulinaryModel::where('display', 1)->where('id', $id)->first();
        if (empty($category_culinary)){
            return back()->with(['error' => 'Danh mục không tồn tại']);
        }
        $category_id = $id;
        $category = CategoryCulinaryModel::where('display', 1)->orderBy('index', 'asc')->get();
        $culinary_specialties = CulinaryModel::where('type', 1)->where('category_culinary', $id)->where('is_active', 1)->limit(8)->get();
        $culinary = CulinaryModel::where('type', 2)->where('category_culinary', $id)->where('is_active', 1)->limit(8)->get();
        $data_culinary = CulinaryModel::where('is_active', 1)->orderBy('created_at', 'desc')->paginate(24);
        $articles_review = ArticlesReviewModel::where('category', 3)->where('display', 1)->orderBy('created_at', 'desc')->limit(6)->get();
        $title_banner = (object)[
            'title' => 'Khám phá ẩm thực',
            'background' => 'images/banner/am-thuc.png',
            'nav' => [
                (object)[
                    'title' => 'Trang chủ',
                    'link' => route('web.home'),
                    'active' => false
                ],
                (object)[
                    'title' => 'Khám phá ẩm thực',
                    'link' => route('web.culinary'),
                    'active' => true
                ]
            ]
        ];

        return $this->check_mobile()
            ? view('web-mobile.culinary_discovery.index',compact('title_banner', 'category_id', 'category', 'culinary', 'culinary_specialties', 'data_culinary', 'articles_review'))
            : view('web.culinary_discovery.index', compact('title_banner', 'category_id', 'category', 'culinary', 'culinary_specialties', 'data_culinary', 'articles_review'));
    }

    public function detailCulinary($id){
        $culinary = CulinaryModel::find($id);
        if (empty($culinary)){
            return back()->withErrors(['error' => 'Âmr thực không tồn tại']);
        }
        $multimedia = MultimediaFilesModel::where('parent_id', $id)->where('parent_type', 1)->get();
        $restaurant_culinary = RestaurantCulinaryModel::where('culinary_id', $id)->orderBy('top', 'desc')->get();
        if (count($restaurant_culinary)){
            foreach ($restaurant_culinary as $value){
                $value->restaurant = RestaurantModel::find($value->restaurant_id);
            }
        }
        $related_dishes = CulinaryModel::where('category_culinary', $culinary->category_culinary)->where('id', '!=', $culinary->id)->get();
        if (count($related_dishes)){
            foreach ($related_dishes as $value){
                $restaurant = RestaurantModel::join('restaurant_culinary', 'restaurant_culinary.restaurant_id', 'restaurant.id')->select('restaurant.*')
                    ->where('restaurant_culinary.culinary_id', $value->id)->where('restaurant_culinary.top', 1)->first();
                $value->restaurant = $restaurant;
            }
        }
        $title_banner = (object)[
            'title' => 'Chi tiết ẩm thực',
            'background' => '../images/banner/detail-new.png',
            'nav' => [
                (object)[
                    'title' => 'Khám phá ẩm thực',
                    'link' => route('web.culinary'),
                    'active' => false
                ],
                (object)[
                    'title' => 'Chi tiết ẩm thực',
                    'link' => route('web.culinary.detail',1),
                    'active' => true
                ],
            ]
        ];
        return $this->check_mobile()
            ? view('web-mobile.detail-culinary.detail-culinary',compact('title_banner','culinary', 'multimedia', 'restaurant_culinary', 'related_dishes'))
            : view('web.detail-culinary.detail-culinary', compact('title_banner', 'culinary', 'multimedia', 'restaurant_culinary', 'related_dishes'));
    }

    public function getImgRoom (Request $request)
    {
        try{
            $room = CulinaryModel::find($request->get('category_culinary'));
            if (empty($room)){
                $data['status'] = false;
                $data['msg'] = 'Món ăn không tồn tại';
                return $data;
            }
            $multimedia = MultimediaFilesModel::where('parent_id', $room->id)->where('parent_type', 1)->get();
            $view = view('web.detail-culinary.img_room', compact('multimedia'))->render();
            return response()->json(['status' => true, 'prop' => $view]);
        }catch (\Exception $exception){
            $data['status'] = false;
            return $data;
        }
    }
}
