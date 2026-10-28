<?php

namespace Tests\Feature\Auth;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Livewire\Volt\Volt;
use Tests\TestCase;

class AuthenticationTest extends TestCase
{
    use RefreshDatabase;

    public function test_login_screen_can_be_rendered(): void
    {
        $response = $this->get('/login');

        $response
            ->assertOk()
            ->assertSeeVolt('pages.auth.login');
    }

    public function test_users_can_authenticate_using_the_login_screen(): void
    {
        $user = User::factory()->create([
            'role' => 'organization_admin',
        ]);

        $response = $this->post(route('admin.login.submit'), [
            'email' => $user->email,
            'password' => 'password',
        ]);

        $response->assertRedirect(route('admin.dashboard', absolute: false));

        $this->assertAuthenticatedAs($user);
    }

    public function test_users_can_not_authenticate_with_invalid_password(): void
    {
        $user = User::factory()->create([
            'role' => 'organization_admin',
        ]);

        $response = $this->from(route('admin.login'))
            ->post(route('admin.login.submit'), [
                'email' => $user->email,
                'password' => 'wrong-password',
            ]);

        $response->assertRedirect(route('admin.login', absolute: false));

        $this->assertGuest();
    }

    public function test_navigation_menu_can_be_rendered(): void
    {
        $user = User::factory()->create([
            'role' => 'organization_admin',
        ]);

        $this->actingAs($user);

        $response = $this->get('/dashboard');

        $response->assertRedirect(route('admin.dashboard', absolute: false));

        $dashboard = $this->get(route('admin.dashboard'));

        $dashboard->assertOk();
    }

    public function test_users_can_logout(): void
    {
        $user = User::factory()->create([
            'role' => 'organization_admin',
        ]);

        $this->actingAs($user);

        $response = $this->post(route('admin.logout'));

        $response->assertRedirect(route('admin.login', absolute: false));

        $this->assertGuest();
    }
}