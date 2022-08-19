<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\ArticlesReviewModel;
use App\Models\ArticlesTouristModel;
use App\Models\CategoryTouristModel;
use Illuminate\Http\Request;
use App\Models\MultimediaFilesModel;

class TourController extends Controller
{
    public function tour(){
        $category = CategoryTouristModel::where('display', 1)->orderBy('index', 'asc')->get();
        $category_id = null;
        if (count($category)){
            foreach ($category as $key => $value){
                if ($key == 0){
                    $category_id = $value->id;
                }
            }
        }
        $category_travel = CategoryTouristModel::find($category_id);
        $multimedia = MultimediaFilesModel::where('parent_id', $category_id)->where('parent_type', 8)->get();
        $articles_review = ArticlesReviewModel::where('category', 5)->where('display', 1)->where('category_id', $category_id)->paginate(6);
        $title_banner = (object)[
            'title' => 'Địa điểm du lịch',
            'background' => 'images/travelling/du-lich.png',
            'nav' => [
                (object)[
                    'title' => 'Trang chủ',
                    'link' => route('web.home'),
                    'active' => false
                ],
                (object)[
                    'title' => 'Địa điểm du lịch',
                    'link' => route('web.travelling'),
                    'active' => true
                ]
            ]
        ];
        return $this->check_mobile()
            ? view('web-mobile.tour.tour', compact('title_banner', 'category', 'category_travel', 'multimedia', 'articles_review'))
            : view('web.tour.tour', compact('title_banner', 'category', 'category_travel', 'multimedia', 'articles_review'));
    }

    public function category ($id)
    {
        $category = CategoryTouristModel::where('display', 1)->orderBy('index', 'asc')->get();
        $category_travel = CategoryTouristModel::find($id);
        if (empty($category_travel)){
            return back()->with(['error' => 'danh mục không tồn tại']);
        }
        $multimedia = MultimediaFilesModel::where('parent_id', $id)->where('parent_type', 8)->get();
        $articles_review = ArticlesReviewModel::where('category', 5)->where('display', 1)->where('category_id', $id)->paginate(6);
        $title_banner = (object)[
            'title' => 'Địa điểm du lịch',
            'background' => 'images/travelling/du-lich.png',
            'nav' => [
                (object)[
                    'title' => 'Trang chủ',
                    'link' => route('web.home'),
                    'active' => false
                ],
                (object)[
                    'title' => 'Địa điểm du lịch',
                    'link' => route('web.tour'),
                    'active' => true
                ]
            ]
        ];
        return $this->check_mobile()
            ? view('web-mobile.tour.tour', compact('title_banner', 'category', 'category_travel', 'multimedia', 'articles_review'))
            : view('web.tour.tour', compact('title_banner', 'category', 'category_travel', 'multimedia', 'articles_review'));
    }

    public function getImgRoom (Request $request)
    {
        try{
            $room = CategoryTouristModel::find($request->get('id'));
            if (empty($room)){
                $data['status'] = false;
                $data['msg'] = 'phong không tồn tại';
                return $data;
            }
            $multimedia = MultimediaFilesModel::where('parent_id', $room->id)->where('parent_type', 8)->get();
            $view = view('web.tour.img_room', compact('multimedia'))->render();
            return response()->json(['status' => true, 'prop' => $view]);
        }catch (\Exception $exception){
            $data['status'] = false;
            return $data;
        }
    }
}
