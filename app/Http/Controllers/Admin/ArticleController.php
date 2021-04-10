<?php

namespace App\Http\Controllers\Admin;

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

    public function showForm()
    {
        return view('/admin/articleEditor');
    }

    public function add(AddArticleRequest $request)
    {
        $this->service->storeArticle($request);
        return redirect('/');
    }

    public function view(int $id)
    {

        //dd($model->created_at->format('d/m/Y')); exit; //DBG

        return view('/publication', ['article' => $this->service->getArticle($id)]);
    }
}
