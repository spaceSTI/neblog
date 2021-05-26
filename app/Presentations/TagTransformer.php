<?php


namespace App\Presentations;


use App\Models\Tag;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Collection as BaseCollection;

class TagTransformer
{
    /**
     * @param Collection|Tag[] $tagsModels
     * @return TagPresentation[]
     */
    public static function build(Collection $tagsModels): array
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

    /**
     * @param Collection|Tag[] $tagsModels
     * @param BaseCollection $weights
     * @return TagPresentation[]
     */
    public static function buildWithWeight(Collection $tagsModels, BaseCollection $weights): array
    {
        $tags = self::build($tagsModels);

        $maxWeight = $weights->first();
        foreach ($tags as $key => $tag) {
            $weight = $weights->get($tag->id) ?? 0;
            if ($weight === 0) {
                unset($tags[$key]);
            }
            $tag->fontSize = round($weight / $maxWeight * 100);
        }

        return $tags;
    }
}
