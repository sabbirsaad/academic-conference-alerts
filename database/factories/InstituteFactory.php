<?php

namespace Database\Factories;

use App\Models\Institute;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Carbon;

class InstituteFactory extends Factory
{
    protected $model = Institute::class;

    public function definition()
    {
        return [
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
            'name' => $this->faker->name(),
            'slug' => $this->faker->slug(),
            'logo' => $this->faker->word(),
            'details' => $this->faker->word(),
            'website' => $this->faker->url(),
            'phone' => $this->faker->phoneNumber(),
            'email' => $this->faker->unique()->safeEmail(),

            'user_id' => User::factory(),
        ];
    }
}
