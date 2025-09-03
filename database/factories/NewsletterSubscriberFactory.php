<?php

namespace Database\Factories;

use App\Models\NewsletterSubscriber;
use Illuminate\Database\Eloquent\Factories\Factory;

class NewsletterSubscriberFactory extends Factory
{
    protected $model = NewsletterSubscriber::class;

    public function definition()
    {
        return [
            'email' => $this->faker->unique()->safeEmail(),
            'email_verified_at' => null,
            'unsubscribed_at' => null,
            'hash' => md5('foo'),
        ];
    }
}
