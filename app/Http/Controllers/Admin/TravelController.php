<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ArticlesReviewModel;
use App\Models\CategoryTravelModel;
use App\Models\MultimediaFilesModel;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class TravelController extends Controller
{
    public function category()
    {
        $listData =CategoryTravelModel::all();
        $titlePage = 'Du lịch';
        $page_menu = 'travel';
        $page_sub = 'category';
        return view('admin.travel.category.index', compact('titlePage', 'page_menu', 'page_sub', 'listData'));
    }

    public function categoryCreate()
    {
        $titlePage = 'Du lịch';
        $page_menu = 'travel';
        $page_sub = 'category';
        return view('admin.travel.category.create', compact('titlePage', 'page_menu', 'page_sub'));
    }

    public function categoryStore (Request $request)
    {
        try{
            if (!$request->hasFile('file')){
                return back()->with(['error' => 'Vui lòng thêm biểu tượng danh mục']);
            }
            $file = $request->file('file');
            $add_file = $this->addImageVideoCulinary($file, 'upload/travel/category/', null);
            $add_video = null;
            if ($request->hasFile('video')){
                $video = $request->file('video');
                $add_video = $this->addImageVideoCulinary($video, null, 'upload/travel/category/video/');
            }
            $category = new CategoryTravelModel([
                'title' => $request->get('title'),
                'banner' => $add_file['banner'],
                'display' => isset($request->display) ? 1 : 0,
                'index' => $request->get('index'),
                'video' => isset($add_video) ? $add_video['banner'] : null
            ]);
            $category->save();
            $this->addMultimedia($request, $category->id, 5);
            return redirect()->route('admin.travel.category.index')->with(['success' => 'Thêm danh mục thành công']);
        }catch (\Exception $exception){
            return back()->with(['error' => $exception->getMessage()]);
        }
    }
    public function categoryDelete (Request $request, $id)
    {
        try{
            $category = CategoryTravelModel::find($id);
            if (empty($category)){
                $data['status'] = false;
                $data['msg'] = 'Danh mục không tồn tại';
                return $data;
            }
            if (isset($category->banner)){
                unlink($category->banner);
            }
            if (isset($category->video)){
                unlink($category->video);
            }
            $category->delete();
            $this->deleteMultimediaFiles($category->id, 5);
            $data['status'] = true;
            $data['msg'] = 'Xóa danh mục thành công';
            return $data;
        }catch (\Exception $exception){
            $data['status'] = false;
            $data['msg'] = $exception->getMessage();
            return $data;
        }
    }

    public function categoryEdit ($id)
    {
        $category = CategoryTravelModel::find($id);
        if (empty($category)){
            return back()->with(['error' => 'Danh mục không tồn tại']);
        }
        $multimedia = MultimediaFilesModel::where('parent_id', $id)->where('parent_type', 5)->get();
        $titlePage = 'Du lịch';
        $page_menu = 'travel';
        $page_sub = 'category';
        return view('admin.travel.category.edit', compact('titlePage', 'page_menu', 'page_sub', 'category', 'multimedia'));
    }

    public function categoryUpdate (Request $request, $id)
    {
        try{
            $category = CategoryTravelModel::find($id);
            if (empty($category)){
                return back()->with(['error' => 'Danh mục không tồn tại']);
            }
            $category->title = $request->get('title');
            $category->index = $request->get('index');
            $category->display = isset($request->display) ? 1 : 0;
            if ($request->hasFile('file')){
                $banner = $this->addImageVideoCulinary($request->file('file'), 'upload/travel/category/', null);
                unlink($category->banner);
                $category->banner = $banner['banner'];
            }
            if ($request->hasFile('video')){
                $video = $this->addImageVideoCulinary($request->file('video'), null, 'upload/travel/category/video/');
                if (isset($category->video)){
                    unlink($category->video);
                }
                $category->video = $video['banner'];
            }
            $category->save();
            $this->addMultimedia($request, $category->id, 5);
            return redirect()->route('admin.travel.category.index')->with(['success' => 'Cập nhật danh mục thành công']);
        }catch (\Exception $exception){
            return back()->with(['error' => $exception->getMessage()]);
        }
    }
    /**
     * Bài viết
    **/
    public function articles ()
    {
        $listData =ArticlesReviewModel::where('category', 1)->orderBy('created_at', 'desc')->get();
        $titlePage = 'Du lịch';
        $page_menu = 'travel';
        $page_sub = 'articles';
        return view('admin.travel.articles.index', compact('titlePage', 'page_menu', 'page_sub', 'listData'));
    }

    public function articlesCreate ()
    {
        $category = CategoryTravelModel::all();
        $titlePage = 'Du lịch';
        $page_menu = 'travel';
        $page_sub = 'articles';
        return view('admin.travel.articles.create', compact('titlePage', 'page_sub', 'page_menu', 'category'));
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
            $category = CategoryTravelModel::find($request->get('category'));
            $articles = new ArticlesReviewModel();
            $articles['title'] = $request->get('title');
            $articles['slug'] = $slug;
            $articles['banner'] = $banner['banner'];
            $articles['src'] = isset($src) ? $src['banner'] : null;
            $articles['img_1'] = isset($img_1) ? $img_1['banner'] : null;
            $articles['img_2'] = isset($img_2) ? $img_2['banner'] : null;
            $articles['video'] = isset($video) ? $video['banner'] : null;
            $articles['content'] = $request->get('content');
            $articles['category'] = 1;
            $articles['category_id'] = $request->get('category');
            $articles['category_name'] = $category->title;
            $articles['content_1'] = $request->get('content_1');
            $articles['content_2'] = $request->get('content_2');
            $articles['description'] = $request->get('content_img');
            $articles['content_video'] = $request->get('content_video');
            $articles['rating'] = $request->get('rating');
            $articles['author'] = $request->get('author');
            $articles['display'] = isset($request->display) ? 1 : 0;
            $articles->save();
            $this->addMultimedia($request, $articles->id, 6);
            return redirect()->route('admin.travel.articles.index')->with(['success' => 'Thêm bài viết mới thành công']);
        }catch (\Exception $exception){
            return back()->with(['error' => $exception->getMessage()]);
        }
    }

    public function articlesEdit ($slug)
    {
        $articles = ArticlesReviewModel::where('category', 1)->where('slug', $slug)->first();
        if (empty($articles)){
            return back()->with(['error' => 'Bài viết không tồn tại']);
        }
        $category = CategoryTravelModel::all();
        $multimedia = MultimediaFilesModel::where('parent_id', $articles->id)->where('parent_type', 6)->get();
        $titlePage = 'Du lịch';
        $page_menu = 'travel';
        $page_sub = 'articles';
        return view('admin.travel.articles.edit', compact('articles', 'category', 'titlePage', 'page_menu', 'page_sub', 'multimedia'));
    }

    public function articlesUpdate (Request $request, $id)
    {
        try{
            $articles = ArticlesReviewModel::where('category', 1)->where('id', $id)->first();
            if (empty($articles)){
                return back()->with(['error' => 'Bài viết không tồn tại']);
            }
            $slug = Str::slug($request->get('title'));
            if ($slug != $articles->slug){
                $articles = ArticlesReviewModel::where('slug', $slug)->first();
                if (isset($articles)){
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
            $category = CategoryTravelModel::find($request->get('category'));
            $articles['title'] = $request->get('title');
            $articles['slug'] = $slug;
            $articles['content'] = $request->get('content');
            $articles['category_id'] = $request->get('category');
            $articles['category_name'] = $category->title;
            $articles['content_1'] = $request->get('content_1');
            $articles['content_2'] = $request->get('content_2');
            $articles['description'] = $request->get('content_img');
            $articles['content_video'] = $request->get('content_video');
            $articles['rating'] = $request->get('rating');
            $articles['author'] = $request->get('author');
            $articles['display'] = isset($request->display) ? 1 : 0;
            $articles->save();
            $this->addMultimedia($request, $id, 6);
            return redirect()->route('admin.travel.articles.index')->with(['success' => 'Sửa bài viết thành công']);
        }catch (\Exception $exception){
            return back()->with(['error' => $exception->getMessage()]);
        }
    }

    public function display (Request $request)
    {
        $articles = ArticlesReviewModel::find($request->get('id'));
        if (empty($articles)){
            $data['status'] = false;
            $data['msg'] = 'Bài viết không tồn tại';
            return $data;
        }
        if ($articles->display == 1){
            $articles->display = 0;
        }else{
            $articles->display = 1;
        }
        $articles->save();
        $data['status'] = true;
        return $data;
    }

    public function articlesDelete ($id)
    {
        try{
            $articles = ArticlesReviewModel::find($id);
            if (empty($articles)){
                $data['status'] = false;
                $data['msg'] = 'Bài viết không tồn tại ';
                return $data;
            }
            unlink($articles->banner);
            if (isset($articles->img_1)){
                unlink($articles->img_1);
            }
            if (isset($articles->img_2)){
                unlink($articles->img_2);
            }
            if (isset($articles->video)){
                unlink($articles->video);
            }
            $articles->delete();
            $this->deleteMultimediaFiles($id,6);
            $data['status'] = true;
            $data['msg'] = 'Xóa bài viết thành công';
            return $data;
        }catch (\Exception $exception){
            $data['status'] = false;
            $data['msg'] = $exception->getMessage();
            return $data;
        }
    }
}
