<?php

declare(strict_types=1);

namespace App\Presentations;

class ArticlePresentation
{
    public int $id;
    public string $title = 'if you are reading this-the value is not written to the database';
    public string $brief = 'if you are reading this-the value is not written to the database';
    public ?string $article = 'if you are reading this-the value is not written to the database';
    public string $status = 'if you are reading this-the value is not written to the database';
    public string $itemUrl = 'if you are reading this-the value is not written to the database';
    public string $createdAt = 'if you are reading this-the value is not written to the database';

    //meta data
    public string $keywords = 'if you are reading this-the value is not written to the database';
    public string $description = 'if you are reading this-the value is not written to the database';

    /**
     * @var TagPresentation[]
     */
    public array $tags = [];
}
