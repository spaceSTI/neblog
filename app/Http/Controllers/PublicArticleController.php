<?php

namespace App\Http\Controllers;


use App\Http\Requests\ArticlesFilterRequest;
use App\Models\Article;
use App\Services\ArticleService;
use Illuminate\Http\Request;

class PublicArticleController extends Controller
{
    private ArticleService $service;

    public function __construct(ArticleService $service)
    {
        $this->service = $service;
    }

    public function index(ArticlesFilterRequest $request)
    {
        if ($request->isInvalid()) {
            return redirect('/');
        }

        $request->status = Article::STATUS_PUBLIC;
        return view('/articles/list', ['articles' => $this->service->getArticles($request)]);
    }

    public function item(int $id)
    {
        return view('/articles/item', ['article' => $this->service->getArticle($id)]);
    }
}
