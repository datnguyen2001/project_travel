<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\BannerModel;
use App\Models\BookRoomModel;
use App\Models\ConvenientModel;
use App\Models\MultimediaFilesModel;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class BookRoomController extends Controller
{
    public function bookRoom (Request $request)
    {
        $book_room = BookRoomModel::query();
        $book_room = $this->filter($book_room, $request);
        $book_room = $book_room->where('status', 0)->orderBy('created_at', 'desc')->get();
        $titlePage = 'Danh sách khách đặt phòng';
        $page_menu = 'book_room';
        $page_sub = 'index';
        return view('admin.book_room.index', compact('titlePage', 'page_menu', 'page_sub', 'book_room'));
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

    public function bookRoomContact (Request $request)
    {
        $book_room = BookRoomModel::query();
        $book_room = $this->filter($book_room, $request);
        if (count($request->all())){
            $book_room->where('type', $request->get('type'));
        }
        $book_room = $book_room->where('status',1)->orderBy('created_at', 'desc')->get();
        $success = BookRoomModel::where('status', 1)->where('type', 1)->count();
        $error = BookRoomModel::where('status', 1)->where('type', 0)->count();
        $titlePage = 'Danh sách khách đặt phòng';
        $page_menu = 'book_room';
        $page_sub = 'contact';
        return view('admin.book_room.contact', compact('titlePage', 'page_menu', 'page_sub', 'book_room', 'success', 'error'));
    }

    public function convenient ()
    {
        $titlePage = 'Danh mục tiện nghi phòng';
        $page_menu = 'booking';
        $page_sub = 'convenient';
        $listData = ConvenientModel::orderBy('created_at', 'desc')->get();
        return view('admin.booking.convenient.index', compact('titlePage', 'page_menu', 'page_sub', 'listData'));
    }

    public function convenientCreate ()
    {
        $titlePage = 'Danh mục tiện nghi phòng';
        $page_menu = 'booking';
        $page_sub = 'convenient';
        return view('admin.booking.convenient.create', compact('titlePage', 'page_menu', 'page_sub'));
    }

    public function convenientStore (Request $request)
    {
        try{
            if (!$request->hasFile('file')){
                return back()->with(['error' => 'Vui lòng thêm icon danh mục']);
            }
            $icon = $this->addImageVideoCulinary($request->file('file'), 'upload/booking/convenient/icon/', null);
            $convenient = new ConvenientModel([
                'name' => $request->get('name'),
                'icon' => $icon['banner']
            ]);
            $convenient->save();
            return redirect()->route('admin.booking.convenient.index')->with(['success' => 'Tạo danh mục thành công']);
        }catch (\Exception $exception){
            return back()->with(['error' => $exception->getMessage()]);
        }
    }

    public function convenientEdit ($id)
    {
        $convenient = ConvenientModel::find($id);
        if (empty($convenient)){
            return back()->with(['error' => 'Danh mục không tồn tại']);
        }
        $titlePage = 'Danh mục tiện nghi phòng';
        $page_menu = 'booking';
        $page_sub = 'convenient';
        return view('admin.booking.convenient.edit', compact('titlePage', 'page_menu', 'page_sub', 'convenient'));
    }

    public function convenientUpdate (Request $request, $id)
    {
        try{
            $convenient = ConvenientModel::find($id);
            if (empty($convenient)){
                return back()->with(['error' => 'Danh mục không tồn tại']);
            }
            if ($request->hasFile('file')){
                $icon = $this->addImageVideoCulinary($request->file('file'), 'upload/booking/convenient/icon/', null);
                unlink($convenient->icon);
                $convenient->icon = $icon['banner'];
            }
            $convenient->name = $request->get('name');
            $convenient->save();
            return redirect()->route('admin.booking.convenient.index')->with(['success' => 'Cập nhật danh mục thành công']);
        }catch (\Exception $exception){
            return back()->with(['error' => $exception->getMessage()]);
        }
    }
}
