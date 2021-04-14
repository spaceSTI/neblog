<?php
/**
 * @var ArticlePresentation $article
 */
use App\Presentations\ArticlePresentation;
?>
@extends('layouts.main')
@section('content')
    <div class="my-2">
        <h3>{{ $article->title }}</h3>
        <p>
            <small>{{ $article->createdAt }}</small>
        </p>
        <div class="row">
            <div class="ml-0,5 p-2 col-12 col-sm-12 col-md-4 col-lg-4 col-xl-4">
                <a href="/"><img class="barker" src="images/123.png" alt="image"></a>
            </div>
            <div class="col-md" name="brief">
                {!! $article->brief !!}
            </div>
        </div>
        <div class="row" name="article">
            <div class="col">
                {!! $article->article !!}
            </div>
        </div>
    </div>
@endsection
