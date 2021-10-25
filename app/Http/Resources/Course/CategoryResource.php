<?php

namespace App\Http\Resources\Course;

use Illuminate\Http\Resources\Json\JsonResource;

class CategoryResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return $this->collection->map(function ($res) {
            return [
                'uuid' => $res->uuid,
                'title' => $res->title,
                'slug' => $res->slug,
                'description' => $res->description,
                'thumbnail' => $res->thumbnail,
            ];
        });
    }
}
