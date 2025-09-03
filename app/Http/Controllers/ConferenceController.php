<?php

namespace App\Http\Controllers;

use App\Models\Conference;
use Illuminate\Support\Facades\Auth;

class ConferenceController extends Controller
{
    public function show($uuid)
    {
        if (Auth::check()) {
            $conference = Conference::where('uuid', $uuid)->where('creator_id', auth()->user()->id)->firstOrFail();
        } else {
            $conference = Conference::published()->where('uuid', $uuid)->firstOrFail();
        }
        $conference->increment('views');

        // Get all the related conferences from the same categories and addresses.country
        $relatedConferenceCategoryIds = $conference->categories->pluck('id');
        $allRelatedConferences = Conference::published()->whereHas('categories', function ($query) use ($relatedConferenceCategoryIds) {
            $query->whereIn('category_id', $relatedConferenceCategoryIds);
        })
            ->where('id', '!=', $conference->id)
            ->get();

        $countryId = $conference->address->country->id;
        $allRelatedConferences = $allRelatedConferences->merge(
            Conference::published()->whereHas('address.country', function ($query) use ($countryId) {
                $query->where('id', $countryId);
            })
                ->where('id', '!=', $conference->id)
                ->get()
        );

        return view('front-end.conferences.show')
            ->with([
                'conference' => $conference,
                'relatedConferences' => $allRelatedConferences,
            ]);
    }
}
