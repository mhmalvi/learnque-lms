<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\LiveClassCreateRequest;
use App\Http\Resources\LiveClassesCollection;
use App\Services\LiveClassService;
use App\Zoom\Zoom;
use Illuminate\Http\Request;

class LiveClassesController extends Controller
{
    /**
     * Index
     */
    public function index()
    {
        return view('admin.pages.liveclasses.index');
    }

    /**
     * fetch paginated list of live classes
     */
    public function paginatedList()
    {
        try {
            $perPage = request('perPage') ?? 5;
            $pageNumber = request('pageNumber') ?? 1;

            $service = new LiveClassService();
            $meetings = $service->getPaginatedList($perPage, $pageNumber);

            return response()->json($meetings);
        } catch (\Throwable $th) {
            return response()->json([
                'message' => "Something went wrong!",
                'error' => $th->getMessage(),
            ], 500);
        }
    }

    /**
     * show create page for live class
     */
    public function create()
    {
        return view('admin.pages.liveclasses.create');
    }

    /**
     * save a meeting
     */
    public function store(LiveClassCreateRequest $request)
    {
        try {
            $request->save();

            return response()->json([
                'message' => "Successfully saved the meeting",
            ], 201);
        } catch (\Throwable $th) {
            return response()->json([
                'message' => "Something went wrong!",
                'error' => $th->getMessage(),
            ], 500);
        }
    }
}
