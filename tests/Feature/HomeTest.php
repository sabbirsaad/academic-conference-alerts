<?php

namespace Tests\Feature;

use App\Models\Conference;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class HomeTest extends TestCase
{
    use RefreshDatabase;

    public function test_it_loads_the_home_page()
    {
        $this->withoutExceptionHandling();
        $response = $this->get(route('home'));

        $response->assertStatus(200);
        $response->assertViewIs('welcome');
    }

    public function test_it_loads_latest_10_published_conferences()
    {
        $conferences = Conference::factory(10)->create();

        $response = $this->get(route('home'));

        foreach ($conferences as $conference) {
            $response->assertSee($conference->title);
        }
    }
}
