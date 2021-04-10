<?php

namespace App\Http\Controllers;

use App\Http\Requests\SearchRequest;
use Illuminate\Http\RedirectResponse;

class SearchController extends Controller
{
    public function search(SearchRequest $request)
    {
        if ($request->isInvalid()) {
            return back();
        }
        return view('search');
        //dd($validated = $request->validated());
    }
}
