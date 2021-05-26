<?php
declare(strict_types=1);

namespace App\Presentations;

use App\Models\Article;
use App\Models\Tag;
use Illuminate\Database\Eloquent\Collection;

/**
 * Внутри DTO есть публичные свойства, при создании объекта DTO с магической помощью свойства заполняются
 * значениями из модели, которую сюда передал сервис.
 */
class ArticleTransformer
{
    //Трансформер заполняет только необходимые для  конкретного вызова свойства.

    public static function buildBasic(Article $article): ArticlePresentation
    {
        $dto = self::buildFullModel($article);
        $dto->itemUrl = route('view-article', ['id' => $article->id]);
        return $dto;
    }

    public static function buildMinimal(Article $article): ArticlePresentation
    {
        $dto = new ArticlePresentation();
        $dto->id = $article->id;
        $dto->title = $article->title;
        $dto->itemUrl = route('view-article', ['id' => $article->id]);
        return $dto;
    }

    public static function buildSelected(Article $article): ArticlePresentation
    {
        $dto = self::buildFullModel($article);
        $dto->keywords = $article->keywords;
        $dto->description = strip_tags($article->brief);
        $dto->article = $article->article;
        return $dto;
    }

    private static function buildFullModel(Article $article): ArticlePresentation
    {
        $dto = new ArticlePresentation();
        $dto->id = $article->id;
        $dto->title = $article->title;
        $dto->brief = $article->brief;
        $dto->status = $article->status;
        $dto->createdAt = $article->created_at->format('d/m/Y');
        $dto->tags = TagTransformer::build($article->tags);
        return $dto;
    }
}
