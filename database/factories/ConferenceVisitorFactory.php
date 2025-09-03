<?php

namespace Database\Factories;

use App\Models\Conference;
use App\Models\ConferenceVisitor;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Carbon;

class ConferenceVisitorFactory extends Factory
{
    protected $model = ConferenceVisitor::class;

    public function definition()
    {
        return [
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
            'requester' => $this->faker->word(),
            'ip' => $this->faker->ipv4(),
            'location' => $this->faker->word(),

            'conference_id' => Conference::factory(),
        ];
    }
}
