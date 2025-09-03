<?php

namespace Database\Factories;

use App\Models\Conference;
use App\Models\ConferenceInstitute;
use App\Models\Institute;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Carbon;

class ConferenceInstituteFactory extends Factory
{
    protected $model = ConferenceInstitute::class;

    public function definition(): array
    {
        return [
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),

            'conference_id' => Conference::factory(),
            'institute_id' => Institute::factory(),
        ];
    }
}
