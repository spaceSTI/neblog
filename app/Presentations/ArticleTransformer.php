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
    //Трансформер заполняет только необходимые для  конкретного вызова свойства.

    public static function buildForList(Article $article): ArticlePresentation
    {
        $dto = self::buildCommonPart($article);
        $dto->itemUrl = route('view-article', ['id' => $article->id]);
        return $dto;
    }

    public static function buildForTitleList(Article $article): ArticlePresentation
    {
        $dto = new ArticlePresentation();
        $dto->id = $article->id;
        $dto->title = $article->title;
        $dto->itemUrl = route('view-article', ['id' => $article->id]);
        return $dto;
    }

    public static function buildForItem(Article $article): ArticlePresentation
    {
        $dto = self::buildCommonPart($article);
        $dto->keywords = $article->keywords;
        $dto->description = strip_tags($article->brief);
        $dto->article = $article->article;
        return $dto;
    }

    private static function buildCommonPart(Article $article): ArticlePresentation
    {
        $dto = new ArticlePresentation();
        foreach ($article->tags as $tag) {
            $tagDto = new TagPresentation();
            $tagDto->id = $tag->id;
            $tagDto->tag = $tag->tag;
            $dto->tags[] = $tagDto;
        }
        $dto->id = $article->id;
        $dto->title = $article->title;
        $dto->brief = $article->brief;
        $dto->status = $article->status;
        $dto->createdAt = $article->created_at->format('d/m/Y');
        return $dto;
    }
}
