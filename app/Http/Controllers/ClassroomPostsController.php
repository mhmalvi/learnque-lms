<?php

namespace App\Http\Controllers;

use App\Http\Requests\Classroom\PostCreateRequest;
use App\Http\Resources\ClassroomPostsCollection;
use App\Models\Classroom;
use Illuminate\Http\Request;

class ClassroomPostsController extends Controller
{
    public function getPaginatedList(Classroom $classroom)
    {
        return new ClassroomPostsCollection(
            $classroom->posts()->latest()->paginate(request('items'))
        );
    }

    public function store(PostCreateRequest $request)
    {
        $request->save();

        return response()->json([
            'message' => "Successfully published the post!"
        ], 200);
    }
}
