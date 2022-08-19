<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\RestaurantModel;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class RestaurantController extends Controller
{
    public function index()
    {
        $titlePage = 'Nhà Hàng';
        $page_menu = 'restaurant';
        $page_sub = 'index';
        $listData = RestaurantModel::orderBy('created_at', 'desc')->get();
        return view('admin.restaurant.index', compact('titlePage', 'page_menu', 'page_sub', 'listData'));
    }

    public function create()
    {
        $titlePage = 'Nhà Hàng';
        $page_menu = 'restaurant';
        $page_sub = 'create';
        return view('admin.restaurant.create', compact('titlePage', 'page_menu', 'page_sub'));
    }

    public function store (Request $request)
    {
        try{
            if (!$request->hasFile('file')){
                return back()->with(['error' => 'Vui lòng thêm hình ảnh hoặc video nhà hàng']);
            }
            $file = $request->file('file');
            $extension = $file->getClientOriginalExtension();
            if ($extension == 'mp4' || $extension == 'video'){
                $part = 'upload/restaurant/video/';
                $type = 2;
            }else{
                $type = 1;
                $part = 'upload/restaurant/img/';
            }
            $length = strlen($request->get('content'));
            if ($length > 255){
                return back()->with(['error' => 'Nội dung mô tả ngắn khô quá 255 ký tự']);
            }
            $file_name = $part.Str::random(40). '.'. $file->getClientOriginalExtension();
            $request->file('file')->move($part, $file_name);
            $restaurant = new RestaurantModel([
               'name' => $request->get('name'),
               'content' => $request->get('content'),
               'address' => $request->get('address'),
               'banner' => $file_name,
               'type' => $type,
               'map' => $request->get('map'),
               'rating' => $request->get('rating')
            ]);
            $restaurant->save();
            return redirect()->route('admin.restaurant.index')->with(['succeess' => 'Thêm nhà hàng thành công']);
        }catch (\Exception $e){
            return back()->with(['error' => $e->getMessage()]);
        }
    }
    /**
     * Xóa nhà hàng
    **/
    public function delete ($id)
    {
        $restaurant = RestaurantModel::find($id);
        if (empty($restaurant)){
            return back()->with(['error' => 'Nhà hàng không tồn tại']);
        }
        unlink($restaurant->banner);
        $restaurant->delete();
        $data['status'] = true;
        $data['msg'] = 'Xóa nhà hàng thành công';
        return $data;
        return back()->with(['success' => 'Xóa nhà hàng thành công']);
    }
    /**
     * Sửa thông tin nhà hàng
    **/
    public function edit ($id)
    {
        try{
            $restaurant = RestaurantModel::find($id);
            if (empty($restaurant)){
                return back()->with(['error' => 'Nhà hàng không tồn tại']);
            }
            $titlePage = 'Nhà Hàng';
            $page_menu = 'restaurant';
            $page_sub = 'index';
            return view('admin.restaurant.edit', compact('titlePage', 'page_menu', 'page_sub', 'restaurant'));
        }catch (\Exception $exception){
            return back()->with(['error' => $exception->getMessage()]);
        }
    }
    /**
     * Cập nhật nhà hàng
    **/
    public function update($id, Request $request)
    {
        try{
            $restaurant = RestaurantModel::find($id);
            if (empty($restaurant)){
                return back()->with(['error' => 'Nhà hàng không tồn tại']);
            }
            if ($request->hasFile('file')){
                $file = $request->file('file');
                $extension = $file->getClientOriginalExtension();
                if ($extension == 'mp4' || $extension == 'video'){
                    $part = 'upload/restaurant/video/';
                    $type = 2;
                }else{
                    $type = 1;
                    $part = 'upload/restaurant/img/';
                }
                $file_name = $part.Str::random(40). '.'. $file->getClientOriginalExtension();
                $request->file('file')->move($part, $file_name);
                unlink($restaurant->banner);
                $restaurant->banner = $file_name;
                $restaurant->type = $type;
            }
            $restaurant->name = $request->get('name');
            $restaurant->content = $request->get('content');
            $restaurant->address = $request->get('address');
            $restaurant->map = $request->get('map');
            $restaurant->rating = $request->get('rating');
            $restaurant->save();
            return redirect()->route('admin.restaurant.index')->with(['success' => 'Cập nhật gian hàng thành công']);
        }catch (\Exception $exception){
            return back()->with(['error' => $exception->getMessage()]);
        }
    }
}
