<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class NewsNoticesController extends Controller
{
    public function index()
    {
        return view('admin.pages.news_notices.index');
    }

    public function create()
    {
        return view('admin.pages.news_notices.create');
    }
}
