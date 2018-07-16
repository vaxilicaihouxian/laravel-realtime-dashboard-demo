<?php

namespace App\Events\Dashboard\Events;

use App\Events\Dashboard\PublicDashboardEvent;


class MentionsEvent extends PublicDashboardEvent
{
    public $mentions;

    /**
     * Create a new event instance.
     * @param $mentions
     */
    public function __construct($mentions)
    {
        $this->mentions = $mentions;
    }

    public function broadcastAs()
    {
        return 'weibo.mentions';
    }
}
