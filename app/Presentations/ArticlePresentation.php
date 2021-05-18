<?php

declare(strict_types=1);

namespace App\Presentations;

class ArticlePresentation
{
    private const DEFAULT = 'not initialized';

    public int $id = 0;
    public string $title = self::DEFAULT;
    public string $brief = self::DEFAULT;
    public ?string $article = null;
    public string $status = self::DEFAULT;
    public string $itemUrl = self::DEFAULT;
    public string $createdAt = self::DEFAULT;

    //meta data
    public string $keywords = self::DEFAULT;
    public string $description = self::DEFAULT;

    /**
     * @var TagPresentation[]
     */
    public array $tags = [];
/*
 * Это костыль. У сущности Article есть теги, но они представлены в виде объектов, а во вьюхе нужно, что-то попроще
 * поэтому этот метод выковыривает и возвращает айдишники этих тегов.
 */
    public function getTagsIds(): array
    {
        $ids = [];
        foreach ($this->tags as $tag) {
            $ids[] = $tag->id;
        }
        return $ids;
    }
}
