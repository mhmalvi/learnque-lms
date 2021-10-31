<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\CreateClassroomRequest;
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
}
