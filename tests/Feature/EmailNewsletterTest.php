<?php

namespace Tests\Feature;

use App\Jobs\SendNewsletterVerificationEmail;
use App\Mail\NewsletterSubscriberJoined;
use App\Models\NewsletterSubscriber;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Queue;
use Tests\TestCase;

class EmailNewsletterTest extends TestCase
{
    use RefreshDatabase;

    public function test_anyone_can_submit_the_newsletter_form()
    {
        $this->withoutExceptionHandling();
        // ARRANGE
        $data = [
            'email' => 'foo@bar.com',
        ];

        $this->assertDatabaseCount('newsletter_subscribers', 0);

        // ACT + ASSERT
        $this->post(route('newsletter.store'), $data)
            ->assertRedirect()
            ->assertSessionHas('success', 'You have successfully Subscribed!');

        $subscriber = NewsletterSubscriber::where('email', 'foo@bar.com')->first();
        $this->assertEquals(1, $subscriber->count());
        $this->assertNotEmpty($subscriber->hash);
        $this->assertEquals('foo@bar.com', $subscriber->email);
    }

    public function test_it_sends_notification_to_the_right_person_upon_joining_for_newsletter()
    {
        Queue::fake();

        $data = [
            'email' => 'foo@bar.com',
            'categories' => [1, 2],
        ];

        $this->post(route('newsletter.store'), $data);

        Queue::assertPushed(SendNewsletterVerificationEmail::class, function ($job) {
            return $job->subscriber->email === 'foo@bar.com';
        });
    }

    public function test_it_sends_email_with_the_appropriate_level_of_data()
    {
        Mail::fake();
        $subscriber = NewsletterSubscriber::factory()->create([
            'email' => 'foo@bar.com',
        ]);

        SendNewsletterVerificationEmail::dispatch($subscriber);

        Mail::assertSent(NewsletterSubscriberJoined::class, function ($mail) use ($subscriber) {
            return $mail->assertTo($subscriber->email) &&
                $mail->assertHasSubject('Verify your email') &&
                $mail->assertSeeInHtml('Hello') &&
                $mail->assertSeeInHtml('Thank you for joining for the newsletter of '.config('app.name')) &&
                $mail->assertSeeInHtml('Please click the button below to verify your email address') &&
                $mail->assertSeeInHtml('Verify Email') &&
                $mail->assertSeeInHtml(route('newsletter.verify', $subscriber->hash)) &&
                $mail->assertSeeInHtml('Thanks');
        });
    }

    public function test_email_is_required_for_signup()
    {
        $this->assertDatabaseCount('newsletter_subscribers', 0);

        $this->post(route('newsletter.store'), [
            'email' => null,
            'categories' => [1, 2],
        ])
            ->assertRedirect()
            ->assertSessionHasErrors('email');

        $this->assertDatabaseCount('newsletter_subscribers', 0);
    }

    public function test_email_should_be_unique()
    {
        NewsletterSubscriber::factory()->create(['email' => 'foo@bar.com']);
        $this->assertDatabaseCount('newsletter_subscribers', 1);

        $this->post(route('newsletter.store'), [
            'email' => 'foo@bar.com',
            'categories' => [1, 2],
        ])
            ->assertRedirect()
            ->assertSessionHasErrors('email');

        $this->assertDatabaseCount('newsletter_subscribers', 1);
    }

    public function test_email_should_be_a_proper_email_format()
    {
        $this->assertDatabaseCount('newsletter_subscribers', 0);

        $this->post(route('newsletter.store'), [
            'email' => 'fooandbar', // Not a proper email format
            'categories' => [1, 2],
        ])
            ->assertRedirect()
            ->assertSessionHasErrors('email');

        $this->assertDatabaseCount('newsletter_subscribers', 0);
    }

    public function test_a_user_can_verify_their_valid_newsletter_email_verification_link()
    {
        // Arrange
        $subscriber = NewsletterSubscriber::factory()->create();
        $this->assertNotNull($subscriber->hash);
        $this->assertNull($subscriber->email_verified_at);

        // Act
        $response = $this->get(route('newsletter.verify', $subscriber->hash))->assertStatus(302);

        // Assert
        $subscriber = $subscriber->fresh();
        $this->assertNull($subscriber->hash);
        $this->assertNotNull($subscriber->email_verified_at);
        $response->assertSessionHas('success');
    }

    public function test_a_user_will_get_a_error_when_try_to_verify_newsletter_email_with_invalid_hash()
    {
        $this->withoutExceptionHandling();

        $this->expectException(ModelNotFoundException::class);
        $this->expectExceptionMessage("No query results for model [App\Models\NewsletterSubscriber].");

        $this->get(route('newsletter.verify', 'FAKE-HASH'))->assertStatus(404);
    }
}
