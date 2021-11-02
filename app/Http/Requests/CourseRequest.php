<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class CourseRequest extends FormRequest
{
    /**
     * retrive file extension from base64 string
     */
    private function getOrigianlFileExtension($file)
    {
        // $encodedImgString = explode(',', $file, 2)[1];
        // $decodedImgString = base64_decode($encodedImgString);
        // $info = getimagesizefromstring($decodedImgString);

        // $ext = image_type_to_extension($info[2]);

        // return $ext;
    }

    /**
     * store product thumbanil
     * base64 encoded
     */
    protected function storeThumbnailImages()
    {
        // $file = $this->thumbnail;
        // $name = $this->image_title ? Str::slug($this->image_title) : Str::slug($this->title);
        // $extension = $this->getOrigianlFileExtension($file);
        // $filename = "{$name}{$extension}";

        // $this->makeDirectory();

        // /**
        //  * We will store the image first in our app storage
        //  * Then transfer the file into ftp
        //  * Then delete the file for app storage
        //  */
        // $image = Image::make($file)
        //     ->fit(1000)
        //     ->save(storage_path('app/public/temp/' . $filename));

        // Storage::disk('ftp')->put(
        //     'storage/products/' . $filename,
        //     $image
        // );

        // Storage::delete("public/temp/" . $filename);

        // return $filename;
    }
}
