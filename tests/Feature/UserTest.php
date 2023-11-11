<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class UserTest extends TestCase
{
    public function test_show_login_view(): void
    {
        $response = $this->get('/admin/login');

        $response->assertStatus(200);
    }

    public function test_show_register_view(): void
    {
        $response = $this->get('/admin/register');

        $response->assertStatus(200);
    }
}
