<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\CreateClassroomRequest;
use App\Http\Resources\ClassroomResource;
use App\Http\Resources\ClassroomsCollection;
use App\Models\Classroom;
use Illuminate\Http\Request;

class ClassroomsController extends Controller
{
    public function store(CreateClassroomRequest $request)
    {
        $request->save();

        return response()->json([
            'message' => "Successfully saved the classroom!",
        ], 200);
    }

    public function getPaginatedList()
    {
        try {
            return new ClassroomsCollection(
                Classroom::paginate(request('items'))
            );
        } catch (\Throwable $e) {
            return $e->getMessage();
        }
    }

    public function show(Classroom $classroom)
    {
        $classroom = (new ClassroomResource($classroom))->jsonSerialize();
        return view('admin.pages.classrooms.show', compact('classroom'));
    }
}
