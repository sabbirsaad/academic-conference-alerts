<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Conference;

class CategoryConferenceController extends Controller
{
    public function index($title)
    {
        $category = Category::where('title', $title)->firstOrFail();

        $conferences = Conference::whereHas('categories', function ($query) use ($category) {
            $query->where('category_id', $category->id);
        })->latest('published_at')->paginate();

        $countryId = $conferences->pluck('address.country.id')->flatten()->unique();

        $allRelatedConferences = Conference::whereHas('address.country', function ($query) use ($countryId) {
            $query->whereIn('id', $countryId);
        })->get();

        $allRelatedConferences = $conferences->merge($allRelatedConferences);

        return view('conferences.category.index')->with([
            'category' => $category,
            'conferences' => $conferences,
            'relatedConferences' => $allRelatedConferences,
        ]);
    }
}
