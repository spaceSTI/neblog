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
}
