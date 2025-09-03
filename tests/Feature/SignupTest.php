<?php

namespace Tests\Feature;

use App\Jobs\ProcessUserEmailVerification;
use App\Mail\UserJoined;
use App\Models\User;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Queue;
use Tests\TestCase;

class SignupTest extends TestCase
{
    use RefreshDatabase;

    public function test_a_visitor_is_able_to_view_the_signup_page()
    {
        $this->get(route('join'))
            ->assertStatus(200)
            ->assertSee('Sign Up')
            ->assertSee('First Name')
            ->assertSee('Last Name')
            ->assertSee('Email')
            ->assertSee('Password')
            ->assertSee('Join Now');
    }

    public function test_anyone_can_join_and_will_dispatch_a_job_for_sending_email()
    {
        $this->withoutExceptionHandling();

        Queue::fake();

        $this->assertDatabaseCount('users', 0);

        $this->post(route('join'), [
            'first_name' => 'foo',
            'last_name' => 'bar',
            'email' => 'foo@bar.com',
            'password' => 'password',
        ])
            ->assertRedirect()
            ->assertSessionHas('success', 'You have successfully joined!');

        $this->assertDatabaseCount('users', 1);
        $this->assertDatabaseHas('users', [
            'first_name' => 'foo',
            'last_name' => 'bar',
            'email' => 'foo@bar.com',
        ]);

        User::latest()->first();

        Queue::assertPushed(ProcessUserEmailVerification::class);
    }

    public function test_a_signed_up_user_will_get_a_verification_email()
    {
        Mail::fake();
        $user = User::factory()->create([
            'email' => 'foo@bar.com',
        ]);
        config(['queue.default' => 'sync']);

        ProcessUserEmailVerification::dispatch($user);

        Mail::assertSent(UserJoined::class, function ($mail) use ($user) {
            return $mail->hasTo('foo@bar.com') &&
                $mail->hasSubject('Verify your email | '.env('APP_NAME')) &&
                $mail->assertSeeInHtml('Hello '.$user->first_name) &&
                $mail->assertSeeInHtml('You have joined the '.config('app.name').' community. We are excited to have you on board.') &&
                $mail->assertSeeInHtml('To get started, please click the button below to verify your email address.') &&
                $mail->assertSeeInHtml('Verify now') &&
                $mail->assertSeeInHtml($user->getVerificationLink());
        });
    }

    /**
     * @dataProvider fieldDataProvider
     * */
    public function test_some_fields_are_required($field, $value)
    {
        $this->assertDatabaseCount('users', 0);
        $userData = User::factory()->make([$field => $value]);

        $this->post(route('join'), $userData->toArray())
            ->assertRedirect()
            ->assertSessionHasErrors($field);

        $this->assertDatabaseCount('users', 0);
    }

    public function test_email_should_be_unique()
    {
        User::factory()->create(['email' => 'foo@bar.com']);

        $this->assertDatabaseCount('users', 1);

        $this->post(route('join'), [
            'first_name' => 'foo',
            'last_name' => 'bar',
            'email' => 'foo@bar.com',
            'password' => 'password',
        ])
            ->assertRedirect()
            ->assertSessionHasErrors('email');

        $this->assertDatabaseCount('users', 1);
    }

    public function test_a_user_can_verify_their_valid_email_verification_link()
    {
        // Arrange
        $user = User::factory()->create();
        $this->assertNotNull($user->hash);
        $this->assertNull($user->email_verified_at);

        // Act
        $response = $this->get($user->getVerificationLink())->assertStatus(302);

        // Assert
        $user = $user->fresh();
        $this->assertNull($user->hash);
        $this->assertNotNull($user->email_verified_at);
        $response->assertSessionHas('success');
    }

    public function test_a_user_will_get_a_error_when_try_to_verify_email_with_invalid_hash()
    {
        $this->withoutExceptionHandling();

        $this->expectException(ModelNotFoundException::class);
        $this->expectExceptionMessage("No query results for model [App\Models\User].");

        $this->get(route('verifications.show', 'FAKE-HASH'))->assertStatus(404);
    }

    public static function fieldDataProvider()
    {
        return [
            'First Name is required' => ['first_name', null],
            'Last Name is required' => ['last_name', null],
            'Email is required' => ['email', null],
            'Email should be in a proper format' => ['email', 'fooandbar'],
            'Password is required' => ['password', null],
            'Password should be minimum 6 characters' => ['password', 'pass'],
        ];
    }
}
