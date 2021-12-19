<?php

namespace App\Http\Requests\Course;

use App\Services\ImageHandler;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Storage;

class CategoryRequest extends FormRequest
{
    public function storeThumbnail($name)
    {
        $image_handler = new ImageHandler();
        return $image_handler->setImage($this->thumbnail)
            ->setName($name)
            ->setPath('categories')
            ->setDimension(800, 550)
            ->storeFromImageData();
    }

    public function deleteThumbnail($image_name)
    {
        Storage::delete('public/categories/' . $image_name);
    }
}
