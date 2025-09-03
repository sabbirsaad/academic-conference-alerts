<?php

namespace Database\Factories;

use App\Models\Category;
use App\Models\CategoryNewsletterSubscriber;
use App\Models\NewsletterSubscriber;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Carbon;

class CategoryNewsletterSubscriberFactory extends Factory
{
    protected $model = CategoryNewsletterSubscriber::class;

    public function definition()
    {
        return [
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),

            'category_id' => Category::factory(),
            'newsletter_subscriber_id' => NewsletterSubscriber::factory(),
        ];
    }
}
