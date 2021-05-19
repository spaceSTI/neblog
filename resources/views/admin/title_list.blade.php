<?php
/**
 * @var ArticlePresentation[] $articles
 */
use App\Presentations\ArticlePresentation;

?>
@extends('layouts.admin')
@section('content')
    @foreach($articles as $dto)
        <div class="my-2">
            <h5><a href="{{ $dto->itemUrl }}">{{ $dto->title }}</a></h5>
            @endforeach
        </div>
@endsection
