<?php

namespace Tests\Feature;

use Tests\TestCase;

class BasicTest extends TestCase
{
    public function test_home(): void
    {
        $response = $this->get('/');

        $response->assertStatus(200);
    }

    public function test_users(): void
    {
        $response = $this->get('/users');

        $response->assertValid();
    }

    public function test_candidat(): void
    {
        $response = $this->get('/candidat');

        $response->assertValid();
    }
}
