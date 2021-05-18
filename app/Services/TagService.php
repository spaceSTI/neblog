<?php
declare(strict_types=1);

namespace App\Services;

use App\Models\Tag;
use App\Presentations\ArticleTransformer;
use App\Presentations\TagPresentation;


class TagService
{
    /**
     * @return TagPresentation[]
     */
    public function getAll(): array
    {
        //в метод передается КОЛЛЕКЦИЯ моделей
        return ArticleTransformer::buildSelectedList(Tag::All());
    }
}
