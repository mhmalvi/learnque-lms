<?php

namespace App\Services;

use App\Http\Resources\LiveClassesCollection;
use App\Zoom\Zoom;

class LiveClassService
{
    public function getPaginatedList($per_page, $page_number)
    {
        $zoom = new Zoom();
        $meetings = $zoom->meetings($per_page, $page_number);

        $meetings_collection = collect($meetings->meetings);

        $data = [
            'page_count' => $meetings->page_count,
            'page_number' => $meetings->page_number,
            'per_page' => $meetings->page_size,
            'total_records' => $meetings->total_records,
            'data' => new LiveClassesCollection($meetings_collection),
        ];

        return $data;
    }
}
