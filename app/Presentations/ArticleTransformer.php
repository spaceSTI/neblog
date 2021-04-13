<?php
declare(strict_types=1);

namespace App\Presentations;

use App\Models\Article;

/**
 * Внутри DTO есть публичные свойства, при создании объекта DTO с магической помощью свойства заполняются
 * значениями из модели, которую сюда передал сервис.
 */
class ArticleTransformer
{
    //Трансформер заполняет только необходимые для  конкретного вызова свойства. ??Завести переменную??

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

    public static function buildForItem(Article $article): ArticlePresentation
    {
        $dto = new ArticlePresentation();
        $dto->title = $article->title;
        $dto->brief = $article->brief;
        $dto->article = $article->article;
        $dto->status = $article->status;
        $dto->itemUrl = route('view-article', ['id' => $article->id]);
        $dto->createdAt = $article->created_at->format('d/m/Y');
        return $dto;
    }

}
