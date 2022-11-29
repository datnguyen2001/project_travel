<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\BookTourModel;
use Illuminate\Http\Request;

class BookTourController extends Controller
{
    public function bookTour (Request $request)
    {
        $book_room = BookTourModel::query();
        $book_room = $this->filter($book_room, $request);
        $book_room = $book_room->where('status', 0)->orderBy('created_at', 'desc')->get();
        $titlePage = 'Danh sách khách đặt phòng';
        $page_menu = 'book_tour';
        $page_sub = 'index';
        return view('admin.book_tour.index', compact('titlePage', 'page_menu', 'page_sub', 'book_room'));
    }

    public function bookTourContact (Request $request)
    {
        $book_room = BookTourModel::query();
        $book_room = $this->filter($book_room, $request);
        if (count($request->all())){
            $book_room->where('type', $request->get('type'));
        }
        $book_room = $book_room->where('status',1)->orderBy('created_at', 'desc')->get();
        $success = BookTourModel::where('status', 1)->where('type', 1)->count();
        $error = BookTourModel::where('status', 1)->where('type', 0)->count();
        $titlePage = 'Danh sách khách đặt tour';
        $page_menu = 'book_tour';
        $page_sub = 'contact';
        return view('admin.book_tour.contact', compact('titlePage', 'page_menu', 'page_sub', 'book_room', 'success', 'error'));
    }

    public function sale (Request $request, $id)
    {
        try{
            $book_room = BookTourModel::find($id);
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
}
