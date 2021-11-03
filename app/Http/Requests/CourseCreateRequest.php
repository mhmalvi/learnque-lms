<?php

namespace App\Http\Requests;

use App\Models\Course;
use Illuminate\Support\Str;

class CourseCreateRequest extends CourseRequest
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
            'code' => "required",
            'title' => "required",
        ];
    }

    /**
     * Save
     */
    public function save()
    {
        Course::create([
            'uuid' => Str::uuid(),
            'code' => $this->code,
            'title' => $this->title,
            'slug' => Str::slug($this->title),
            'category_id' => $this->category ? $this->category() : null,
            'description' => $this->description,
            'thumbnail' => $this->filled('thumbnail') ? $this->storeThumbnailImages() : null,
            'publish' => $this->draft ? 0 : 1,
        ]);
    }
}
