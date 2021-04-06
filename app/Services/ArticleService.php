<?php

declare(strict_types=1);

namespace App\Services;

use App\Http\Requests\AddArticleRequest;
use App\Models\Article;


class ArticleService
{
    public function storeArticle(AddArticleRequest $request): void
    {
        $article = new Article();
        $article->title = $request->title;
        $article->brief = $request->brief;
        $article->article = $request->article;
        $article->status = 'stubbed';  //  TODO нормальнай
        $article->save();
    }
}
