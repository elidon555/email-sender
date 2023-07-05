<?php

namespace Tests\Unit;

use App\Events\SendMailEvent;
use App\Http\Services\Mail\MailService;
use App\Mail\UserPostsMail;
use Illuminate\Support\Facades\Event;
use Illuminate\Support\Facades\Mail;
use InvalidArgumentException;
use Tests\TestCase;

class MailServiceTest extends TestCase
{
    /** @var MailService */
    protected MailService $mailService;

    public function setUp(): void
    {
        parent::setUp();
        $this->mailService = resolve(MailService::class);
    }

    public function testEventFired()
    {
        Event::fake();

        $this->mailService->sendUserPostsMail(['elidonneziri@gmail.com']);

        Event::assertDispatched(SendMailEvent::class);
    }

    public function testMailSent()
    {
        Mail::fake();

        $this->mailService->sendUserPostsMail(['elidonneziri@gmail.com']);

        Mail::assertQueued(UserPostsMail::class, function ($mail) {
            return $mail->hasTo('elidonneziri@gmail.com');
        });
    }

    public function testMultipleMailsSent()
    {
        Mail::fake();

        $this->mailService->sendUserPostsMail(['elidonneziri@gmail.com', 'elidonneziridiablo@gmail.com']);

        Mail::assertQueued(UserPostsMail::class, function ($mail) {
            return $mail->hasTo('elidonneziri@gmail.com') &&
                $mail->hasTo('elidonneziridiablo@gmail.com');
        });
    }

    public function testEventData()
    {
        Event::fake();

        $this->mailService->sendUserPostsMail(['elidonneziri@gmail.com']);

        Event::assertDispatched(SendMailEvent::class, function ($event) {
            return in_array('elidonneziri@gmail.com',$event->mailTo);
        });
    }
}
