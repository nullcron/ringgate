<?php

namespace Tests\Feature;

use App\Models\User;
use Tests\TestCase;

class ExampleTest extends TestCase
{
    public function test_guest_homepage_shows_the_portal_and_login_link(): void
    {
        $this->get('/')
            ->assertOk()
            ->assertSee('Your Portal')
            ->assertSee(route('login'));
    }

    public function test_authenticated_homepage_and_dashboard_render_the_same_page(): void
    {
        $this->actingAs(User::factory()->make(['name' => 'Morgan']));

        $homepage = $this->get('/');
        $dashboard = $this->get('/dashboard');

        $homepage->assertOk();
        $dashboard->assertOk();
        $this->assertSame($homepage->getContent(), $dashboard->getContent());
    }
}
