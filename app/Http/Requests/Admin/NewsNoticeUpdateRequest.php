<?php

namespace App\Http\Requests\Admin;

use App\Models\NewsNotice;
use App\Services\ImageHandler;
use Illuminate\Support\Str;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Storage;

class NewsNoticeUpdateRequest extends FormRequest
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

            $image_handler = new ImageHandler();
            $image_handler->setName($news_notice->slug)
                ->setImage($this->image)
                ->setDimension(800)
                ->setPath('news_notices');
            $image_name = $image_handler->storeFromImageData();
            $news_notice->image = $image_name;
        }
        $news_notice->post_type = $this->post_type;

        $news_notice->save();
    }
}
