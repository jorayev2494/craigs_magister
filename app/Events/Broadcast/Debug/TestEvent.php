<?php

namespace App\Events\Broadcast\Debug;

use App\Events\Broadcast\Base\BaseBroadcastEvent;
use App\Events\Broadcast\Base\ISocketEvents;
use Illuminate\Broadcasting\BroadcastEvent;
use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Contracts\Broadcasting\ShouldBroadcastNow;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class TestEvent implements ShouldBroadcastNow // extends BroadcastEvent implements ShouldBroadcast
{
    use Dispatchable, InteractsWithSockets, SerializesModels;


    /**
    * @var $message
    */
    public ?string $message;

    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct($message)
    {
        $this->message = $message;
        // $this->message = 'awd aw dwad';
        // dd($message);
    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return \Illuminate\Broadcasting\Channel|array
     */
    public function broadcastOn()
    {
        // dd('aaaaa');
        // return new PrivateChannel('private-debug');
        return new Channel('debug');
    }

    // public function broadcastWith(): array
    // {
    //     // dd('data data data data');
    //     return [
    //         // 'data' => [
    //             'user_name' => 'jorayev2494@craigs.com: ' . $this->message
    //         // ]
    //     ];
    // }

    public function broadcastAs(): string
    {
        // dd('ccccc');
        // return ISocketEvents::TEST_EVENT;        
        // return 'private-debug.name';
        return 'TestEvent';
    }
}
