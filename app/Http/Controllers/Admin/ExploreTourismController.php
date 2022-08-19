<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\CategoryBookingModel;
use App\Models\CategoryCulinaryModel;
use App\Models\CategoryTourismModel;
use App\Models\CulinaryModel;
use App\Models\MultimediaFilesModel;
use App\Models\RestaurantCulinaryModel;
use App\Models\TravelArticlesModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use PHPUnit\Exception;

class ExploreTourismController extends Controller
{
    public function indexCategory ()
    {
        $titlePage = 'Khám phá du lịch';
        $page_menu = 'explore_tourism';
        $page_sub = 'category';
        $listData = CategoryTourismModel::orderBy('created_at', 'desc')->get();
        return view('admin.explore_tourism.category.index', compact('titlePage', 'page_menu', 'page_sub', 'listData'));
    }
    public function createCategory (Request $request)
    {
        $titlePage = 'Khám phá du lịch';
        $page_menu = 'explore_tourism';
        $page_sub = 'category';
        return view('admin.explore_tourism.category.create', compact('titlePage', 'page_menu', 'page_sub'));
    }
    public function storeCategory (Request $request)
    {
        try{
            if (!$request->hasFile('file')){
                return back()->with(['error' => 'Vui lòng thêm hình ảnh danh mục']);
            }
            $name = $request->get('name');
            $slug = Str::slug($name);
            $category = CategoryTourismModel::where('slug', $slug)->first();
            if (isset($category)){
                return back()->with(['error' => 'Danh mục đã tồn tại']);
            }
            $file = $request->file('file');
            $part = 'upload/explore_tourism/category/';
            $file_name = $part.Str::random(40). '.'. $file->getClientOriginalExtension();
            $file->move($part, $file_name);
            $category = new CategoryTourismModel([
                'name' => $name,
                'slug' => $slug,
                'img' => $file_name,
                'index' => $request->get('index'),
                'display' => isset($request->display) ? 1 : 0,
                'type' => $request->get('type')
            ]);
            $category->save();
            return redirect()->route('admin.explore_tourism.category.index')->with(['success' => 'Thêm mới thành công']);
        }catch (Exception $exception){
            return back()->with(['error' => $exception->getMessage()]);
        }
    }
    public function editCategory ($slug)
    {
        $category = CategoryTourismModel::where('slug', $slug)->first();
        if (empty($category)){
            return back()->with(['error' => 'Danh mục không tồn tại']);
        }
        $titlePage = 'Khám phá du lịch';
        $page_menu = 'explore_tourism';
        $page_sub = 'category';
        return view('admin.explore_tourism.category.edit', compact('titlePage', 'page_menu', 'page_sub', 'category'));
    }
    public function updateCategory ($slug, Request $request)
    {
        try{
            $category = CategoryTourismModel::where('slug', $slug)->first();
            if(empty($category)){
                return back()->with(['error' => 'Danh mục không tồn tại']);
            }
            $slug = Str::slug($request->get('name'));
            $slug_category = $category->slug;
            if ($slug != $slug_category){
                $category_new = CategoryTourismModel::where('slug', $slug)->first();
                if (isset($category_new)){
                    return back()->with(['error' => 'Danh mục đã tồn tại']);
                }
            }
            $category->name = $request->get('name');
            $category->slug = $slug;
            $category->index = $request->get('index');
            $category->display = isset($request->display) ? 1 : 0;
            $category->type = $request->get('type');
            if ($request->hasFile('file')){
                $file = $request->file('file');
                $part = 'upload/explore_tourism/category/';
                $file_name = $part.Str::random(40). '.'. $file->getClientOriginalExtension();
                $file->move($part, $file_name);
                unlink($category->img);
                $category->img = $file_name;
            }
            $category->save();
            return redirect()->route('admin.explore_tourism.category.index')->with(['success' => 'Cập nhật thành công']);
        }catch (\Exception $exception){
            return back()->with(['error' => $exception->getMessage()]);
        }
    }
    public function deleteCategory ($id)
    {
        $category = CategoryTourismModel::find($id);
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
    public function displayCategory (Request $request)
    {
        $category = CategoryTourismModel::find($request->get('id'));
        if(empty($category)){
            $data['status'] = false;
            $data['msg'] = 'Danh mục không tồn tại';
            return $data;
        }
        if ($category->display == 1){
            $category->display = 0;
        }else{
            $category->display = 1;
        }
        $category->save();
        $data['status'] = true;
        return $data;
    }
    /**
     * Bài viết
    **/
    public function indexPost (Request $request)
    {
        $titlePage = 'Khám phá du lịch';
        $page_menu = 'explore_tourism';
        $page_sub = 'posts';
        $listData = TravelArticlesModel::where('type', 1)->get();
        return view('admin.explore_tourism.articles.index', compact('titlePage', 'page_menu', 'page_sub', 'listData'));
    }
    public function createPosts()
    {
        $titlePage = 'Khám phá du lịch';
        $page_menu = 'explore_tourism';
        $page_sub = 'posts';
        $category = CategoryTourismModel::all();
        return view('admin.explore_tourism.articles.create', compact('titlePage', 'page_menu', 'page_sub', 'category'));
    }
    public function storePosts (Request $request)
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
                $src = $this->addImageVideoCulinary($request->file('img_1'), 'upload/travel/articles/img/', 'upload/explore_tourism/articles/video/');
            }
            $category = CategoryTourismModel::find($request->get('category'));
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
                'created_by' => Auth::id()
            ]);
            $articles->save();
            $this->addMultimedia($request, $articles->id, 3);
            return redirect()->route('admin.explore_tourism.posts.index')->with(['success' => 'Thêm mới bài viết thành công ']);
        }catch (\Exception $exception){
            return back()->with(['error' => $exception->getMessage()]);
        }
    }
    public function editPosts ($slug)
    {
        $post = TravelArticlesModel::where('slug', $slug)->where('type', 1)->first();
        if (empty($post)){
            return back()->with(['error' => 'Bài viết không tồn tại']);
        }
        $category = CategoryTourismModel::all();
        $multimedia = MultimediaFilesModel::where('parent_id', $post->id)->where('parent_type', 3)->get();
        $titlePage = 'Khám phá du lịch';
        $page_menu = 'explore_tourism';
        $page_sub = 'posts';
        return view('admin.explore_tourism.articles.edit', compact('titlePage', 'page_menu', 'page_sub', 'category', 'post', 'multimedia'));
    }
    public function updatePosts($slug, Request $request){
        try{
            $post = TravelArticlesModel::where('slug', $slug)->first();
            if (empty($post)){
                return back()->with(['error' => 'Bài viết không tồn tại']);
            }
            $slug_2 = Str::slug($request->get('title'));
            if ($slug_2 != $slug){
                $post = TravelArticlesModel::where('slug', $slug_2)->first();
                if (isset($post)){
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
            $category = CategoryTourismModel::find($request->get('category'));
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
            return redirect()->route('admin.explore_tourism.posts.index')->with(['success' => 'Cập nhật bài viết thành công']);
        }catch (\Exception $exception){
            return back()->with(['error' => $exception->getMessage()]);
        }
    }
    public function displayPosts (Request $request)
    {
        $post = TravelArticlesModel::find($request->get('id'));
        if(empty($post)){
            $data['status'] = false;
            $data['msg'] = 'Danh mục không tồn tại';
            return $data;
        }
        if ($post->display == 1){
            $post->display = 0;
        }else{
            $post->display = 1;
        }
        $post->save();
        $data['status'] = true;
        return $data;
    }
    public function deletePosts ($id)
    {
        try{
            $post = TravelArticlesModel::find($id);
            if (empty($post)){
                $data['status'] = false;
                $data['msg'] = 'Bài viết không tồn tại ';
                return $data;
            }
            unlink($post->banner);
            if (isset($post->video_review)){
                unlink($post->video_review);
            }
            $post->delete();
            $this->deleteMultimediaFiles($id, 3);
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
