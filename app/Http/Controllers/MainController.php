<?php

namespace App\Http\Controllers;

use App\Services\ArticleService;
use Illuminate\Support\Facades\DB;

class MainController extends Controller
{
    private ArticleService $service;

    public function __construct(ArticleService $service)
    {
        $this->service = $service;
    }

    public function index(): string
    {
        return view('mainPage', ['articles' => $this->service->getArticles()]);
    }
}
