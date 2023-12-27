<?php

namespace Tests\Feature;

// use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ExampleTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function test_the_application_returns_a_successful_response()
    {
        $json = '{
    "update_id": "937471378",
  "message": {
    "message_id": "20381",
    "from": {
        "id": "401741555",
      "is_bot": "",
      "first_name": "Максим",
      "last_name": "Шаповалов",
      "username": "dramix",
      "language_code": "uk"
    },
    "chat": {
        "id": "401741555",
      "first_name": "Максим",
      "last_name": "Шаповалов",
      "username": "dramix",
      "type": "private"
    },
    "date": "1703250374",
    "text": "/start",
    "entities": {
        "0": {
            "offset": "0",
        "length": "6",
        "type": "bot_command"
      }
    }
  }
}';
        $response = $this->post('/webhook', json_decode($json, true));

        $response->assertStatus(200);
    }
}
