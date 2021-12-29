<?php

namespace App\Services;

use App\Http\Resources\LiveClassesCollection;
use App\Zoom\Zoom;

class LiveClassService
{
    /**
     * Get a meeting's information
     * @param int meeting_id
     */
    public function get($meeting_id)
    {
        $zoom = new Zoom();
        $meeting = $zoom->get($meeting_id);

        dd($meeting);
    }

    /**
     * Get a paginated list of meetings
     * @param int $per_page
     * @param int $page_number
     */
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

    /**
     * Delete a meeting
     * @param int $meeting_id
     */
    public function delete($meeting_id)
    {
        $zoom = new Zoom();
        return $zoom->destroy($meeting_id);
    }
}
