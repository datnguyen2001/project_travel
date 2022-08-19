<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\BannerappModel;
use App\Models\TitlefeatursModel;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class IntroduceController extends Controller
{
    public function indexBanner()
    {
        $titlePage = 'Giới thiệu';
        $page_menu = 'introduce';
        $page_sub = 'feature';
        $listData = BannerappModel::all();
        return view('admin.introduce.feature.index', compact('listData', 'titlePage', 'page_menu', 'page_sub'));
    }
    public function createBanner()
    {
        try{
            $titlePage = 'Giới thiệu';
            $page_menu = 'introduce';
            $page_sub = 'feature';
            return view('admin.introduce.feature.create', compact( 'titlePage', 'page_menu', 'page_sub'));
        }catch (\Exception $e){
            return back()->with(['error' => $e->getMessage()]);
        }
    }

    public function storeBanner (Request $request)
    {
        try{
            if (!$request->hasFile('file')){
                return back()->with(['error' => 'Vui lòng thêm hình ảnh']);
            }
            $file = $request->file('file');
            $file_name = $this->addImageVideoCulinary($file, 'upload/banner/img/',null);
            $bannerapp = new BannerappModel([
                'src' => $file_name['banner']
            ]);
            $bannerapp->save();
            return redirect()->route('admin.introduce.feature.index')->with(['success' => 'Tạo banner thành công']);
        }catch (\Exception $exception){
            return back()->with(['error' => $exception->getMessage()]);
        }
    }

    public function editBanner ($id)
    {
        $banner = BannerappModel::where('id', $id)->first();
        if (empty($banner)){
            return back()->with(['error' => 'thông tin không tồn tại']);
        }
        $titlePage = 'Giới thiệu';
        $page_menu = 'introduce';
        $page_sub = 'feature';
        return view('admin.introduce.feature.edit', compact('titlePage', 'page_menu', 'page_sub','banner'));
    }

    public function updateBanner ($id, Request $request)
    {
        try{
            $room = BannerappModel::find($id);
            if (empty($room)){
                return back()->with(['error' => 'Thông tin không tồn tại']);
            }
            if ($request->hasFile('file')){
                $file = $request->file('file');
                $extension = $file->getClientOriginalExtension();
                if ($extension == 'mp4' || $extension == 'video'){
                    $part = 'upload/room_hotel/video/';
                }else{
                    $part = 'upload/room_hotel/img/';
                }
                $file_name = $part.Str::random(40). '.'. $file->getClientOriginalExtension();
                $file->move($part, $file_name);
//                unlink($room->src);
                $room->src = $file_name;
            }

            $room->save();
            BannerappModel::where('id', $id)->delete();
            $room_convenient = new BannerappModel([
                'id' => $room->id,
                'src' => $room->src,
            ]);
            $room_convenient->save();
            return redirect()->route('admin.introduce.feature.index')->with(['success' => 'Sửa thông tin thành công']);
        }catch (\Exception $exception){
            return back()->with(['error' => $exception->getMessage()]);
        }
    }
    public function deleteBanner ($id)
    {
        $room = BannerappModel::find($id);
        if (empty($room)){
            $data['status'] = false;
            $data['msg'] = 'Banner không tồn tại';
            return $data;
        }
//        unlink($room->banner);
        $room->delete();
        BannerappModel::where('id', $id)->delete();
        $data['status'] = true;
        return $data;
    }

    public function index_feature()
    {
        $titlePage = 'Giới thiệu';
        $page_menu = 'introduce';
        $page_sub = 'contentFeature';
        $listData = TitlefeatursModel::orderBy('index', 'asc')->get();
        return view('admin.introduce.feature.indexfeature', compact('listData', 'titlePage', 'page_menu', 'page_sub'));
    }

    public function create_feature()
    {
        try{
            $titlePage = 'Giới thiệu';
            $page_menu = 'introduce';
            $page_sub = 'contentFeature';
            return view('admin.introduce.feature.createfeature', compact( 'titlePage', 'page_menu', 'page_sub'));
        }catch (\Exception $e){
            return back()->with(['error' => $e->getMessage()]);
        }
    }

    public function store_feature (Request $request)
    {
        try{
            if (!$request->hasFile('file')){
                return back()->with(['error' => 'Vui lòng thêm hình ảnh hoặc video']);
            }
            $file = $request->file('file');
            $extension = $file->getClientOriginalExtension();
            if ($extension == 'mp4' || $extension == 'video'){
                $part = 'upload/banner/video/';
            }else{
                $part = 'upload/banner/img/';
            }
            if ($request->get('display') == 'on'){
                $display = 1;
            }else{
                $display = 0;
            }
            $file_name = $part.Str::random(40). '.'. $file->getClientOriginalExtension();
            $request->file('file')->move($part, $file_name);
            $banner = new TitlefeatursModel([
                'title' => $request->get('title'),
                'content' => $request->get('content'),
                'display' => $display,
                'src' => $file_name,
                'index' => $request->get('index'),

            ]);
            $banner->save();
            return redirect()->route('admin.introduce.contentFeature.index')->with(['success' => 'Tạo banner thành công']);
        }catch (\Exception $exception){
            return back()->with(['error' => $exception->getMessage()]);
        }
    }

    public function edit_feature ($id)
    {
        try{
            $banner = TitlefeatursModel::find($id);
            if (empty($banner)){
                return back()->with(['error' => 'Banner không tồn tại']);
            }
            $titlePage = 'Giới thiệu';
            $page_menu = 'introduce';
            $page_sub = 'contentFeature';
            return view('admin.introduce.feature.edit_feature', compact('titlePage', 'page_menu', 'page_sub', 'banner'));
        }catch (\Exception $exception){
            return back()->with(['error' => $exception->getMessage()]);
        }
    }
    public function update_feature ($id, Request $request)
    {
        try{
            $title = TitlefeatursModel::find($id);
            if (empty($title)){
                return back()->with(['error' => 'Thông tin không tồn tại']);
            }
            if ($request->get('display') == 'on'){
                $display = 1;
            }else{
                $display = 0;
            }
            if ($request->hasFile('file')){
                $file = $request->file('file');
                $extension = $file->getClientOriginalExtension();
                if ($extension == 'mp4' || $extension == 'video'){
                    $part = 'upload/room_hotel/video/';
                }else{
                    $part = 'upload/room_hotel/img/';
                }
                $file_name = $part.Str::random(40). '.'. $file->getClientOriginalExtension();
                $file->move($part, $file_name);
                $title->src = $file_name;
            }

            $title->save();
            TitlefeatursModel::where('id', $id)->delete();
            $room_convenient = new TitlefeatursModel([
                'id' => $title->id,
                'title' => $request->get('title'),
                'content' => $request->get('content'),
                'index' => $request->get('index'),
                'display' => $display,
                'src' => $title->src,

            ]);
            $room_convenient->save();
            return redirect()->route('admin.introduce.contentFeature.index')->with(['success' => 'Sửa thông tin thành công']);
        }catch (\Exception $exception){
            return back()->with(['error' => $exception->getMessage()]);
        }
    }

    public function delete_feature ($id)
    {
        $remove = TitlefeatursModel::find($id);
        if (empty($remove)){
            $data['status'] = false;
            $data['msg'] = 'Title không tồn tại';
            return $data;
        }
        $remove->delete();
        TitlefeatursModel::where('id', $id)->delete();
        $data['status'] = true;
        return $data;
    }
}

