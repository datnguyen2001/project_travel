<?php

namespace App\Http\Controllers\Partner;

use App\Http\Controllers\Controller;
use App\Models\BookRoomModel;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BookingController extends Controller
{
    public function index (Request $request)
    {
        $user_id = Auth::id();
        $user = User::find($user_id);
        $book_room = BookRoomModel::query();
        $book_room = $this->filter($book_room, $request);
        $book_room = $book_room->where('status', 0)->where('phone_hotel', $user->name)->orderBy('created_at', 'desc')->get();
        $titlePage = 'Danh sách khách đặt phòng';
        $page_menu = 'book_room';
        $page_sub = 'index';
        return view('partner.booking.index', compact('titlePage', 'page_menu', 'page_sub', 'book_room'));
    }

    protected function filter ($book_room, $request)
    {
        if (count($request->all())){
            switch ($request->get('type_search')){
                case 1:
                    $book_room = $book_room->where('name_customer', 'like', '%'.$request->get('key_search').'%');
                    break;
                case 2:
                    $book_room = $book_room->where('phone_customer', 'like', '%'.$request->get('key_search').'%');
                    break;
                case 3:
                    $book_room = $book_room->where('name_hotel', 'like', '%'.$request->get('key_search').'%');
                    break;
                default:
                    $book_room = $book_room->where('phone_hotel', 'like', '%'.$request->get('key_search').'%');
            }
        }else{
            $book_room = $book_room;
        }
        return $book_room;
    }

    public function sale (Request $request, $id)
    {
        try{
            $book_room = BookRoomModel::find($id);
            if (empty($book_room)){
                $data['status'] = false;
                $data['msg'] = 'Khách hàng ko tồn tại';
                return $data;
            }
            $book_room->status = 1;
            $book_room->type = $request->get('type');
            $book_room->content = $request->get('content');
            $book_room->save();
            $data['status'] = true;
            return $data;
        }catch (\Exception $exception){
            $data['status'] = false;
            $data['msg'] = $exception->getMessage();
            return $data;
        }
    }

    public function contact (Request $request)
    {
        $user_id = Auth::id();
        $user = User::find($user_id);
        $book_room = BookRoomModel::query();
        $book_room = $this->filter($book_room, $request);
        if (count($request->all())){
            $book_room->where('type', $request->get('type'));
        }
        $book_room = $book_room->where('status',1)->where('phone_hotel', $user->name)->orderBy('created_at', 'desc')->get();
        $success = BookRoomModel::where('status', 1)->where('phone_hotel', $user->name)->where('type', 1)->count();
        $error = BookRoomModel::where('status', 1)->where('phone_hotel', $user->name)->where('type', 0)->count();
        $titlePage = 'Danh sách khách đặt phòng';
        $page_menu = 'book_room';
        $page_sub = 'contact';
        return view('partner.booking.contact', compact('titlePage', 'page_menu', 'page_sub', 'book_room', 'success', 'error'));
    }
}
