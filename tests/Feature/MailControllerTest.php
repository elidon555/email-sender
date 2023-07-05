<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Tests\TestCase;

class MailControllerTest extends TestCase
{
    /**
     * A basic feature test example.
     */
    use RefreshDatabase, WithoutMiddleware;

    public function testSendMail()
    {
        $response = $this->json('POST', '/api/mail/send/user-posts', ['emails' => ['elidonneziri@gmail.com']]);
        $response
            ->assertStatus(200)
            ->assertJson(['message' => 'Your email is being processed']);
    }

    public function testSendMailWithInvalidEmail()
    {
        $response = $this->json('POST', '/api/mail/send/user-posts', ['emails' => ['invalid_email']]);

        $response->assertStatus(422);
    }

    public function testSendMailWithEmptyEmail()
    {
        $response = $this->json('POST', '/api/mail/send/user-posts', ['emails' => []]);

        $response->assertStatus(422);
    }

    public function testSendMailWithoutEmailField()
    {
        $response = $this->json('POST', '/api/mail/send/user-posts', []);

        $response->assertStatus(422);
    }
}
