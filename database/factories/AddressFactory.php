<?php

namespace Database\Factories;

use App\Models\Address;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Carbon;

class AddressFactory extends Factory
{
    protected $model = Address::class;

    public function definition()
    {
        return [
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
            'address_line_1' => $this->faker->address(),
            'address_line_2' => $this->faker->address(),
            'city' => $this->faker->city(),
            'state' => $this->faker->word(),
            'postal_code' => $this->faker->postcode(),
            'country_id' => null,
            'conference_id' => null,
        ];
    }
}
