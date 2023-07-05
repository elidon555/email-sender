<?php

namespace App\Listeners;

use App\Events\SendMailEvent;
use App\Jobs\SendMailJob;
use App\Mail\UserPostsMail;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Mail;

class SendMailEventListener
{
    /**
     * Create the event listener.
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     */
    public function handle(SendMailEvent $event): void
    {
        Mail::to($event->mailTo)->queue(new UserPostsMail($event->users));
    }
}
