<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Resources\LiveClassesCollection;
use App\Models\LiveClass;
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
            return new LiveClassesCollection(
                LiveClass::paginate($perPage)
            );
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
}
