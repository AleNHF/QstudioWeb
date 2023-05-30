<?php

namespace App\Events;

use App\Models\Children;
use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class ContentNotificationEvent
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public $user, $content, $child;

    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct($user, $content)
    {
        $this->content = $content;
        $this->user = $user;
        $this->child = Children::find($content->children_id);
    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return \Illuminate\Broadcasting\Channel|array
     */
    /*public function broadcastOn()
    {
        return new PrivateChannel('channel-name');
    }*/
    public function broadcastAs()
    {
        return 'event-' . $this->user->id;
    }
    
    public function broadcastOn()
    {
        return ['channel' . $this->user->id, 'channel2'.$this->user->id];
    }
}
