<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\GeographicalLocationModel;
use App\Models\IntroduceVPModel;
use App\Models\TraditionPeopleModel;
use Illuminate\Http\Request;

class IntroduceVPController extends Controller
{
    public function index()
    {
        $titlePage = 'Giới thiệu về vĩnh phúc';
        $page_menu = 'introduceVP';
        $page_sub = 'introduce';
        $listData = IntroduceVPModel::all();
        return view('admin.IntroduceVP.introduce.index', compact('listData', 'titlePage', 'page_menu', 'page_sub'));
    }

    public function create()
    {
        try{
            $titlePage = 'Giới thiệu về vĩnh phúc';
            $page_menu = 'introduceVP';
            $page_sub = 'introduce';
            return view('admin.IntroduceVP.introduce.create', compact( 'titlePage', 'page_menu', 'page_sub'));
        }catch (\Exception $e){
            return back()->with(['error' => $e->getMessage()]);
        }
    }

    public function store (Request $request)
    {
        try{
            if (!$request->hasFile('file')){
                return back()->with(['error' => 'Vui lòng thêm ảnh bìa bài viết']);
            }
            $src = $this->addImageVideoCulinary($request->file('file'), 'upload/travel/articles/img/', 'upload/travel/articles/video/');
            $img_1 = null; $img_2 = null;
            if ($request->hasFile('img_1')){
                $img_1 = $this->addImageVideoCulinary($request->file('img_1'), 'upload/travel/articles/img/', null);
            }
            if ($request->hasFile('img_2')){
                $img_2 = $this->addImageVideoCulinary($request->file('img_2'), 'upload/travel/articles/img/', null);
            }
            $introduce = new IntroduceVPModel();
            $introduce['title'] = $request->get('title');
            $introduce['content'] = $request->get('content');
            $introduce['posts'] = $request->get('posts');
            $introduce['src'] = $src['banner'];
            $introduce['img_1'] = isset($img_1) ? $img_1['banner'] : null;
            $introduce['img_2'] = isset($img_2) ? $img_2['banner'] : null;
            $introduce['author'] = $request->get('author');
            $introduce['display'] = isset($request->display) ? 1 : 0;
            $introduce['index'] = $request->get('index');
            $introduce->save();
            return redirect()->route('admin.introduce_VP.introduce.index')->with(['success' => 'Thêm bài viết mới thành công']);
        }catch (\Exception $exception){
            return back()->with(['error' => $exception->getMessage()]);
        }
    }

    public function edit ($id)
    {
        $introduce = IntroduceVPModel::find($id);
        if (empty($introduce)){
            return back()->with(['error' => 'Nội dung không tồn tại']);
        }
        $titlePage = 'Giới thiệu về vĩnh phúc';
        $page_menu = 'introduceVP';
        $page_sub = 'introduce';
        return view('admin.IntroduceVP.introduce.edit', compact('introduce', 'titlePage', 'page_menu', 'page_sub'));
    }

    public function update ($id, Request $request)
    {
        try{
            $introduce = IntroduceVPModel::find($id);
            if (empty($introduce)){
                return back()->with(['error' => 'Bài viết không tồn tại']);
            }
            $src = null; $img_1 = null; $img_2 = null;
            if ($request->hasFile('file')){
                $src = $this->addImageVideoCulinary($request->file('file'), 'upload/travel/articles/img/', 'upload/travel/articles/video/');
                unlink($introduce->src);
                $introduce['src'] =  $src['banner'];
            }
            if ($request->hasFile('img_1')){
                $img_1 = $this->addImageVideoCulinary($request->file('img_1'), 'upload/travel/articles/img/', null);
                if (isset($introduce->img_1)){
                    unlink($introduce->img_1);
                }
                $introduce['img_1'] = $img_1['banner'];
            }
            if ($request->hasFile('img_2')){
                $img_2 = $this->addImageVideoCulinary($request->file('img_2'), 'upload/travel/articles/img/', null);
                if (isset($introduce->img_2)){
                    unlink($introduce->img_2);
                }
                $introduce['img_2'] = $img_2['banner'];
            }

            $introduce['title'] = $request->get('title');
            $introduce['content'] = $request->get('content');
            $introduce['posts'] = $request->get('posts');
            $introduce['index'] = $request->get('index');
            $introduce['author'] = $request->get('author');
            $introduce['display'] = isset($request->display) ? 1 : 0;
            $introduce->save();
            return redirect()->route('admin.introduce_VP.introduce.index')->with(['success' => 'Sửa bài viết thành công']);
        }catch (\Exception $exception){
            return back()->with(['error' => $exception->getMessage()]);
        }
    }

    public function delete ($id)
    {
        $remove = IntroduceVPModel::find($id);
        if (empty($remove)){
            $data['status'] = false;
            $data['msg'] = 'bài viết không tồn tại';
            return $data;
        }
        $remove->delete();
        IntroduceVPModel::where('id', $id)->delete();
        $data['status'] = true;
        return $data;
    }

    public function indexLocation()
    {
        $titlePage = 'Giới thiệu về vĩnh phúc';
        $page_menu = 'introduceVP';
        $page_sub = 'geographical';
        $listData = GeographicalLocationModel::all();
        return view('admin.IntroduceVP.geographical_location.index', compact('listData', 'titlePage', 'page_menu', 'page_sub'));
    }

    public function createLocation()
    {
        try{
            $titlePage = 'Giới thiệu về vĩnh phúc';
            $page_menu = 'introduceVP';
            $page_sub = 'geographical';
            return view('admin.IntroduceVP.geographical_location.create', compact( 'titlePage', 'page_menu', 'page_sub'));
        }catch (\Exception $e){
            return back()->with(['error' => $e->getMessage()]);
        }
    }

    public function storeLocation (Request $request)
    {
        try{
            if (!$request->hasFile('file')){
                return back()->with(['error' => 'Vui lòng thêm ảnh bìa bài viết']);
            }
            $src = $this->addImageVideoCulinary($request->file('file'), 'upload/travel/articles/img/', 'upload/travel/articles/video/');
            $img_1 = null; $img_2 = null;
            if ($request->hasFile('img_1')){
                $img_1 = $this->addImageVideoCulinary($request->file('img_1'), 'upload/travel/articles/img/', null);
            }
            if ($request->hasFile('img_2')){
                $img_2 = $this->addImageVideoCulinary($request->file('img_2'), 'upload/travel/articles/img/', null);
            }
            $introduce = new GeographicalLocationModel();
            $introduce['title'] = $request->get('title');
            $introduce['content'] = $request->get('content');
            $introduce['posts'] = $request->get('posts');
            $introduce['src'] = $src['banner'];
            $introduce['img_1'] = isset($img_1) ? $img_1['banner'] : null;
            $introduce['img_2'] = isset($img_2) ? $img_2['banner'] : null;
            $introduce['author'] = $request->get('author');
            $introduce['display'] = isset($request->display) ? 1 : 0;
            $introduce['index'] = $request->get('index');
            $introduce->save();
            return redirect()->route('admin.introduce_VP.geographical.index')->with(['success' => 'Thêm bài viết mới thành công']);
        }catch (\Exception $exception){
            return back()->with(['error' => $exception->getMessage()]);
        }
    }

    public function editLocation ($id)
    {
        $introduce = GeographicalLocationModel::find($id);
        if (empty($introduce)){
            return back()->with(['error' => 'Nội dung không tồn tại']);
        }
        $titlePage = 'Giới thiệu về vĩnh phúc';
        $page_menu = 'introduceVP';
        $page_sub = 'geographical';
        return view('admin.IntroduceVP.geographical_location.edit', compact('introduce', 'titlePage', 'page_menu', 'page_sub'));
    }

    public function updateLocation ($id, Request $request)
    {
        try{
            $introduce = GeographicalLocationModel::find($id);
            if (empty($introduce)){
                return back()->with(['error' => 'Bài viết không tồn tại']);
            }
            $src = null; $img_1 = null; $img_2 = null;
            if ($request->hasFile('file')){
                $src = $this->addImageVideoCulinary($request->file('file'), 'upload/travel/articles/img/', 'upload/travel/articles/video/');
                unlink($introduce->src);
                $introduce['src'] =  $src['banner'];
            }
            if ($request->hasFile('img_1')){
                $img_1 = $this->addImageVideoCulinary($request->file('img_1'), 'upload/travel/articles/img/', null);
                if (isset($introduce->img_1)){
                    unlink($introduce->img_1);
                }
                $introduce['img_1'] = $img_1['banner'];
            }
            if ($request->hasFile('img_2')){
                $img_2 = $this->addImageVideoCulinary($request->file('img_2'), 'upload/travel/articles/img/', null);
                if (isset($introduce->img_2)){
                    unlink($introduce->img_2);
                }
                $introduce['img_2'] = $img_2['banner'];
            }

            $introduce['title'] = $request->get('title');
            $introduce['content'] = $request->get('content');
            $introduce['posts'] = $request->get('posts');
            $introduce['index'] = $request->get('index');
            $introduce['author'] = $request->get('author');
            $introduce['display'] = isset($request->display) ? 1 : 0;
            $introduce->save();
            return redirect()->route('admin.introduce_VP.geographical.index')->with(['success' => 'Sửa bài viết thành công']);
        }catch (\Exception $exception){
            return back()->with(['error' => $exception->getMessage()]);
        }
    }

    public function deleteLocation ($id)
    {
        $remove = GeographicalLocationModel::find($id);
        if (empty($remove)){
            $data['status'] = false;
            $data['msg'] = 'bài viết không tồn tại';
            return $data;
        }
        $remove->delete();
        GeographicalLocationModel::where('id', $id)->delete();
        $data['status'] = true;
        return $data;
    }

    public function indexTradition()
    {
        $titlePage = 'Giới thiệu về vĩnh phúc';
        $page_menu = 'introduceVP';
        $page_sub = 'tradition';
        $listData = TraditionPeopleModel::all();
        return view('admin.IntroduceVP.tradition_people.index', compact('listData', 'titlePage', 'page_menu', 'page_sub'));
    }

    public function createTradition()
    {
        try{
            $titlePage = 'Giới thiệu về vĩnh phúc';
            $page_menu = 'introduceVP';
            $page_sub = 'tradition';
            return view('admin.IntroduceVP.tradition_people.create', compact( 'titlePage', 'page_menu', 'page_sub'));
        }catch (\Exception $e){
            return back()->with(['error' => $e->getMessage()]);
        }
    }

    public function storeTradition (Request $request)
    {
        try{
            if (!$request->hasFile('file')){
                return back()->with(['error' => 'Vui lòng thêm ảnh bìa bài viết']);
            }
            $src = $this->addImageVideoCulinary($request->file('file'), 'upload/travel/articles/img/', 'upload/travel/articles/video/');
            $img_1 = null; $img_2 = null;
            if ($request->hasFile('img_1')){
                $img_1 = $this->addImageVideoCulinary($request->file('img_1'), 'upload/travel/articles/img/', null);
            }
            if ($request->hasFile('img_2')){
                $img_2 = $this->addImageVideoCulinary($request->file('img_2'), 'upload/travel/articles/img/', null);
            }
            $introduce = new TraditionPeopleModel();
            $introduce['title'] = $request->get('title');
            $introduce['content'] = $request->get('content');
            $introduce['posts'] = $request->get('posts');
            $introduce['src'] = $src['banner'];
            $introduce['img_1'] = isset($img_1) ? $img_1['banner'] : null;
            $introduce['img_2'] = isset($img_2) ? $img_2['banner'] : null;
            $introduce['author'] = $request->get('author');
            $introduce['display'] = isset($request->display) ? 1 : 0;
            $introduce['index'] = $request->get('index');
            $introduce->save();
            return redirect()->route('admin.introduce_VP.tradition.index')->with(['success' => 'Thêm bài viết mới thành công']);
        }catch (\Exception $exception){
            return back()->with(['error' => $exception->getMessage()]);
        }
    }

    public function editTradition ($id)
    {
        $introduce = TraditionPeopleModel::find($id);
        if (empty($introduce)){
            return back()->with(['error' => 'Nội dung không tồn tại']);
        }
        $titlePage = 'Giới thiệu về vĩnh phúc';
        $page_menu = 'introduceVP';
        $page_sub = 'tradition';
        return view('admin.IntroduceVP.tradition_people.edit', compact('introduce', 'titlePage', 'page_menu', 'page_sub'));
    }

    public function updateTradition ($id, Request $request)
    {
        try{
            $introduce = TraditionPeopleModel::find($id);
            if (empty($introduce)){
                return back()->with(['error' => 'Bài viết không tồn tại']);
            }
            $src = null; $img_1 = null; $img_2 = null;
            if ($request->hasFile('file')){
                $src = $this->addImageVideoCulinary($request->file('file'), 'upload/travel/articles/img/', 'upload/travel/articles/video/');
                unlink($introduce->src);
                $introduce['src'] =  $src['banner'];
            }
            if ($request->hasFile('img_1')){
                $img_1 = $this->addImageVideoCulinary($request->file('img_1'), 'upload/travel/articles/img/', null);
                if (isset($introduce->img_1)){
                    unlink($introduce->img_1);
                }
                $introduce['img_1'] = $img_1['banner'];
            }
            if ($request->hasFile('img_2')){
                $img_2 = $this->addImageVideoCulinary($request->file('img_2'), 'upload/travel/articles/img/', null);
                if (isset($introduce->img_2)){
                    unlink($introduce->img_2);
                }
                $introduce['img_2'] = $img_2['banner'];
            }

            $introduce['title'] = $request->get('title');
            $introduce['content'] = $request->get('content');
            $introduce['posts'] = $request->get('posts');
            $introduce['index'] = $request->get('index');
            $introduce['author'] = $request->get('author');
            $introduce['display'] = isset($request->display) ? 1 : 0;
            $introduce->save();
            return redirect()->route('admin.introduce_VP.tradition.index')->with(['success' => 'Sửa bài viết thành công']);
        }catch (\Exception $exception){
            return back()->with(['error' => $exception->getMessage()]);
        }
    }

    public function deleteTradition ($id)
    {
        $remove = TraditionPeopleModel::find($id);
        if (empty($remove)){
            $data['status'] = false;
            $data['msg'] = 'bài viết không tồn tại';
            return $data;
        }
        $remove->delete();
        TraditionPeopleModel::where('id', $id)->delete();
        $data['status'] = true;
        return $data;
    }
}
