<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\MainController;
use App\Http\Requests\AddArticleRequest;
use App\Services\ArticleService;

class ArticleController extends AdminController
{
    private ArticleService $service;

    public function __construct(ArticleService $service)
    {
        parent::__construct();

        $this->service = $service;
    }

    public function showArticleForm()
    {
        return view('/admin/articleEditor');
    }

    public function storeArticle(AddArticleRequest $request)
    {
        $this->service->storeArticle($request);
        return redirect()->action([MainController::class, 'index']);
    }
}
