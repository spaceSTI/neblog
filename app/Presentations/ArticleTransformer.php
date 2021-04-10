<?php
declare(strict_types=1);

namespace App\Presentations;

use App\Models\Article;

class ArticleTransformer
{
    public static function buildForList(Article $article): ArticlePresentation
    {
        $dto = new ArticlePresentation();
        $dto->title = $article->title;
        $dto->brief = $article->brief;
        $dto->status = $article->status;
        $dto->itemUrl = route('view-article', ['id' => $article->id]);
        $dto->createdAt = $article->created_at->format('d/m/Y');
        return $dto;
    }
}
