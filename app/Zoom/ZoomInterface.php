<?php

namespace App\Zoom;

use App\Http\Requests\LiveClassRequest;

interface ZoomInterface
{
    /**
     * get the list of meetings
     *
     */
    public function meetings($per_page = 30, $page_number = "");


    /**
     * Get meetings by host from application
     */
    public function meetingsListByHost(object $meetings);


    /**
     * Get meeting participants
     *
     */
    public function getParticipants($meeting_id);

    /**
     * Create a new zoom meeting
     *
     */
    public function create(LiveClassRequest $request);


    /**
     * Update an existing meeting
     *
     */
    public function update($meeting_id);


    /**
     * Delete a meeting
     *
     */
    public function destroy($meeting_id);
}
