<?php
/**
 * @var ArticlePresentation[] $articles
 */
use App\Presentations\ArticlePresentation;
use App\Helpers;

?>
@extends(Helpers::isAdmin()  ?  'layouts.admin' : 'layouts.main'  )

@section('crawlerMeta')
    <meta name="ROBOTS" content="noindex, follow">
@endsection

@section('content')
    @foreach($articles as $dto)
        @if(Helpers::isAdmin())
            <div class="row">
                <a href="{{ route('admin-edit-article', $dto->id) }}">Edit</a>
            </div>
        @endif
        <div class="my-2">
            <h3><a href="{{ $dto->itemUrl }}">{{ $dto->title }}</a></h3>
            <p>
                <small>{{ $dto->createdAt }}</small>
            </p>
            <div class="row">
                <div class="ml-0,5 p-2 col-12 col-sm-12 col-md-4 col-lg-4 col-xl-4">
                    <img class="barker" src="/images/pug.jpg" alt="image">
                </div>
                <div class="col-md">
                    <p class="brief"> {!! $dto->brief !!} </p>
                    <small><a href="{{  $dto->itemUrl }}">Показать полностью</a></small>
                </div>
            </div>
            <div class="row" name="tag">
                <div class="col">

                    @foreach( $dto->tags as $tag)
                        <a href="{{ $tag->filterUrl }}"><span class="badge badge-secondary"> {!! $tag->tag !!} </span></a>
                    @endforeach

                </div>
            </div>
        </div>
    @endforeach
    {{ $articles->links() }}
@endsection
