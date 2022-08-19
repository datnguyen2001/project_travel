<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\TechnologyModelModel;
use Illuminate\Http\Request;

class TechnologyControllerer extends Controller
{
    public function index()
    {
        $titlePage = 'Giới thiệu';
        $page_menu = 'introduce';
        $page_sub = 'technology';
        $listData = TechnologyModelModel::orderBy('index', 'asc')->get();
        return view('admin.introduce.technology.index', compact('listData', 'titlePage', 'page_menu', 'page_sub'));
    }

    public function create()
    {
        try{
            $titlePage = 'Giới thiệu';
            $page_menu = 'introduce';
            $page_sub = 'technology';
            return view('admin.introduce.technology.create', compact( 'titlePage', 'page_menu', 'page_sub'));
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

            $technology = new TechnologyModelModel([
                'title' => $request->get('title'),
                'content' => $request->get('content'),
                'display' => $display,
                'src' => $file_name['banner'],
                'index' => $request->get('index'),

            ]);
            $technology->save();
            return redirect()->route('admin.introduce.technology.index')->with(['success' => 'Tạo bài viết thành công']);
        }catch (\Exception $exception){
            return back()->with(['error' => $exception->getMessage()]);
        }
    }

    public function edit ($id)
    {
        try{
            $technology = TechnologyModelModel::find($id);
            if (empty($technology)){
                return back()->with(['error' => 'Nội dung không tồn tại']);
            }
            $titlePage = 'Giới thiệu';
            $page_menu = 'introduce';
            $page_sub = 'technology';
            return view('admin.introduce.technology.edit', compact('titlePage', 'page_menu', 'page_sub', 'technology'));
        }catch (\Exception $exception){
            return back()->with(['error' => $exception->getMessage()]);
        }
    }
    public function update ($id, Request $request)
    {
        try{
            $title = TechnologyModelModel::find($id);
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
            TechnologyModelModel::where('id', $id)->delete();
            $technology = new TechnologyModelModel([
                'id' => $title->id,
                'title' => $request->get('title'),
                'content' => $request->get('content'),
                'index' => $request->get('index'),
                'display' => $display,
                'src' => $title->src,

            ]);
            $technology->save();
            return redirect()->route('admin.introduce.technology.index')->with(['success' => 'Sửa thông tin thành công']);
        }catch (\Exception $exception){
            return back()->with(['error' => $exception->getMessage()]);
        }
    }

    public function delete ($id)
    {
        $remove = TechnologyModelModel::find($id);
        if (empty($remove)){
            $data['status'] = false;
            $data['msg'] = 'Title không tồn tại';
            return $data;
        }
        $remove->delete();
        TechnologyModelModel::where('id', $id)->delete();
        $data['status'] = true;
        return $data;
    }
}
