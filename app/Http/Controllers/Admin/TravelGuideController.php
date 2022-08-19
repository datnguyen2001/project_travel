<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\TravelGuideModel;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class TravelGuideController extends Controller
{
    public function index()
    {
        $titlePage = 'Giới thiệu';
        $page_menu = 'introduce';
        $page_sub = 'travelGuide';
        $listData = TravelGuideModel::orderBy('index', 'asc')->get();
        return view('admin.introduce.travelGuide.index', compact('listData', 'titlePage', 'page_menu', 'page_sub'));
    }

    public function create()
    {
        try{
            $titlePage = 'Giới thiệu';
            $page_menu = 'introduce';
            $page_sub = 'travelGuide';
            return view('admin.introduce.travelGuide.create', compact( 'titlePage', 'page_menu', 'page_sub'));
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
            $file_name = $this->addImageVideoCulinary($file, 'upload/banner/img/',null);
            if ($request->get('display') == 'on'){
                $display = 1;
            }else{
                $display = 0;
            }

            $travelGuide = new TravelGuideModel([
                'title' => $request->get('title'),
                'content' => $request->get('content'),
                'display' => $display,
                'src' => $file_name['banner'],
                'index' => $request->get('index'),

            ]);
            $travelGuide->save();
            return redirect()->route('admin.introduce.travelGuide.index')->with(['success' => 'Tạo bài viết thành công']);
        }catch (\Exception $exception){
            return back()->with(['error' => $exception->getMessage()]);
        }
    }

    public function edit ($id)
    {
        try{
            $travelGuide = TravelGuideModel::find($id);
            if (empty($travelGuide)){
                return back()->with(['error' => 'Banner không tồn tại']);
            }
            $titlePage = 'Giới thiệu';
            $page_menu = 'introduce';
            $page_sub = 'travelGuide';
            return view('admin.introduce.travelGuide.edit', compact('titlePage', 'page_menu', 'page_sub', 'travelGuide'));
        }catch (\Exception $exception){
            return back()->with(['error' => $exception->getMessage()]);
        }
    }
    public function update ($id, Request $request)
    {
        try{
            $title = TravelGuideModel::find($id);
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
            TravelGuideModel::where('id', $id)->delete();
            $travelGuide = new TravelGuideModel([
                'id' => $title->id,
                'title' => $request->get('title'),
                'content' => $request->get('content'),
                'index' => $request->get('index'),
                'display' => $display,
                'src' => $title->src,

            ]);
            $travelGuide->save();
            return redirect()->route('admin.introduce.travelGuide.index')->with(['success' => 'Sửa thông tin thành công']);
        }catch (\Exception $exception){
            return back()->with(['error' => $exception->getMessage()]);
        }
    }

    public function delete ($id)
    {
        $remove = TravelGuideModel::find($id);
        if (empty($remove)){
            $data['status'] = false;
            $data['msg'] = 'Title không tồn tại';
            return $data;
        }
        $remove->delete();
        TravelGuideModel::where('id', $id)->delete();
        $data['status'] = true;
        return $data;
    }
}
