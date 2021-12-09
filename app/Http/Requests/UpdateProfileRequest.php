<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateProfileRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return auth('admin')->check() || auth()->check();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'first_name' => 'required',
            'last_name' => 'required'
        ];
    }

    public function update($user)
    {
        if ($user->info == null) {
            $user->info()->create([
                'first_name' => $this->first_name,
                'last_name' =>  $this->last_name,
            ]);
            return;
        }
        $user->info->update([
            'first_name' => $this->first_name,
            'last_name' =>  $this->last_name,
        ]);
    }
}
