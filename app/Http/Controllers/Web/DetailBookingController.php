<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\HotelModel;
use App\Models\MultimediaFilesModel;
use App\Models\RoomConvenientModel;
use App\Models\RoomHotelModel;

class DetailBookingController extends Controller
{
    public function detailBooking($slug){
        $hotel = HotelModel::where('slug', $slug)->where('active', 1)->first();
        if (empty($hotel)){
            return back()->withErrors(['error' => 'Booking không tồn tại ']);
        }
        $multimedia = MultimediaFilesModel::where('parent_id', $hotel->id)->where('parent_type', 2)->get();
        $room_hotel = RoomHotelModel::where('hotel_id', $hotel->id)->get();
        if (count($room_hotel)){
            foreach ($room_hotel as $value){
                $value->multimedia = MultimediaFilesModel::where('parent_id', $value->id)->where('parent_type', 4)->get();
                $value->convenient = RoomConvenientModel::where('room_id', $value->id)->get();
            }
        }
        $proposal_room = HotelModel::where('category', $hotel->category)->whereNotIn('id', [$hotel->id])->where('active', 1)->get();
        $title_banner = (object)[
            'title' => 'Chi tiết booking',
            'background' => '../images/detail-booking/banner.png',
            'nav' => [
                (object)[
                    'title' => 'Trang chủ',
                    'link' => route('web.home'),
                    'active' => false
                ],
                (object)[
                    'title' => 'Booking',
                    'link' => route('web.booking.index'),
                    'active' => false
                ],
                (object)[
                    'title' => 'Chi tiết booking',
                    'link' => route('web.booking.detail',1),
                    'active' => true
                ]
            ]
        ];
        $is_detail_booking = true;
        return $this->check_mobile()
            ? view('web-mobile.detail-booking.detail-booking',compact('title_banner','is_detail_booking','hotel', 'multimedia', 'room_hotel', 'proposal_room'))
            : view('web.detail-booking.detail-booking',compact('title_banner','is_detail_booking','hotel', 'multimedia', 'room_hotel', 'proposal_room'));
    }
}
