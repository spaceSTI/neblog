<?php

namespace App\Http\Controllers;

use App\Http\Requests\SearchRequest;
use Illuminate\Http\RedirectResponse;

class SearchController extends Controller
{
    public function search(SearchRequest $request): RedirectResponse
    {
        if ($request->isInvalid()) {
            return back();
        }

        dd($validated = $request->validated());
    }
}
