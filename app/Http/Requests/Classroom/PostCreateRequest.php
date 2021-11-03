<?php

namespace App\Http\Requests\Classroom;

use App\Models\Classroom;
use App\Models\ClassroomMember;
use App\Models\ClassroomPost;

class PostCreateRequest extends PostRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        $classroom_member = ClassroomMember::where('classroom_id', $this->getClassroomId())
            ->where('user_id', auth()->user()->id)
            ->first();

        return !empty($classroom_member) && $classroom_member->user_type == 'teacher' ||
            auth()->guard('admin')->check();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'classroom_id' => 'required',
            'description' => 'required',
        ];
    }

    public function save()
    {
        ClassroomPost::create([
            'user_id' => auth()->user()->id,
            'classroom_id' => $this->getClassroomId(),
            'description' => $this->filled('description') ? $this->description : '',
        ]);
    }
}
