<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\AddArticleRequest;
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

    public function index()
    {
        return view('/articles/list', ['articles' => $this->service->getArticles()]);
    }

    public function item(int $id)
    {
        return view('/articles/item', ['article' => $this->service->getArticle($id)]);
    }

    public function addNew()
    {
        return view('/admin/articleEditor');
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
        return view('/admin/articleEditor', ['article' => $this->service->getArticle($id)]);
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
