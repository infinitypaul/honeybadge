<?php

namespace Tests\Unit;

use Tests\TestCase;
use Mockery as m;

class NotificationTest extends TestCase
{
    /**
     * A basic unit test example.
     */
    public function test_notification_sent_on_spam(): void
    {
        $response = $this->postJson('/api/notify', [
            "RecordType"=> "Bounce",
            "Type" => "SpamNotification",
            "TypeCode"=> 512,
            "Name" => "Spam notification",
            "Tag"=> "",
            "MessageStream"=> "outbound",
            "Description" => "The message was delivered, but was either blocked by the user, or classified as spam, bulk mail, or had rejected content.",
            "Email" => "zaphod@example.com",
            "From" => "notifications@honeybadger.io",
            "BouncedAt" =>"2023-02-27T21:41:30Z"
        ]);


        $response->assertJson([
            'message' => 'Alert Sent To The Slack Channel'
        ]);
    }

    /**
     * A basic unit test example.
     */
    public function test_email_type_is_required(): void
    {
        $response = $this->postJson('/api/notify', [
            "RecordType"=> "Bounce",
            "TypeCode"=> 512,
            "Name" => "Spam notification",
            "Tag"=> "",
            "MessageStream"=> "outbound",
            "Description" => "The message was delivered, but was either blocked by the user, or classified as spam, bulk mail, or had rejected content.",
            "From" => "notifications@honeybadger.io",
            "BouncedAt" =>"2023-02-27T21:41:30Z"
        ]);


        $response->assertJson([
            'message' => 'The type field is required. (and 1 more error)',
            'errors' => [
                'Type' => ['The type field is required.'],
                'Email' => ['The email field is required.']
            ]
        ]);
    }

    public function test_notification_not_sent_on_spam(): void
    {
        $response = $this->postJson('/api/notify', [
            "RecordType"=> "Bounce",
            "Type" => "HardBounce",
            "TypeCode"=> 512,
            "Name" => "Spam notification",
            "Tag"=> "",
            "MessageStream"=> "outbound",
            "Description" => "The message was delivered, but was either blocked by the user, or classified as spam, bulk mail, or had rejected content.",
            "Email" => "zaphod@example.com",
            "From" => "notifications@honeybadger.io",
            "BouncedAt" =>"2023-02-27T21:41:30Z"
        ]);


        $response->assertJson([
            'message' => 'Success'
        ]);
    }
}
