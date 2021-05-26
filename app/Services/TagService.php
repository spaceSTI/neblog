<?php
declare(strict_types=1);

namespace App\Services;

use App\Models\Tag;
use App\Presentations\TagPresentation;
use App\Presentations\TagTransformer;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Collection as BaseCollection;


class TagService
{
    /**
     * @return TagPresentation[]
     */
    public function getAll(): array
    {
        //в метод передается КОЛЛЕКЦИЯ моделей
        return TagTransformer::build($this->getAllTagsModels());
    }

    public function getTagsWithWeight(): array
    {
        return TagTransformer::buildWithWeight($this->getAllTagsModels(), $this->getWeight());
    }

    /**
     * @return Collection|Tag[]
     */
    private function getAllTagsModels(): Collection
    {
        return Tag::orderBy('name')->get();
    }

    private function getWeight(): BaseCollection
    {
        return DB::table('article_tag')
            ->select([DB::raw('count(article_id) as weight'), 'tag_id'])
            ->groupBy('tag_id')
            ->orderBy('weight', 'desc')
            ->pluck('weight', 'tag_id');

    }
}
