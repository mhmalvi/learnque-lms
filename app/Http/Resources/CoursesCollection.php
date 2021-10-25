<?php

namespace App\Http\Resources;

use App\Http\Resources\Course\CategoryResource;
use Illuminate\Http\Resources\Json\ResourceCollection;

use function PHPSTORM_META\map;

class CoursesCollection extends ResourceCollection
{
    /**
     * Transform the resource collection into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            'data' => $this->collection->map(function ($res) {
                return [
                    'uuid' => $res->uuid,
                    'code' => $res->code,
                    'title' => $res->title,
                    'slug' => $res->slug,
                    'category' => new CategoryResource($res->category),
                    'publish' => $res->publish,
                    'created_at' => $res->created_at->format('d M, Y'),
                ];
            })
        ];
    }
}
