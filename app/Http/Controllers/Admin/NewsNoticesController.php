<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\NewsNoticeCreateRequest;
use App\Http\Requests\Admin\NewsNoticeDeleteRequest;
use App\Http\Requests\Admin\NewsNoticeUpdateRequest;
use App\Http\Resources\NewsNoticesCollection;
use App\Models\NewsNotice;
use Illuminate\Http\Request;

class NewsNoticesController extends Controller
{
    public function index()
    {
        return view('admin.pages.news_notices.index');
    }

    public function paginatedList()
    {
        try {
            $items = request('items') ?? 5;
            $data = NewsNotice::where('title', 'LIKE', '%' . request('search') . '%');
            if (request()->filled('post_type')) {
                $data = $data->where('post_type', request('post_type'));
            }
            $data = $data->paginate($items);
            return new NewsNoticesCollection($data);
        } catch (\Throwable $e) {
            return response()->json([
                'message' => "Something went wrong!"
            ], 500);
        }
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

    public function edit(NewsNotice $news_notice)
    {
        return view('admin.pages.news_notices.edit', compact('news_notice'));
    }

    public function update(NewsNotice $news_notice, NewsNoticeUpdateRequest $request)
    {
        try {
            $request->update($news_notice);

            return response()->json([
                'message' => "Successfully updated the news/notice",
            ], 200);
        } catch (\Throwable $e) {
            return response()->json([
                'message' => $e->getMessage(),
            ], 500);
        }
    }

    public function destroy(NewsNoticeDeleteRequest $request, NewsNotice $newsNotice)
    {
        try {
            $request->delete($newsNotice);

            return response()->json([
                'message' => "Successfully deleted the news/notice",
            ], 202);
        } catch (\Throwable $e) {
            return response()->json([
                'message' => "Something went wrong while deleting the news/notice.",
            ], 500);
        }
    }
}
