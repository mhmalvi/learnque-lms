<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class LiveClassesController extends Controller
{
    /**
     * Index
     */
    public function index()
    {
        return view('admin.liveclass.index');
    }
}
