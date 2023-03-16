<?php

namespace Tests\Feature;

use Tests\TestCase;

class ApiTest extends TestCase
{
    public function test_all_candidat(): void
    {
        $response = $this->post('/api/candidat');

        $response->assertValid();
    }

    public function test_get_candidat(): void
    {
        $response = $this->post('/api/candidat/1');

        $response->assertValid();
    }

    public function test_create_candidat(): void
    {
        $response = $this->post('/api/candidat', [
            'name' => 'joko',
            'birthday' => '2000-02-12'
        ]);

        $response->assertValid();
    }

    public function test_edit_candidat(): void
    {
        $response = $this->post('/api/candidat/1', [
            'name' => 'joko',
            'birthday' => '2000-02-12'
        ]);

        $response->assertValid();
    }

    public function test_delete_candidat(): void
    {
        $response = $this->delete('/api/candidat/1');

        $response->assertValid();
    }
}
