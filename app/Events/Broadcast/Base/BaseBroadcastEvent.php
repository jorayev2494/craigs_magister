<?php

declare(strict_types=1);

namespace App\Events\Broadcast\Base;

use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Contracts\Broadcasting\ShouldBroadcastNow;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

/**
 * Class BroadcastEvent
 *
 * @package App\Events\Broadcast
 */
abstract class BaseBroadcastEvent implements ShouldBroadcast, ShouldBroadcastNow
{
    use Dispatchable;

    use InteractsWithSockets;

    use SerializesModels;

    /**
     * Get the channels the event should broadcast on.
     *
     * @return \Illuminate\Broadcasting\Channel|\Illuminate\Broadcasting\Channel[]
     */
    abstract public function broadcastOn();

    /**
     * Set data, which should be broadcast
     *
     * @return array
     */
    abstract public function broadcastWith(): array;

    /**
     * Event name
     * @return string
     */
    abstract public function broadcastAs(): string;
}