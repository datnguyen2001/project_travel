<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ArticlesReviewModel;
use App\Models\CategoryBookingModel;
use App\Models\CategoryCulinaryModel;
use App\Models\CategoryTravelModel;
use App\Models\ConvenientModel;
use App\Models\HotelModel;
use App\Models\MultimediaFilesModel;
use App\Models\RoomConvenientModel;
use App\Models\RoomHotelModel;
use App\Models\TravelArticlesModel;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class BookingController extends Controller
{
    public function index()
    {
        $titlePage = 'Booking';
        $page_menu = 'booking';
        $page_sub = 'index';
        $listData = RoomHotelModel::orderBy('created_at', 'desc')->get();
        return view('admin.booking.phong.index', compact('titlePage', 'page_menu', 'page_sub', 'listData'));
    }
    public function createPhong ()
    {
        $hotel = HotelModel::orderBy('created_at', 'desc')->get();
        if (count($hotel) == 0){
            return back()->with(['error' => 'Vui lòng thiết lập nhà nghỉ khách sạn để tiếp tục']);
        }
        $convenient = ConvenientModel::orderBy('created_at', 'desc')->get();
        $titlePage = 'Booking';
        $page_menu = 'booking';
        $page_sub = 'index';
        return view('admin.booking.phong.create', compact('titlePage', 'page_menu', 'page_sub', 'hotel', 'convenient'));
    }
    public function storePhong (Request $request)
    {
        try{
            if (!$request->hasFile('file')){
                return back()->with(['error' => 'Vui lòng thêm ảnh hoặc video phòng nghỉ']);
            }
            $hotel = HotelModel::find($request->get('hotel'));
            if (empty($hotel)){
                return back()->with(['error' => 'Vui chọn nhà nghỉ khách sạn']);
            }
            $file = $request->file('file');
            $extension = $file->getClientOriginalExtension();
            $is_video = 0;
            if ($extension == 'mp4' || $extension == 'video'){
                $part = 'upload/room_hotel/video/';
                $is_video = 1;
            }else{
                $part = 'upload/room_hotel/img/';
            }
            $file_name = $part.Str::random(40). '.'. $file->getClientOriginalExtension();
            $file->move($part, $file_name);
            $room_hotel = new RoomHotelModel([
               'name' => $request->get('name'),
               'banner' => $file_name,
               'price' => str_replace(",", "", $request->get('price')),
               'price_2' => str_replace(",", "", $request->get('price_2')),
                'elevator' => isset($request->elevator) ? 1 : 0,
                'air_conditional' => isset($request->air_conditional) ? 1 : 0,
                'balcony' => isset($request->balcony) ? 1 : 0,
                'garden' => isset($request->garden) ? 1 : 0,
                'free_parking' => isset($request->free_parking) ? 1 : 0,
                'smoking' => isset($request->smoking) ? 1 : 0,
                'created_by' => Auth::id(),
                'is_video' => $is_video,
                'hotel_id' => $request->get('hotel'),
                'name_hotel' => $hotel->name
            ]);
            $room_hotel->save();
            $convenient = $request->get('convenient');
            if (count($convenient)){
                foreach ($convenient as $value){
                    $item = ConvenientModel::find($value);
                    if (isset($item)){
                        $room_convenient = new RoomConvenientModel([
                            'room_id' => $room_hotel->id,
                            'convenient_id' => $value,
                            'name_convenient' => $item->name,
                            'icon_convenient' => $item->icon
                        ]);
                        $room_convenient->save();
                    }
                }
            }
            $this->addMultimedia($request, $room_hotel->id, 4);
            return redirect()->route('admin.booking.phong.index')->with(['success' => 'Tạo phòng thành công']);
        }catch (\Exception $exception){
            return back()->with(['error' => $exception->getMessage()]);
        }
    }
    public function editPhong ($id)
    {
        $room = RoomHotelModel::find($id);
        if (empty($room)){
            return back()->with(['error' => 'Phòng không tồn tại']);
        }
        $hotel = HotelModel::orderBy('created_at', 'desc')->get();
        $multimedia = MultimediaFilesModel::where('parent_id', $id)->where('parent_type', 4)->get();
        $convenient = ConvenientModel::orderBy('created_at', 'desc')->get();
        $titlePage = 'Booking';
        $page_menu = 'booking';
        $page_sub = 'index';
        return view('admin.booking.phong.edit', compact('titlePage', 'page_menu', 'page_sub', 'hotel', 'room', 'multimedia', 'convenient'));
    }
    public function updatePhong ($id, Request $request)
    {
        try{
            $room = RoomHotelModel::find($id);
            if (empty($room)){
                return back()->with(['error' => 'Phòng không tồn tại']);
            }
            if ($request->hasFile('file')){
                $file = $request->file('file');
                $extension = $file->getClientOriginalExtension();
                $is_video = 0;
                if ($extension == 'mp4' || $extension == 'video'){
                    $part = 'upload/room_hotel/video/';
                    $is_video = 1;
                }else{
                    $part = 'upload/room_hotel/img/';
                }
                $file_name = $part.Str::random(40). '.'. $file->getClientOriginalExtension();
                $file->move($part, $file_name);
                unlink($room->banner);
                $room->banner = $file_name;
                $room->is_video = $is_video;
            }
            if (isset($request->hotel)){
                $hotel = HotelModel::find($request->get('hotel'));
                if (isset($hotel)){
                    $room->hotel_id = $hotel->id;
                    $room->name_hotel = $hotel->name;
                }
            }
            if (isset($request->name)){
                $room->name = $request->get('name');
            }
            $room->price = str_replace(",", "", $request->get('price'));
            $room->price_2 = str_replace(",", "", $request->get('price_2'));
            $room->elevator = isset($request->elevator) ? 1 : 0;
            $room->air_conditional = isset($request->air_conditional) ? 1 : 0;
            $room->balcony = isset($request->balcony) ? 1 : 0;
            $room->garden = isset($request->garden) ? 1 : 0;
            $room->free_parking = isset($request->free_parking) ? 1 : 0;
            $room->smoking = isset($request->smoking) ? 1 : 0;
            $room->save();
            RoomConvenientModel::where('room_id', $id)->delete();
            $convenient = $request->get('convenient');
            if (count($convenient)){
                foreach ($convenient as $value){
                    $item = ConvenientModel::find($value);
                    if (isset($item)){
                        $room_convenient = new RoomConvenientModel([
                            'room_id' => $room->id,
                            'convenient_id' => $value,
                            'name_convenient' => $item->name,
                            'icon_convenient' => $item->icon
                        ]);
                        $room_convenient->save();
                    }
                }
            }
            $this->addMultimedia($request, $room->id, 4);
            return redirect()->route('admin.booking.phong.index')->with(['success' => 'Sửa phòng thành công']);
        }catch (\Exception $exception){
            return back()->with(['error' => $exception->getMessage()]);
        }
    }
    public function deletePhong ($id)
    {
        $room = RoomHotelModel::find($id);
        if (empty($room)){
            $data['status'] = false;
            $data['msg'] = 'Phòng không tồn tại';
            return $data;
        }
        unlink($room->banner);
        $multimedia = MultimediaFilesModel::where('parent_id', $id)->where('parent_type', 4)->get();
        if (count($multimedia)){
            foreach ($multimedia as $key => $value){
                unlink($value->src);
                $multimedia[$key]->delete();
            }
        }
        $room->delete();
        RoomConvenientModel::where('room_id', $id)->delete();
        $data['status'] = true;
        return $data;
    }
    /**
     * Danh mục Booking
    **/
    public function category ()
    {
        $titlePage = 'Danh mục Booking';
        $page_menu = 'booking';
        $page_sub = 'category';
        $listData = CategoryBookingModel::all();
        return view('admin.booking.category.index', compact('titlePage', 'page_menu', 'page_sub', 'listData'));
    }
    public function createCategory ()
    {
        $titlePage = 'Danh mục Booking';
        $page_menu = 'booking';
        $page_sub = 'category';
        return view('admin.booking.category.create', compact('titlePage', 'page_menu', 'page_sub'));
    }

    public function storeCategory (Request $request)
    {
        try{
            if (!$request->hasFile('file')){
                return back()->with(['error' => 'Vui lòng thêm hình ảnh danh mục']);
            }
            $name = $request->get('name');
            $slug = Str::slug($name);
            $category = CategoryBookingModel::where('slug', $slug)->first();
            if (isset($category)){
                return back()->with(['error' => 'Danh mục đã tồn tại']);
            }
            $file = $request->file('file');
            $part = 'upload/booking/category/';
            $file_name = $part.Str::random(40). '.'. $file->getClientOriginalExtension();
            $file->move($part, $file_name);
            $category = new CategoryBookingModel([
                'name' => $name,
                'slug' => $slug,
                'img' => $file_name,
                'index' => $request->get('index'),
                'display' => isset($request->display) ? 1 : 0
            ]);
            $category->save();
            return redirect()->route('admin.booking.category.index')->with(['success' => 'Thêm mới thành công']);
        }catch (\Exception $exception){
            return back()->with(['error' => $exception->getMessage()]);
        }
    }
    public function editCategory ($slug)
    {
        $category = CategoryBookingModel::where('slug', $slug)->first();
        if (empty($category)){
            return back()->with(['error' => 'Danh mục không tồn tại']);
        }
        $titlePage = 'Booking';
        $page_menu = 'category';
        $page_sub = 'category';
        return view('admin.booking.category.edit', compact('titlePage', 'page_menu', 'page_sub', 'category'));
    }

    public function updateCategory ($slug, Request $request)
    {
        try{
            $category = CategoryBookingModel::where('slug', $slug)->first();
            if(empty($category)){
                return back()->with(['error' => 'Danh mục không tồn tại']);
            }
            $slug = Str::slug($request->get('name'));
            $slug_category = $category->slug;
            if ($slug != $slug_category){
                $category_new = CategoryBookingModel::where('slug', $slug)->first();
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
            return redirect()->route('admin.booking.category.index')->with(['success' => 'Cập nhật thành công']);
        }catch (\Exception $exception){
            return back()->with(['error' => $exception->getMessage()]);
        }
    }
    public function deleteCategory ($id)
    {
        $category = CategoryBookingModel::find($id);
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
    /**
     * Hotel
    **/
    public function indexHotel()
    {
        $titlePage = 'Danh sách nhà nghỉ/khách sạn';
        $page_menu = 'booking';
        $page_sub = 'hotel';
        $listData = HotelModel::orderBy('created_at', 'desc')->get();
        foreach ($listData as $value)
        {
            $user = User::where('name', $value->phone)->first();
            $value->password_default = isset($user) ? $user->password_default : null;
        }
        return view('admin.booking.hotel.index', compact('titlePage', 'page_menu', 'page_sub', 'listData'));
    }
    public function createHotel ()
    {
        $titlePage = 'Danh sách nhà nghỉ/khách sạn';
        $page_menu = 'booking';
        $page_sub = 'hotel';
        $category = CategoryBookingModel::all();
        return view('admin.booking.hotel.create', compact('titlePage', 'page_menu', 'page_sub', 'category'));
    }
    public function storeHotel (Request $request)
    {
        try{
            $slug = Str::slug($request->get('name'));
            $hotel = HotelModel::where('slug', $slug)->first();
            if (isset($hotel)){
                return back()->with(['error' => 'Nhà nghỉ đã tồn tại']);
            }
            if (!$request->hasFile('file')){
                return back()->with(['error' => 'Vui lòng thêm ảnh bìa hoặc video nhà nghỉ']);
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
                $category = CategoryBookingModel::find($request->get('category'));
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
            $hotel = new HotelModel([
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
                'src' => isset($src) ? $src['banner'] : null,
                'created_by' => Auth::id(),
            ]);
            $hotel->save();
            $this->addMultimedia($request, $hotel->id, 2);
            $this->createPartner($request->get('phone'));
            return redirect()->route('admin.booking.hotel.index')->with(['success' => 'Thêm nhà nghỉ thành công']);
        }catch (\Exception $exception){
            return back()->with(['error' => $exception->getMessage()]);
        }
    }
    public function editHotel ($slug)
    {
        $hotel = HotelModel::where('slug', $slug)->first();
        if (empty($hotel)){
            return back()->with(['error' => 'Nhà nghỉ/khách sạn không tồn tại']);
        }
        $titlePage = 'Danh sách nhà nghỉ/khách sạn';
        $page_menu = 'booking';
        $page_sub = 'hotel';
        $category = CategoryBookingModel::all();
        $multimedia = MultimediaFilesModel::where('parent_id', $hotel->id)->where('parent_type', 2)->get();
        return view('admin.booking.hotel.edit', compact('titlePage', 'page_menu', 'page_sub', 'category', 'hotel', 'multimedia'));
    }
    public function updateHotel (Request $request, $id)
    {
        try{
            $hotel = HotelModel::find($id);
            if (empty($hotel)){
                return back()->with(['error' => 'Nhà nghỉ không tồn tại']);
            }
            $slug = Str::slug($request->get('name'));
            if ($slug != $hotel->slug){
                $hotelM = HotelModel::where('slug', $slug)->first();
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
                $category = CategoryBookingModel::find($request->get('category'));
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
            $hotel->rating = $ratings;
            $hotel->save();
            $this->addMultimedia($request, $hotel->id, 2);
            $this->createPartner($request->get('phone'));
            return redirect()->route('admin.booking.hotel.index')->with(['success' => 'Sửa nhà nghỉ thành công']);
        }catch (\Exception $exception){
            return back()->with(['error' => $exception->getMessage()]);
        }
    }
    public function deleteHotel ($id)
    {
        $hotel = HotelModel::find($id);
        if (empty($hotel)){
            $data['status'] = false;
            $data['msg'] = 'Nhà nghỉ khách sạn không tồn tại';
            return $data;
        }
        unlink($hotel->banner);
        $multimedia = MultimediaFilesModel::where('parent_id', $id)->where('parent_type', 2)->get();
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

    public function articles ()
    {
        $listData =ArticlesReviewModel::where('category', 2)->orderBy('created_at', 'desc')->get();
        $titlePage = 'Booking';
        $page_menu = 'booking';
        $page_sub = 'articles';
        return view('admin.booking.articles.index', compact('titlePage', 'page_menu', 'page_sub', 'listData'));
    }

    public function articlesCreate ()
    {
        $category = CategoryBookingModel::all();
        $titlePage = 'Booking';
        $page_menu = 'booking';
        $page_sub = 'articles';
        return view('admin.booking.articles.create', compact('titlePage', 'page_sub', 'page_menu', 'category'));
    }

    public function articlesStore (Request $request)
    {
        try{
            if (!$request->hasFile('file')){
                return back()->with(['error' => 'Vui lòng thêm ảnh bìa bài viết']);
            }
            $slug = Str::slug($request->get('title'));
            $articles = ArticlesReviewModel::where('slug', $slug)->first();
            if (isset($articles)){
                return back()->with(['error' => 'Bài viết đã tồn tại']);
            }
            $banner = $this->addImageVideoCulinary($request->file('file'), 'upload/travel/articles/img/', 'upload/travel/articles/video/');
            $video = null;$img_1 = null; $img_2 = null;
            if ($request->hasFile('video')){
                $video = $this->addImageVideoCulinary($request->file('video'), null, 'upload/travel/articles/video-review/');
            }
            if ($request->hasFile('img_1')){
                $img_1 = $this->addImageVideoCulinary($request->file('img_1'), 'upload/travel/articles/img/', null);
            }
            if ($request->hasFile('img_2')){
                $img_2 = $this->addImageVideoCulinary($request->file('img_2'), 'upload/travel/articles/img/', null);
            }
            if ($request->hasFile('img_3')){
                $src = $this->addImageVideoCulinary($request->file('img_3'), 'upload/travel/articles/img/', null);
            }
            $category = CategoryBookingModel::find($request->get('category'));
            $articles = new ArticlesReviewModel();
            $articles['title'] = $request->get('title');
            $articles['slug'] = $slug;
            $articles['banner'] = $banner['banner'];
            $articles['src'] = isset($src) ? $src['banner'] : null;
            $articles['img_1'] = isset($img_1) ? $img_1['banner'] : null;
            $articles['img_2'] = isset($img_2) ? $img_2['banner'] : null;
            $articles['video'] = isset($video) ? $video['banner'] : null;
            $articles['content'] = $request->get('content');
            $articles['category'] = 2;
            $articles['category_id'] = $request->get('category');
            $articles['category_name'] = $category->name;
            $articles['content_1'] = $request->get('content_1');
            $articles['content_2'] = $request->get('content_2');
            $articles['description'] = $request->get('content_img');
            $articles['content_video'] = $request->get('content_video');
            $articles['rating'] = $request->get('rating');
            $articles['author'] = $request->get('author');
            $articles['display'] = isset($request->display) ? 1 : 0;
            $articles->save();
            $this->addMultimedia($request, $articles->id, 6);
            return redirect()->route('admin.booking.articles.index')->with(['success' => 'Thêm bài viết mới thành công']);
        }catch (\Exception $exception){
            return back()->with(['error' => $exception->getMessage()]);
        }
    }

    public function articlesEdit ($slug)
    {
        $articles = ArticlesReviewModel::where('category', 2)->where('slug', $slug)->first();
        if (empty($articles)){
            return back()->with(['error' => 'Bài viết không tồn tại']);
        }
        $category = CategoryBookingModel::all();
        $multimedia = MultimediaFilesModel::where('parent_id', $articles->id)->where('parent_type', 6)->get();
        $titlePage = 'Booking';
        $page_menu = 'booking';
        $page_sub = 'articles';
        return view('admin.booking.articles.edit', compact('articles', 'category', 'titlePage', 'page_menu', 'page_sub', 'multimedia'));
    }

    public function articlesUpdate (Request $request, $id)
    {
        try{
            $articles = ArticlesReviewModel::where('category', 2)->where('id', $id)->first();
            if (empty($articles)){
                return back()->with(['error' => 'Bài viết không tồn tại']);
            }
            $slug = Str::slug($request->get('title'));
            if ($slug != $articles->slug){
                $articles_check = ArticlesReviewModel::where('slug', $slug)->first();
                if (isset($articles_check)){
                    return back()->with(['error' => 'Bài viết đã tồn tại']);
                }
            }
            $banner = null; $img_1 = null; $img_2 = null; $video = null;
            if ($request->hasFile('file')){
                $banner = $this->addImageVideoCulinary($request->file('file'), 'upload/travel/articles/img/', 'upload/travel/articles/video/');
                unlink($articles->banner);
                $articles['banner'] =  $banner['banner'];
            }
            if ($request->hasFile('video')){
                $video = $this->addImageVideoCulinary($request->file('video'), null, 'upload/travel/articles/video-review/');
                if (isset($articles->video)){
                    unlink($articles->video);
                }
                $articles['video'] = $video['banner'];
            }
            if ($request->hasFile('img_1')){
                $img_1 = $this->addImageVideoCulinary($request->file('img_1'), 'upload/travel/articles/img/', null);
                if (isset($articles->img_1)){
                    unlink($articles->img_1);
                }
                $articles['img_1'] = $img_1['banner'];
            }
            if ($request->hasFile('img_2')){
                $img_2 = $this->addImageVideoCulinary($request->file('img_2'), 'upload/travel/articles/img/', null);
                if (isset($articles->img_2)){
                    unlink($articles->img_2);
                }
                $articles['img_2'] = $img_2['banner'];
            }
            if ($request->hasFile('img_3')){
                $img_3 = $this->addImageVideoCulinary($request->file('img_3'), 'upload/travel/articles/img/', null);
                if (isset($articles->img_3)){
                    unlink($articles->img_3);
                }
                $articles['src'] = $img_3['banner'];
            }
            $category = CategoryBookingModel::find($request->get('category'));
            $articles->title = $request->get('title');
            $articles->slug = $slug;
            $articles->content = $request->get('content');
            $articles->category_id = $request->get('category');
            $articles->category_name = $category->name;
            $articles->content_1 = $request->get('content_1');
            $articles->content_2 = $request->get('content_2');
            $articles->description = $request->get('content_img');
            $articles->content_video = $request->get('content_video');
            $articles->rating = $request->get('rating');
            $articles->author = $request->get('author');
            $articles->display = isset($request->display) ? 1 : 0;
            $articles->save();
            $this->addMultimedia($request, $id, 6);
            return redirect()->route('admin.booking.articles.index')->with(['success' => 'Sửa bài viết thành công']);
        }catch (\Exception $exception){
            return back()->with(['error' => $exception->getMessage()]);
        }
    }

    public function blog ()
    {
        $titlePage = 'Blog trải nghiệm';
        $page_menu = 'booking';
        $page_sub = 'blog';
        $listData = TravelArticlesModel::where('type', 2)->get();
        return view('admin.booking.blog.index', compact('titlePage', 'page_menu', 'page_sub', 'listData'));
    }
    public function blogCreate ()
    {
        $titlePage = 'Blog trải nghiệm';
        $page_menu = 'booking';
        $page_sub = 'blog';
        $category = CategoryBookingModel::all();
        return view('admin.booking.blog.create', compact('titlePage', 'page_menu', 'page_sub', 'category'));
    }
    public function blogStore (Request $request)
    {
        try{
            $slug = Str::slug($request->get('title'));
            $articles = TravelArticlesModel::where('slug', $slug)->first();
            if (isset($articles)){
                return back()->with(['error' => 'Bài viết này đã được tạo']);
            }
            if (!$request->hasFile('file')){
                return back()->with(['error' => 'Vui lòng thêm ảnh hoặc video món ăn']);
            }
            $file = $request->file('file');
            $image = $this->addImageVideoCulinary($file, 'upload/explore_tourism/articles/img/', 'upload/explore_tourism/articles/video/');
            $video_review = null;
            if ($request->hasFile('video')){
                $file_video = $request->file('video');
                $video = $this->addVideoReview($file_video, 'upload/explore_tourism/articles/review/');
                $video_review = $video['video'];
            }
            $src = null;
            if ($request->hasFile('img_1')){
                $src = $this->addImageVideoCulinary($request->file('img_1'), 'upload/travel/articles/img/', null);
            }
            $category = CategoryBookingModel::find($request->get('category'));
            $articles = new TravelArticlesModel([
                'title' => $request->get('title'),
                'slug' => $slug,
                'banner' => $image['banner'],
                'category' =>$request->get('category'),
                'name_category' =>isset($category) ? $category->name : null,
                'is_video' => $image['video_active'],
                'content' =>$request->get('content'),
                'content_img' =>$request->get('content_img'),
                'video_review' => $video_review,
                'content_video' =>$request->get('content_video'),
                'rating' => $request->get('rating'),
                'index' => $request->get('index'),
                'display' => isset($request->display) ? 1 : 0,
                'layout' => isset($request->layout) ? $request->get('layout') : 1,
                'src' => isset($src) ? $src['banner'] : null,
                'created_by' => Auth::id(),
                'type' => 2
            ]);
            $articles->save();
            $this->addMultimedia($request, $articles->id, 3);
            return redirect()->route('admin.booking.blog.index')->with(['success' => 'Thêm mới bài viết thành công ']);
        }catch (\Exception $exception){
            return back()->with(['error' => $exception->getMessage()]);
        }
    }
    public function blogEdit ($slug)
    {
        $post = TravelArticlesModel::where('slug', $slug)->where('type', 2)->first();
        if (empty($post)){
            return back()->with(['error' => 'Bài viết không tồn tại']);
        }
        $category = CategoryBookingModel::all();
        $multimedia = MultimediaFilesModel::where('parent_id', $post->id)->where('parent_type', 3)->get();
        $titlePage = 'Blog trải nghiệm';
        $page_menu = 'booking';
        $page_sub = 'blog';
        return view('admin.booking.blog.edit', compact('titlePage', 'page_menu', 'page_sub', 'category', 'post', 'multimedia'));
    }
    public function blogUpdate (Request $request, $slug)
    {
        try{
            $post = TravelArticlesModel::where('slug', $slug)->first();
            if (empty($post)){
                return back()->with(['error' => 'Bài viết không tồn tại']);
            }
            $slug_2 = Str::slug($request->get('title'));
            if ($slug_2 != $slug){
                $post_2 = TravelArticlesModel::where('slug', $slug_2)->first();
                if (isset($post_2)){
                    return back()->with(['error' => 'Bài viết đã tồn tại']);
                }
            }
            if ($request->hasFile('file')){
                $file = $request->file('file');
                $image = $this->addImageVideoCulinary($file, 'upload/explore_tourism/articles/img/', 'upload/explore_tourism/articles/video/');
                unlink($post->banner);
                $post->banner = $image['banner'];
                $post->is_video = $image['video_active'];
            }
            if ($request->hasFile('video')){
                $file_video = $request->file('video');
                $video = $this->addVideoReview($file_video, 'upload/explore_tourism/articles/review/');
                unlink($post->video_review);
                $post->video_review = $video['video'];
            }
            if ($request->hasFile('img_1')){
                $img_1 = $this->addImageVideoCulinary($request->file('img_1'), 'upload/travel/articles/img/', null);
//                    unlink($post->src);
                $post->src = $img_1['banner'];
            }
            $category = CategoryBookingModel::find($request->get('category'));
            if (isset($category)){
                $post->category = $category->id;
                $post->name_category = $category->name ;
            }
            $post->title = $request->get('title');
            $post->slug = $slug_2;
            $post->content = $request->get('content');
            $post->content_img = $request->get('content_img');
            $post->content_video = $request->get('content_video');
            $post->rating = $request->get('rating');
            $post->index = $request->get('index');
            $post->display = isset($request->display) ? 1 : 0;
            $post->layout = $request->get('layout');
            $post->save();
            $this->addMultimedia($request, $post->id, 3);
            return redirect()->route('admin.booking.blog.index')->with(['success' => 'Cập nhật bài viết thành công']);
        }catch (\Exception $exception){
            return back()->with(['error' => $exception->getMessage()]);
        }
    }

    protected function createPartner ($phone)
    {
        $partner = User::where('name', $phone)->where('level', 'partner')->first();
        $password = 'dlvinhphuc@'.rand(111111,999999);
        if (empty($partner)){
            $partner = new User([
                'name' => $phone,
                'email' => 'dlvinhphuc'.rand(1111, 9999).'@gamil.com',
                'password' => bcrypt($password),
                'level' => 'partner',
                'password_default' => $password
            ]);
            $partner->save();
        }
        return true;
    }
}
