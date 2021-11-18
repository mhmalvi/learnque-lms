<?php

namespace App\Http\Controllers;

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
}
