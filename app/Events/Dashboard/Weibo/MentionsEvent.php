<?php

namespace App\Events\Dashboard\Weibo;

use App\Events\DashboardEvent;
use Illuminate\Broadcasting\Channel;


class MentionsEvent extends DashboardEvent
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
    /**
     * Get the channels the event should broadcast on.
     *
     * @return Channel
     */
    public function broadcastOn()
    {
        return new Channel('dashboard');
    }
}
