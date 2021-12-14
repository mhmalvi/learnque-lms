<?php

namespace App\Services;

use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;

class ImageHandler
{
    private $image,
        $name,
        $path,
        $height = null,
        $width = 600;

    public function setImage($image)
    {
        $this->image = $image;
        return $this;
    }

    public function setName($name)
    {
        $this->name = $name;
        return $this;
    }

    public function setPath($path)
    {
        $this->path = $path;
        return $this;
    }

    public function setDimension($width, $height = null)
    {
        $this->height = $height;
        $this->width = $width;
        return $this;
    }

    public function storeFromImageData()
    {
        $extension = $this->getOriginalFileExtension($this->image);
        $filename = "{$this->name}{$extension}";

        if (!Storage::exists('public/' . $this->path)) {
            Storage::makeDirectory('public/' . $this->path);
        }

        Image::make($this->image)
            ->fit($this->width, $this->height)
            ->save(storage_path('app/public/' . $this->path . '/' . $filename));

        return $filename;
    }

    /**
     * retrive file extension from base64 string
     */
    private function getOriginalFileExtension($file)
    {
        $encodedImgString = explode(',', $file, 2)[1];
        $decodedImgString = base64_decode($encodedImgString);
        $info = getimagesizefromstring($decodedImgString);

        $ext = image_type_to_extension($info[2]);

        return $ext;
    }
}
