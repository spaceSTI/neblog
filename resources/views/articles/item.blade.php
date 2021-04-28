<?php
/**
 * @var ArticlePresentation $article
 */
use App\Presentations\ArticlePresentation;
use App\Helpers;

?>

@extends(Helpers::isAdmin()  ?  'layouts.admin' : 'layouts.main'  )

@section('crawlerMeta')
    <meta name="ROBOTS" content="index, follow">
    <meta name="Keywords" content="{{ $article->keywords }}">
    <meta name="Description" content="{{ $article->description }}">
@endsection

@section('content')
    <div class="my-2">
        <h3>{{ $article->title }}</h3>
        <p>
            <small>{{ $article->createdAt }}</small>
        </p>
        <div class="row">
            <div class="ml-0,5 p-2 col-12 col-sm-12 col-md-4 col-lg-4 col-xl-4">
                <img class="barker" src="/images/123.png" alt="image">
            </div>
            <div class="col-md" name="brief">
                <p class="brief"> {!! $article->brief !!} </p>
            </div>
        </div>
        <div class="row" name="article">
            <div class="col">
                <p class="article"> {!! $article->article !!} </p>
            </div>
        </div>
    </div>
@endsection
