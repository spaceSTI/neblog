<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\AddArticleRequest;
use App\Http\Requests\ArticlesFilterRequest;
use App\Models\Article;
use App\Services\ArticleService;

class ArticleController extends AdminController
{
    private ArticleService $service;

    public function __construct(ArticleService $service)
    {
        parent::__construct();

        $this->service = $service;
    }

    public function index(ArticlesFilterRequest $request)
    {
        return view('/articles/list', ['articles' => $this->service->getArticles($request)]);
    }

    public function titleList()
    {
        return view('/admin/title_list', ['articles' => $this->service->getTitleList()]);
    }

    public function item(int $id)
    {
        return view('/articles/item', ['article' => $this->service->getArticle($id)]);
    }

    public function addNew()
    {
        return view('/admin/article_editor');
    }

    public function create(AddArticleRequest $request)
    {
        $id = $this->service->create($request);
        return redirect(
            route(
                'admin-view-article',
                ['id' => $id]
            )
        );
    }

    public function edit(int $id)
    {
        return view('/admin/article_editor', ['article' => $this->service->getArticle($id)]);
    }

    public function update(int $id, AddArticleRequest $request)
    {
        $this->service->update($id, $request);
        return redirect(
            route(
                'admin-view-article',
                ['id' => $id]
            )
        );
    }
}
