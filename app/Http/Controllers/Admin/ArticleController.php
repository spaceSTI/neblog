<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\AddArticleRequest;
use App\Http\Requests\ArticlesFilterRequest;
use App\Models\Article;
use App\Services\ArticleService;
use App\Services\TagService;

class ArticleController extends AdminController
{
    private ArticleService $articleService;
    private TagService $tagService;

    public function __construct(ArticleService $articleService, TagService $tagService)
    {
        parent::__construct();

        $this->articleService = $articleService;
        $this->tagService = $tagService;
    }

    public function index(ArticlesFilterRequest $request)
    {
        return view('articles/list', ['articles' => $this->articleService->getArticles($request)]);
    }

    public function titleList()
    {
        return view('admin/title_list', ['articles' => $this->articleService->getTitleList()]);
    }

    public function item(int $id)
    {
        return view('/articles/item', ['article' => $this->articleService->getArticle($id)]);
    }


    public function addNew()
    {
        return view('admin/article_editor', ['tags' => $this->tagService->getAll()]);
    }

    public function create(AddArticleRequest $request)
    {
        $id = $this->articleService->create($request);
        return redirect(
            route(
                'admin-view-article',
                ['id' => $id]
            )
        );
    }

    public function edit(int $id)
    {
        return view(
            'admin/article_editor',
            [
                'article' => $this->articleService->getArticle($id),
                'tags' => $this->tagService->getAll(),
            ]
        );
    }

    public function update(int $id, AddArticleRequest $request)
    {
        $this->articleService->update($id, $request);
        return redirect(
            route(
                'admin-view-article',
                ['id' => $id]
            )
        );
    }
}
