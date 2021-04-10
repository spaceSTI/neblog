<?php

declare(strict_types=1);

namespace App\Presentations;

class ArticlePresentation
{
    public string $title;
    public string $brief;
    public ?string $article;
    public string $status;
    public string $itemUrl;
    public string $createdAt;
}
