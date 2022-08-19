<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class TestController extends Controller
{
    public function test(){
        $title_banner = (object)[
            'title' => 'Test',
            'background' => 'images/banner/banner-introduce.png',
            'nav' => [
                (object)[
                    'title' => 'Test',
                    'link' => route('web.home'),
                    'active' => false
                ],
                (object)[
                    'title' => 'Test',
                    'link' => route('test'),
                    'active' => true
                ]
            ]
        ];
        return view('web.test.test', compact('title_banner'));
    }
}
