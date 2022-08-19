<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\BannerModel;
use App\Models\MultimediaFilesModel;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class BanerController extends Controller
{
    public function index()
    {
        $titlePage = 'Admin';
        $page_menu = 'dashboard';
        $page_sub = 'index';
        $listData = BannerModel::orderBy('index', 'asc')->get();
        return view('admin.dashboard', compact('titlePage', 'page_menu', 'page_sub', 'listData'));
    }
    /**
     * tạo banner
    **/
    public function create ()
    {
        try{
            $titlePage = 'Admin';
            $page_menu = 'dashboard';
            $page_sub = 'create';
            return view('admin.banner.create', compact('titlePage', 'page_menu', 'page_sub'));
        }catch (\Exception $e){
            return back()->with(['error' => $e->getMessage()]);
        }
    }

    public function store (Request $request)
    {
        try{
            if (!$request->hasFile('file')){
                return back()->with(['error' => 'Vui lòng thêm hình ảnh hoặc video']);
            }
            $file = $request->file('file');
            $extension = $file->getClientOriginalExtension();
            if ($extension == 'mp4' || $extension == 'video'){
               $part = 'upload/banner/video/';
               $type = 2;
            }else{
                $type = 1;
               $part = 'upload/banner/img/';
            }
            if ($request->get('display') == 'on'){
                $display = 1;
            }else{
                $display = 0;
            }
            $file_name = $part.Str::random(40). '.'. $file->getClientOriginalExtension();
            $request->file('file')->move($part, $file_name);
            $banner = new BannerModel([
                'title' => $request->get('title'),
                'content' => $request->get('content'),
                'link' => $request->get('link'),
                'index' => $request->get('index'),
                'display' => $display,
                'src' => $file_name,
                'type' => $type
            ]);
            $banner->save();
            return redirect()->route('admin.index')->with(['success' => 'Tạo banner thành công']);
        }catch (\Exception $exception){
            return back()->with(['error' => $exception->getMessage()]);
        }
    }
    /**
     * Bật tắt banner
    **/
    public function hide($id)
    {
        try{
            $banner = BannerModel::find($id);
            if (empty($banner)){
                $data['status'] = false;
                $data['msg'] = 'Banner không tồn tại';
                return $data;
            }
            if ($banner->display == 1){
                $banner->display = 0;
            }else{
                $banner->display = 1;
            }
            $banner->save();
            $data['status'] = true;
            $data['msg'] = 'Cập nhật thành công';
            return $data;
        }catch (\Exception $e){
            return $e->getMessage();
        }
    }
    /**
     * Xóa banner
    **/
    public function delete ($id)
    {
        $banner = BannerModel::find($id);
        if (empty($banner)){
            $data['status'] = false;
            $data['msg'] = 'Banner không tồn tại';
            return $data;
        }
        unlink($banner->src);
        $banner->delete();
        $data['status'] = true;
        return $data;
    }

    public function edit ($id)
    {
        try{
            $banner = BannerModel::find($id);
            if (empty($banner)){
                return back()->with(['error' => 'Banner không tồn tại']);
            }
            $titlePage = 'Admin';
            $page_menu = 'dashboard';
            $page_sub = null;
            return view('admin.banner.edit', compact('titlePage', 'page_menu', 'page_sub', 'banner'));
        }catch (\Exception $exception){
            return back()->with(['error' => $exception->getMessage()]);
        }
    }

    public function update ($id, Request $request)
    {
        try{
            $banner = BannerModel::find($id);
            if (empty($banner)){
                return back()->with(['error' => 'Banner không tồn tại']);
            }
            if ($request->hasFile('file')){
                $file = $request->file('file');
                $extension = $file->getClientOriginalExtension();
                if ($extension == 'mp4' || $extension == 'video'){
                    $part = 'upload/banner/video/';
                    $type = 2;
                }else{
                    $type = 1;
                    $part = 'upload/banner/img/';
                }
                $file_name = $part.Str::random(40). '.'. $file->getClientOriginalExtension();
                $request->file('file')->move($part, $file_name);
                unlink($banner->src);
                $banner->src = $file_name;
                $banner->type = $type;
            }
            if ($request->get('display') == 'on'){
                $display = 1;
            }else{
                $display = 0;
            }
            $banner->display = $display;
            $banner->title = $request->get('title');
            $banner->content = $request->get('content');
            $banner->link = $request->get('link');
            $banner->index = $request->get('index');
            $banner->save();
            return redirect()->route('admin.index')->with(['success' => 'Cập nhật banner thành công']);
        }catch (\Exception $e){
            return back()->with(['error' => $e->getMessage()]);
        }
    }
    /**
     * delete multimedia file
    **/
    public function deleteMultimedia ($id)
    {
        $multimedia_file = MultimediaFilesModel::find($id);
        if (empty($multimedia_file)){
            $data['status'] = false;
            $data['msg'] = 'Hình ảnh không tồn tại';
            return $data;
        }
        unlink($multimedia_file->src);
        $multimedia_file->delete();
        $data['status'] = true;
        return $data;
    }
}
