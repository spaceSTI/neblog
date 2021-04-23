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
    public function create(AddArticleRequest $request): int
    {
        $article = new Article();
        $this->fill($article, $request);
        $article->save();
        return $article->id;
    }

    public function update(int $id, AddArticleRequest $request): void
    {
        $article = Article::findOrFail($id);
        $this->fill($article, $request);
        $article->save();
    }

    private function fill(Article $article, AddArticleRequest $request): void
    {
        $article->title = $request->title;
        $article->brief = $request->brief;
        $article->article = $request->article;
        $article->status = $request->status;
        $article->keywords = $request->keywords;
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
        //цикл перебирает коллекцию моделей и заталкивает каждую по очереди в трансформер.
        $paginator = Article::paginate(15);
        foreach ($paginator as $article) {
            $dtos[] = ArticleTransformer::buildForList($article);
        }
        return $this->rebuildPaginator($dtos, $paginator);
    }

    public function getTitleList(): LengthAwarePaginator
    {
        //инициализация ДТО, как пустого массива
        $dtos = [];
        //цикл перебирает коллекцию моделей и заталкивает каждую по очереди в трансформер.
        $paginator = Article::select(['id', 'title'])->paginate(50);
        foreach ($paginator as $article) {
            $dtos[] = ArticleTransformer::buildForTitleList($article);
        }
        return $this->rebuildPaginator($dtos, $paginator);
    }

    private function rebuildPaginator(array $dtos, LengthAwarePaginator $paginator): LengthAwarePaginator
    {
        return new LengthAwarePaginator(
            $dtos,
            $paginator->total(),
            $paginator->perPage(),
            $paginator->currentPage(),
            $paginator->getOptions()
        );
    }
}
