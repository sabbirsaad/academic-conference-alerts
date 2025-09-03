<?php

namespace Tests\Feature;

use App\Http\Controllers\CountryConferenceController;
use App\Models\Address;
use App\Models\Category;
use App\Models\Conference;
use App\Models\Country;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ConferenceCountryTest extends TestCase
{
    use RefreshDatabase;

    public function test_it_list_all_conferences_for_the_given_country()
    {
        // ARRANGE
        $this->withoutExceptionHandling();
        $country = Country::factory()->create(['alpha2' => 'BD']);
        $decoyCountry = Country::factory()->create(['alpha2' => 'DE']);

        $conferenceA = Conference::factory()->create(['title' => 'Conference A']);
        $conferenceB = Conference::factory()->create(['title' => 'Conference B']);

        $conferenceA->address()->create(Address::factory()->make(['country_id' => $country->id])->toArray());
        $conferenceB->address()->create(Address::factory()->make(['country_id' => $country->id])->toArray());

        // Decoy
        $conferenceC = Conference::factory()->create(['title' => 'Conference C']);
        $conferenceC->address()->create(Address::factory()->make(['country_id' => $decoyCountry->id])->toArray());

        // ACT + ASSERT
        $this->get(route('country.conferences.index', $country->alpha2))
            ->assertStatus(200)
            ->assertSee("Conferences in $country->name ($country->alpha2)")
            ->assertSee('There are total 2 upcoming conferences in India.')
            ->assertSee('adding new conference')
            ->assertSee($conferenceA->title)
            ->assertSee($conferenceB->title)
            ->assertDontSee($conferenceC->title);
    }

    public function test_it_shows_related_conferences_for_same_country_and_category()
    {
        // ARRANGE
        $country = Country::factory()->create();
        $fooCategory = Category::factory()->create();

        $conferenceA = Conference::factory()->create(['title' => 'Conference A']);
        $conferenceA->address()->create(Address::factory()->make(['country_id' => $country->id])->toArray());
        $conferenceA->categories()->attach($fooCategory);

        // Related conferences
        $conferenceB = Conference::factory()->create(['title' => 'Conference B']);
        $conferenceB->categories()->attach($fooCategory);

        $conferenceC = Conference::factory()->create(['title' => 'Conference C']);
        $conferenceC->address()->create(Address::factory()->make(['country_id' => $country->id])->toArray());

        // Decoy conference
        $conferenceD = Conference::factory()->create(['title' => 'Conference D']);

        // ACT
        $response = $this->get(route('country.conferences.index', $country->alpha2));

        // ASSERT
        $response->assertSee($conferenceB->title);
        $response->assertSee($conferenceC->title);
        $response->assertDontSee($conferenceD->title);
    }

    public function test_it_shows_404_if_the_given_alpha2_code_is_invalid()
    {
        // TODO
        $this->get(route('country.conferences.index', 'invalid-alpha-code'))->assertStatus(404);
    }

    public function test_it_order_by_the_latest_conferences_based_on_published_date()
    {
        // ARRANGE
        $country = Country::factory()->create();

        $conferenceA = Conference::factory()->create(['title' => 'Conference A', 'published_at' => now()]);
        $conferenceA->address()->create(Address::factory()->make(['country_id' => $country->id])->toArray());

        $conferenceB = Conference::factory()->create(['title' => 'Conference B', 'published_at' => now()->subMinutes(1)]);
        $conferenceB->address()->create(Address::factory()->make(['country_id' => $country->id])->toArray());

        $conferenceC = Conference::factory()->create(['title' => 'Conference C', 'published_at' => now()->subHours(1)]);
        $conferenceC->address()->create(Address::factory()->make(['country_id' => $country->id])->toArray());

        $conferenceD = Conference::factory()->create(['title' => 'Conference D', 'published_at' => now()->subDays(1)]);
        $conferenceD->address()->create(Address::factory()->make(['country_id' => $country->id])->toArray());

        // ACT
        $index = (new CountryConferenceController)->index($country->alpha2);

        // ASSERT
        $this->assertEquals(4, $index->getData()['conferences']->count());
        $this->assertEquals($conferenceA->title, $index->getData()['conferences']->first()->title);
        $this->assertEquals($conferenceD->title, $index->getData()['conferences']->last()->title);
    }

    public function test_it_list_down_the_latest_paginated_conferences()
    {
        // ARRANGE
        $country = Country::factory()->create();
        $conferences = Conference::factory(16)->create();
        foreach ($conferences as $conference) {
            $conference->address()->create(Address::factory()->make(['country_id' => $country->id])->toArray());
        }

        // ACT
        $index = (new CountryConferenceController)->index($country->alpha2);

        // ASSERT
        $this->assertEquals(16, $index->getData()['conferences']->total());
        $this->assertEquals(2, $index->getData()['conferences']->lastPage());
        $this->assertEquals(1, $index->getData()['conferences']->currentPage());
    }
}
