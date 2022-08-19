<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ArticlesReviewModel;
use App\Models\BoothModel;
use App\Models\CategoryBoothModel;
use App\Models\CategoryCulinaryModel;
use App\Models\MultimediaFilesModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class BoothController extends Controller
{
    public function index()
    {
        $titlePage = 'Gian Hàng';
        $page_menu = 'booth';
        $page_sub = 'index';
        $listData = BoothModel::where('type', 2)->get();
        $route = 'admin.booth.create';
        return view('admin.booth.food.index', compact('titlePage', 'page_menu', 'page_sub', 'listData', 'route'));
    }

    public function create ()
    {
        $titlePage = 'Gian Hàng';
        $page_menu = 'booth';
        $page_sub = 'index';
        $category = CategoryBoothModel::orderBy('index', 'asc')->get();
        $type = 2;
        return view('admin.booth.food.create', compact('titlePage', 'page_menu', 'page_sub', 'category', 'type'));
    }

    public function edit ($id)
    {
        $culinary = BoothModel::find($id);
        if (empty($culinary)){
            return back()->with(['error' => 'Món ăn không tồn tại']);
        }
        $multimedia = MultimediaFilesModel::where('parent_id', $id)->where('parent_type', 7)->get();
        $titlePage = 'Gian Hàng';
        $page_menu = 'booth';
        $page_sub = 'index';
        $category = CategoryBoothModel::orderBy('index', 'asc')->get();
        return view('admin.booth.food.edit', compact('titlePage', 'page_menu', 'page_sub', 'category', 'culinary', 'multimedia'));
    }
    /**
     * Danh muc
    **/
    public function category()
    {
        $titlePage = 'Gian Hàng';
        $page_menu = 'booth';
        $page_sub = 'category';
        $listData = CategoryBoothModel::all();
        return view('admin.booth.category.index', compact('titlePage', 'page_menu', 'page_sub', 'listData'));
    }

    public function categoryCreate ()
    {
        $titlePage = 'Gian Hàng';
        $page_menu = 'booth';
        $page_sub = 'category';
        return view('admin.booth.category.create', compact('titlePage', 'page_menu', 'page_sub'));
    }

    public function categoryStore (Request $request)
    {
        try{
            if (!$request->hasFile('file')){
                return back()->with(['error' => 'Vui lòng thêm hình ảnh danh mục']);
            }
            $file = $request->file('file');
            $part = 'upload/booth/category/';
            $file_name = $part.Str::random(40). '.'. $file->getClientOriginalExtension();
            $file->move($part, $file_name);
            $category = new CategoryBoothModel([
                'name' => $request->get('name'),
                'img' => $file_name,
                'index' => $request->get('index'),
                'display' => isset($request->display) ? 1 : 0
            ]);
            $category->save();
            return redirect()->route('admin.booth.category.index')->with(['success' => 'Thêm mới thành công']);
        }catch (\Exception $exception){
            return back()->with(['error' => $exception->getMessage()]);
        }
    }

    public function categoryEdit ($id)
    {
        $category = CategoryBoothModel::find($id);
        if (empty($category)){
            return back()->with(['error' => 'Danh mục gian hàng không tồn tại']);
        }
        $titlePage = 'Gian Hàng';
        $page_menu = 'booth';
        $page_sub = 'category';
        return view('admin.booth.category.edit', compact('titlePage', 'page_menu', 'page_sub', 'category'));
    }

    public function categoryUpdate(Request $request, $id)
    {
        try{
            $category = CategoryBoothModel::find($id);
            if(empty($category)){
                return back()->with(['error' => 'Danh mục không tồn tại']);
            }
            $category->name = $request->get('name');
            $category->index = $request->get('index');
            $category->display = isset($request->display) ? 1 : 0;
            if ($request->hasFile('file')){
                $file = $request->file('file');
                $part = 'upload/booth/category/';
                $file_name = $part.Str::random(40). '.'. $file->getClientOriginalExtension();
                $file->move($part, $file_name);
                unlink($category->img);
                $category->img = $file_name;
            }
            $category->save();
            return redirect()->route('admin.booth.category.index')->with(['success' => 'Cập nhật danh mục thành công']);
        }catch (\Exception $exception){
            return back()->with(['error' => $exception->getMessage()]);
        }
    }

    public function categoryDelete ($id)
    {
        $category = CategoryBoothModel::find($id);
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

    public function specialties ()
    {
        $titlePage = 'Gian Hàng';
        $page_menu = 'booth';
        $page_sub = 'specialties';
        $listData = BoothModel::where('type', 1)->get();
        $route = 'admin.booth.specialties.create';
        return view('admin.booth.specialties.index', compact('titlePage', 'page_menu', 'page_sub', 'listData', 'route'));
    }

    public function specialtiesCreate ()
    {
        $titlePage = 'Gian Hàng';
        $page_menu = 'booth';
        $page_sub = 'specialties';
        $category = CategoryBoothModel::orderBy('index', 'asc')->get();
        $type = 1;
        return view('admin.booth.specialties.create', compact('titlePage', 'page_menu', 'page_sub', 'category', 'type'));
    }

    public function specialtiesStore (Request $request)
    {
        try{
            if (!$request->hasFile('file')){
                return back()->with(['error' => 'Vui lòng thêm ảnh hoặc video món ăn']);
            }
            $slug = Str::slug($request->get('name'));
            $booth = BoothModel::where('slug', $slug)->first();
            if (isset($booth)){
                return back()->with(['error' => 'Món đã tồn tại']);
            }
            $file = $request->file('file');
            $image = $this->addImageVideoCulinary($file, 'upload/booth/img/', 'upload/booth/video/');
            $video_review = null;
            if ($request->hasFile('video')){
                $file_video = $request->file('video');
                $video = $this->addVideoReview($file_video, 'upload/booth/review/');
                $video_review = $video['video'];
            }
            $src = null;
            if ($request->hasFile('img_3')){
                $src = $this->addImageVideoCulinary($request->file('img_3'), 'upload/travel/articles/img/', null);
            }
            $price = str_replace(",", "", $request->get('price'));
            $price_2 = str_replace(",", "", $request->get('price_2'));
            $category = CategoryBoothModel::find($request->get('category'));
            $booth = new BoothModel([
                'name' => $request->get('name'),
                'slug' => $slug,
                'content' =>$request->get('content'),
                'banner' => $image['banner'],
                'description' => $request->get('description'),
                'video_review' => $video_review,
                'category_booth' => isset($category) ? $category->id : null,
                'name_category' => isset($category) ? $category->name : null,
                'video_active' => $image['video_active'],
                'price' => $price,
                'price_2' => $price_2,
                'ratings' => $request->get('rating'),
                'created_by' => Auth::id(),
                'type' => $request->get('type'),
                'address' => $request->get('address'),
                'src' => isset($src) ? $src['banner'] : null,
                'map' => $request->get('map')
            ]);
            $booth->save();
            $this->addMultimedia($request, $booth->id, 7);
            if ($request->type == 1){
                return redirect()->route('admin.booth.specialties.index')->with(['success' => 'Thêm mới món ăn thành công ']);
            }else{
                return redirect()->route('admin.booth.index')->with(['success' => 'Thêm mới món ăn thành công ']);
            }
        }catch (\Exception $exception){
            return back()->with(['error' => $exception->getMessage()]);
        }
    }

    public function specialtiesEdit ($id)
    {
        $culinary = BoothModel::find($id);
        if (empty($culinary)){
            return back()->with(['error' => 'Món ăn không tồn tại']);
        }
        $multimedia = MultimediaFilesModel::where('parent_id', $id)->where('parent_type', 7)->get();
        $titlePage = 'Gian Hàng';
        $page_menu = 'booth';
        $page_sub = 'specialties';
        $category = CategoryBoothModel::orderBy('index', 'asc')->get();
        return view('admin.booth.specialties.edit', compact('titlePage', 'page_menu', 'page_sub', 'category', 'culinary', 'multimedia'));
    }

    public function specialtiesUpdate (Request $request , $id)
    {
        try{
            $booth = BoothModel::find($id);
            if (empty($booth)){
                return back()->with(['error' => 'Món ăn không tồn tại']);
            }
            $slug = Str::slug($request->get('name'));
            if ($slug != $booth->slug){
                $booth_2 = BoothModel::where('slug', $slug)->first();
                if (isset($booth_2)){
                    return back()->with(['error' => 'Tên món đã tồn tại']);
                }
            }
            if ($request->hasFile('file')){
                $file = $request->file('file');
                $image = $this->addImageVideoCulinary($file, 'upload/booth/img/', 'upload/booth/video/');
                unlink($booth->banner);
                $booth->banner = $image['banner'];
                $booth->video_active = $image['video_active'];
            }
            if ($request->hasFile('video')){
                $file_video = $request->file('video');
                $video = $this->addVideoReview($file_video, 'upload/booth/review/');
                if (isset($booth->video_review)){
                    unlink($booth->video_review);
                }
                $booth->video_review = $video['video'];
            }
            if ($request->hasFile('img_3')){
                $img_1 = $this->addImageVideoCulinary($request->file('img_3'), 'upload/travel/articles/img/', null);
//                    unlink($culinary->src);
                $booth->src = $img_1['banner'];
            }
            $category = CategoryBoothModel::find($request->get('category'));
            if (isset($category)){
                $booth->category_booth = $category->id;
                $booth->name_category = $category->name;
            }
            $booth->name = $request->get('name');
            $booth->slug = $slug;
            $booth->content = $request->get('content');
            $booth->price = str_replace(",", "", $request->get('price'));
            $booth->price_2 = str_replace(",", "", $request->get('price_2'));
            $booth->ratings = $request->get('rating');
            $booth->address = $request->get('address');
            $booth->map = $request->get('map');
            $booth->description = $request->get('description');
            $booth->save();
            $this->addMultimedia($request, $id, 7);
            if ($booth->type == 1){
                return redirect()->route('admin.booth.specialties.index')->with(['success' => 'Cập nhật món ăn thành công']);
            }else{
                return redirect()->route('admin.booth.index')->with(['success' => 'Cập nhật món ăn thành công']);
            }
        }catch (\Exception $exception){
            return back()->with(['error' => $exception->getMessage()]);
        }
    }

    public function specialtiesDelete ($id)
    {
        try{
            $booth = BoothModel::find($id);
            if (empty($booth)){
                $data['status'] = false;
                $data['msg'] = 'Món không tồn tại';
                return $data;
            }
            unlink($booth->banner);
            if (isset($booth->video_review)){
                unlink($booth->video_review);
            }
            $booth->delete();
            $this->deleteMultimediaFiles($id, 7);
            $data['status'] = true;
            $data['msg'] = 'Xóa món ăn thành công';
            return $data;
        }catch (\Exception $exception){
            $data['status'] = false;
            $data['msg'] = $exception->getMessage();
            return $data;
        }
    }

    public function articles ()
    {
        $listData =ArticlesReviewModel::where('category', 4)->orderBy('created_at', 'desc')->get();
        $titlePage = 'Review';
        $page_menu = 'booth';
        $page_sub = 'articles';
        return view('admin.booth.articles.index', compact('titlePage', 'page_menu', 'page_sub', 'listData'));
    }
    public function articlesCreate ()
    {
        $category = CategoryBoothModel::all();
        $titlePage = 'Review';
        $page_menu = 'booth';
        $page_sub = 'articles';
        return view('admin.booth.articles.create', compact('titlePage', 'page_sub', 'page_menu', 'category'));
    }
    public function articlesStore (Request $request){
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
            $category = CategoryBoothModel::find($request->get('category'));
            $articles = new ArticlesReviewModel();
            $articles['title'] = $request->get('title');
            $articles['slug'] = $slug;
            $articles['banner'] = $banner['banner'];
            $articles['src'] = isset($src) ? $src['banner'] : null;
            $articles['img_1'] = isset($img_1) ? $img_1['banner'] : null;
            $articles['img_2'] = isset($img_2) ? $img_2['banner'] : null;
            $articles['video'] = isset($video) ? $video['banner'] : null;
            $articles['content'] = $request->get('content');
            $articles['category'] = 4;
            $articles['category_id'] = $request->get('category');
            $articles['category_name'] = $category->name;
            $articles['content_1'] = $request->get('content_1');
            $articles['content_2'] = $request->get('content_2');
            $articles['description'] = $request->get('content_img');
            $articles['content_video'] = $request->get('content_video');
            $articles['rating'] = $request->get('rating');
            $articles['author'] = $request->get('author');
            $articles['display'] = isset($request->display) ? 1 : 0;
            $articles->save();
            $this->addMultimedia($request, $articles->id, 6);
            return redirect()->route('admin.booth.articles.index')->with(['success' => 'Thêm bài viết mới thành công']);
        }catch (\Exception $exception){
            return back()->with(['error' => $exception->getMessage()]);
        }
    }
    public function articlesEdit ($slug)
    {
        $articles = ArticlesReviewModel::where('category', 4)->where('slug', $slug)->first();
        if (empty($articles)){
            return back()->with(['error' => 'Bài viết không tồn tại']);
        }
        $category = CategoryBoothModel::all();
        $multimedia = MultimediaFilesModel::where('parent_id', $articles->id)->where('parent_type', 6)->get();
        $titlePage = 'Review';
        $page_menu = 'booth';
        $page_sub = 'articles';
        return view('admin.booth.articles.edit', compact('articles', 'category', 'titlePage', 'page_menu', 'page_sub', 'multimedia'));
    }

    public function articlesUpdate (Request $request, $id)
    {
        try{
            $articles = ArticlesReviewModel::where('category', 4)->where('id', $id)->first();
            if (empty($articles)){
                return back()->with(['error' => 'Bài viết không tồn tại']);
            }
            $slug = Str::slug($request->get('title'));
            if ($slug != $articles->slug){
                $articles_check = ArticlesReviewModel::where('slug', $slug)->first();
                if (isset($articles_check)){
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
            $category = CategoryBoothModel::find($request->get('category'));
            $articles['title'] = $request->get('title');
            $articles['slug'] = $slug;
            $articles['content'] = $request->get('content');
            $articles['category_id'] = $request->get('category');
            $articles['category_name'] = $category->name;
            $articles['content_1'] = $request->get('content_1');
            $articles['content_2'] = $request->get('content_2');
            $articles['description'] = $request->get('content_img');
            $articles['content_video'] = $request->get('content_video');
            $articles['rating'] = $request->get('rating');
            $articles['author'] = $request->get('author');
            $articles['display'] = isset($request->display) ? 1 : 0;
            $articles->save();
            $this->addMultimedia($request, $id, 6);
            return redirect()->route('admin.booth.articles.index')->with(['success' => 'Sửa bài viết thành công']);
        }catch (\Exception $exception){
            return back()->with(['error' => $exception->getMessage()]);
        }
    }
}
