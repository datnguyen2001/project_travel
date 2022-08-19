<?php

namespace App\Http\Controllers;

use App\Models\MultimediaFilesModel;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Str;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    /**
     * them hinh anh lien quan
     **/
    public function addMultimedia ($request, $parent_id, $parent_type)
    {
        if($request->hasFile('images')) {
            $file = $request->file('images');
            foreach($file as $value){
                $image_name = 'upload/multimedia/'.Str::random(40);
                $ext = strtolower($value->getClientOriginalExtension());
                $image_full_name = $image_name.'.'.$ext;
                $path = 'upload/multimedia';
                $value->move($path,$image_full_name);
                $image_invest = new MultimediaFilesModel([
                    'parent_id' => $parent_id,
                    'src' => $image_full_name,
                    'extension' => $ext,
                    'parent_type' => $parent_type
                ]);
                $image_invest->save();
            }
        }
        return true;
    }
    /**
     * them anh hoac video san pham
     **/
    protected function addImageVideoCulinary($file, $part_img, $part_video)
    {
        $extension = $file->getClientOriginalExtension();
        $video_active = 0;
        if ($extension == 'mp4' || $extension == 'video'){
            $part = $part_video;
            $video_active = 1;
        }else{
            $part = $part_img;
        }
        $file_name = $part.Str::random(40). '.'. $file->getClientOriginalExtension();
        $file->move($part, $file_name);
        $data['video_active'] = $video_active;
        $data['banner'] = $file_name;
        return $data;
    }
    /**
     * them video review san pham
     **/
    protected function addVideoReview($file, $part)
    {
        $file_name = $part.Str::random(40). '.'. $file->getClientOriginalExtension();
        $file->move($part, $file_name);
        $data['video'] = $file_name;
        return $data;
    }
    /**
     * check mobile
    **/
    public function check_mobile ()
    {
        $agent = new \Jenssegers\Agent\Agent;

        $result = $agent->isMobile();
        return $result;
    }
    /**
     * Xóa hình ảnh liên quan
    **/
    public function deleteMultimediaFiles ($parent_id, $parent_type)
    {
        $multimedia = MultimediaFilesModel::where('parent_id', $parent_id)->where('parent_type', $parent_type)->get();
        if (count($multimedia)){
            foreach ($multimedia as $key => $value){
                unlink($value->src);
                $multimedia[$key]->delete();
            }
        }
    }
}
