<?php

namespace Tests\Feature;

use App\Http\Controllers\CategoryConferenceController;
use App\Models\Address;
use App\Models\Category;
use App\Models\Conference;
use App\Models\Country;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ConferenceCategoryTest extends TestCase
{
    use RefreshDatabase;

    public function test_it_list_all_conferences_for_the_given_category()
    {
        // ARRANGE
        $category = Category::factory()->create(['title' => 'foo']);
        $decoyCategory = Category::factory()->create(['title' => 'bar']);

        $conferenceA = Conference::factory()->create(['title' => 'Conference A']);
        $conferenceA->categories()->attach($category);

        $conferenceB = Conference::factory()->create(['title' => 'Conference B']);
        $conferenceB->categories()->attach($category);

        // Decoy
        $conferenceC = Conference::factory()->create(['title' => 'Conference C']);
        $conferenceC->categories()->attach($decoyCategory);

        // ACT + ASSERT
        $this->get(route('category.conferences.index', $category->title))
            ->assertStatus(200)
            ->assertSee("Conferences in {$category->title}")
            ->assertSee("There are total 2 upcoming conferences in {$category->title}")
            ->assertSee('adding new conference')
            ->assertSee($conferenceA->title)
            ->assertSee($conferenceB->title)
            ->assertDontSee($conferenceC->title);
    }

    public function test_it_shows_related_conferences_for_same_category_and_country()
    {
        // ARRANGE
        $category = Category::factory()->create();
        $country = Country::factory()->create();

        $conferenceA = Conference::factory()->create(['title' => 'Conference A']);
        $conferenceA->categories()->attach($category);
        $conferenceA->address()->create(Address::factory()->make(['country_id' => $country->id])->toArray());

        // Related conferences
        $conferenceB = Conference::factory()->create(['title' => 'Conference B']);
        $conferenceB->categories()->attach($category);

        $conferenceC = Conference::factory()->create(['title' => 'Conference C']);
        $conferenceC->address()->create(Address::factory()->make(['country_id' => $country->id])->toArray());

        // Decoy conference
        $conferenceD = Conference::factory()->create(['title' => 'Conference D']);

        // ACT
        $response = $this->get(route('category.conferences.index', $category->title));

        // ASSERT
        $response->assertSee($conferenceB->title);
        $response->assertSee($conferenceC->title);
        $response->assertDontSee($conferenceD->title);
    }

    public function test_it_shows_404_if_the_given_category_title_is_invalid()
    {
        // ACT + ASSERT
        $this->get(route('category.conferences.index', 'invalid-category-title'))->assertStatus(404);
    }

    public function test_it_order_by_the_latest_conferences_based_on_published_date_for_a_category()
    {
        // ARRANGE
        $category = Category::factory()->create();

        $conferenceA = Conference::factory()->create(['title' => 'Conference A', 'published_at' => now()]);
        $conferenceA->categories()->attach($category);

        $conferenceB = Conference::factory()->create(['title' => 'Conference B', 'published_at' => now()->subSecond()]);
        $conferenceB->categories()->attach($category);

        $conferenceC = Conference::factory()->create(['title' => 'Conference C', 'published_at' => now()->subMinute()]);
        $conferenceC->categories()->attach($category);

        $conferenceD = Conference::factory()->create(['title' => 'Conference D', 'published_at' => now()->subHour()]);
        $conferenceD->categories()->attach($category);

        // ACT
        $index = (new CategoryConferenceController)->index($category->title);

        // ASSERT
        $this->assertEquals(4, $index->getData()['conferences']->count());
        $this->assertEquals($conferenceA->title, $index->getData()['conferences']->first()->title);
        $this->assertEquals($conferenceD->title, $index->getData()['conferences']->last()->title);
    }

    public function test_it_list_down_the_latest_paginated_conferences_for_category()
    {
        // ARRANGE
        $category = Category::factory()->create();
        Conference::factory(50)->create()
            ->each(function ($conference) use ($category) {
                $conference->categories()->attach($category);
            });

        // ACT
        $index = (new CategoryConferenceController)->index($category->title);

        // ASSERT
        $this->assertEquals(50, $index->getData()['conferences']->total());
        $this->assertEquals(4, $index->getData()['conferences']->lastPage());
        $this->assertEquals(1, $index->getData()['conferences']->currentPage());
    }
}
