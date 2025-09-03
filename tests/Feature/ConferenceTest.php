<?php

namespace Tests\Feature;

use App\Models\Address;
use App\Models\Category;
use App\Models\Conference;
use App\Models\Country;
use App\Models\Institute;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ConferenceTest extends TestCase
{
    use RefreshDatabase;

    public function test_it_shows_a_single_conference()
    {
        // ARRANGE
        $this->withoutExceptionHandling();
        $category = Category::factory()->create();
        $country = Country::factory()->create(['name' => 'Country']);
        $conference = Conference::factory()->create([
            'published_at' => now()->subDays(20),
        ]);
        $conference->categories()->attach($category);
        $conference->organizers()->attach(Institute::factory()->create());
        $conference->address()->create(Address::factory()->make(['country_id' => $country->id])->toArray());

        // ACT
        $response = $this->get(route('conferences.show', $conference->uuid));

        // ASSERT
        $response->assertStatus(200);
        $response->assertSee($conference->title);
        $response->assertSee($conference->url);
        $response->assertSee(Carbon::parse($conference->start_at)->format('d F Y'));
        $response->assertSee($conference->type);
        $response->assertSee('Total views: '.$conference->fresh()->views);
        $response->assertSee($conference->address->address_line_1);
        $response->assertSee($conference->address->address_line_2);
        $response->assertSee($conference->address->city);
        $response->assertSee($conference->address->state);
        $response->assertSee($conference->address->postal_code);
        $response->assertSee($conference->address->country->name);
        $response->assertSee($conference->categories->first()->name);
        $response->assertSee($conference->organizers->first()->name);
        $response->assertSee(Carbon::parse($conference->published_at)->diffForHumans());
        $response->assertSee($conference->creator->name);
        $response->assertSee($conference->categories->first()->title);
    }

    public function test_it_should_return_404_if_the_given_uuid_is_invalid()
    {
        $this->get(route('conferences.show', 'invalid-uuid'))->assertStatus(404);
    }

    public function test_visitor_only_can_view_the_published_conference()
    {
        $conference = Conference::factory()->create(['published_at' => null]);
        $response = $this->get(route('conferences.show', $conference->uuid));
        $response->assertStatus(404);
    }

    public function test_owner_can_able_to_view_the_unpublished_conference()
    {
        $user = User::factory()->create();
        $fooCategory = Category::factory()->create(['title' => 'FOO']);
        $fooCountry = Country::factory()->create(['name' => 'FOO Country']);
        $conference = Conference::factory()->create(['published_at' => null, 'creator_id' => $user->id]);
        $conference->categories()->attach($fooCategory);
        $conference->address()->create(Address::factory()->make(['country_id' => $fooCountry->id])->toArray());

        // Related conferences
        $conferenceB = Conference::factory()->create(['title' => 'Conference B']);
        $conferenceB->categories()->attach($fooCategory);

        $response = $this->actingAs($user)->get(route('conferences.show', $conference->uuid));
        $response->assertStatus(200);
    }

    public function test_other_authenticated_user_cannot_access_unpublished_conference()
    {
        $user1 = User::factory()->create();
        $user2 = User::factory()->create();

        $conference = Conference::factory()->create(['published_at' => null, 'creator_id' => $user1->id]);

        $response = $this->actingAs($user2)->get(route('conferences.show', $conference->uuid));
        $response->assertStatus(404);
    }

    public function test_it_increase_view_count_in_every_visit()
    {
        $conference = Conference::factory()->create(['views' => 1]);

        $this->get(route('conferences.show', $conference->uuid));

        $this->assertEquals(2, $conference->fresh()->views);
    }

    public function test_it_shows_related_conferences()
    {
        // ARRANGE
        $fooCategory = Category::factory()->create(['title' => 'FOO']);
        $barCategory = Category::factory()->create(['title' => 'BAR']);
        $fooCountry = Country::factory()->create(['name' => 'FOOCOUNTRY']);
        $barCountry = Country::factory()->create(['name' => 'BARCOUNTRY']);

        $conferenceA = Conference::factory()->create(['title' => 'Conference A']);
        $conferenceA->categories()->attach($fooCategory);
        $conferenceA->address()->create(Address::factory()->make(['country_id' => $fooCountry->id])->toArray());

        // Related conferences
        $conferenceB = Conference::factory()->create(['title' => 'Conference B']);
        $conferenceB->categories()->attach($fooCategory);

        $conferenceC = Conference::factory()->create(['title' => 'Conference C']);
        $conferenceC->address()->create(Address::factory()->make(['country_id' => $fooCountry->id])->toArray());

        // Decoy conference
        $conferenceD = Conference::factory()->create(['title' => 'Conference D']);
        $conferenceD->address()->create(Address::factory()->make(['country_id' => $barCountry->id])->toArray());
        $conferenceD->categories()->attach($barCategory);

        // ACT
        $response = $this->get(route('conferences.show', $conferenceA->uuid));

        // ASSERT
        $response->assertSee($conferenceB->title);
        $response->assertSee($conferenceC->title);
        $response->assertDontSee($conferenceD->title);
    }

    public function test_it_shows_newsletter_section()
    {
        // ARRANGE
        $conference = Conference::factory()->create();

        // ACT
        $response = $this->get(route('conferences.show', $conference->uuid));

        // ASSERT
        $response->assertSee('Get a weekly email with the latest conference list.');
        $response->assertSee('Land your next conference');
        $response->assertSee('Your email');
        $response->assertSee('Join Newsletter');
    }
}
