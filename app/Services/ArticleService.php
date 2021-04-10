<?php

declare(strict_types=1);

namespace App\Services;

use App\Http\Requests\AddArticleRequest;
use App\Models\Article;
use App\Presentations\ArticleTransformer;
use Illuminate\Database\Eloquent\Collection;


class ArticleService
{
    public function storeArticle(AddArticleRequest $request): void
    {
        $article = new Article();
        $article->title = $request->title;
        $article->brief = $request->brief;
        $article->article = $request->article;
        $article->status = $request->status;
        $article->save();
    }

    public function getArticle(int $id): Article
    {
        return Article::findOrFail($id);
    }

    public function getArticles(): array
    {
        $dtos = [];
        foreach (Article::all() as $article) {
            $dtos[] = ArticleTransformer::buildForList($article);
        }
        return $dtos;
    }
}
