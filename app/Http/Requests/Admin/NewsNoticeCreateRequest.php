<?php

namespace App\Http\Requests\Admin;

use App\Models\NewsNotice;
use Illuminate\Support\Str;
use App\Services\ImageHandler;

class NewsNoticeCreateRequest extends NewsNoticeRequest
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
        ];
    }

    public function save()
    {
        $image_name = null;
        if ($this->image) {
            $image_name = Str::slug($this->title);

            $image_handler = new ImageHandler();
            $image_handler->setName($image_name)
                ->setImage($this->image)
                ->setDimension(800)
                ->setPath('news_notices');
            $image_name = $image_handler->storeFromImageData();
        }
        return NewsNotice::create([
            'title' => $this->title,
            'description' => $this->description,
            'image' => $image_name,
        ]);
    }
}
