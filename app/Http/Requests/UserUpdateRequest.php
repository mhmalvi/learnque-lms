<?php

namespace App\Http\Requests;

use App\Models\User;
use Illuminate\Foundation\Http\FormRequest;

class UserUpdateRequest extends FormRequest
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
        $student = User::where('uuid', $this->uuid)->first();
        return [
            'username' => "required|unique:users,name,{$student->id}",
            'email' => "required|unique:users,email,{$student->id}",
        ];
    }

    public function update(User $student)
    {
        $student->name = $this->username;
        $student->email = $this->email;

        $student->save();
    }
}
