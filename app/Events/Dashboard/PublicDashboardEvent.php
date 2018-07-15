<?php

namespace App\Events\Dashboard;

use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

/**
 * Created by PhpStorm.
 * User: machenchi
 * Date: 18/7/14
 * Time: 下午10:16
 */
abstract class PublicDashboardEvent implements ShouldBroadcast
{
    use Dispatchable, InteractsWithSockets, SerializesModels;
    /**
     * The name of the queue on which to place the event.
     *
     * @var string
     */
    public $broadcastQueue = 'dashboard';

    /**
     * Get the channels the event should broadcast on.
     *
     * @return Channel
     */
    public function broadcastOn()
    {
        return new Channel('dashboard');
    }

    /**
     * Return a event name
     * @return string
     */
    abstract public function broadcastAs();
}