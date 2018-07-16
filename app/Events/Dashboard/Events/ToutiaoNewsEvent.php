<?php

namespace App\Events\Dashboard\Events;

use App\Events\Dashboard\PublicDashboardEvent;


class ToutiaoNewsEvent extends PublicDashboardEvent
{
    public $news;

    /**
     * Create a new event instance.
     * @param $news
     */
    public function __construct($news)
    {
        $this->news = $news;
    }

    public function broadcastAs()
    {
        return 'toutiao.news';
    }
}
