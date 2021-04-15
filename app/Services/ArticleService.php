<?php

declare(strict_types=1);

namespace App\Services;

use App\Http\Requests\AddArticleRequest;
use App\Models\Article;
use App\Presentations\ArticlePresentation;
use App\Presentations\ArticleTransformer;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Facades\DB;


class ArticleService
{
    public function storeArticle(AddArticleRequest $request): int
    {
        $article = new Article();
        $article->title = $request->title;
        $article->brief = $request->brief;
        $article->article = $request->article;
        $article->status = $request->status;
        $article->save();
        return $article->id;
    }

    public function getArticle(int $id): ArticlePresentation
    {
        return ArticleTransformer::buildForItem(Article::findOrFail($id));
    }

    /**
     * @return LengthAwarePaginator
     */
    public function getArticles(): LengthAwarePaginator
    {
        //инициализация ДТО, как пустого массива
        $dtos = [];
        //цикл перебирает коллекцию моделей и заталкивает каждую по очереди в трансф.
        $paginator = Article::paginate(15);
        foreach ($paginator as $article) {
            $dtos[] = ArticleTransformer::buildForList($article);
        }

        return new LengthAwarePaginator(
            $dtos, $paginator->total(),
            $paginator->perPage(),
            $paginator->currentPage(),
            $paginator->getOptions()
        );
    }
}
