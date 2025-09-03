<?php

namespace Database\Factories;

use App\Models\Category;
use App\Models\CategoryConference;
use App\Models\Conference;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Carbon;

class CategoryConferenceFactory extends Factory
{
    protected $model = CategoryConference::class;

    public function definition()
    {
        return [
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),

            'conference_id' => Conference::factory(),
            'category_id' => Category::factory(),
        ];
    }
}
