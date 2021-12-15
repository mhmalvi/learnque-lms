<?php

namespace App\Http\Requests\Admin;

use App\Models\NewsNotice;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

class NewsNoticeUpdateRequest extends NewsNoticeRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return auth('admin')->check();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'title' => "required",
            'post_type' => 'required',
        ];
    }

    public function update(NewsNotice $news_notice)
    {
        $news_notice->title = $this->title;
        $news_notice->description = $this->description;
        $news_notice->slug = $this->filled('slug') ? $this->slug : Str::slug($this->title);

        if (substr($this->image, 0, 4) != 'http') {
            Storage::delete('public/news_notices/' . $this->image);
            $news_notice->image = $this->saveImage();
        }

        $news_notice->post_type = $this->post_type;
        $news_notice->save();
    }
}
