<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Resources\UsersCollection;
use App\Models\User;
use Illuminate\Http\Request;

class TeachersController extends Controller
{
    public function index()
    {
        return view('admin.pages.teachers.index');
    }

    public function getPaginatedList()
    {
        try {
            return new UsersCollection(
                User::where('user_type', 'teacher')->paginate(request('items'))
            );
        } catch (\Throwable $e) {
            return $e->getMessage();
        }
    }

    public function destroy(User $teacher)
    {
        $teacher->delete();

        return response()->json([
            'message' => "Successfully deleted the instructor!",
        ], 200);
    }
}
