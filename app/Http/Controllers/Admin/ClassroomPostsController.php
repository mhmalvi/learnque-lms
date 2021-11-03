<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Classroom\PostCreateRequest;
use Illuminate\Http\Request;

class ClassroomPostsController extends Controller
{
    public function store(PostCreateRequest $request)
    {
        $request->save();

        return response()->json([
            'message' => "Successfully published the post!"
        ], 200);
    }
}
