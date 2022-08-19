<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\SupportModel;
use Illuminate\Http\Request;

class SupportController extends Controller
{
    public function index()
    {
        $titlePage = 'Giới thiệu';
        $page_menu = 'introduce';
        $page_sub = 'support';
        $listData = SupportModel::orderBy('index', 'asc')->get();
        return view('admin.introduce.support.index', compact('listData', 'titlePage', 'page_menu', 'page_sub'));
    }

    public function create()
    {
        try{
            $titlePage = 'Giới thiệu';
            $page_menu = 'introduce';
            $page_sub = 'support';
            return view('admin.introduce.support.create', compact( 'titlePage', 'page_menu', 'page_sub'));
        }catch (\Exception $e){
            return back()->with(['error' => $e->getMessage()]);
        }
    }

    public function store (Request $request)
    {
        try{
            $img_1 = null;
            if ($request->hasFile('icon')) {
                $icon = $this->addImageVideoCulinary($request->file('icon'), 'upload/travel/articles/img/', null);
            }
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
            $support = new SupportModel();
            $support['title'] = $request->get('title');
            $support['content'] = $request->get('content');
            $support['display'] = $display;
            $support['phone'] = $request->get('phone');
            $support['index'] = $request->get('index');
            $support['icon'] = isset($icon) ? $icon['banner'] : null;
            $support['src'] = $file_name['banner'];


            $support->save();
            return redirect()->route('admin.introduce.support.index')->with(['success' => 'Tạo bài viết thành công']);
        }catch (\Exception $exception){
            return back()->with(['error' => $exception->getMessage()]);
        }
    }

    public function edit ($id)
    {
        try{
            $support = SupportModel::find($id);
            if (empty($support)){
                return back()->with(['error' => 'Nội dung không tồn tại']);
            }
            $titlePage = 'Giới thiệu';
            $page_menu = 'introduce';
            $page_sub = 'support';
            return view('admin.introduce.support.edit', compact('titlePage', 'page_menu', 'page_sub', 'support'));
        }catch (\Exception $exception){
            return back()->with(['error' => $exception->getMessage()]);
        }
    }

    public function update ($id, Request $request)
    {
        try{
            $title = SupportModel::find($id);
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
            SupportModel::where('id', $id)->delete();
            $support = new SupportModel([
                'id' => $title->id,
                'title' => $request->get('title'),
                'content' => $request->get('content'),
                'phone' => $request->get('phone'),
                'index' => $request->get('index'),
                'display' => $display,
                'icon' => $title->icon,
                'src' => $title->src,

            ]);
            $support->save();
            return redirect()->route('admin.introduce.support.index')->with(['success' => 'Sửa thông tin thành công']);
        }catch (\Exception $exception){
            return back()->with(['error' => $exception->getMessage()]);
        }
    }

    public function delete ($id)
    {
        $remove = SupportModel::find($id);
        if (empty($remove)){
            $data['status'] = false;
            $data['msg'] = 'Title không tồn tại';
            return $data;
        }
        $remove->delete();
        SupportModel::where('id', $id)->delete();
        $data['status'] = true;
        return $data;
    }
}
