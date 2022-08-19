<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\ArticlesReviewModel;
use App\Models\CategoryTourismModel;
use App\Models\GeographicalLocationModel;
use App\Models\IntroduceVPModel;
use App\Models\MultimediaFilesModel;
use App\Models\TraditionPeopleModel;
use App\Models\TravelArticlesModel;
use Illuminate\Http\Request;

class NewsController extends Controller
{
    public function index()
    {
        $title_banner = (object)[
            'title' => 'Tin tức nổi bật',
            'background' => 'images/banner/news.png',
            'nav' => [
                (object)[
                    'title' => 'Trang chủ',
                    'link' => route('web.home'),
                    'active' => false
                ],
                (object)[
                    'title' => 'Tin tức nổi bật',
                    'link' => route('web.news'),
                    'active' => true
                ]
            ]
        ];
        return view('web.news.index', compact('title_banner'));
    }

    public function detailNew($slug)
    {
        $travel_articles = TravelArticlesModel::where('display', 1)->where('slug', $slug)->first();
        if (empty($travel_articles)){
            return back()->withErrors(['error' => 'Bài viết không tồn tại']);
        }
        $multimedia = MultimediaFilesModel::where('parent_id', $travel_articles->id)->where('parent_type', 3)->get();
        $related_posts = TravelArticlesModel::where('display', 1)->where('category', $travel_articles->category)->whereNotIn('id', [$travel_articles->id])->limit(3)->get();
        $title_banner = (object)[
            'title' => 'Chi tiết bài viết',
            'background' => '../images/banner/detail-new.png',
            'nav' => [
                (object)[
                    'title' => 'Tin tức',
                    'link' => route('web.news'),
                    'active' => false
                ],
                (object)[
                    'title' => 'Chi tiết bài viết',
                    'link' => route('web.news.detail', 1),
                    'active' => true
                ],
            ]
        ];
        return $this->check_mobile()
            ? view('web-mobile.detail-new.detail-new', compact('title_banner', 'travel_articles', 'multimedia', 'related_posts'))
            : view('web.detail-new.detail-new', compact('title_banner', 'travel_articles', 'multimedia', 'related_posts'));
    }

    public function getImgRoom (Request $request)
    {
        try{
            $room = TravelArticlesModel::find($request->get('category'));
            if (empty($room)){
                $data['status'] = false;
                $data['msg'] = 'phong không tồn tại';
                return $data;
            }
            $multimedia = MultimediaFilesModel::where('parent_id', $room->id)->where('parent_type', 3)->get();
            $view = view('web.detail-new.img_room', compact('multimedia'))->render();
            return response()->json(['status' => true, 'prop' => $view]);
        }catch (\Exception $exception){
            $data['status'] = false;
            return $data;
        }
    }
    public function featuredNews (Request $request)
    {
        $featured_news = TravelArticlesModel::join('category_tourism', 'category_tourism.id', '=', 'travel_articles.category')->select('travel_articles.*')
            ->where('category_tourism.type', 3)->paginate(3);
        $view = view('web.news.data_items', compact('featured_news'))->render();
        return response()->json(['prop' => $view]);
    }

    public function exploreTourism (Request $request)
    {
        $featured_news = TravelArticlesModel::join('category_tourism', 'category_tourism.id', '=', 'travel_articles.category')->select('travel_articles.*')
            ->where('category_tourism.type', 1)->paginate(6);
        $view = view('web.news.data_items', compact('featured_news'))->render();
        return response()->json(['prop' => $view]);
    }

    public function exploreCulinary (Request $request)
    {
        $featured_news = TravelArticlesModel::join('category_tourism', 'category_tourism.id', '=', 'travel_articles.category')->select('travel_articles.*')
            ->where('category_tourism.type', 2)->paginate(6);
        $view = view('web.news.data_items', compact('featured_news'))->render();
        return response()->json(['prop' => $view]);
    }

    public function review ($slug)
    {
        $travel_articles  = ArticlesReviewModel::where('slug', $slug)->where('display', 1)->first();
        if (empty($travel_articles)){
            return back()->with(['error' => 'Bài viết không tồn taị']);
        }
        $multimedia = MultimediaFilesModel::where('parent_id', $travel_articles->id)->where('parent_type', 6)->get();
        $data_articles = ArticlesReviewModel::where('id', '!=', $travel_articles->id)->where('display', 1)->limit(3)->get();
        $title_banner = (object)[
            'title' => 'Đánh giá và review',
            'background' => '../images/banner/detail-new.png',
            'nav' => [
                (object)[
                    'title' => 'Trang chủ',
                    'link' => route('web.news'),
                    'active' => false
                ],
                (object)[
                    'title' => 'Ẩm thực',
                    'link' => route('web.news.detail2', 1),
                    'active' => true
                ],
                (object)[
                    'title' => 'Đánh giá và review',
                    'link' => route('web.news.detail2', 1),
                    'active' => true
                ],
            ]
        ];
        return view('web.detail-new.detail-new-review', compact('title_banner', 'multimedia', 'travel_articles', 'data_articles'));
    }

    public function detailNewsCulinary(){
        $title_banner = (object)[
            'title' => 'Chi tiết bài viết ẩm thực',
            'background' => 'images/banner/news.png',
            'nav' => [
                (object)[
                    'title' => 'Trang chủ',
                    'link' => route('web.home'),
                    'active' => false
                ],
                (object)[
                    'title' => 'Ẩm thực',
                    'link' => route('web.culinary'),
                    'active' => false
                ],
                (object)[
                    'title' => 'Chi tiết bài viết',
                    'link' => null,
                    'active' => true
                ]
            ]
        ];
        return view('web.detail-news-culinary.detail-news-culinary', compact('title_banner'));
    }

    public function detailNewsTravelExperience(){
        $title_banner = (object)[
            'title' => 'Kinh nghiệm du lịch',
            'background' => 'images/banner/news.png',
            'nav' => [
                (object)[
                    'title' => 'Trang chủ',
                    'link' => route('web.home'),
                    'active' => false
                ],
                (object)[
                    'title' => 'Khám phá du lịch',
                    'link' => route('web.travelling'),
                    'active' => false
                ],
                (object)[
                    'title' => 'Kinh nghiệm du lịch',
                    'link' => null,
                    'active' => true
                ]
            ]
        ];
        return view('web.detail-news-travel-experience.detail-news-travel-experience', compact('title_banner'));
    }

    public function introduce(){
        $category_tourism = CategoryTourismModel::where('display', 1)->orderBy('index', 'asc')->where('type', 1)->limit(1)->get();
        if (count($category_tourism)){
            foreach ($category_tourism as $value){
                $value->travel_articles = TravelArticlesModel::where('display', 1)->where('type', 1)->where('category', $value->id)->orderBy('index', 'asc')->limit(3)->get();
            }
        }
        $introduce = IntroduceVPModel::where('display', 1)->limit(1)->get();
        $title_banner = (object)[
            'title' => 'Chi tiết bài viết',
            'background' => '../images/banner/detail-new.png',
            'nav' => [
                (object)[
                    'title' => 'Trang chủ',
                    'link' => route('web.home'),
                    'active' => false
                ],
                (object)[
                    'title' => 'Giới thiệu về Vĩnh Phúc',
                    'link' => route('web.news.introduce'),
                    'active' => true
                ],
            ]
        ];
        return view('web.detail-new.detail-new-1', compact('title_banner','introduce','category_tourism'));
    }

    public function geographicalLocation(){
        $category_tourism = CategoryTourismModel::where('display', 1)->orderBy('index', 'asc')->where('type', 1)->limit(1)->get();
        if (count($category_tourism)){
            foreach ($category_tourism as $value){
                $value->travel_articles = TravelArticlesModel::where('display', 1)->where('type', 1)->where('category', $value->id)->orderBy('index', 'asc')->limit(3)->get();
            }
        }
        $geographical = GeographicalLocationModel::where('display', 1)->limit(1)->get();
        $title_banner = (object)[
            'title' => 'Chi tiết bài viết',
            'background' => '../images/banner/detail-new.png',
            'nav' => [
                (object)[
                    'title' => 'Trang chủ',
                    'link' => route('web.home'),
                    'active' => false
                ],
                (object)[
                    'title' => 'Vị trí địa lí',
                    'link' => route('web.news.geographical-location'),
                    'active' => true
                ],
            ]
        ];
        return view('web.detail-new.detail-new-2', compact('title_banner','geographical','category_tourism'));
    }

    public function traditionAndPeople(){
        $category_tourism = CategoryTourismModel::where('display', 1)->orderBy('index', 'asc')->where('type', 1)->limit(1)->get();
        if (count($category_tourism)){
            foreach ($category_tourism as $value){
                $value->travel_articles = TravelArticlesModel::where('display', 1)->where('type', 1)->where('category', $value->id)->orderBy('index', 'asc')->limit(3)->get();
            }
        }
        $tradition = TraditionPeopleModel::where('display', 1)->limit(1)->get();
        $title_banner = (object)[
            'title' => 'Chi tiết bài viết',
            'background' => '../images/banner/detail-new.png',
            'nav' => [
                (object)[
                    'title' => 'Trang chủ',
                    'link' => route('web.home'),
                    'active' => false
                ],
                (object)[
                    'title' => 'Truyền thống & con người',
                    'link' => route('web.news.tradition'),
                    'active' => true
                ],
            ]
        ];
        return view('web.detail-new.detail-new-3', compact('title_banner','tradition','category_tourism'));
    }
}
