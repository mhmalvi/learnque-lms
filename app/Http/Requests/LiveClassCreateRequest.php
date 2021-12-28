<?php

namespace App\Http\Requests;

use App\Zoom\Zoom;

class LiveClassCreateRequest extends LiveClassRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'topic' => 'required|max:220',
            'start_time' => 'required',
            'duration' => 'required|integer|min:1',
            'password' => 'required|max:10|alpha_num',
        ];
    }

    public function save()
    {
        $zoom = new Zoom();

        return $zoom->create($this);
    }
}
