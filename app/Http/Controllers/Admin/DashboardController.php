<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $titlePage = 'Admin';
        $page_menu = 'dashboard';
        $page_sub = null;
        return view('admin.dashboard', compact('titlePage', 'page_menu', 'page_sub'));
    }
}
