<?php

namespace App\Http\Controllers;

use App\Models\Conference;

class HomeController extends Controller
{
    public function index()
    {
        $conferences = Conference::latest('published_at')->published()->take(10)->get();

        return view('welcome')
            ->with([
                'conferences' => $conferences,
            ]);
    }
}
