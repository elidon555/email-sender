<?php

namespace App\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Collection;

class SendMailEvent
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public Collection $users;
    public array $mailTo;

    /**
     * Create a new event instance.
     *
     * @param Collection $users
     * @param array $mailTo
     */
    public function __construct(Collection $users,array $mailTo)
    {
        $this->users = $users;
        $this->mailTo = $mailTo;
    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return array<int, Channel>
     */
    public function broadcastOn(): array
    {
        return [
            new PrivateChannel('channel-name'),
        ];
    }
}
