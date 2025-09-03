<?php

namespace Database\Factories;

use App\Models\Country;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Carbon;

class CountryFactory extends Factory
{
    protected $model = Country::class;

    public function definition()
    {
        return [
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
            'name' => $this->faker->name(),
            'slug' => $this->faker->slug(),
            'alpha2' => $this->faker->randomElement(['bd', 'de', 'us', 'uk', 'my', 'in', 'pk']),
            'details' => $this->faker->word(),
        ];
    }
}
