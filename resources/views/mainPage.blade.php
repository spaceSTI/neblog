@extends('layouts.main')
@section('content')
    @foreach($articles as $dto)
        <div class="my-2">
            <h3><a href="{{  $dto->itemUrl }}">{{ $dto->title }}</a></h3>
            <p>
                <small>{{ $dto->createdAt }}</small>
            </p>
            <div class="row">
                <div class="ml-0,5 p-2 col-12 col-sm-12 col-md-4 col-lg-4 col-xl-4">
                    <img class="barker" src="images/pug.jpg" alt="image">
                </div>
                <div class="col-md">
                    {!! $dto->brief !!}
                    <small><a href="{{  $dto->itemUrl }}">Показать полностью</a></small>
                </div>
            </div>
        </div>
    @endforeach
@endsection
