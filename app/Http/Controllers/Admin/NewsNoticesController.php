<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\NewsNoticeCreateRequest;
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

    public function store(NewsNoticeCreateRequest $request)
    {
        try {
            $request->save();

            return response()->json([
                'message' => 'Successfully create the news/notice',
            ], 201);
        } catch (\Throwable $e) {
            return response()->json([
                'message' => $e->getMessage()
            ], 500);
        }
    }
}
