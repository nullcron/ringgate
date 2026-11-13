<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Auth\Notifications\ResetPassword;
use Illuminate\Auth\Notifications\VerifyEmail;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Notification;
use Tests\TestCase;

class AuthenticationFlowTest extends TestCase
{
    use RefreshDatabase;

    public function test_a_password_reset_link_changes_the_password_and_allows_login(): void
    {
        $user = User::factory()->create();
        Notification::fake();

        $this->post(route('password.email'), ['email' => $user->email])
            ->assertSessionHas('status');

        $token = null;
        Notification::assertSentTo($user, ResetPassword::class, function (ResetPassword $notification) use (&$token): bool {
            $token = $notification->token;

            return true;
        });

        $this->assertNotNull($token);

        $this->post(route('password.update'), [
            'token' => $token,
            'email' => $user->email,
            'password' => 'NewRinggatePass456!',
            'password_confirmation' => 'NewRinggatePass456!',
        ])->assertSessionHas('status');

        $this->post(route('login.store'), [
            'email' => $user->email,
            'password' => 'NewRinggatePass456!',
        ])->assertRedirect('/dashboard');

        $this->assertAuthenticatedAs($user);
    }

    public function test_a_newly_registered_user_must_verify_their_email_before_opening_dashboard(): void
    {
        Notification::fake();

        $this->post(route('register.store'), [
            'name' => 'New Member',
            'email' => 'new-member@example.test',
            'password' => 'NewRinggatePass456!',
            'password_confirmation' => 'NewRinggatePass456!',
        ]);

        $user = User::where('email', 'new-member@example.test')->firstOrFail();

        $this->assertNull($user->email_verified_at);
        $verificationUrl = null;
        Notification::assertSentTo($user, VerifyEmail::class, function (VerifyEmail $notification) use ($user, &$verificationUrl): bool {
            $verificationUrl = $notification->toMail($user)->actionUrl;

            return true;
        });

        $this->get('/dashboard')
            ->assertRedirect(route('verification.notice'));

        $this->assertNotNull($verificationUrl);

        $this->get($verificationUrl)
            ->assertRedirect('/dashboard');

        $this->assertNotNull($user->fresh()->email_verified_at);
        $this->get('/dashboard')->assertOk();
    }
}
