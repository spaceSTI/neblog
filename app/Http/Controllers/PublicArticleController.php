<?php

namespace App\Http\Controllers;


use App\Http\Requests\ArticlesFilterRequest;
use App\Models\Article;
use App\Services\ArticleService;
use App\Services\TagService;

class PublicArticleController extends Controller
{
    private ArticleService $articleService;

    private TagService $tagService;

    public function __construct(ArticleService $service, TagService $tagService)
    {
        $this->articleService = $service;
        $this->tagService = $tagService;
    }

    public function index(ArticlesFilterRequest $request)
    {
        if ($request->isInvalid()) {
            return redirect('/');
        }

        $request->status = Article::STATUS_PUBLIC;
        return view(
            '/articles/list',
            [
                'articles' => $this->articleService->getArticles($request),
                'tagsWithWeights' => $this->tagService->getTagsWithWeight(),
            ]
        );
    }

    public function item(int $id)
    {
        return view('/articles/item', ['article' => $this->articleService->getArticle($id)]);
    }
}
