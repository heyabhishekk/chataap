<?php

namespace App\Events;

use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Queue\SerializesModels;
use Illuminate\Foundation\Events\Dispatchable;

class NewMessage implements ShouldBroadcast
{
    use Dispatchable, SerializesModels;

    public $receiverId;
    public $messageId;

    public function __construct($receiverId, $messageId)
    {
        $this->receiverId = $receiverId;
        $this->messageId = $messageId;
    }

    public function broadcastOn()
    {
        return new PrivateChannel('message.' . $this->receiverId);
    }
}
