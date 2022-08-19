<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\SupperAppModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SuperAppController extends Controller
{
    public function index()
    {
        $titlePage = 'Giới thiệu';
        $page_menu = 'introduce';
        $page_sub = 'superApp';
        $superApp = SupperAppModel::all();

        return view('admin.introduce.superApp.index', compact('superApp','titlePage','page_menu','page_sub'));
    }
    public function create ()
    {
        $titlePage = 'Giới thiệu';
        $page_menu = 'introduce';
        $page_sub = 'superApp';
        return view('admin.introduce.superApp.create', compact('titlePage', 'page_menu', 'page_sub'));
    }

    public function store (Request $request)
    {
        try {
            $video = null;
            $img_1 = null;
            $img_2 = null;
            $img_3 = null;
            if ($request->hasFile('img_1')) {
                $img_1 = $this->addImageVideoCulinary($request->file('img_1'), 'upload/travel/articles/img/', null);
            }
            if ($request->hasFile('img_2')) {
                $img_2 = $this->addImageVideoCulinary($request->file('img_2'), 'upload/travel/articles/img/', null);
            }
            if ($request->hasFile('img_3')) {
                $img_3 = $this->addImageVideoCulinary($request->file('img_3'), 'upload/travel/articles/img/', null);
            }
            if ($request->get('display') == 'on'){
                $display = 1;
            }else{
                $display = 0;
            }
            $superApp = new SupperAppModel();
            $superApp['title'] = $request->get('title');
            $superApp['content'] = $request->get('content');
            $superApp['Explores'] = $request->get('Explores');
            $superApp['Destinations'] = $request->get('Destinations');
            $superApp['Experience'] = $request->get('Experience');
            $superApp['index'] = $request->get('index');
            $superApp['display'] = $display;
            $superApp['img_1'] = isset($img_1) ? $img_1['banner'] : null;
            $superApp['img_2'] = isset($img_2) ? $img_2['banner'] : null;
            $superApp['img_3'] = isset($img_3) ? $img_3['banner'] : null;
            $superApp->save();
            return redirect()->route('admin.introduce.superApp.index')->with(['success' => 'Thêm bài viết mới thành công']);
        } catch (\Exception $exception) {
            return back()->with(['error' => $exception->getMessage()]);
        }
    }

    public function edit ($id)
    {
        $superApp = SupperAppModel::find($id);
        $titlePage = 'Giới thiệu';
        $page_menu = 'introduce';
        $page_sub = 'superApp';
        return view('admin.introduce.superApp.edit', compact('superApp',  'titlePage', 'page_menu', 'page_sub' ));
    }

    public function update (Request $request, $id)
    {
        try{
            $super = SupperAppModel::where('id', $id)->first();
            if (empty($super)){
                return back()->with(['error' => 'Bài viết không tồn tại']);
            }
            $video = null;
            $img_1 = null;
            $img_2 = null;
            $img_3 = null;
            if ($request->hasFile('img_1')) {
                $img_1 = $this->addImageVideoCulinary($request->file('img_1'), 'upload/travel/articles/img/', null);
                if (isset($super->img_1)){
                    unlink($super->img_1);
                }
                $super['img_1'] = $img_1['banner'];
            }
            if ($request->hasFile('img_2')) {
                $img_2 = $this->addImageVideoCulinary($request->file('img_2'), 'upload/travel/articles/img/', null);
                if (isset($super->img_2)){
                    unlink($super->img_2);
                }
                $super['img_2'] = $img_2['banner'];
            }
            if ($request->hasFile('img_3')) {
                $img_3 = $this->addImageVideoCulinary($request->file('img_3'), 'upload/travel/articles/img/', null);
                if (isset($super->img_3)){
                    unlink($super->img_3);
                }
                $super['img_3'] = $img_3['banner'];
            }
            $super->save();
            if ($request->get('display') == 'on'){
                $display = 1;
            }else{
                $display = 0;
            }
            $superApp = array();
            $superApp['title'] = $request->get('title');
            $superApp['content'] = $request->get('content');
            $superApp['Explores'] = $request->get('Explores');
            $superApp['Destinations'] = $request->get('Destinations');
            $superApp['Experience'] = $request->get('Experience');
            $superApp['index'] = $request->get('index');
            $superApp['display'] = $display;
            DB::table('super_app')->where('id',$id)->update($superApp);
            return redirect()->route('admin.introduce.superApp.index')->with(['success' => 'Sửa bài viết mới thành công']);
        } catch (\Exception $exception) {
            return back()->with(['error' => $exception->getMessage()]);
        }
    }

    public function delete ($id)
    {
        $remove = SupperAppModel::find($id);
        if (empty($remove)){
            $data['status'] = false;
            $data['msg'] = 'Title không tồn tại';
            return $data;
        }
        $remove->delete();
        SupperAppModel::where('id', $id)->delete();
        $data['status'] = true;
        return $data;
    }
}
