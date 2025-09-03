<?php

namespace Database\Seeders;

use App\Models\Address;
use App\Models\Blog;
use App\Models\Category;
use App\Models\Conference;
use App\Models\ConferenceVisitor;
use App\Models\Country;
use App\Models\Institute;
use App\Models\NewsletterSubscriber;
use App\Models\SearchTerms;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        Blog::factory(10)->create();
        ConferenceVisitor::factory(15)->create();
        SearchTerms::factory(15)->create();
        NewsletterSubscriber::factory(15)->create();

        $conferences = Conference::factory(15)->create();

        foreach ($conferences as $conference) {
            $conference->organizers()->attach(Institute::factory()->create());
            $conference->categories()->attach(Category::factory()->create());
            Address::factory()->create([
                'conference_id' => $conference->id,
                'country_id' => Country::factory(),
            ]);
        }

        User::factory()->create([
            'first_name' => 'Scholarly',
            'last_name' => 'Meet',
            'email' => 'hello@scholarlymeet.com',
            'password' => bcrypt('password'),
            'email_verified_at' => now(),
        ]);
    }
}
