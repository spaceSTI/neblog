<?php

declare(strict_types=1);

namespace App\Services;

use App\Http\Requests\AddArticleRequest;
use App\Http\Requests\ArticlesFilterRequest;
use App\Models\Article;
use App\Presentations\ArticlePresentation;
use App\Presentations\ArticleTransformer;
use Carbon\Carbon;
use Illuminate\Pagination\LengthAwarePaginator;

class ArticleService
{
    //не используется транзакция, чтобы из-за ошибки тегов не потерять все остальное.
    public function create(AddArticleRequest $request): int
    {
        $article = new Article();
        $this->fill($article, $request);
        $article->created_at = Carbon::now();
        $article->save();
        $article->tags()->sync($request->tags);
        return $article->id;
    }

    public function update(int $id, AddArticleRequest $request): void
    {
        $article = Article::findOrFail($id);
        $this->fill($article, $request);
        $article->save();
        $article->tags()->sync($request->tags);
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
        return ArticleTransformer::buildSelected(Article::findOrFail($id));
    }

    /**
     * @param ArticlesFilterRequest $request
     * @return LengthAwarePaginator
     */
    public function getArticles(ArticlesFilterRequest $request): LengthAwarePaginator
    {
        //это ПРОСТО объект query builder`a
        $query = Article::query();

        //получить все посты, у которых статус как в запросе
        if ($request->status) {
            $query->where('status', $request->status);
        }
        //получить все посты ИМЕЮЩИЕ хотя бы 1 конкретный тег переданный в запросе
        if ($request->name) {
            $query->whereHas('tags', function ($q) use ($request) {
                $q->where('name', $request->name);
            });
        }

        //инициализация ДТО, как пустого массива
        $dtos = [];
        //цикл перебирает коллекцию моделей и заталкивает каждую по очереди в трансформер.
        $paginator = $query
            ->orderby('created_at', 'desc')
            ->paginate(5);
        foreach ($paginator as $article) {
            $dtos[] = ArticleTransformer::buildBasic($article);
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
            $dtos[] = ArticleTransformer::buildMinimal($article);
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
