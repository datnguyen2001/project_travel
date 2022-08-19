<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\SearchServiceModel;
use Illuminate\Http\Request;

class SearchServicesController extends Controller
{
    public function index()
    {
        $titlePage = 'Giới thiệu';
        $page_menu = 'introduce';
        $page_sub = 'searchServices';
        $searchServices = SearchServiceModel::orderBy('index', 'asc')->get();;

        return view('admin.introduce.searchService.index', compact('searchServices','titlePage','page_menu','page_sub'));
    }

    public function create ()
    {
        $titlePage = 'Giới thiệu';
        $page_menu = 'introduce';
        $page_sub = 'searchServices';
        return view('admin.introduce.searchService.create', compact('titlePage', 'page_menu', 'page_sub'));
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

            $SearchService = new SearchServiceModel([
                'title' => $request->get('title'),
                'content' => $request->get('content'),
                'ratings' => $request->get('ratings'),
                'location' => $request->get('location'),
                'display' => $display,
                'src' => $file_name['banner'],
                'index' => $request->get('index'),

            ]);
            $SearchService->save();
            return redirect()->route('admin.introduce.searchServices.index')->with(['success' => 'Tạo bài viết thành công']);
        }catch (\Exception $exception){
            return back()->with(['error' => $exception->getMessage()]);
        }
    }
    public function edit ($id)
    {
        try{
            $SearchService = SearchServiceModel::find($id);
            if (empty($SearchService)){
                return back()->with(['error' => 'Banner không tồn tại']);
            }
            $titlePage = 'Giới thiệu';
            $page_menu = 'introduce';
            $page_sub = 'searchServices';
            return view('admin.introduce.searchService.edit', compact('titlePage', 'page_menu', 'page_sub', 'SearchService'));
        }catch (\Exception $exception){
            return back()->with(['error' => $exception->getMessage()]);
        }
    }

    public function update ($id, Request $request)
    {
        try{
            $title = SearchServiceModel::find($id);
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
            SearchServiceModel::where('id', $id)->delete();
            $SearchService = new SearchServiceModel([
                'id' => $title->id,
                'title' => $request->get('title'),
                'content' => $request->get('content'),
                'ratings' => $request->get('ratings'),
                'location' => $request->get('location'),
                'display' => $display,
                'index' => $request->get('index'),
                'src' => $title->src,

            ]);
            $SearchService->save();
            return redirect()->route('admin.introduce.searchServices.index')->with(['success' => 'Sửa thông tin thành công']);
        }catch (\Exception $exception){
            return back()->with(['error' => $exception->getMessage()]);
        }
    }

    public function delete ($id)
    {
        $remove = SearchServiceModel::find($id);
        if (empty($remove)){
            $data['status'] = false;
            $data['msg'] = 'Title không tồn tại';
            return $data;
        }
        $remove->delete();
        SearchServiceModel::where('id', $id)->delete();
        $data['status'] = true;
        return $data;
    }
}
