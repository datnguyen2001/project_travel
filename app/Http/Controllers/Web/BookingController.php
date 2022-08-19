<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\ArticlesReviewModel;
use App\Models\BookRoomModel;
use App\Models\CategoryBookingModel;
use App\Models\ConvenientModel;
use App\Models\HotelModel;
use App\Models\MultimediaFilesModel;
use App\Models\RoomConvenientModel;
use App\Models\RoomHotelModel;
use App\Models\TravelArticlesModel;
use Illuminate\Http\Request;

class BookingController extends Controller
{
    public function index(Request $request){
        $category = CategoryBookingModel::where('display', 1)->orderBy('index', 'asc')->get();
        $hotel = HotelModel::query();
        $hotel = $this->filter($hotel,$request);
        $hotel = $hotel->where('active', 1)->orderBy('created_at', 'desc')->get();
        $articles_review = ArticlesReviewModel::where('display', 1)->where('category', 2)->orderBy('created_at', 'desc')->limit(6)->get();
        $travel_articles = TravelArticlesModel::where('type', 2)->where('display', 1)->orderBy('index', 'asc')->limit(3)->get();
        $title_banner = (object)[
            'title' => 'Booking',
            'background' => 'images/banner/booking.png',
            'nav' => [
                (object)[
                    'title' => 'Trang chủ',
                    'link' => route('web.home'),
                    'active' => false
                ],
                (object)[
                    'title' => 'Booking',
                    'link' => route('web.booking.index'),
                    'active' => true
                ]
            ]
        ];
        $data['category'] = $category;
        $data['category_hotel'] = null;
        $data['hotel'] = $hotel;
        $data['title_banner'] = $title_banner;
        $data['url'] = 'booking';
        $data['articles_review'] = $articles_review;
        $data['travel_articles'] = $travel_articles;
        return $this->check_mobile()
            ? view('web-mobile.booking.booking',$data)
            : view('web.booking.booking',$data);
    }

    public function category ($slug, Request $request)
    {
        $category_hotel = CategoryBookingModel::where('slug', $slug)->where('display', 1)->first();
        if (empty($category_hotel)){
            return back()->withErrors(['error' => 'Danh mục không tồn tại ']);
        }
        $category = CategoryBookingModel::where('display', 1)->orderBy('index', 'asc')->get();
        $hotel = HotelModel::query();
        $hotel = $this->filter($hotel,$request);
        $hotel = $hotel->where('active', 1)->where('category', $category_hotel->id)->get();
        $articles_review = ArticlesReviewModel::where('display', 1)->where('category', 2)->orderBy('created_at', 'desc')->limit(6)->get();
        $travel_articles = TravelArticlesModel::where('type', 2)->where('display', 1)->orderBy('index', 'asc')->limit(3)->get();
        $title_banner = (object)[
            'title' => 'Booking',
            'background' => 'images/banner/booking.png',
            'nav' => [
                (object)[
                    'title' => 'Trang chủ',
                    'link' => route('web.home'),
                    'active' => false
                ],
                (object)[
                    'title' => 'Booking',
                    'link' => route('web.booking.index'),
                    'active' => true
                ]
            ]
        ];
        $data['category_hotel'] = $category_hotel;
        $data['category'] = $category;
        $data['hotel'] = $hotel;
        $data['title_banner'] = $title_banner;
        $data['url'] = 'booking/category/'.$category_hotel->slug;
        $data['articles_review'] = $articles_review;
        $data['travel_articles'] = $travel_articles;
        return $this->check_mobile()
            ? view('web-mobile.booking.booking',$data)
            : view('web.booking.booking',$data);
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
                $data['msg'] = 'Phòng không tồn tại';
                return $data;
            }
            $view = view('web.booking.img_room', compact('multimedia'))->render();
            return response()->json(['status' => true, 'prop' => $view]);
        }catch (\Exception $exception){
            $data['status'] = false;
            return $data;
        }
    }


    public function showRoom (Request $request)
    {
        try{
            $room_hotel = RoomHotelModel::find($request->get('room_id'));
            if (empty($room_hotel)){
                $data['status'] = false;
                $data['msg'] = 'Phòng không tồn tại';
                return $data;
            }
            $view = view('web.booking.form_booking', compact('room_hotel'))->render();
            return response()->json(['status' => true, 'prop' => $view]);
        }catch (\Exception $exception){
            $data['status'] = false;
            $data['msg'] = $exception->getMessage();
            return $data;
        }
    }

    public function showUtilities (Request $request)
    {
        try{
            $room_convenient = RoomConvenientModel::where('room_id', $request->get('id'))->get();
            if (count($room_convenient) < 1){
                $data['status'] = false;
                $data['msg'] = 'Tiện ích không tồn tại';
                return $data;
            }
            $view = view('web.booking.utilities_room', compact('room_convenient'))->render();
            return response()->json(['status' => true, 'prop' => $view]);
        }catch (\Exception $exception){
            $data['status'] = false;
            $data['msg'] = $exception->getMessage();
            return $data;
        }
    }

    public function bookRoom (Request $request, $id)
    {
        try{
            $validator = \Illuminate\Support\Facades\Validator::make($request->all(), [
                'name' => 'required',
                'phone' => 'required|regex:/(0)[0-9]/|not_regex:/[a-z]/|min:10|max:10',
            ], [
                'name.required' => 'Vui lòng điền tên người dùng',
                'phone.required' => 'Vui lòng điền số điện thoại người dùng',
                'phone.regex' => 'Số điện thoại không đúng',
            ]);
            if ($validator->fails()) {
                return back()->with(['booking_error' => $validator->errors()->first()]);
            }
            $room = RoomHotelModel::find($id);
            if (empty($room)){
                return back()->with(['booking_error' => 'Phòng không tồn tại']);
            }
            $hotel = HotelModel::find($room->hotel_id);
            $book_room = new BookRoomModel([
                'name_customer' => $request->get('name'),
                'phone_customer' => $request->get('phone'),
                'email_customer' => isset($request->email) ? $request->get('email') : null,
                'room_id' => $room->id,
                'name_room' => $room->name,
                'name_hotel' => $room->name_hotel,
                'phone_hotel' => isset($hotel) ? $hotel->phone : 000000,
            ]);
            $book_room->save();
            return back()->with(['booking_success' => 'Đặt phòng thành công. Chúng tôi sẽ liên hệ tới bạn sớm nhất có thể']);
        }catch (\Exception $exception){
            return back()->with(['booking_error' => $exception->getMessage()]);
        }
    }

    public function showHotel (Request $request)
    {
        try{
            $hotel = HotelModel::find($request->get('hotel_id'));
            if (empty($hotel)){
                $data['status'] = false;
                $data['msg'] = 'Nhà nghỉ không tồn tại';
                return $data;
            }
            $view = view('web.booking.form_booking_hotel', compact('hotel'))->render();
            return response()->json(['status' => true, 'prop' => $view]);
        }catch (\Exception $exception){
            $data['status'] = false;
            $data['msg'] = $exception->getMessage();
            return $data;
        }
    }

    public function bookHotel (Request $request, $id)
    {
        try{
            $validator = \Illuminate\Support\Facades\Validator::make($request->all(), [
                'name' => 'required',
                'phone' => 'required|regex:/(0)[0-9]/|not_regex:/[a-z]/|min:10|max:10',
            ], [
                'name.required' => 'Vui lòng điền tên người dùng',
                'phone.required' => 'Vui lòng điền số điện thoại người dùng',
                'phone.regex' => 'Số điện thoại không đúng',
            ]);
            if ($validator->fails()) {
                return back()->with(['booking_error' => $validator->errors()->first()]);
            }
            $hotel = HotelModel::find($id);
            if (empty($hotel)){
                return back()->with(['booking_error' => 'Phòng không tồn tại']);
            }
            $book_room = new BookRoomModel([
                'name_customer' => $request->get('name'),
                'phone_customer' => $request->get('phone'),
                'email_customer' => isset($request->email) ? $request->get('email') : null,
                'name_hotel' => $hotel->name,
                'phone_hotel' => isset($hotel) ? $hotel->phone : 000000,
            ]);
            $book_room->save();
            return back()->with(['booking_success' => 'Đặt phòng thành công. Chúng tôi sẽ liên hệ tới bạn sớm nhất có thể']);
        }catch (\Exception $exception){
            return back()->with(['booking_error' => $exception->getMessage()]);
        }
    }
}
