<?php

namespace App\Http\Requests\Course;

use App\Models\Category;
use Illuminate\Support\Str;

class CategoryCreateRequest extends CategoryRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'title' => 'required|unique:categories',
        ];
    }

    public function save()
    {
        $slug = $this->filled('slug') ? $this->slug : Str::slug($this->title);

        $image_name = null;
        if ($this->filled('thumbnail')) {
            $image_name = $this->storeThumbnail($slug);
        }

        return Category::create([
            'uuid' => Str::uuid(),
            'title' => $this->title,
            'slug' => $slug,
            'description' => $this->filled('description') ? $this->description : '',
            'thumbnail' => $image_name,
        ]);
    }
}
