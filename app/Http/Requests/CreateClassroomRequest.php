<?php

namespace App\Http\Requests;

use App\Models\Course;
use App\Models\Classroom;
use Illuminate\Support\Str;
use Illuminate\Foundation\Http\FormRequest;

class CreateClassroomRequest extends FormRequest
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
            'section' => 'required',
            'course' => 'required',
        ];
    }

    public function save()
    {
        $course = Course::where('uuid', $this->course)->first();

        Classroom::create([
            'unique_id' => Str::random(8),
            'title' => $this->title,
            'slug' => Str::slug($this->title),
            'section' => $this->section,
            'course_id' => $course->id,
        ]);
    }
}
