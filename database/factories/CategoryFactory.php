<?php

namespace Database\Factories;

use App\Models\Category;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Carbon;

class CategoryFactory extends Factory
{
    protected $model = Category::class;

    public function definition()
    {
        return [
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
            'title' => $this->faker->word(),
            'slug' => $this->faker->slug(),
            'details' => $this->faker->word(),
            'views' => $this->faker->randomNumber(),

            'user_id' => User::factory(),
        ];
    }
}
