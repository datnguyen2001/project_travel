<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\ArticlesReviewModel;
use App\Models\BoothModel;
use App\Models\CategoryBoothModel;
use App\Models\MultimediaFilesModel;
use Illuminate\Http\Request;

class ExploreStallController extends Controller
{
    public function explore(){
        $category = CategoryBoothModel::where('display', 1)->orderBy('index', 'asc')->get();
        $data_booth = BoothModel::where('is_active', 1)->orderBy('created_at', 'desc')->paginate(16);
        $booth_top = BoothModel::where('is_active', 1)->orderBy('created_at', 'desc')->where('type', 1)->paginate(8);
        $booth = BoothModel::where('is_active', 1)->orderBy('created_at', 'desc')->where('type', 2)->paginate(8);
        $articles_review = ArticlesReviewModel::where('category', 4)->where('display', 1)->orderBy('created_at', 'desc')->paginate(8);
        $category_booth = null;
        $title_banner = (object)[
            'title' => 'Gian hàng',
            'background' => 'images/explore-stall/gian-hang.png',
            'nav' => [
                (object)[
                    'title' => 'Trang chủ',
                    'link' => route('web.home'),
                    'active' => false
                ],
                (object)[
                    'title' => 'Gian hàng',
                    'link' => route('web.explore-stall'),
                    'active' => true
                ]
            ]
        ];
        return $this->check_mobile()
            ? view('web-mobile.explore-stall.explore-stall', compact('title_banner', 'booth', 'data_booth', 'category','booth_top', 'articles_review', 'category_booth'))
            : view('web.explore-stall.explore-stall', compact('title_banner', 'booth', 'data_booth', 'category','booth_top', 'articles_review', 'category_booth'));
    }

    public function detailStall($slug){
        $booth = BoothModel::where('slug', $slug)->where('is_active', 1)->first();
        if (empty($booth)){
            return back()->with(['error' => 'Gian hàng không tồn tại']);
        }
        $multimedia = MultimediaFilesModel::where('parent_id', $booth->id)->where('parent_type', 7)->get();
        $data_booth = BoothModel::where('id', '!=', $booth->id)->where('is_active', 1)->paginate(10);
        $title_banner = (object)[
            'title' => 'Chi tiết gian hàng',
            'background' => '../images/banner/banner-stall.png',
            'nav' => [
                (object)[
                    'title' => 'Trang chủ',
                    'link' => route('web.home'),
                    'active' => false
                ],
                (object)[
                    'title' => 'Gian hàng',
                    'link' => route('web.explore-stall'),
                    'active' => false
                ],
                (object)[
                    'title' => 'Chi tiết gian hàng',
                    'link' => route('web.explore-stall.detail',1),
                    'active' => true
                ],
            ]
        ];
        return $this->check_mobile()
            ? view('web-mobile.detail-stall.detail-stall', compact('title_banner','booth', 'multimedia', 'data_booth'))
            : view('web.detail-stall.detail-stall', compact('title_banner', 'booth', 'multimedia', 'data_booth'));
    }

    public function getImgRoom (Request $request)
    {
        try{
            $room = BoothModel::find($request->get('category_booth'));
            if (empty($room)){
                $data['status'] = false;
                $data['msg'] = 'Phòng không tồn tại';
                return $data;
            }
            $multimedia = MultimediaFilesModel::where('parent_id', $room->id)->where('parent_type', 7)->get();


            $view = view('web.detail-stall.img_room', compact('multimedia'))->render();
            return response()->json(['status' => true, 'prop' => $view]);
        }catch (\Exception $exception){
            $data['status'] = false;
            return $data;
        }
    }

    public function category ($id)
    {
        $category_booth = CategoryBoothModel::where('display', 1)->where('id', $id)->first();
        if (empty($category_booth)){
            return back()->with(['error' => 'Danh mục không tồn tại']);
        }
        $category = CategoryBoothModel::where('display', 1)->orderBy('index', 'asc')->get();
        $data_booth = BoothModel::where('is_active', 1)->orderBy('created_at', 'desc')->paginate(16);
        $booth_top = BoothModel::where('is_active', 1)->where('category_booth', $id)->orderBy('created_at', 'desc')->where('type', 1)->paginate(8);
        $booth = BoothModel::where('is_active', 1)->where('category_booth', $id)->orderBy('created_at', 'desc')->where('type', 2)->paginate(8);
        $articles_review = ArticlesReviewModel::where('category', 4)->where('display', 1)->orderBy('created_at', 'desc')->paginate(8);
        $title_banner = (object)[
            'title' => 'Gian hàng',
            'background' => 'images/explore-stall/gian-hang.png',
            'nav' => [
                (object)[
                    'title' => 'Trang chủ',
                    'link' => route('web.home'),
                    'active' => false
                ],
                (object)[
                    'title' => 'Gian hàng',
                    'link' => route('web.explore-stall'),
                    'active' => true
                ]
            ]
        ];
        return $this->check_mobile()
            ? view('web-mobile.explore-stall.explore-stall', compact('title_banner', 'booth', 'data_booth', 'category','booth_top', 'articles_review', 'category_booth'))
            : view('web.explore-stall.explore-stall', compact('title_banner', 'booth', 'data_booth', 'category','booth_top', 'articles_review', 'category_booth'));
//        return view('web.explore-stall.explore-stall', compact('title_banner', 'booth', 'data_booth', 'category','booth_top', 'articles_review', 'category_booth'));
    }
}
