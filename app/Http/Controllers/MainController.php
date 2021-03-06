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
        return view('articles/list', ['articles' => $this->service->getArticles()]);
    }

    public function item(int $id)
    {
        return view('/articles/item', ['article' => $this->service->getArticle($id)]);
    }
}
