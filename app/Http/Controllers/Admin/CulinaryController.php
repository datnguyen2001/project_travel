<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ArticlesReviewModel;
use App\Models\CategoryCulinaryModel;
use App\Models\CategoryTravelModel;
use App\Models\CulinaryModel;
use App\Models\ImageVariantModel;
use App\Models\MultimediaFilesModel;
use App\Models\RestaurantCulinaryModel;
use App\Models\RestaurantModel;
use App\Models\TravelArticlesModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class CulinaryController extends Controller
{
    public function index()
    {
        $titlePage = 'Ẩm thực';
        $page_menu = 'culinary';
        $page_sub = 'index';
        $listData = CulinaryModel::where('type', 2)->get();
        $route = 'admin.culinary.create';
        return view('admin.culinary.index', compact('titlePage', 'page_menu', 'page_sub', 'listData', 'route'));
    }

    public function create()
    {
        $titlePage = 'Ẩm thực';
        $page_menu = 'culinary';
        $page_sub = 'index';
        $listRestaurant = RestaurantModel::all();
        $category = CategoryCulinaryModel::orderBy('index', 'asc')->get();
        $type = 2;
        return view('admin.culinary.create', compact('titlePage', 'page_menu', 'page_sub', 'listRestaurant', 'category', 'type'));
    }

    public function store (Request $request)
    {
        try{
            if (!$request->hasFile('file')){
                return back()->with(['error' => 'Vui lòng thêm ảnh hoặc video món ăn']);
            }
            $file = $request->file('file');
            $image = $this->addImageVideoCulinary($file, 'upload/culinary/img/', 'upload/culinary/video/');
            $video_review = null;
            if ($request->hasFile('video')){
                $file_video = $request->file('video');
                $video = $this->addVideoReview($file_video, 'upload/culinary/review/');
                $video_review = $video['video'];
            }
            $src = null;
            if ($request->hasFile('img_1')){
                $src = $this->addImageVideoCulinary($request->file('img_1'), 'upload/travel/articles/img/', null);
            }
            $price = str_replace(",", "", $request->get('price'));
            $price_2 = str_replace(",", "", $request->get('price_2'));
            $category = CategoryCulinaryModel::find($request->get('category'));
            $culinary = new CulinaryModel([
               'name' => $request->get('name'),
               'content' =>$request->get('content'),
                'banner' => $image['banner'],
                'description' => $request->get('description'),
                'video_review' => $video_review,
                'category_culinary' => isset($category) ? $category->id : null,
                'name_category' => isset($category) ? $category->name : null,
                'video_active' => $image['video_active'],
                'price' => $price,
                'price_2' => $price_2,
                'ratings' => $request->get('rating'),
                'src' => isset($src) ? $src['banner'] : null,
                'created_by' => Auth::id(),
                'type' => $request->get('type')
            ]);
            $culinary->save();
            $restaurant = $request->get('restaurant');
            if (isset($restaurant) && count($restaurant)){
                foreach ($restaurant as $value){
                    $top = 0;
                    if ($value == $request->get('restaurant_id')){
                        $top = 1;
                    }
                    $restaurant_culinary = new RestaurantCulinaryModel([
                        'culinary_id' => $culinary->id,
                        'restaurant_id' => $value,
                        'top' => $top
                    ]);
                    $restaurant_culinary->save();
                }
            }
            $this->addMultimedia($request, $culinary->id, 1);
            if ($request->type == 1){
                return redirect()->route('admin.culinary.specialties.index')->with(['success' => 'Thêm mới món ăn thành công ']);
            }else{
                return redirect()->route('admin.culinary.index')->with(['success' => 'Thêm mới món ăn thành công ']);
            }
        }catch (\Exception $exception){
            return back()->with(['error' => $exception->getMessage()]);
        }
    }
    public function edit ($id)
    {
        $culinary = CulinaryModel::find($id);
        if (empty($culinary)){
            return back()->with(['error' => 'Món ăn không tồn tại']);
        }
        $listRestaurant = RestaurantModel::all();
        $category = CategoryCulinaryModel::orderBy('index', 'asc')->get();
        $multimedia = MultimediaFilesModel::where('parent_id', $id)->where('parent_type', 1)->get();
        $data['titlePage'] = 'Ẩm thực';
        $data['page_menu'] = 'culinary';
        $data['page_sub'] = 'index';
        $data['culinary'] = $culinary;
        $data['listRestaurant'] = $listRestaurant;
        $data['category'] = $category;
        $data['multimedia'] = $multimedia;
        return view('admin.culinary.edit', $data);
    }
    public function update ($id, Request $request)
    {
        try{
            $culinary = CulinaryModel::find($id);
            if (empty($culinary)){
                return back()->with(['error' => 'Món ăn không tồn tại']);
            }
            if ($request->hasFile('file')){
                $file = $request->file('file');
                $image = $this->addImageVideoCulinary($file, 'upload/culinary/img/', 'upload/culinary/video/');
                unlink($culinary->banner);
                $culinary->banner = $image['banner'];
                $culinary->video_active = $image['video_active'];
            }
            if ($request->hasFile('img_1')){
                $img_1 = $this->addImageVideoCulinary($request->file('img_1'), 'upload/travel/articles/img/', null);
//                    unlink($culinary->src);
                $culinary->src = $img_1['banner'];
            }
            $category = CategoryCulinaryModel::find($request->get('category'));
            if (isset($category)){
                $culinary->category_culinary = $category->id;
                $culinary->name_category = $category->name;
            }
            $culinary->name = $request->get('name');
            $culinary->content = $request->get('content');
            $culinary->description = $request->get('description');
            $culinary->price = str_replace(",", "", $request->get('price'));
            $culinary->price_2 = str_replace(",", "", $request->get('price_2'));
            $culinary->ratings = $request->get('rating');
            $culinary->save();
            RestaurantCulinaryModel::where('culinary_id', $id)->delete();
            $restaurant = $request->get('restaurant');
            if (isset($restaurant) && count($restaurant)){
                foreach ($restaurant as $value){
                    $top = 0;
                    if ($value == $request->get('restaurant_id')){
                        $top = 1;
                    }
                    $restaurant_culinary = new RestaurantCulinaryModel([
                        'culinary_id' => $culinary->id,
                        'restaurant_id' => $value,
                        'top' => $top
                    ]);
                    $restaurant_culinary->save();
                }
            }
            $this->addMultimedia($request, $culinary->id, 1);
            return redirect()->route('admin.culinary.index')->with(['success' => 'Cập nhật món ăn thành công ']);
        }catch (\Exception $exception){
            return back()->with(['error' => $exception->getMessage()]);
        }
    }
    /**
     * xoa mon an
    **/
    public function delete ($id)
    {
        $culinary = CulinaryModel::find($id);
        if (empty($culinary)){
            $data['status'] = false;
            $data['msg'] = 'Danh mục không tồn tại';
            return $data;
        }
        $multimedia = MultimediaFilesModel::where('parent_id', $id)->where('parent_type', 1)->get();
        if (count($multimedia)){
            foreach ($multimedia as $key => $value){
                unlink($value->src);
                $multimedia[$key]->delete();
            }
        }
        RestaurantCulinaryModel::where('culinary_id', $id)->delete();
        if (isset($culinary->video_review)){
            unlink($culinary->video_review);
        }
        unlink($culinary->banner);
        $culinary->delete();
        $data['status'] = true;
        return $data;
    }
    /**
     * danh muc am thuc
    **/
    public function category()
    {
        try{
            $titlePage = 'Ẩm thực';
            $page_menu = 'culinary';
            $page_sub = 'category';
            $listData = CategoryCulinaryModel::all();
            return view('admin.culinary.category.index', compact('titlePage', 'page_menu', 'page_sub', 'listData'));
        }catch (\Exception $exception){
            return back()->with(['error' => $exception->getMessage()]);
        }
    }
    public function createCategory ()
    {
        $titlePage = 'Ẩm thực';
        $page_menu = 'culinary';
        $page_sub = 'category';
        return view('admin.culinary.category.create', compact('titlePage', 'page_menu', 'page_sub'));
    }
    /**
     * tao danh muc am thuc
    **/
    public function storeCategory (Request $request)
    {
        try{
            if (!$request->hasFile('file')){
                return back()->with(['error' => 'Vui lòng thêm hình ảnh danh mục']);
            }
            $file = $request->file('file');
            $part = 'upload/culinary/category/';
            $file_name = $part.Str::random(40). '.'. $file->getClientOriginalExtension();
            $file->move($part, $file_name);
            $category = new CategoryCulinaryModel([
               'name' => $request->get('name'),
                'img' => $file_name,
                'index' => $request->get('index'),
                'display' => isset($request->display) ? 1 : 0
            ]);
            $category->save();
            return redirect()->route('admin.culinary.category')->with(['success' => 'Thêm mới thành công']);
        }catch (\Exception $exception){
            return back()->with(['error' => $exception->getMessage()]);
        }
    }
    /**
     * Xoa danh muc
    **/
    public function deleteCategory ($id)
    {
        $category = CategoryCulinaryModel::find($id);
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
    /**
     * sua danh muc
    **/
    public function editCategory($id)
    {
        $category = CategoryCulinaryModel::find($id);
        if(empty($category)){
            return back()->with(['error' => 'Danh mục không tồn tại']);
        }
        $titlePage = 'Ẩm thực';
        $page_menu = 'culinary';
        $page_sub = 'category';
        return view('admin.culinary.category.edit', compact('titlePage', 'page_menu', 'page_sub', 'category'));
    }
    public function updateCategory ($id, Request $request)
    {
        $category = CategoryCulinaryModel::find($id);
        if(empty($category)){
            return back()->with(['error' => 'Danh mục không tồn tại']);
        }
        $category->name = $request->get('name');
        $category->index = $request->get('index');
        $category->display = isset($request->display) ? 1 : 0;
        if ($request->hasFile('file')){
            $file = $request->file('file');
            $part = 'upload/culinary/category/';
            $file_name = $part.Str::random(40). '.'. $file->getClientOriginalExtension();
            $file->move($part, $file_name);
            unlink($category->img);
            $category->img = $file_name;
        }
        $category->save();
        return redirect()->route('admin.culinary.category');
    }
    /**
     * Top dac san
    **/
    public function specialties ()
    {
        $titlePage = 'Ẩm thực';
        $page_menu = 'culinary';
        $page_sub = 'specialties';
        $listData = CulinaryModel::where('type', 1)->get();
        $route = 'admin.culinary.specialties.create';
        return view('admin.culinary.index', compact('titlePage', 'page_menu', 'page_sub', 'listData', 'route'));
    }
    public function specialtiesCreate ()
    {
        $titlePage = 'Ẩm thực';
        $page_menu = 'culinary';
        $page_sub = 'specialties';
        $listRestaurant = RestaurantModel::all();
        $category = CategoryCulinaryModel::orderBy('index', 'asc')->get();
        $type = 1;
        return view('admin.culinary.create', compact('titlePage', 'page_menu', 'page_sub', 'listRestaurant', 'category', 'type'));
    }
    /**
     * articles
    **/
    public function articles ()
    {
        $listData =ArticlesReviewModel::where('category', 3)->orderBy('created_at', 'desc')->get();
        $titlePage = 'Ẩm thực';
        $page_menu = 'culinary';
        $page_sub = 'articles';
        return view('admin.culinary.articles.index', compact('titlePage', 'page_menu', 'page_sub', 'listData'));
    }
    public function articlesCreate ()
    {
        $category = CategoryCulinaryModel::all();
        $titlePage = 'Ẩm thực';
        $page_menu = 'culinary';
        $page_sub = 'articles';
        return view('admin.culinary.articles.create', compact('titlePage', 'page_sub', 'page_menu', 'category'));
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
            $category = CategoryCulinaryModel::find($request->get('category'));
            $articles = new ArticlesReviewModel();
            $articles['title'] = $request->get('title');
            $articles['slug'] = $slug;
            $articles['banner'] = $banner['banner'];
            $articles['src'] = isset($src) ? $src['banner'] : null;
            $articles['img_1'] = isset($img_1) ? $img_1['banner'] : null;
            $articles['img_2'] = isset($img_2) ? $img_2['banner'] : null;
            $articles['video'] = isset($video) ? $video['banner'] : null;
            $articles['content'] = $request->get('content');
            $articles['category'] = 3;
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
            return redirect()->route('admin.culinary.articles.index')->with(['success' => 'Thêm bài viết mới thành công']);
        }catch (\Exception $exception){
            return back()->with(['error' => $exception->getMessage()]);
        }
    }
    public function articlesEdit ($slug)
    {
        $articles = ArticlesReviewModel::where('category', 3)->where('slug', $slug)->first();
        if (empty($articles)){
            return back()->with(['error' => 'Bài viết không tồn tại']);
        }
        $category = CategoryCulinaryModel::all();
        $multimedia = MultimediaFilesModel::where('parent_id', $articles->id)->where('parent_type', 6)->get();
        $titlePage = 'Ẩm thực';
        $page_menu = 'culinary';
        $page_sub = 'articles';
        return view('admin.culinary.articles.edit', compact('articles', 'category', 'titlePage', 'page_menu', 'page_sub', 'multimedia'));
    }

    public function articlesUpdate (Request $request, $id)
    {
        try{
            $articles = ArticlesReviewModel::where('category', 3)->where('id', $id)->first();
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
            $banner = null; $img_1 = null; $img_2 = null; $video = null;$img_3 = null;
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
            $category = CategoryCulinaryModel::find($request->get('category'));
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
            return redirect()->route('admin.culinary.articles.index')->with(['success' => 'Sửa bài viết thành công']);
        }catch (\Exception $exception){
            return back()->with(['error' => $exception->getMessage()]);
        }
    }
    /**
     * exploreTourism
    **/
    public function exploreTourism ()
    {
        $titlePage = 'Blog theo danh mục';
        $page_menu = 'culinary';
        $page_sub = 'explore_tourism';
        $listData = TravelArticlesModel::where('type', 3)->get();
        return view('admin.culinary.explore_tourism.index', compact('titlePage', 'page_menu', 'page_sub', 'listData'));
    }
    public function exploreTourismCreate ()
    {
        $titlePage = 'Blog theo danh mục';
        $page_menu = 'culinary';
        $page_sub = 'explore_tourism';
        $category = CategoryCulinaryModel::all();
        return view('admin.culinary.explore_tourism.create', compact('titlePage', 'page_menu', 'page_sub', 'category'));
    }

    public function exploreTourismStore (Request $request)
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
            $category = CategoryCulinaryModel::find($request->get('category'));
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
                'created_by' => Auth::id(),
                'type' => 3
            ]);
            $articles->save();
            $this->addMultimedia($request, $articles->id, 3);
            return redirect()->route('admin.culinary.explore_tourism.index')->with(['success' => 'Thêm mới bài viết thành công ']);
        }catch (\Exception $exception){
            return back()->with(['error' => $exception->getMessage()]);
        }
    }

    public function exploreTourismEdit ($slug)
    {
        $post = TravelArticlesModel::where('slug', $slug)->where('type', 3)->first();
        if (empty($post)){
            return back()->with(['error' => 'Bài viết không tồn tại']);
        }
        $category = CategoryCulinaryModel::all();
        $multimedia = MultimediaFilesModel::where('parent_id', $post->id)->where('parent_type', 3)->get();
        $titlePage = 'Blog theo danh mục';
        $page_menu = 'culinary';
        $page_sub = 'explore_tourism';
        return view('admin.culinary.explore_tourism.edit', compact('titlePage', 'page_menu', 'page_sub', 'category', 'post', 'multimedia'));
    }

    public function exploreTourismUpdate (Request $request, $slug)
    {
        try{
            $post = TravelArticlesModel::where('slug', $slug)->first();
            if (empty($post)){
                return back()->with(['error' => 'Bài viết không tồn tại']);
            }
            $slug_2 = Str::slug($request->get('title'));
            if ($slug_2 != $slug){
                $post_2 = TravelArticlesModel::where('slug', $slug_2)->first();
                if (isset($post_2)){
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
            $category = CategoryCulinaryModel::find($request->get('category'));
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
            return redirect()->route('admin.culinary.explore_tourism.index')->with(['success' => 'Cập nhật bài viết thành công']);
        }catch (\Exception $exception){
            return back()->with(['error' => $exception->getMessage()]);
        }
    }
}
