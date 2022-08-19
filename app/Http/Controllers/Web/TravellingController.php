<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\ArticlesReviewModel;
use App\Models\CategoryBookingModel;
use App\Models\CategoryTravelModel;
use App\Models\MultimediaFilesModel;
use Illuminate\Http\Request;

class TravellingController extends Controller
{
    public function travelling(){
        $category = CategoryTravelModel::where('display', 1)->orderBy('index', 'asc')->get();
        $category_id = null;
        if (count($category)){
            foreach ($category as $key => $value){
                if ($key == 0){
                    $category_id = $value->id;
                }
            }
        }
        $category_travel = CategoryTravelModel::find($category_id);
        $multimedia = MultimediaFilesModel::where('parent_id', $category_id)->where('parent_type', 5)->get();
        $articles_review = ArticlesReviewModel::where('category', 1)->where('display', 1)->where('category_id', $category_id)->paginate(6);
        $title_banner = (object)[
            'title' => 'Du lịch',
            'background' => 'images/travelling/du-lich.png',
            'nav' => [
                (object)[
                    'title' => 'Trang chủ',
                    'link' => route('web.home'),
                    'active' => false
                ],
                (object)[
                    'title' => 'Du lịch',
                    'link' => route('web.travelling'),
                    'active' => true
                ]
            ]
        ];
        return $this->check_mobile()
            ? view('web-mobile.travelling.travelling', compact('title_banner', 'category', 'category_travel', 'multimedia', 'articles_review'))
            : view('web.travelling.travelling', compact('title_banner', 'category', 'category_travel', 'multimedia', 'articles_review'));
    }

    public function category ($id)
    {
        $category = CategoryTravelModel::where('display', 1)->orderBy('index', 'asc')->get();
        $category_travel = CategoryTravelModel::find($id);
        if (empty($category_travel)){
            return back()->with(['error' => 'danh mục không tồn tại']);
        }
        $multimedia = MultimediaFilesModel::where('parent_id', $id)->where('parent_type', 5)->get();
        $articles_review = ArticlesReviewModel::where('category', 1)->where('display', 1)->where('category_id', $id)->paginate(6);
        $title_banner = (object)[
            'title' => 'Du lịch',
            'background' => 'images/travelling/du-lich.png',
            'nav' => [
                (object)[
                    'title' => 'Trang chủ',
                    'link' => route('web.home'),
                    'active' => false
                ],
                (object)[
                    'title' => 'Du lịch',
                    'link' => route('web.travelling'),
                    'active' => true
                ]
            ]
        ];
        return $this->check_mobile()
            ? view('web-mobile.travelling.travelling', compact('title_banner', 'category', 'category_travel', 'multimedia', 'articles_review'))
            : view('web.travelling.travelling', compact('title_banner', 'category', 'category_travel', 'multimedia', 'articles_review'));
    }

    public function getImgRoom (Request $request)
    {
        try{
            $room = CategoryTravelModel::find($request->get('id'));
            if (empty($room)){
                $data['status'] = false;
                $data['msg'] = 'phong không tồn tại';
                return $data;
            }
            $multimedia = MultimediaFilesModel::where('parent_id', $room->id)->where('parent_type', 5)->get();
            $view = view('web.travelling.img_room', compact('multimedia'))->render();
            return response()->json(['status' => true, 'prop' => $view]);
        }catch (\Exception $exception){
            $data['status'] = false;
            return $data;
        }
    }
}
