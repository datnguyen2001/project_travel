<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\BookTourModel;
use App\Models\CategoryTourModel;
use App\Models\HotelModel;
use App\Models\MultimediaFilesModel;
use App\Models\RoomConvenientModel;
use App\Models\RoomHotelModel;
use App\Models\TourAreaModel;
use App\Models\TravelArticlesModel;
use Illuminate\Http\Request;

class TouringController extends Controller
{
    public function index(Request $request){
        $category = CategoryTourModel::where('display', 1)->orderBy('index', 'asc')->get();
        $hotel = TourAreaModel::query();
        $hotel = $this->filter($hotel,$request);
        $hotel = $hotel->where('active', 1)->orderBy('created_at', 'desc')->get();
        $travel_articles = TravelArticlesModel::where('type', 2)->where('display', 1)->orderBy('index', 'asc')->limit(3)->get();
        $title_banner = (object)[
            'title' => 'Touring',
            'background' => 'images/banner/booking.png',
            'nav' => [
                (object)[
                    'title' => 'Trang chủ',
                    'link' => route('web.home'),
                    'active' => false
                ],
                (object)[
                    'title' => 'Touring',
                    'link' => route('web.touring.index'),
                    'active' => true
                ]
            ]
        ];
        $data['category'] = $category;
        $data['category_hotel'] = null;
        $data['hotel'] = $hotel;
        $data['title_banner'] = $title_banner;
        $data['urlk'] = 'touring';
        $data['travel_articles'] = $travel_articles;
        return $this->check_mobile()
            ? view('web-mobile.booking.booking',$data)
            : view('web.touring.booking',$data);
    }

    public function detailTouring($slug){
        $hotel = TourAreaModel::where('slug', $slug)->where('active', 1)->first();
        if (empty($hotel)){
            return back()->withErrors(['error' => 'Touring không tồn tại ']);
        }
        $multimedia = MultimediaFilesModel::where('parent_id', $hotel->id)->where('parent_type', 10)->get();
        $proposal_room = TourAreaModel::where('category', $hotel->category)->whereNotIn('id', [$hotel->id])->where('active', 1)->get();
        $title_banner = (object)[
            'title' => 'Chi tiết touring',
            'background' => '../images/detail-booking/banner.png',
            'nav' => [
                (object)[
                    'title' => 'Trang chủ',
                    'link' => route('web.home'),
                    'active' => false
                ],
                (object)[
                    'title' => 'Touring',
                    'link' => route('web.touring.index'),
                    'active' => false
                ],
                (object)[
                    'title' => 'Chi tiết touring',
                    'link' => route('web.booking.detail',1),
                    'active' => true
                ]
            ]
        ];
        $is_detail_booking = true;
        return $this->check_mobile()
            ? view('web-mobile.detail-touring.detail-bokking',compact('title_banner','is_detail_booking','hotel', 'multimedia', 'proposal_room'))
            : view('web.detail-touring.detail',compact('title_banner','is_detail_booking','hotel', 'multimedia', 'proposal_room'));
    }

    public function category ($slug, Request $request)
    {
        $category_hotel = CategoryTourModel::where('slug', $slug)->where('display', 1)->first();
        if (empty($category_hotel)){
            return back()->withErrors(['error' => 'Danh mục không tồn tại ']);
        }
        $category = CategoryTourModel::where('display', 1)->orderBy('index', 'asc')->get();
        $hotel = TourAreaModel::query();
        $hotel = $this->filter($hotel,$request);
        $hotel = $hotel->where('active', 1)->where('category', $category_hotel->id)->get();
//        $articles_review = ArticlesReviewModel::where('display', 1)->where('category', 2)->orderBy('created_at', 'desc')->limit(6)->get();
        $travel_articles = TravelArticlesModel::where('type', 2)->where('display', 1)->orderBy('index', 'asc')->limit(3)->get();
        $title_banner = (object)[
            'title' => 'Touring',
            'background' => 'images/banner/booking.png',
            'nav' => [
                (object)[
                    'title' => 'Trang chủ',
                    'link' => route('web.home'),
                    'active' => false
                ],
                (object)[
                    'title' => 'Touring',
                    'link' => route('web.touring.index'),
                    'active' => true
                ]
            ]
        ];
        $data['category_hotel'] = $category_hotel;
        $data['category'] = $category;
        $data['hotel'] = $hotel;
        $data['title_banner'] = $title_banner;
        $data['urlk'] = 'touring/category/'.$category_hotel->slug;
//        $data['articles_review'] = $articles_review;
        $data['travel_articles'] = $travel_articles;
        return $this->check_mobile()
            ? view('web-mobile.booking.booking',$data)
            : view('web.touring.booking',$data);
    }

    protected function filter ($hotel, $request){
        $key_search = $request->get('key_search');
        $price = $request->get('price-from');
        $price_2 = $request->get('price-to');
        $star = $request->get('star');
        if (isset($key_search)){
            $hotel = $hotel->where('name', 'like', '%'.$key_search.'%');
        }
        if (isset($price)){
            $hotel = $hotel->where('price', '<=', str_replace(",", "", $price_2))->where('price', '>=', str_replace(",", "", $price));
        }
        if (isset($star)){
            $hotel = $hotel->whereIn('rating',  $star);
        }
        return $hotel;
    }

    public function getImgRoom (Request $request)
    {
        try{
            $multimedia = MultimediaFilesModel::where('parent_id', $request->get('room_id'))->where('parent_type', $request->get('parent_id'))->get();
            if (count($multimedia) < 1){
                $data['status'] = false;
                $data['msg'] = 'tour không tồn tại';
                return $data;
            }
            $view = view('web.touring.img_room', compact('multimedia'))->render();
            return response()->json(['status' => true, 'prop' => $view]);
        }catch (\Exception $exception){
            $data['status'] = false;
            return $data;
        }
    }

    public function bookHotel (Request $request, $id)
    {
        try{
            $validator = \Illuminate\Support\Facades\Validator::make($request->all(), [
                'name' => 'required',
                'phone' => 'required|regex:/(0)[0-9]/|not_regex:/[a-z]/|min:10|max:11',
            ], [
                'name.required' => 'Vui lòng điền tên người dùng',
                'phone.required' => 'Vui lòng điền số điện thoại người dùng',
                'phone.regex' => 'Số điện thoại không đúng',
            ]);
            if ($validator->fails()) {
                return back()->with(['booking_error' => $validator->errors()->first()]);
            }
            $hotel = TourAreaModel::find($id);
            if (empty($hotel)){
                return back()->with(['booking_error' => 'Phòng không tồn tại']);
            }
            $book_room = new BookTourModel([
                'name_customer' => $request->get('name'),
                'phone_customer' => $request->get('phone'),
                'email_customer' => isset($request->email) ? $request->get('email') : null,
                'name_tour' => $hotel->name,
                'phone_tour' => isset($hotel) ? $hotel->phone : 000000,
            ]);
            $book_room->save();
            return back()->with(['booking_success' => 'Đặt tour thành công. Chúng tôi sẽ liên hệ tới bạn sớm nhất có thể']);
        }catch (\Exception $exception){
            return back()->with(['booking_error' => $exception->getMessage()]);
        }
    }

    public function showTour(Request $request)
    {
        try {
            $hotel = TourAreaModel::find($request->get('hotel_id'));
            if (empty($hotel)) {
                $data['status'] = false;
                $data['msg'] = 'Tour không tồn tại';
                return $data;
            }
            $view = view('web.touring.form_booking_hotel', compact('hotel'))->render();
            return response()->json(['status' => true, 'prop' => $view]);
        } catch (\Exception $exception) {
            $data['status'] = false;
            $data['msg'] = $exception->getMessage();
            return $data;
        }
    }
}
