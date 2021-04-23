<?php

namespace App\Http\Controllers;

use App\Services\ArticleService;
use Illuminate\Http\Request;

class UserArticleController extends Controller
{
    private ArticleService $service;

    public function __construct(ArticleService $service)
    {
        $this->service = $service;
    }

    public function view(int $id)
    {
        return view('/articles/item', ['article' => $this->service->getArticle($id)]);
    }
}
