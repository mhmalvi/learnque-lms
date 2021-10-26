<?php

namespace App\Actions;

use App\Models\Category;
use App\Models\Course;
use Illuminate\Support\Str;

class CourseCreateAction
{
    public function execute($data)
    {
        $category_id = null;
        if ($category = Category::where('uuid', $data['category_id'])->first()) {
            $category_id = $category->id;
        }
        Course::create([
            'uuid' => Str::uuid(),
            'code' => $data['code'],
            'title' => $data['title'],
            'slug' => isset($data['slug']) ? $data['slug'] : Str::slug($data['title']),
            'category_id' => $category_id,
            // 'lessons' => $data['lessons'],
            'description' => $data['description'],
            'alt' => $data['alt'],
            'publish' => $data['draft'] == 'true' ? 0 : 1,
        ]);
    }
}
