<?php

namespace App\Http\Controllers;

use App\Models\Conference;
use App\Models\Country;

class CountryConferenceController extends Controller
{
    public function index($alpha2)
    {
        $country = Country::where('alpha2', $alpha2)->firstOrFail();

        $conferences = Conference::whereHas('address.country', function ($query) use ($country) {
            $query->where('id', $country->id);
        })
            ->latest('published_at')
            ->paginate();

        $categoryIds = $conferences->pluck('categories.*.id')->flatten()->unique();
        $allRelatedConferences = Conference::whereHas('categories', function ($query) use ($categoryIds) {
            $query->whereIn('category_id', $categoryIds);
        })->get();

        $allRelatedConferences = $allRelatedConferences->merge(
            Conference::whereHas('address.country', function ($query) use ($country) {
                $query->where('id', $country->id);
            })->get()
        );

        return view('conferences.country.index')
            ->with([
                'country' => $country,
                'conferences' => $conferences,
                'relatedConferences' => $allRelatedConferences,
            ]);
    }
}
