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

    public static function build(): TagPresentation
    {
        $dto = new TagPresentation();
        $dto->id = (int)$data->id;
        $dto->name = $data->$name;
        $dto->articlesCount = $data->articles_count;
        $dto->weight = 80 + round($data->articles_count / $this->maxUsageCount * 100);
        $dto->links['filter'] = App::router()->url(['app\blog', 'ArticleController'], ['label' => $data->id]);
        return $dto;
    }


    /**
     * @param Collection|Tag[] $tagsModels
     * @return TagPresentation[]
     */
    public static function buildSelectedList(Collection $tagsModels): array
    {
        /*
         * $tags[] потом станет массивом с ДТО. В цикле перебирается коллекция моделей и заполняются DTO.
         */
        $tags = [];
        foreach ($tagsModels as $tag) {
            $tagDto = new TagPresentation();
            $tagDto->id = $tag->id;
            $tagDto->name = $tag->name;
            $tagDto->filterUrl = route('site-index', ['tag' => $tag->name]);
            $tags[] = $tagDto;
        }
        return $tags;
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
        $dto->tags = self::buildSelectedList($article->tags);
        return $dto;
    }
}
