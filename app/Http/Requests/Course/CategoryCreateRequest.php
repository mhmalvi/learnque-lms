<?php

namespace App\Http\Requests\Course;

use App\Models\Category;
use Illuminate\Support\Str;

class CategoryCreateRequest extends CategoryRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'title' => 'required',
        ];
    }

    public function save()
    {
        Category::create([
            'uuid' => Str::uuid(),
            'title' => $this->title,
            'slug' => $this->filled('slug') ? $this->slug : Str::slug($this->slug),
            'description' => $this->filled('description') ? $this->description : '',
        ]);
    }
}
