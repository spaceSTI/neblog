<?php

namespace App\Http\Controllers;

use App\Services\ArticleService;

class MainController extends Controller
{
    private ArticleService $service;

    public function __construct(ArticleService $service)
    {
        $this->service = $service;
    }

    public function index()
    {
        return view('mainPage', ['articles' => $this->service->getArticles()]);
    }
}
