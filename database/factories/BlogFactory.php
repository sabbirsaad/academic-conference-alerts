<?php

namespace Database\Factories;

use App\Models\Blog;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Carbon;

class BlogFactory extends Factory
{
    protected $model = Blog::class;

    public function definition()
    {
        return [
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
            'title' => $this->faker->word(),
            'slug' => $this->faker->slug(),
            'details' => $this->faker->word(),
            'image' => $this->faker->word(),
            'published_at' => Carbon::now(),

            'author_id' => User::factory(),
        ];
    }
}
