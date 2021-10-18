<?php

namespace App\Http\Resources\Course;

use Illuminate\Http\Resources\Json\ResourceCollection;

class CategoriesCollection extends ResourceCollection
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
                    'title' => $res->title,
                    'slug' => $res->slug,
                    'description' => $res->description,
                    'thumbnail' => $res->thumbnail,
                    'created_at' => $res->created_at->format('d M, Y'),
                ];
            })
        ];
    }
}
