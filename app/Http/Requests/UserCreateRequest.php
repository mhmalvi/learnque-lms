<?php

namespace App\Http\Requests;

use Illuminate\Support\Str;
use App\Models\User;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Hash;

class UserCreateRequest extends FormRequest
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
            'username' => 'required',
            'email' => 'required',
            'password' => 'required|min:5|max:20|confirmed',
            'password_confirmation' => 'required',
            'user_type' => 'required',
        ];
    }

    public function save()
    {
        User::create([
            'uuid' => Str::uuid(),
            'name' => $this->username,
            'email' => $this->email,
            'password' => Hash::make($this->password),
            'user_type' => $this->user_type,
        ]);
    }
}
