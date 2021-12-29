<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class LiveClassResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        $start_time = new \DateTime($this->start_time);
        return [
            'id' => $this->id,
            'topic' => $this->topic,
            'uuid' => $this->uuid,
            'host_id' => $this->host_id,
            'start_time' => $start_time->format("h:i a d M, Y") . " UCT",
            'start_time_datetime' => $start_time->format("Y-m-d H:i:s"),
            'duration' => $this->duration . " minutes",
            'duration_minutes' => $this->duration,
            'join_url' => $this->join_url,
            'password' => $this->password ?? null,
        ];
    }
}
