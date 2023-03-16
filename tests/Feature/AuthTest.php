<?php

namespace Tests\Feature;

use Tests\TestCase;

class AuthTest extends TestCase
{
    public function test_login(): void
    {
        $response = $this->post('/api/login', [
            'username' => 'andrian',
            'password' => '12345678'
        ]);

        $response->assertStatus(200);
    }
}
