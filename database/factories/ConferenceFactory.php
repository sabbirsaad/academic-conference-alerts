<?php

namespace Database\Factories;

use App\Models\Conference;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Carbon;

class ConferenceFactory extends Factory
{
    protected $model = Conference::class;

    public function definition()
    {
        return [
            'uuid' => $this->faker->uuid(),
            'title' => $this->faker->sentence(),
            'details' => $this->faker->word(),
            'start_at' => Carbon::now()->addDays(130),
            'end_at' => Carbon::now()->addDays(132),
            'type' => $this->faker->word(),
            'url' => $this->faker->url(),
            'published_at' => Carbon::now(),
            'featured_at' => Carbon::now(),
            'views' => $this->faker->randomNumber(),
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),

            'creator_id' => User::factory(),
            'approver_id' => User::factory(),
        ];
    }
}
