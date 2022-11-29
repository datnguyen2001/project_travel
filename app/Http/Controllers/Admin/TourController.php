<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\CategoryTourModel;
use App\Models\DetailTourModel;
use App\Models\MultimediaFilesModel;
use App\Models\TourAreaModel;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class TourController extends Controller
{
    public function category ()
    {
        $titlePage = 'Danh mục tour';
        $page_menu = 'Tour';
        $page_sub = 'category-in';
        $listData = CategoryTourModel::all();
        return view('admin.service_tour.category.index', compact('titlePage', 'page_menu', 'page_sub', 'listData'));
    }
    public function createCategory ()
    {
        $titlePage = 'Danh mục tour';
        $page_menu = 'Tour';
        $page_sub = 'category-in';
        return view('admin.service_tour.category.create', compact('titlePage', 'page_menu', 'page_sub'));
    }

    public function storeCategory (Request $request)
    {
        try{
            if (!$request->hasFile('file')){
                return back()->with(['error' => 'Vui lòng thêm hình ảnh danh mục']);
            }
            $name = $request->get('name');
            $slug = Str::slug($name);
            $category = CategoryTourModel::where('slug', $slug)->first();
            if (isset($category)){
                return back()->with(['error' => 'Danh mục đã tồn tại']);
            }
            $file = $request->file('file');
            $part = 'upload/booking/category/';
            $file_name = $part.Str::random(40). '.'. $file->getClientOriginalExtension();
            $file->move($part, $file_name);
            $category = new CategoryTourModel([
                'name' => $name,
                'slug' => $slug,
                'img' => $file_name,
                'index' => $request->get('index'),
                'display' => isset($request->display) ? 1 : 0
            ]);
            $category->save();
            return redirect()->route('admin.tour.category.index')->with(['success' => 'Thêm mới thành công']);
        }catch (\Exception $exception){
            return back()->with(['error' => $exception->getMessage()]);
        }
    }
    public function editCategory ($slug)
    {
        $category = CategoryTourModel::where('slug', $slug)->first();
        if (empty($category)){
            return back()->with(['error' => 'Danh mục không tồn tại']);
        }
        $titlePage = 'Danh mục tour';
        $page_menu = 'Tour';
        $page_sub = 'category-in';
        return view('admin.service_tour.category.edit', compact('titlePage', 'page_menu', 'page_sub', 'category'));
    }

    public function updateCategory ($slug, Request $request)
    {
        try{
            $category = CategoryTourModel::where('slug', $slug)->first();
            if(empty($category)){
                return back()->with(['error' => 'Danh mục không tồn tại']);
            }
            $slug = Str::slug($request->get('name'));
            $slug_category = $category->slug;
            if ($slug != $slug_category){
                $category_new = CategoryTourModel::where('slug', $slug)->first();
                if (isset($category_new)){
                    return back()->with(['error' => 'Danh mục đã tồn tại']);
                }
            }
            $category->name = $request->get('name');
            $category->slug = $slug;
            $category->index = $request->get('index');
            $category->display = isset($request->display) ? 1 : 0;
            if ($request->hasFile('file')){
                $file = $request->file('file');
                $part = 'upload/booking/category/';
                $file_name = $part.Str::random(40). '.'. $file->getClientOriginalExtension();
                $file->move($part, $file_name);
                unlink($category->img);
                $category->img = $file_name;
            }
            $category->save();
            return redirect()->route('admin.tour.category.index')->with(['success' => 'Cập nhật thành công']);
        }catch (\Exception $exception){
            return back()->with(['error' => $exception->getMessage()]);
        }
    }
    public function deleteCategory ($id)
    {
        $category = CategoryTourModel::find($id);
        if(empty($category)){
            $data['status'] = false;
            $data['msg'] = 'Danh mục không tồn tại';
            return $data;
        }
        unlink($category->img);
        $category->delete();
        $data['status'] = true;
        return $data;
    }

    public function index()
    {
        $titlePage = 'Danh sách tour theo khu vực';
        $page_menu = 'Tour';
        $page_sub = 'tour-in';
        $listData = TourAreaModel::orderBy('created_at', 'desc')->get();
        foreach ($listData as $value)
        {
            $user = User::where('name', $value->phone)->first();
            $value->password_default = isset($user) ? $user->password_default : null;
        }
        return view('admin.service_tour.tour_area.index', compact('titlePage', 'page_menu', 'page_sub', 'listData'));
    }
    public function create ()
    {
        $titlePage = 'Danh sách tour';
        $page_menu = 'Tour';
        $page_sub = 'tour-in';
        $category = CategoryTourModel::all();
        return view('admin.service_tour.tour_area.create', compact('titlePage', 'page_menu', 'page_sub', 'category'));
    }
    public function store(Request $request)
    {
        try{
            $slug = Str::slug($request->get('name'));
            $hotel = TourAreaModel::where('slug', $slug)->first();
            if (isset($hotel)){
                return back()->with(['error' => 'Nhà nghỉ đã tồn tại']);
            }
            if (!$request->hasFile('file')){
                return back()->with(['error' => 'Vui lòng thêm ảnh bìa hoặc video tour']);
            }
            $file = $request->file('file');
            $extension = $file->getClientOriginalExtension();
            $is_video = 0;
            if ($extension == 'mp4' || $extension == 'video'){
                $part = 'upload/hotel/video/';
                $is_video = 1;
            }else{
                $part = 'upload/hotel/img/';
            }
            $file_name = $part.Str::random(40). '.'. $file->getClientOriginalExtension();
            $file->move($part, $file_name);
            $src = null;
            if ($request->hasFile('img_3')){
                $src = $this->addImageVideoCulinary($request->file('img_3'), 'upload/travel/articles/img/', null);
            }
            $name_category = null;
            if (isset($request->category)){
                $category = CategoryTourModel::find($request->get('category'));
                if (isset($category)){
                    $name_category = $category->name;
                }
            }
            $rating_address = isset($request->rating_address) ? $request->get('rating_address') : 0;
            $rating_price = isset($request->rating_price) ? $request->get('rating_price') : 0;
            $rating_service = isset($request->rating_service) ? $request->get('rating_service') : 0;
            $rating_toilet = isset($request->rating_toilet) ? $request->get('rating_toilet') : 0;
            $rating_convenient = isset($request->rating_convenient) ? $request->get('rating_convenient') : 0;
            $ratings = round(($rating_address + $rating_price + $rating_service + $rating_toilet + $rating_convenient)/ 5 , 1);
            $hotel = new TourAreaModel([
                'name' => $request->get('name'),
                'slug' => $slug,
                'phone' => $request->get('phone'),
                'category' => $request->get('category'),
                'name_category' => $name_category,
                'content' => $request->get('content'),
                'banner' => $file_name,
                'is_video' => $is_video,
                'address' => $request->get('address'),
                'map' => $request->get('map'),
                'price' => str_replace(",", "", $request->get('price')),
                'price_2' => str_replace(",", "", $request->get('price_2')),
                'rating_address' => $rating_address,
                'rating_price' => $rating_price,
                'rating_service' => $rating_service,
                'rating_toilet' => $rating_toilet,
                'rating_convenient' => $rating_convenient,
                'rating_content' => $request->get('rating_content'),
                'rating' => $ratings,
                'active' => isset($request->active) ? 1 : 0,
                'src' => isset($src) ? $src['banner'] : null,
                'created_by' => Auth::id(),
            ]);
            $hotel->save();
            $this->addMultimedia($request, $hotel->id, 10);
//            $this->createPartner($request->get('phone'));
            return redirect()->route('admin.tour.tour_area.index')->with(['success' => 'Thêm tour thành công']);
        }catch (\Exception $exception){
            return back()->with(['error' => $exception->getMessage()]);
        }
    }
    public function edit ($slug)
    {
        $hotel = TourAreaModel::where('slug', $slug)->first();
        if (empty($hotel)){
            return back()->with(['error' => 'Nhà nghỉ/khách sạn không tồn tại']);
        }
        $titlePage = 'Danh sách tour';
        $page_menu = 'Tour';
        $page_sub = 'tour-in';
        $category = CategoryTourModel::all();
        $multimedia = MultimediaFilesModel::where('parent_id', $hotel->id)->where('parent_type', 10)->get();
        return view('admin.service_tour.tour_area.edit', compact('titlePage', 'page_menu', 'page_sub', 'category', 'hotel', 'multimedia'));
    }
    public function update(Request $request, $id)
    {
        try{
            $hotel = TourAreaModel::find($id);
            if (empty($hotel)){
                return back()->with(['error' => 'Nhà nghỉ không tồn tại']);
            }
            $slug = Str::slug($request->get('name'));
            if ($slug != $hotel->slug){
                $hotelM = TourAreaModel::where('slug', $slug)->first();
                if (isset($hotelM)){
                    return back()->with(['error' => 'Tên nhà nghỉ đã tồn tại']);
                }
            }
            if ($request->hasFile('file')){
                $file = $request->file('file');
                $extension = $file->getClientOriginalExtension();
                $is_video = 0;
                if ($extension == 'mp4' || $extension == 'video'){
                    $part = 'upload/hotel/video/';
                    $is_video = 1;
                }else{
                    $part = 'upload/hotel/img/';
                }
                $file_name = $part.Str::random(40). '.'. $file->getClientOriginalExtension();
                $file->move($part, $file_name);
                unlink($hotel->banner);
                $hotel->banner = $file_name;
                $hotel->is_video = $is_video;
            }
            if ($request->hasFile('img_3')){
                $img_1 = $this->addImageVideoCulinary($request->file('img_3'), 'upload/travel/articles/img/', null);
//                    unlink($culinary->src);
                $hotel->src = $img_1['banner'];
            }
            $name_category = null;
            if (isset($request->category)){
                $category = CategoryTourModel::find($request->get('category'));
                if (isset($category)){
                    $hotel->name_category = $category->name;
                    $hotel->category = $category->id;
                }
            }
            $rating_address = isset($request->rating_address) ? $request->get('rating_address') : 0;
            $rating_price = isset($request->rating_price) ? $request->get('rating_price') : 0;
            $rating_service = isset($request->rating_service) ? $request->get('rating_service') : 0;
            $rating_toilet = isset($request->rating_toilet) ? $request->get('rating_toilet') : 0;
            $rating_convenient = isset($request->rating_convenient) ? $request->get('rating_convenient') : 0;
            $ratings = round(($rating_address + $rating_price + $rating_service + $rating_toilet + $rating_convenient)/ 5 , 1);
            $hotel->name = $request->get('name');
            $hotel->slug = $slug;
            $hotel->phone = $request->get('phone');
            $hotel->content = $request->get('content');
            $hotel->address = $request->get('address');
            $hotel->map = $request->get('map');
            $hotel->price = str_replace(",", "", $request->get('price'));
            $hotel->price_2 = str_replace(",", "", $request->get('price_2'));
            $hotel->rating_address = $rating_address;
            $hotel->rating_price = $rating_price;
            $hotel->rating_service = $rating_service;
            $hotel->rating_toilet = $rating_toilet;
            $hotel->rating_convenient = $rating_convenient;
            $hotel->rating_content = $request->get('rating_content');
            $hotel->active = isset($request->active) ? 1 : 0;
            $hotel->rating = $ratings;

            $hotel->save();
            $this->addMultimedia($request, $hotel->id, 10);
//            $this->createPartner($request->get('phone'));
            return redirect()->route('admin.tour.tour_area.index')->with(['success' => 'Sửa nhà nghỉ thành công']);
        }catch (\Exception $exception){
            return back()->with(['error' => $exception->getMessage()]);
        }
    }
    public function delete ($id)
    {
        $hotel = TourAreaModel::find($id);
        if (empty($hotel)){
            $data['status'] = false;
            $data['msg'] = 'Tour du lịch không tồn tại';
            return $data;
        }
        unlink($hotel->banner);
        $multimedia = MultimediaFilesModel::where('parent_id', $id)->where('parent_type', 10)->get();
        if (count($multimedia)){
            foreach ($multimedia as $key => $value){
                unlink($value->src);
                $multimedia[$key]->delete();
            }
        }
        $hotel->delete();
        $data['status'] = true;
        return $data;
    }
}
